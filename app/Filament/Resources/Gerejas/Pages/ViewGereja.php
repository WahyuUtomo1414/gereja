<?php

namespace App\Filament\Resources\Gerejas\Pages;

use App\Filament\Resources\Gerejas\GerejaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGereja extends ViewRecord
{
    protected static string $resource = GerejaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
