<?php

namespace App\Filament\Resources\Kegiatans\Pages;

use App\Enums\StatusKegiatan;
use App\Filament\Resources\Kegiatans\KegiatanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKegiatan extends CreateRecord
{
    protected static string $resource = KegiatanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (! auth()->user()?->isSuperAdmin()) {
            $data['status'] = StatusKegiatan::MENUNGGU_REVIEW->value;
        }

        return $data;
    }
}
