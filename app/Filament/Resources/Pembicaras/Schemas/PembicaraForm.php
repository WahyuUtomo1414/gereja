<?php

namespace App\Filament\Resources\Pembicaras\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PembicaraForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Form Pembicara')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('nama')
                            ->label('Nama')
                            ->required()
                            ->maxLength(128),
                        TextInput::make('jabatan')
                            ->label('Jabatan')
                            ->maxLength(128),
                        TextInput::make('foto')
                            ->label('Path / URL Foto')
                            ->maxLength(255),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                        Textarea::make('latar_belakang')
                            ->label('Latar Belakang')
                            ->rows(5)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
