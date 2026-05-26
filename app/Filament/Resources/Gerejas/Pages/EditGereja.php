<?php

namespace App\Filament\Resources\Gerejas\Pages;

use App\Filament\Resources\Gerejas\GerejaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditGereja extends EditRecord
{
    protected static string $resource = GerejaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
