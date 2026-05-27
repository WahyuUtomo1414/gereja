<?php

namespace App\Filament\Resources\Pembicaras;

use App\Filament\Resources\Pembicaras\Pages\CreatePembicara;
use App\Filament\Resources\Pembicaras\Pages\EditPembicara;
use App\Filament\Resources\Pembicaras\Pages\ListPembicaras;
use App\Filament\Resources\Pembicaras\Schemas\PembicaraForm;
use App\Filament\Resources\Pembicaras\Tables\PembicarasTable;
use App\Models\Pembicara;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class PembicaraResource extends Resource
{
    protected static ?string $model = Pembicara::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-megaphone';

    protected static string|UnitEnum|null $navigationGroup = 'Master Kegiatan';

    protected static ?string $navigationLabel = 'Pembicara';

    protected static ?string $modelLabel = 'Pembicara';

    protected static ?string $pluralModelLabel = 'Pembicara';

    public static function form(Schema $schema): Schema
    {
        return PembicaraForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PembicarasTable::configure($table);
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
            'index' => ListPembicaras::route('/'),
            'create' => CreatePembicara::route('/create'),
            'edit' => EditPembicara::route('/{record}/edit'),
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
