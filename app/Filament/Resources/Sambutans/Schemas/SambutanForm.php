<?php

namespace App\Filament\Resources\Sambutans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SambutanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Form Sambutan')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('nama')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('jabatan')
                            ->label('Jabatan')
                            ->maxLength(128),
                        FileUpload::make('foto')
                            ->label('Foto')
                            ->disk('public')
                            ->directory('sambutan')
                            ->image()
                            ->imageEditor(),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                        RichEditor::make('deskripsi')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
