<?php

namespace App\Filament\Resources\Sambutans\Pages;

use App\Filament\Resources\Sambutans\SambutanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSambutans extends ListRecords
{
    protected static string $resource = SambutanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
