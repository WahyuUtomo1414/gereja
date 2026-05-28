<?php

namespace App\Filament\Resources\Kegiatans;

use App\Filament\Resources\Kegiatans\RelationManagers\FotoKegiatanRelationManager;
use App\Filament\Resources\Kegiatans\Pages\CreateKegiatan;
use App\Filament\Resources\Kegiatans\Pages\EditKegiatan;
use App\Filament\Resources\Kegiatans\Pages\ListKegiatans;
use App\Filament\Resources\Kegiatans\Pages\ViewKegiatan;
use App\Filament\Resources\Kegiatans\Schemas\KegiatanForm;
use App\Filament\Resources\Kegiatans\Schemas\KegiatanInfolist;
use App\Filament\Resources\Kegiatans\Tables\KegiatansTable;
use App\Models\Kegiatan;
use App\Services\KegiatanStatusService;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-calendar-days';

    protected static string|UnitEnum|null $navigationGroup = 'Master Kegiatan';

    protected static ?string $navigationLabel = 'Kegiatan';

    protected static ?string $modelLabel = 'Kegiatan';

    protected static ?string $pluralModelLabel = 'Kegiatan';

    public static function form(Schema $schema): Schema
    {
        return KegiatanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return KegiatanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KegiatansTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        app(KegiatanStatusService::class)->markExpiredActivitiesAsFinished();

        $query = parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);

        $user = auth()->user();

        if ($user?->isKetuaPelaksana()) {
            $query->where('created_by', $user->id);
        }

        if (! $user?->isSuperAdmin() && ! $user?->isSekertaris() && ! $user?->isKetuaPelaksana()) {
            $query->whereRaw('1 = 0');
        }

        return $query;
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();

        return (bool) ($user?->isSuperAdmin() || $user?->isSekertaris() || $user?->isKetuaPelaksana());
    }

    public static function getRelations(): array
    {
        return [
            FotoKegiatanRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKegiatans::route('/'),
            'create' => CreateKegiatan::route('/create'),
            'view' => ViewKegiatan::route('/{record}'),
            'edit' => EditKegiatan::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        app(KegiatanStatusService::class)->markExpiredActivitiesAsFinished();

        $query = parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);

        $user = auth()->user();

        if ($user?->isKetuaPelaksana()) {
            $query->where('created_by', $user->id);
        }

        return $query;
    }
}
