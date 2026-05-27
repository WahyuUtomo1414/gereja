<?php

namespace App\Filament\Resources\FotoKegiatans;

use App\Filament\Resources\FotoKegiatans\Pages\CreateFotoKegiatan;
use App\Filament\Resources\FotoKegiatans\Pages\EditFotoKegiatan;
use App\Filament\Resources\FotoKegiatans\Pages\ListFotoKegiatans;
use App\Filament\Resources\FotoKegiatans\Schemas\FotoKegiatanForm;
use App\Filament\Resources\FotoKegiatans\Tables\FotoKegiatansTable;
use App\Models\FotoKegiatan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class FotoKegiatanResource extends Resource
{
    protected static ?string $model = FotoKegiatan::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static string|UnitEnum|null $navigationGroup = 'Master Kegiatan';

    protected static ?string $navigationLabel = 'Foto Kegiatan';

    protected static ?string $modelLabel = 'Foto Kegiatan';

    protected static ?string $pluralModelLabel = 'Foto Kegiatan';

    public static function form(Schema $schema): Schema
    {
        return FotoKegiatanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FotoKegiatansTable::configure($table);
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
            'index' => ListFotoKegiatans::route('/'),
            'create' => CreateFotoKegiatan::route('/create'),
            'edit' => EditFotoKegiatan::route('/{record}/edit'),
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
