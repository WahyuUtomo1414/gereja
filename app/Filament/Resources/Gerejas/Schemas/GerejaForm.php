<?php

namespace App\Filament\Resources\Gerejas\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GerejaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Gereja')
                    ->schema([
                        TextInput::make('nama')
                            ->label('Nama Gereja')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('logo')
                            ->label('Path / URL Logo')
                            ->maxLength(255),
                        TextInput::make('no_tlpn')
                            ->label('No. Telepon')
                            ->tel()
                            ->maxLength(18),
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(128),
                        Textarea::make('alamat')
                            ->label('Alamat')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Profil & Konten')
                    ->schema([
                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(5)
                            ->columnSpanFull(),
                        Textarea::make('visi')
                            ->label('Visi')
                            ->rows(4)
                            ->columnSpanFull(),
                        TagsInput::make('misi')
                            ->label('Misi')
                            ->placeholder('Tambah poin misi')
                            ->columnSpanFull(),
                        KeyValue::make('sosial_media')
                            ->label('Sosial Media')
                            ->keyLabel('Platform')
                            ->valueLabel('URL / Username')
                            ->columnSpanFull(),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                    ]),
            ]);
    }
}
