<?php

namespace App\Filament\Resources\Sambutans\Pages;

use App\Filament\Resources\Sambutans\SambutanResource;
use App\Models\Sambutan;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ListSambutans extends ListRecords
{
    protected static string $resource = SambutanResource::class;

    public function mount(): void
    {
        $record = Sambutan::query()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])
            ->first();

        if ($record) {
            $this->redirect(SambutanResource::getUrl('view', ['record' => $record]));

            return;
        }

        $this->redirect(SambutanResource::getUrl('create'));
    }
}
