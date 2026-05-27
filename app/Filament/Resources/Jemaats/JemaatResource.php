<?php

namespace App\Filament\Resources\Jemaats;

use App\Filament\Resources\Jemaats\Pages\CreateJemaat;
use App\Filament\Resources\Jemaats\Pages\EditJemaat;
use App\Filament\Resources\Jemaats\Pages\ListJemaats;
use App\Filament\Resources\Jemaats\Schemas\JemaatForm;
use App\Filament\Resources\Jemaats\Tables\JemaatsTable;
use App\Models\Jemaat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class JemaatResource extends Resource
{
    protected static ?string $model = Jemaat::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static string|UnitEnum|null $navigationGroup = 'Jemaat & Partisipasi';

    protected static ?string $navigationLabel = 'Jemaat';

    protected static ?string $modelLabel = 'Jemaat';

    protected static ?string $pluralModelLabel = 'Jemaat';

    public static function form(Schema $schema): Schema
    {
        return JemaatForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JemaatsTable::configure($table);
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
            'index' => ListJemaats::route('/'),
            'create' => CreateJemaat::route('/create'),
            'edit' => EditJemaat::route('/{record}/edit'),
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
