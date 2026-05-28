<?php

namespace App\Filament\Resources\Sambutans;

use App\Filament\Resources\Sambutans\Pages\CreateSambutan;
use App\Filament\Resources\Sambutans\Pages\EditSambutan;
use App\Filament\Resources\Sambutans\Pages\ListSambutans;
use App\Filament\Resources\Sambutans\Pages\ViewSambutan;
use App\Filament\Resources\Sambutans\Schemas\SambutanForm;
use App\Filament\Resources\Sambutans\Schemas\SambutanInfolist;
use App\Filament\Resources\Sambutans\Tables\SambutansTable;
use App\Models\Sambutan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class SambutanResource extends Resource
{
    protected static ?string $model = Sambutan::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static string|UnitEnum|null $navigationGroup = 'Master Website';

    protected static ?string $navigationLabel = 'Sambutan';

    protected static ?string $modelLabel = 'Sambutan';

    protected static ?string $pluralModelLabel = 'Sambutan';

    public static function form(Schema $schema): Schema
    {
        return SambutanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SambutanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SambutansTable::configure($table);
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
            'index' => ListSambutans::route('/'),
            'create' => CreateSambutan::route('/create'),
            'view' => ViewSambutan::route('/{record}'),
            'edit' => EditSambutan::route('/{record}/edit'),
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
