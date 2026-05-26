<?php

namespace App\Filament\Resources\JenisKegiatans;

use App\Filament\Resources\JenisKegiatans\Pages\CreateJenisKegiatan;
use App\Filament\Resources\JenisKegiatans\Pages\EditJenisKegiatan;
use App\Filament\Resources\JenisKegiatans\Pages\ListJenisKegiatans;
use App\Filament\Resources\JenisKegiatans\Schemas\JenisKegiatanForm;
use App\Filament\Resources\JenisKegiatans\Tables\JenisKegiatansTable;
use App\Models\JenisKegiatan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class JenisKegiatanResource extends Resource
{
    protected static ?string $model = JenisKegiatan::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static string|UnitEnum|null $navigationGroup = 'Master Kegiatan';

    protected static ?string $navigationLabel = 'Jenis Kegiatan';

    protected static ?string $modelLabel = 'Jenis Kegiatan';

    protected static ?string $pluralModelLabel = 'Jenis Kegiatan';

    public static function form(Schema $schema): Schema
    {
        return JenisKegiatanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JenisKegiatansTable::configure($table);
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
            'index' => ListJenisKegiatans::route('/'),
            'create' => CreateJenisKegiatan::route('/create'),
            'edit' => EditJenisKegiatan::route('/{record}/edit'),
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
