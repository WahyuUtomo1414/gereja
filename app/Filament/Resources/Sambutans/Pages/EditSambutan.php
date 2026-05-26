<?php

namespace App\Filament\Resources\Sambutans\Pages;

use App\Filament\Resources\Sambutans\SambutanResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditSambutan extends EditRecord
{
    protected static string $resource = SambutanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
