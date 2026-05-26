<?php

namespace App\Filament\Resources\Gerejas\Pages;

use App\Filament\Resources\Gerejas\GerejaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGerejas extends ListRecords
{
    protected static string $resource = GerejaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
