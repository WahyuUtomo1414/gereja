<?php

namespace App\Filament\Resources\FotoKegiatans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FotoKegiatanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Form Foto Kegiatan')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('kegiatan_id')
                            ->label('Kegiatan')
                            ->relationship('kegiatan', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('nama')
                            ->label('Nama Foto')
                            ->maxLength(128),
                        FileUpload::make('foto')
                            ->label('Foto')
                            ->disk('public')
                            ->directory('foto_kegiatan')
                            ->image()
                            ->imageEditor()
                            ->required()
                            ->columnSpanFull(),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}
