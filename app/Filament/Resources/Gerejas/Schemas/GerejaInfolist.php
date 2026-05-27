<?php

namespace App\Filament\Resources\Gerejas\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GerejaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profil Gereja')
                    ->columnSpanFull()
                    ->schema([
                        ImageEntry::make('logo')
                            ->label('Logo')
                            ->defaultImageUrl(asset('assets/logo.png'))
                            ->circular(),
                        TextEntry::make('nama')
                            ->label('Nama Gereja'),
                        TextEntry::make('email')
                            ->label('Email')
                            ->placeholder('-'),
                        TextEntry::make('no_tlpn')
                            ->label('No. Telepon')
                            ->placeholder('-'),
                        TextEntry::make('alamat')
                            ->label('Alamat')
                            ->placeholder('-'),
                        TextEntry::make('visi')
                            ->label('Visi')
                            ->placeholder('-'),
                        TextEntry::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('-'),
                        TextEntry::make('misi_text')
                            ->label('Misi')
                            ->state(fn ($record) => filled($record->misi) ? implode(', ', $record->misi) : '-'),
                        KeyValueEntry::make('sosial_media')
                            ->label('Sosial Media'),
                    ])
                    ->columns(2),
            ]);
    }
}
