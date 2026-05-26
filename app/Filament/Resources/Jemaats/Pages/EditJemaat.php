<?php

namespace App\Filament\Resources\Jemaats\Pages;

use App\Filament\Resources\Jemaats\JemaatResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditJemaat extends EditRecord
{
    protected static string $resource = JemaatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
