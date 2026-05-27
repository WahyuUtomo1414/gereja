<?php

namespace App\Filament\Resources\Gerejas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GerejaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Gereja')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('nama')
                            ->label('Nama Gereja')
                            ->required()
                            ->maxLength(255),
                        FileUpload::make('logo')
                            ->label('Logo')
                            ->disk('public')
                            ->directory('gereja')
                            ->image()
                            ->imageEditor(),
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
                    ->columnSpanFull()
                    ->schema([
                        RichEditor::make('deskripsi')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                        Textarea::make('visi')
                            ->label('Visi')
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
