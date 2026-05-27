<?php

namespace App\Filament\Resources\Kegiatans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
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
                            ->required(),
                        Select::make('pembicara_id')
                            ->label('Pembicara')
                            ->relationship('pembicara', 'nama')
                            ->searchable()
                            ->preload(),
                        TextInput::make('nama')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        TextInput::make('ringkasan')
                            ->label('Ringkasan')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        RichEditor::make('deskripsi')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Jadwal & Lokasi')
                    ->columnSpanFull()
                    ->schema([
                        DatePicker::make('tanggal')
                            ->label('Tanggal')
                            ->required(),
                        TimePicker::make('jam_mulai')
                            ->label('Jam Mulai')
                            ->required()
                            ->seconds(false),
                        TimePicker::make('jam_selesai')
                            ->label('Jam Selesai')
                            ->seconds(false),
                        Textarea::make('lokasi')
                            ->label('Lokasi')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
                Section::make('Publikasi')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('kuota')
                            ->label('Kuota')
                            ->numeric()
                            ->minValue(0),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'Draft' => 'Draft',
                                'Pendaftaran Dibuka' => 'Pendaftaran Dibuka',
                                'Penuh' => 'Penuh',
                                'Selesai' => 'Selesai',
                            ])
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
                        FileUpload::make('foto')
                            ->label('Foto')
                            ->disk('public')
                            ->directory('kegiatan')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->columnSpanFull(),
                        Textarea::make('kebutuhan_kegiatan')
                            ->label('Kebutuhan Kegiatan')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
            ]);
    }
}
