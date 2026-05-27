<?php

namespace App\Filament\Resources\Gerejas;

use App\Filament\Resources\Gerejas\Pages\CreateGereja;
use App\Filament\Resources\Gerejas\Pages\EditGereja;
use App\Filament\Resources\Gerejas\Pages\ListGerejas;
use App\Filament\Resources\Gerejas\Pages\ViewGereja;
use App\Filament\Resources\Gerejas\Schemas\GerejaForm;
use App\Filament\Resources\Gerejas\Schemas\GerejaInfolist;
use App\Filament\Resources\Gerejas\Tables\GerejasTable;
use App\Models\Gereja;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class GerejaResource extends Resource
{
    protected static ?string $model = Gereja::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Profil Gereja';

    protected static ?string $modelLabel = 'Profil Gereja';

    protected static ?string $pluralModelLabel = 'Profil Gereja';

    protected static ?int $navigationSort = 2;

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function form(Schema $schema): Schema
    {
        return GerejaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GerejaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GerejasTable::configure($table);
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])
            ->doesntExist();
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGerejas::route('/'),
            'create' => CreateGereja::route('/create'),
            'view' => ViewGereja::route('/{record}'),
            'edit' => EditGereja::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
