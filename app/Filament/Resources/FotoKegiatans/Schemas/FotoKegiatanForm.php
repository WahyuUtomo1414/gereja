<?php

namespace App\Filament\Resources\FotoKegiatans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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
                        Textarea::make('caption')
                            ->label('Caption')
                            ->rows(3),
                        FileUpload::make('foto')
                            ->label('Foto')
                            ->disk('public')
                            ->directory('foto_kegiatan')
                            ->image()
                            ->imageEditor()
                            ->visibility('public')
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
