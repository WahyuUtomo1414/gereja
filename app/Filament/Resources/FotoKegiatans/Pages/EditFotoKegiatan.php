<?php

namespace App\Filament\Resources\FotoKegiatans\Pages;

use App\Filament\Resources\FotoKegiatans\FotoKegiatanResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditFotoKegiatan extends EditRecord
{
    protected static string $resource = FotoKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
