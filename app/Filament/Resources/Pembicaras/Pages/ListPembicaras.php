<?php

namespace App\Filament\Resources\Pembicaras\Pages;

use App\Filament\Resources\Pembicaras\PembicaraResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPembicaras extends ListRecords
{
    protected static string $resource = PembicaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
