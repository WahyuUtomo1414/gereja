<?php

namespace App\Filament\Resources\Pembicaras\Pages;

use App\Filament\Resources\Pembicaras\PembicaraResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditPembicara extends EditRecord
{
    protected static string $resource = PembicaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
