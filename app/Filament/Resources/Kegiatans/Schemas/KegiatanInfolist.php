<?php

namespace App\Filament\Resources\Kegiatans\Schemas;

use App\Enums\StatusKegiatan;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class KegiatanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kegiatan')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('jenisKegiatan.nama')
                            ->label('Jenis Kegiatan')
                            ->badge(),
                        TextEntry::make('nama')
                            ->label('Nama'),
                        TextEntry::make('slug')
                            ->label('Slug'),
                        TextEntry::make('pembicara.nama')
                            ->label('Pembicara')
                            ->placeholder('-'),
                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->formatStateUsing(fn ($state): string => $state instanceof StatusKegiatan
                                ? $state->label()
                                : (StatusKegiatan::tryFrom((string) $state)?->label() ?? (string) $state))
                            ->color(fn ($state): string => $state instanceof StatusKegiatan
                                ? $state->color()
                                : (StatusKegiatan::tryFrom((string) $state)?->color() ?? 'gray')),
                        TextEntry::make('active')
                            ->label('Aktif')
                            ->badge()
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Aktif' : 'Nonaktif')
                            ->color(fn (bool $state): string => $state ? 'success' : 'gray'),
                        TextEntry::make('ringkasan')
                            ->label('Ringkasan')
                            ->columnSpanFull()
                            ->placeholder('-'),
                        TextEntry::make('deskripsi')
                            ->label('Deskripsi')
                            ->html()
                            ->columnSpanFull()
                            ->placeholder('-'),
                    ])
                    ->columns(2),
                Section::make('Jadwal dan Pelaksanaan')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('tanggal')
                            ->label('Tanggal')
                            ->date('d M Y')
                            ->placeholder('-'),
                        TextEntry::make('jam_mulai')
                            ->label('Jam Mulai')
                            ->time('H:i')
                            ->placeholder('-'),
                        TextEntry::make('jam_selesai')
                            ->label('Jam Selesai')
                            ->time('H:i')
                            ->placeholder('-'),
                        TextEntry::make('lokasi')
                            ->label('Lokasi')
                            ->columnSpanFull()
                            ->placeholder('-'),
                        TextEntry::make('kuota')
                            ->label('Kuota')
                            ->placeholder('Tidak dibatasi'),
                        TextEntry::make('peserta_count')
                            ->label('Peserta Terdaftar')
                            ->state(fn ($record): int => $record->peserta()->count()),
                        TextEntry::make('jumlah_peserta_hadir')
                            ->label('Peserta Hadir')
                            ->placeholder('-'),
                    ])
                    ->columns(3),
                Section::make('Media dan Catatan')
                    ->columnSpanFull()
                    ->schema([
                        ImageEntry::make('thumbnail')
                            ->label('Thumbnail')
                            ->disk('public')
                            ->height(220)
                            ->defaultImageUrl('https://ui-avatars.com/api/?name=Kegiatan&background=f8fafc&color=0f172a')
                            ->columnSpanFull(),

                        TextEntry::make('catatan_review')
                            ->label('Catatan Review')
                            ->columnSpanFull()
                            ->placeholder('-'),
                        TextEntry::make('laporan')
                            ->label('Laporan')
                            ->html()
                            ->columnSpanFull()
                            ->placeholder('-'),
                        TextEntry::make('catatan_laporan')
                            ->label('Catatan Laporan')
                            ->columnSpanFull()
                            ->placeholder('-'),
                    ])
                    ->columns(2),
                Section::make('Audit')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('createdBy.name')
                            ->label('Dibuat Oleh')
                            ->placeholder('-'),
                        TextEntry::make('updatedBy.name')
                            ->label('Diubah Oleh')
                            ->placeholder('-'),
                        TextEntry::make('reviewedBy.name')
                            ->label('Direview Oleh')
                            ->placeholder('-'),
                        TextEntry::make('created_at')
                            ->label('Dibuat Pada')
                            ->dateTime('d M Y H:i')
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->label('Diubah Pada')
                            ->dateTime('d M Y H:i')
                            ->placeholder('-'),
                        TextEntry::make('tanggal_review')
                            ->label('Tanggal Review')
                            ->dateTime('d M Y H:i')
                            ->placeholder('-'),
                        TextEntry::make('tanggal_laporan')
                            ->label('Tanggal Laporan')
                            ->dateTime('d M Y H:i')
                            ->placeholder('-'),
                    ])
                    ->columns(2),
            ]);
    }
}
