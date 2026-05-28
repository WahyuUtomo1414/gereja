<?php

namespace App\Filament\Resources\Sambutans\Pages;

use App\Filament\Resources\Sambutans\SambutanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSambutan extends ViewRecord
{
    protected static string $resource = SambutanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
