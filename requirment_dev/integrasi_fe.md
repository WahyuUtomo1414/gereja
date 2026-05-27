# Dokumentasi Integrasi Data Model ke Frontend

Dokumen ini jadi acuan saat integrasi data backend Laravel ke halaman frontend Blade.

Fokus utama dokumen ini:

- Blade harus tetap bersih
- Setiap halaman punya controller sendiri
- Data rich editor harus dirender sebagai HTML
- Integrasi dilakukan per halaman, bukan dicampur di komponen
- Jika data awal belum ada, lebih baik buat seeder

---

## 1. Prinsip Utama

### 1.1 Blade Jangan Jadi Tempat Logic

Blade tidak boleh dipakai untuk logic query, mapping data yang berat, atau transformasi business logic.

Yang boleh ada di Blade:

- `@foreach`
- `@if`, `@auth`, `@guest` seperlunya
- pemanggilan komponen
- output variable sederhana
- pemanggilan route

Yang tidak diinginkan di Blade:

- query model langsung
- blok `@php` yang panjang
- mapping collection
- formatting data yang kompleks
- fallback business logic berlapis

Targetnya:

- Blade hanya fokus ke presentasi
- controller menyiapkan data sebersih mungkin
- komponen tinggal menerima data siap pakai

---

## 2. Controller Per Halaman

Setiap halaman frontend harus punya controller sendiri.

Jangan menumpuk semua halaman frontend ke satu controller besar seperti `PageController` jika halaman-halaman itu sudah mulai butuh query dan transformasi data yang berbeda.

Struktur yang disarankan:

```text
app/Http/Controllers/Frontend/
├── HomeController.php
├── AboutController.php
├── EventController.php
├── DocumentationController.php
├── ContactController.php
└── Auth/
    ├── LoginController.php
    └── RegisterController.php
```

Contoh mapping route:

```php
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [AboutController::class, 'index'])->name('about');
Route::get('/kegiatan', [EventController::class, 'index'])->name('events.index');
Route::get('/kegiatan/{slug}', [EventController::class, 'show'])->name('events.show');
Route::get('/dokumentasi', [DocumentationController::class, 'index'])->name('docs.index');
Route::get('/dokumentasi/{slug}', [DocumentationController::class, 'show'])->name('docs.show');
```

Keuntungan pola ini:

- query tiap halaman lebih jelas
- lebih mudah maintenance
- lebih mudah tambah cache per halaman
- lebih gampang test

---

## 3. Alur Integrasi Data

Alur yang dipakai:

1. Model mengambil data
2. Controller memfilter, mengurutkan, dan menyiapkan data
3. View utama menerima data final
4. View utama meneruskan data ke komponen Blade
5. Komponen hanya merender

Contoh pola:

```php
public function index()
{
    $faqs = Faq::query()
        ->where('active', true)
        ->latest()
        ->get();

    return view('pages.home', [
        'faqs' => $faqs,
    ]);
}
```

Lalu di view:

```blade
<x-home.faq :faqs="$faqs" />
```

Jangan lakukan ini di Blade:

```blade
@php
    $faqs = \App\Models\Faq::where('active', true)->get();
@endphp
```

---

## 4. Aturan Data Rich Editor

Kolom yang berasal dari rich editor biasanya menyimpan HTML.

Contoh field:

- `gereja.deskripsi`
- `gereja.visi`
- `sambutan.deskripsi`
- `kegiatan.deskripsi`
- `kegiatan.laporan`

Kalau output-nya ingin tampil sebagai isi HTML, jangan pakai:

```blade
{{ $kegiatan->deskripsi }}
```

Karena nanti tag HTML akan tampil sebagai teks.

Gunakan output HTML:

```blade
{!! $kegiatan->deskripsi !!}
```

Atau lebih rapi, bungkus di container:

```blade
<div class="prose max-w-none prose-slate">
    {!! $kegiatan->deskripsi !!}
</div>
```

Catatan:

- hanya lakukan ini untuk field yang memang berasal dari rich editor internal admin
- jangan pakai output HTML mentah untuk input publik bebas tanpa sanitasi

---

## 5. Seeder Sebagai Penopang Frontend

Kalau sebuah section frontend butuh data database agar tampil normal, dan datanya belum ada, lebih baik buat seeder.

Gunanya:

- frontend bisa langsung dites
- tampilan tidak kosong
- komponen tidak perlu banyak fallback palsu

Aturan:

- kalau data sudah ada di database, tidak perlu bikin seeder baru
- kalau data belum ada dan halaman butuh contoh realistis, buat seeder

Contoh yang wajar dibuatkan seeder:

- FAQ
- Profil Gereja
- Sambutan
- Struktur Organisasi
- Jenis Kegiatan
- Pembicara
- Kegiatan awal

---

## 6. Pola Data untuk Komponen

Komponen sebaiknya menerima data yang sudah final.

Contoh yang disarankan:

```blade
<x-home.faq :faqs="$faqs" />
```

Bukan:

```blade
<x-home.faq />
```

Lalu komponen melakukan query sendiri.

Kalau satu halaman punya banyak section, controller halaman itu yang menyiapkan semuanya:

```php
public function index()
{
    $faqs = Faq::query()->where('active', true)->latest()->get();
    $sambutan = Sambutan::query()->where('active', true)->first();
    $upcomingKegiatan = Kegiatan::query()->where('active', true)->limit(3)->get();

    return view('pages.home', compact('faqs', 'sambutan', 'upcomingKegiatan'));
}
```

---

## 7. Contoh Integrasi FAQ di Home

Bagian ini jadi contoh acuan implementasi.

### 7.1 Controller

Controller khusus home:

```php
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class HomeController extends Controller
{
    public function index()
    {
        $faqs = Faq::query()
            ->where('active', true)
            ->latest('id')
            ->get();

        return view('pages.home', [
            'faqs' => $faqs,
        ]);
    }
}
```

### 7.2 Route

```php
Route::get('/', [HomeController::class, 'index'])->name('home');
```

### 7.3 View Utama

Di `resources/views/pages/home.blade.php`:

```blade
<x-layouts.app>
    <x-home.hero />
    <x-home.welcome />
    <x-home.faq :faqs="$faqs" />
</x-layouts.app>
```

### 7.4 Komponen FAQ

Di `resources/views/components/home/faq.blade.php`:

```blade
@props([
    'faqs' => collect(),
])

<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-4 text-center">
            <p class="text-sm font-semibold tracking-[0.2em] text-secondary-600 uppercase">
                FAQ
            </p>
            <h2 class="font-serif text-4xl text-primary-900">
                Pertanyaan yang Sering Diajukan
            </h2>
        </div>

        <div class="mt-12 space-y-4">
            @forelse ($faqs as $faq)
                <article class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                    <h3 class="text-lg font-semibold text-primary-900">
                        {{ $faq->pertanyaan }}
                    </h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        {{ $faq->jawaban }}
                    </p>
                </article>
            @empty
                <div class="rounded-3xl border border-dashed border-slate-300 p-8 text-center text-slate-500">
                    FAQ belum tersedia.
                </div>
            @endforelse
        </div>
    </div>
</section>
```

### 7.5 Seeder

Kalau data FAQ belum ada, buat `FaqSeeder`.

Kalau data FAQ sudah ada, tidak perlu buat seeder tambahan.

---

## 8. Pola untuk Halaman Lain

### 8.1 About

Controller menyiapkan:

- profil gereja
- sambutan
- struktur organisasi

Blade tinggal:

```blade
<x-about.banner :gereja="$gereja" />
<x-about.vision :gereja="$gereja" />
<x-about.mission :gereja="$gereja" />
<x-about.structure :members="$struktur" />
```

### 8.2 Events Index

Controller menyiapkan:

- data kegiatan
- filter kategori
- nilai pencarian aktif

Blade tinggal:

```blade
<x-events.sidebar :kategori="$kategori" :filters="$filters" />
<x-events.grid :kegiatan="$kegiatan" />
```

### 8.3 Events Detail

Controller menyiapkan:

- kegiatan detail
- relasi `jenisKegiatan`
- relasi `pembicara`

Kalau `deskripsi` dari rich editor:

```blade
<div class="prose max-w-none prose-slate">
    {!! $kegiatan->deskripsi !!}
</div>
```

### 8.4 Documentation Detail

Controller menyiapkan:

- kegiatan laporan
- relasi `fotoKegiatan`

Kalau `laporan` dari rich editor:

```blade
<div class="prose max-w-none prose-slate">
    {!! $laporan->laporan !!}
</div>
```

---

## 9. Aturan Naming Data di View

Gunakan nama variable yang jelas dan konsisten.

Contoh:

- `$faqs`
- `$gereja`
- `$struktur`
- `$kegiatan`
- `$laporan`
- `$upcomingKegiatan`

Hindari nama yang terlalu generik seperti:

- `$data`
- `$items`
- `$result`

Kecuali konteksnya memang sangat kecil.

---

## 10. Ringkasan Aturan Final

Aturan implementasi frontend ke depan:

1. Jangan query model di Blade.
2. Jangan isi Blade dengan logic PHP yang panjang.
3. Setiap halaman frontend punya controller sendiri.
4. Controller yang menyiapkan data, filter, sorting, dan relasi.
5. Komponen Blade hanya menerima data dan merender.
6. Field rich editor harus dirender sebagai HTML.
7. Jika data awal belum ada, buat seeder.
8. Kalau data sudah tersedia, tidak perlu seeder tambahan.

Dokumen ini jadi acuan sebelum eksekusi integrasi data model ke semua halaman frontend.
