<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Form FAQ')
                    ->schema([
                        Textarea::make('pertanyaan')
                            ->label('Pertanyaan')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('jawaban')
                            ->label('Jawaban')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                    ]),
            ]);
    }
}
