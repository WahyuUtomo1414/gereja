<?php

namespace App\Filament\Resources\Kegiatans\RelationManagers;

use App\Models\Kegiatan;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class FotoKegiatanRelationManager extends RelationManager
{
    protected static string $relationship = 'fotoKegiatan';

    protected static ?string $title = 'Foto Kegiatan';

    public static function canViewForRecord(Model $ownerRecord, string $pageClass): bool
    {
        return $ownerRecord instanceof Kegiatan && $ownerRecord->canManageReport();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Foto Kegiatan')
                    ->schema([
                        FileUpload::make('foto')
                            ->label('Foto')
                            ->disk('public')
                            ->directory('foto_kegiatan')
                            ->image()
                            ->imageEditor()
                            ->required(),
                        Textarea::make('caption')
                            ->label('Caption')
                            ->rows(3),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('caption')
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->square(),
                TextColumn::make('caption')
                    ->label('Caption')
                    ->placeholder('-')
                    ->wrap(),
                IconColumn::make('active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
