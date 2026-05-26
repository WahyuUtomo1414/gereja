<?php

namespace App\Filament\Resources\Pesertas\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PesertaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Form Peserta')
                    ->schema([
                        Select::make('kegiatan_id')
                            ->label('Kegiatan')
                            ->relationship('kegiatan', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('jemaat_id')
                            ->label('Jemaat')
                            ->relationship('jemaat', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                        Textarea::make('catatan')
                            ->label('Catatan')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
