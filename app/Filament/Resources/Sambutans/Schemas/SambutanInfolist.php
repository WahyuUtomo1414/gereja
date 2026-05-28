<?php

namespace App\Filament\Resources\Sambutans\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SambutanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Sambutan')
                    ->columnSpanFull()
                    ->schema([
                        ImageEntry::make('foto')
                            ->label('Foto')
                            ->disk('public')
                            ->defaultImageUrl('https://ui-avatars.com/api/?name=Sambutan&background=f8fafc&color=0f172a')
                            ->circular(),
                        TextEntry::make('nama')
                            ->label('Nama'),
                        TextEntry::make('jabatan')
                            ->label('Jabatan')
                            ->placeholder('-'),
                        IconEntry::make('active')
                            ->label('Aktif')
                            ->boolean(),
                        TextEntry::make('deskripsi')
                            ->label('Deskripsi')
                            ->html()
                            ->columnSpanFull()
                            ->placeholder('-'),
                    ])
                    ->columns(2),
            ]);
    }
}
