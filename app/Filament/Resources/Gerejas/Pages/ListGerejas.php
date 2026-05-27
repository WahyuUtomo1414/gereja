<?php

namespace App\Filament\Resources\Gerejas\Pages;

use App\Filament\Resources\Gerejas\GerejaResource;
use App\Models\Gereja;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ListGerejas extends ListRecords
{
    protected static string $resource = GerejaResource::class;

    public function mount(): void
    {
        $record = Gereja::query()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])
            ->first();

        if ($record) {
            $this->redirect(GerejaResource::getUrl('view', ['record' => $record]));

            return;
        }

        $this->redirect(GerejaResource::getUrl('create'));
    }
}
