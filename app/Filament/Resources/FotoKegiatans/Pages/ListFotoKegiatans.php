<?php

namespace App\Filament\Resources\FotoKegiatans\Pages;

use App\Filament\Resources\FotoKegiatans\FotoKegiatanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFotoKegiatans extends ListRecords
{
    protected static string $resource = FotoKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
