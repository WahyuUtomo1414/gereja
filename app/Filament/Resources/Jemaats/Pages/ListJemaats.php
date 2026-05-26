<?php

namespace App\Filament\Resources\Jemaats\Pages;

use App\Filament\Resources\Jemaats\JemaatResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJemaats extends ListRecords
{
    protected static string $resource = JemaatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
