<?php

namespace App\Filament\Resources\Kegiatans\Schemas;

use App\Enums\StatusKegiatan;
use App\Models\Kegiatan;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class KegiatanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kegiatan')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('jenis_kegiatan_id')
                            ->label('Jenis Kegiatan')
                            ->relationship('jenisKegiatan', 'nama')
                            ->searchable()
                            ->preload()
                            ->disabled(fn (?Kegiatan $record): bool => self::submissionFieldsAreLocked($record))
                            ->required(),
                        Select::make('pembicara_id')
                            ->label('Pembicara')
                            ->relationship('pembicara', 'nama')
                            ->searchable()
                            ->preload()
                            ->disabled(fn (?Kegiatan $record): bool => self::submissionFieldsAreLocked($record)),
                        TextInput::make('nama')
                            ->label('Nama')
                            ->required()
                            ->disabled(fn (?Kegiatan $record): bool => self::submissionFieldsAreLocked($record))
                            ->maxLength(255),
                        TextInput::make('ringkasan')
                            ->label('Ringkasan')
                            ->disabled(fn (?Kegiatan $record): bool => self::submissionFieldsAreLocked($record))
                            ->maxLength(255)
                            ->columnSpanFull(),
                        RichEditor::make('deskripsi')
                            ->label('Deskripsi')
                            ->disabled(fn (?Kegiatan $record): bool => self::submissionFieldsAreLocked($record))
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Jadwal & Lokasi')
                    ->columnSpanFull()
                    ->schema([
                        DatePicker::make('tanggal')
                            ->label('Tanggal')
                            ->disabled(fn (?Kegiatan $record): bool => self::submissionFieldsAreLocked($record))
                            ->required(),
                        TimePicker::make('jam_mulai')
                            ->label('Jam Mulai')
                            ->disabled(fn (?Kegiatan $record): bool => self::submissionFieldsAreLocked($record))
                            ->required()
                            ->seconds(false),
                        TimePicker::make('jam_selesai')
                            ->label('Jam Selesai')
                            ->disabled(fn (?Kegiatan $record): bool => self::submissionFieldsAreLocked($record))
                            ->seconds(false),
                        Textarea::make('lokasi')
                            ->label('Lokasi')
                            ->disabled(fn (?Kegiatan $record): bool => self::submissionFieldsAreLocked($record))
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
                Section::make('Publikasi & Status')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('kuota')
                            ->label('Kuota')
                            ->disabled(fn (?Kegiatan $record): bool => self::submissionFieldsAreLocked($record))
                            ->numeric()
                            ->minValue(0),
                        Select::make('status')
                            ->label('Status')
                            ->options(fn (?Kegiatan $record): array => self::statusOptions($record))
                            ->default(StatusKegiatan::MENUNGGU_REVIEW->value)
                            ->live()
                            ->required(),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail')
                            ->disk('public')
                            ->directory('kegiatan')
                            ->image()
                            ->imageEditor()
                            ->columnSpanFull(),

                    ])
                    ->columns(3),
                Section::make('Review Sekretaris')
                    ->columnSpanFull()
                    ->visible(fn (?Kegiatan $record): bool => self::canSeeReviewSection($record))
                    ->schema([
                        Textarea::make('catatan_review')
                            ->label('Catatan Review')
                            ->rows(4)
                            ->required(fn (Get $get): bool => in_array($get('status'), [
                                StatusKegiatan::PERLU_REVISI->value,
                                StatusKegiatan::DITOLAK->value,
                            ], true))
                            ->disabled(fn (): bool => ! self::currentUserCanReview()),
                        Placeholder::make('review_meta')
                            ->label('Meta Review')
                            ->content(fn (?Kegiatan $record): string => $record && $record->tanggal_review
                                ? sprintf(
                                    'Direview oleh %s pada %s',
                                    $record->reviewedBy?->name ?? '-',
                                    $record->tanggal_review->format('d M Y H:i'),
                                )
                                : 'Belum direview.'),
                    ]),
                Section::make('Laporan Kegiatan')
                    ->columnSpanFull()
                    ->visible(fn (?Kegiatan $record): bool => self::canSeeReportSection($record))
                    ->schema([
                        RichEditor::make('laporan')
                            ->label('Laporan')
                            ->required(fn (Get $get): bool => $get('status') === StatusKegiatan::LAPORAN->value),
                        TextInput::make('jumlah_peserta_hadir')
                            ->label('Jumlah Peserta Hadir')
                            ->numeric()
                            ->minValue(0)
                            ->required(fn (Get $get): bool => $get('status') === StatusKegiatan::LAPORAN->value),
                        Textarea::make('catatan_laporan')
                            ->label('Catatan Laporan')
                            ->rows(4),
                        Placeholder::make('tanggal_laporan_display')
                            ->label('Tanggal Laporan')
                            ->content(fn (?Kegiatan $record): string => $record?->tanggal_laporan?->format('d M Y H:i') ?? 'Akan diisi otomatis saat status menjadi laporan.'),
                    ])
                    ->columns(2),
            ]);
    }

    protected static function statusOptions(?Kegiatan $record): array
    {
        $user = auth()->user();

        if (! $user instanceof User) {
            return [StatusKegiatan::MENUNGGU_REVIEW->value => StatusKegiatan::MENUNGGU_REVIEW->label()];
        }

        if ($user->isSuperAdmin()) {
            return collect(StatusKegiatan::cases())
                ->mapWithKeys(fn (StatusKegiatan $status) => [$status->value => $status->label()])
                ->all();
        }

        if ($user->isSekertaris()) {
            return collect([
                StatusKegiatan::MENUNGGU_REVIEW,
                StatusKegiatan::PERLU_REVISI,
                StatusKegiatan::DITOLAK,
                StatusKegiatan::DISETUJUI,
            ])->mapWithKeys(fn (StatusKegiatan $status) => [$status->value => $status->label()])->all();
        }

        if (! $record) {
            return [StatusKegiatan::MENUNGGU_REVIEW->value => StatusKegiatan::MENUNGGU_REVIEW->label()];
        }

        $allowed = match ($record->status) {
            StatusKegiatan::DISETUJUI => [
                StatusKegiatan::DISETUJUI,
                StatusKegiatan::PENDAFTARAN_DIBUKA,
                StatusKegiatan::PENDAFTARAN_DITUTUP,
                StatusKegiatan::DIBATALKAN,
            ],
            StatusKegiatan::PENDAFTARAN_DIBUKA => [
                StatusKegiatan::PENDAFTARAN_DIBUKA,
                StatusKegiatan::PENDAFTARAN_DITUTUP,
                StatusKegiatan::SELESAI,
                StatusKegiatan::DIBATALKAN,
            ],
            StatusKegiatan::PENDAFTARAN_DITUTUP => [
                StatusKegiatan::PENDAFTARAN_DIBUKA,
                StatusKegiatan::PENDAFTARAN_DITUTUP,
                StatusKegiatan::SELESAI,
                StatusKegiatan::DIBATALKAN,
            ],
            StatusKegiatan::SELESAI => [
                StatusKegiatan::SELESAI,
                StatusKegiatan::LAPORAN,
            ],
            default => [$record->status],
        };

        return collect($allowed)
            ->mapWithKeys(fn (StatusKegiatan $status) => [$status->value => $status->label()])
            ->all();
    }

    protected static function submissionFieldsAreLocked(?Kegiatan $record): bool
    {
        $user = auth()->user();

        if (! $user instanceof User || $user->isSuperAdmin()) {
            return false;
        }

        if ($user->isSekertaris()) {
            return true;
        }

        if (! $record) {
            return false;
        }

        return ! $record->canBeEditedByKetua();
    }

    protected static function currentUserCanReview(): bool
    {
        $user = auth()->user();

        return $user instanceof User && ($user->isSuperAdmin() || $user->isSekertaris());
    }

    protected static function canSeeReviewSection(?Kegiatan $record): bool
    {
        if (self::currentUserCanReview()) {
            return true;
        }

        return filled($record?->catatan_review);
    }

    protected static function canSeeReportSection(?Kegiatan $record): bool
    {
        $user = auth()->user();

        if (! $user instanceof User) {
            return false;
        }

        if ($user->isSuperAdmin()) {
            return true;
        }

        return (bool) $record?->canManageReport();
    }
}
