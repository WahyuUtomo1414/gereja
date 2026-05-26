<?php

namespace App\Filament\Resources\JenisKegiatans\Pages;

use App\Filament\Resources\JenisKegiatans\JenisKegiatanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJenisKegiatans extends ListRecords
{
    protected static string $resource = JenisKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
