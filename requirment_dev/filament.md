# Requirement Filament Resource

## 1. Tujuan

Dokumen ini menjadi acuan pembuatan seluruh resource admin menggunakan **Filament v5**.

Scope tahap ini:

- generate resource memakai command artisan,
- fokus hanya pada **resource, form, dan table**,
- **tidak** memakai `view page`,
- **tidak** memakai `infolist`,
- resource mengikuti pola struktur Filament v5 yang modular.

## 2. Model Yang Akan Dibuatkan Resource

Model domain yang saat ini tersedia:

- `Faq`
- `FotoKegiatan`
- `Gereja`
- `Jemaat`
- `JenisKegiatan`
- `Kegiatan`
- `Pembicara`
- `Peserta`
- `Sambutan`
- `StrukturOrganisasi`

Model `User` belum masuk batch ini karena tabel `users` saat ini belum memakai soft delete, sementara resource lain memang dirancang memakai `--soft-deletes`.

## 3. Command Generate Resource

Semua command di bawah mengikuti preferensi:

- pakai `php artisan make:filament-resource`
- pakai `--generate`
- pakai `--soft-deletes`

Daftar command:

```bash
php artisan make:filament-resource Faq --generate --soft-deletes
php artisan make:filament-resource FotoKegiatan --generate --soft-deletes
php artisan make:filament-resource Gereja --generate --soft-deletes
php artisan make:filament-resource Jemaat --generate --soft-deletes
php artisan make:filament-resource JenisKegiatan --generate --soft-deletes
php artisan make:filament-resource Kegiatan --generate --soft-deletes
php artisan make:filament-resource Pembicara --generate --soft-deletes
php artisan make:filament-resource Peserta --generate --soft-deletes
php artisan make:filament-resource Sambutan --generate --soft-deletes
php artisan make:filament-resource StrukturOrganisasi --generate --soft-deletes
```

Jika nanti `User` juga ingin dibuat resource, opsi yang lebih aman:

```bash
php artisan make:filament-resource User --generate
```

## 4. Standar Struktur Resource

Setelah command dijalankan, setiap resource akan dirapikan mengikuti pola Filament v5 seperti ini:

```php
<?php

namespace App\Filament\Resources\Faqs;

use App\Filament\Resources\Faqs\Pages\CreateFaq;
use App\Filament\Resources\Faqs\Pages\EditFaq;
use App\Filament\Resources\Faqs\Pages\ListFaqs;
use App\Filament\Resources\Faqs\Schemas\FaqForm;
use App\Filament\Resources\Faqs\Tables\FaqsTable;
use App\Models\Faq;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static string|UnitEnum|null $navigationGroup = 'Master Website';

    protected static ?string $navigationLabel = 'FAQ';

    protected static ?string $modelLabel = 'FAQ';

    protected static ?string $pluralModelLabel = 'FAQ';

    public static function form(Schema $schema): Schema
    {
        return FaqForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FaqsTable::configure($table);
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
            'index' => ListFaqs::route('/'),
            'create' => CreateFaq::route('/create'),
            'edit' => EditFaq::route('/{record}/edit'),
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
```

## 5. Properti Yang Wajib Ada di Semua Resource

Properti ini dipakai di semua resource:

```php
protected static ?string $model = ModelName::class;

protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

protected static string|UnitEnum|null $navigationGroup = 'Nama Group';

protected static ?string $navigationLabel = 'Label';

protected static ?string $modelLabel = 'Label';

protected static ?string $pluralModelLabel = 'Label';
```

## 6. Standar Page Yang Dipakai

Page yang dipakai:

- `List`
- `Create`
- `Edit`

Page yang **tidak dipakai**:

- `View`

Komponen yang **tidak dipakai**:

- `Infolist`

Artinya setelah generate, file berikut nanti akan dibuang atau tidak dipakai:

- `Pages/View...`
- `Schemas/...Infolist.php`
- method `infolist()`
- route `'view' => ...`

## 7. Rekomendasi Navigation Group

Supaya sidebar admin rapi, resource bisa dikelompokkan seperti ini:

### 7.1 Master Website

- `Faq`
- `Gereja`
- `Sambutan`
- `StrukturOrganisasi`

### 7.2 Master Kegiatan

- `JenisKegiatan`
- `Pembicara`
- `Kegiatan`
- `FotoKegiatan`

### 7.3 Jemaat & Partisipasi

- `Jemaat`
- `Peserta`

## 8. Rekomendasi Label Per Resource

| Model | Navigation Label | Model Label | Plural Model Label | Navigation Group |
|---|---|---|---|---|
| `Faq` | `FAQ` | `FAQ` | `FAQ` | `Master Website` |
| `Gereja` | `Profil Gereja` | `Profil Gereja` | `Profil Gereja` | `Master Website` |
| `Sambutan` | `Sambutan` | `Sambutan` | `Sambutan` | `Master Website` |
| `StrukturOrganisasi` | `Struktur Organisasi` | `Struktur Organisasi` | `Struktur Organisasi` | `Master Website` |
| `JenisKegiatan` | `Jenis Kegiatan` | `Jenis Kegiatan` | `Jenis Kegiatan` | `Master Kegiatan` |
| `Pembicara` | `Pembicara` | `Pembicara` | `Pembicara` | `Master Kegiatan` |
| `Kegiatan` | `Kegiatan` | `Kegiatan` | `Kegiatan` | `Master Kegiatan` |
| `FotoKegiatan` | `Foto Kegiatan` | `Foto Kegiatan` | `Foto Kegiatan` | `Master Kegiatan` |
| `Jemaat` | `Jemaat` | `Jemaat` | `Jemaat` | `Jemaat & Partisipasi` |
| `Peserta` | `Peserta` | `Peserta` | `Peserta` | `Jemaat & Partisipasi` |

## 9. Standar Implementasi Tahap Berikutnya

Setelah command di atas dijalankan, penyesuaian yang akan dilakukan:

- rapikan resource class agar sesuai pola Filament v5,
- hapus `view` page dan `infolist`,
- sesuaikan `navigationGroup`, `navigationLabel`, `modelLabel`, dan `pluralModelLabel`,
- rapikan `form schema`,
- rapikan `table schema`,
- tambahkan kolom audit `createdBy`, `updatedBy`, dan `deletedBy` di semua table resource,
- aktifkan query tanpa `SoftDeletingScope`,
- tetap pertahankan dukungan soft delete pada table action dan filter.

## 10. Standar Kolom Audit di Table

Semua table resource wajib menambahkan kolom berikut:

```php
TextColumn::make('createdBy.name')
    ->label('Dibuat Oleh')
    ->badge()
    ->description(fn ($record) => $record->created_at?->format('d M Y H:i'))
    ->sortable(),

TextColumn::make('updatedBy.name')
    ->label('Diubah Oleh')
    ->badge()
    ->description(fn ($record) => $record->updated_at?->format('d M Y H:i'))
    ->sortable()
    ->toggleable(isToggledHiddenByDefault: true),

TextColumn::make('deletedBy.name')
    ->label('Dihapus Oleh')
    ->badge()
    ->description(fn ($record) => $record->deleted_at?->format('d M Y H:i'))
    ->sortable()
    ->toggleable(isToggledHiddenByDefault: true),
```

Catatan:

- `Dibuat Oleh` tampil default di table,
- `Updated By` dan `Deleted By` dibuat `toggleable` dan hidden default,
- semua model domain sudah punya relasi audit dari trait `AuditedBySoftDelete`, jadi bisa dipakai langsung.

## 11. Urutan Pengerjaan Yang Disarankan

Urutan implementasi resource:

1. `Faq`
2. `Gereja`
3. `Sambutan`
4. `StrukturOrganisasi`
5. `JenisKegiatan`
6. `Pembicara`
7. `Kegiatan`
8. `FotoKegiatan`
9. `Jemaat`
10. `Peserta`

Urutan ini dipilih supaya resource master selesai dulu sebelum resource yang punya relasi banyak.

---

Dokumen ini dipakai sebagai blueprint pembuatan resource Filament v5. Setelah disetujui, langkah berikutnya adalah menjalankan seluruh command di atas lalu merapikan form, table, dan resource class satu per satu.
