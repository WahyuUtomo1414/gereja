# Implementasi Flow Status Kegiatan Gereja

Saya sedang membuat sistem manajemen kegiatan gereja menggunakan Laravel dan Filament.

Project ini memiliki fitur utama:

- Pengajuan kegiatan gereja
- Review pengajuan kegiatan oleh Sekretaris
- Pendaftaran peserta kegiatan oleh Jamaat
- Dokumentasi/laporan kegiatan setelah acara selesai
- Manajemen foto kegiatan menggunakan Relation Manager Filament

Saya ingin fokus pada implementasi lifecycle kegiatan menggunakan kolom `status` pada tabel `kegiatan`.

---

# 1. Role User

Sistem memiliki 4 role:

1. Super Admin
2. Ketua Pelaksana
3. Sekretaris
4. Jamaat

Catatan penting:

Super Admin bisa melakukan semua aksi dan bisa override seluruh flow, tetapi Super Admin bukan aktor utama dalam flow bisnis normal.

Flow utama hanya melibatkan:

- Ketua Pelaksana
- Sekretaris
- Jamaat

---

# 2. Konsep Utama Status Kegiatan

Kolom `status` pada tabel `kegiatan` digunakan untuk mengatur lifecycle kegiatan dari awal pengajuan sampai masuk laporan.

Status kegiatan yang digunakan:

```txt
menunggu_review
perlu_revisi
ditolak
disetujui
pendaftaran_dibuka
pendaftaran_ditutup
selesai
laporan
dibatalkan
```

Kolom `aktif` tidak digunakan untuk approval flow.

Kolom `aktif` hanya digunakan untuk menentukan apakah data kegiatan tampil di website publik atau tidak.

Contoh:

```txt
aktif = true  → tampil di website publik
aktif = false → tidak tampil di website publik
```

Approval flow hanya menggunakan kolom `status`.

---

# 3. Laravel Enum StatusKegiatan

Buat enum Laravel bernama:

```php
StatusKegiatan
```

Lokasi file:

```txt
app/Enums/StatusKegiatan.php
```

Isi enum:

```php
<?php

namespace App\Enums;

enum StatusKegiatan: string
{
    case MENUNGGU_REVIEW = 'menunggu_review';
    case PERLU_REVISI = 'perlu_revisi';
    case DITOLAK = 'ditolak';
    case DISETUJUI = 'disetujui';
    case PENDAFTARAN_DIBUKA = 'pendaftaran_dibuka';
    case PENDAFTARAN_DITUTUP = 'pendaftaran_ditutup';
    case SELESAI = 'selesai';
    case LAPORAN = 'laporan';
    case DIBATALKAN = 'dibatalkan';

    public function label(): string
    {
        return match ($this) {
            self::MENUNGGU_REVIEW => 'Menunggu Review',
            self::PERLU_REVISI => 'Perlu Revisi',
            self::DITOLAK => 'Ditolak',
            self::DISETUJUI => 'Disetujui',
            self::PENDAFTARAN_DIBUKA => 'Pendaftaran Dibuka',
            self::PENDAFTARAN_DITUTUP => 'Pendaftaran Ditutup',
            self::SELESAI => 'Selesai',
            self::LAPORAN => 'Laporan',
            self::DIBATALKAN => 'Dibatalkan',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::MENUNGGU_REVIEW => 'warning',
            self::PERLU_REVISI => 'info',
            self::DITOLAK => 'danger',
            self::DISETUJUI => 'success',
            self::PENDAFTARAN_DIBUKA => 'success',
            self::PENDAFTARAN_DITUTUP => 'gray',
            self::SELESAI => 'primary',
            self::LAPORAN => 'success',
            self::DIBATALKAN => 'danger',
        };
    }

    public function isFinal(): bool
    {
        return in_array($this, [
            self::DITOLAK,
            self::DIBATALKAN,
            self::LAPORAN,
        ], true);
    }

    public function canRegister(): bool
    {
        return $this === self::PENDAFTARAN_DIBUKA;
    }

    public function isRejectedOrCancelled(): bool
    {
        return in_array($this, [
            self::DITOLAK,
            self::DIBATALKAN,
        ], true);
    }

    public function canManageReport(): bool
    {
        return in_array($this, [
            self::SELESAI,
            self::LAPORAN,
        ], true);
    }
}
```

---

# 4. Flow Bisnis Kegiatan

## 4.1 Ketua Pelaksana Membuat Pengajuan Kegiatan

Ketua Pelaksana membuat data kegiatan baru.

Saat data kegiatan pertama kali dibuat, status otomatis menjadi:

```txt
menunggu_review
```

Aturan:

- Ketua Pelaksana boleh membuat pengajuan kegiatan.
- Ketua Pelaksana hanya boleh melihat dan mengedit kegiatan miliknya sendiri.
- Ketua Pelaksana hanya boleh mengedit data kegiatan miliknya jika status masih:
    - `menunggu_review`
    - `perlu_revisi`
- Ketua Pelaksana tidak boleh mengubah status review awal secara langsung.
- Ketua Pelaksana tidak boleh memilih status:
    - `perlu_revisi`
    - `ditolak`
    - `disetujui`

Status tersebut hanya boleh dipilih oleh Sekretaris saat proses review.

---

## 4.2 Sekretaris Melakukan Review Pengajuan

Sekretaris bertugas mereview pengajuan kegiatan dari Ketua Pelaksana.

Dari status:

```txt
menunggu_review
```

Sekretaris bisa mengubah status menjadi:

```txt
perlu_revisi
ditolak
disetujui
```

Aturan:

- Jika Sekretaris memilih `perlu_revisi`, maka `catatan_review` wajib diisi.
- Jika Sekretaris memilih `ditolak`, maka `catatan_review` wajib diisi.
- Jika status menjadi `perlu_revisi`, Ketua Pelaksana boleh mengedit ulang data pengajuan.
- Jika status menjadi `ditolak`, kegiatan hanya bisa dilihat dan tidak bisa diproses lagi oleh Ketua Pelaksana.
- Jika status menjadi `disetujui`, kegiatan bisa lanjut ke tahap pengelolaan pendaftaran.

Tambahkan kolom review pada tabel `kegiatan`:

```txt
catatan_review text nullable
reviewed_by foreignId nullable
tanggal_review datetime nullable
```

Fungsi kolom:

```txt
catatan_review  → catatan revisi atau alasan penolakan dari Sekretaris
reviewed_by     → user yang melakukan review
tanggal_review  → waktu review dilakukan
```

---

## 4.3 Setelah Kegiatan Disetujui

Jika status kegiatan sudah:

```txt
disetujui
```

Maka Ketua Pelaksana dapat melanjutkan pengelolaan status kegiatan.

Ketua Pelaksana boleh mengubah status menjadi:

```txt
pendaftaran_dibuka
pendaftaran_ditutup
dibatalkan
```

Aturan:

- `pendaftaran_dibuka` berarti Jamaat bisa mendaftar sebagai peserta kegiatan.
- `pendaftaran_ditutup` berarti Jamaat tidak bisa mendaftar lagi.
- `dibatalkan` berarti kegiatan dibatalkan dan hanya bisa dilihat.
- Jika status `dibatalkan`, flow berhenti dan tidak bisa lanjut ke laporan.

---

# 5. Flow Pendaftaran Peserta

Jamaat hanya bisa mendaftar jika status kegiatan adalah:

```txt
pendaftaran_dibuka
```

Jika status selain `pendaftaran_dibuka`, maka tombol daftar tidak aktif atau tidak ditampilkan.

Aturan validasi pendaftaran:

- Kegiatan harus `aktif = true`.
- Status kegiatan harus `pendaftaran_dibuka`.
- Jamaat belum pernah mendaftar pada kegiatan tersebut.
- Jika ada kuota, jumlah peserta tidak boleh melebihi kuota.
- Jika status `pendaftaran_ditutup`, Jamaat tidak bisa daftar.
- Jika status `selesai`, `laporan`, `ditolak`, atau `dibatalkan`, Jamaat tidak bisa daftar.

Tabel peserta dibuat minimal saja.

Struktur tabel `peserta`:

```txt
id
kegiatan_id
jamaat_id
catatan nullable
created_at
updated_at
```

Tambahkan unique constraint:

```txt
unique(kegiatan_id, jamaat_id)
```

Tujuannya agar satu Jamaat tidak bisa mendaftar lebih dari satu kali pada kegiatan yang sama.

---

# 6. Auto Status Selesai

Status `selesai` bisa diubah secara manual oleh Ketua Pelaksana.

Namun sistem juga harus mendukung auto update status menjadi `selesai` berdasarkan waktu kegiatan.

Kegiatan memiliki kolom:

```txt
tanggal
jam_mulai
jam_selesai
```

Auto update dilakukan dengan mengecek gabungan:

```txt
tanggal + jam_selesai
```

Jika waktu sekarang sudah melewati `tanggal + jam_selesai`, maka kegiatan boleh otomatis berubah menjadi:

```txt
selesai
```

---

# 7. Tidak Wajib Queue atau Scheduler

Saya tidak ingin fitur ini bergantung pada queue worker seperti:

```bash
php artisan queue:work
```

Untuk MVP, jangan wajibkan queue worker.

Saya juga tidak ingin sistem wajib bergantung pada scheduler/cron hosting.

Auto update status selesai dibuat dengan pendekatan sederhana:

1. Buat service bernama `KegiatanStatusService`.
2. Buat method `markExpiredActivitiesAsFinished()`.
3. Method ini mengecek kegiatan yang sudah melewati `tanggal + jam_selesai`.
4. Method ini dapat dipanggil saat:
    - halaman admin kegiatan dibuka
    - halaman list kegiatan dibuka
    - halaman detail kegiatan dibuka
    - dashboard dibuka
5. Jika nanti ingin memakai Laravel Scheduler, boleh buat optional artisan command, tetapi jangan jadikan scheduler sebagai dependency utama.

---

# 8. Aturan Auto Update ke Selesai

Auto update hanya boleh dilakukan jika status kegiatan saat ini adalah:

```txt
pendaftaran_dibuka
pendaftaran_ditutup
```

Jangan auto update jika status kegiatan adalah:

```txt
menunggu_review
perlu_revisi
ditolak
disetujui
dibatalkan
selesai
laporan
```

Aturan detail:

- Jika status `ditolak`, jangan pernah auto update.
- Jika status `dibatalkan`, jangan pernah auto update.
- Jika status `laporan`, jangan diubah lagi.
- Jika status `disetujui`, jangan auto update ke selesai karena pendaftaran belum pernah dibuka/ditutup.
- Ketua Pelaksana tetap bisa mengubah status ke `selesai` secara manual.
- Setelah status `selesai`, Jamaat tidak bisa mendaftar lagi.
- Setelah status `selesai`, data laporan dan foto kegiatan mulai bisa dikelola.

---

# 9. Service KegiatanStatusService

Buat service:

```txt
app/Services/KegiatanStatusService.php
```

Nama method:

```php
markExpiredActivitiesAsFinished()
```

Tugas method:

- Cari kegiatan dengan status:
    - `pendaftaran_dibuka`
    - `pendaftaran_ditutup`
- Gabungkan kolom `tanggal` dan `jam_selesai` menjadi datetime.
- Jika datetime tersebut sudah lebih kecil dari waktu sekarang, update status menjadi `selesai`.
- Jangan ubah status kegiatan yang sudah final seperti:
    - `ditolak`
    - `dibatalkan`
    - `laporan`

Optional:

Boleh buat artisan command:

```bash
php artisan kegiatan:update-selesai
```

Tapi command ini hanya optional, bukan requirement utama.

---

# 10. Flow Setelah Acara Selesai

Jika status kegiatan sudah:

```txt
selesai
```

Maka kegiatan masuk tahap laporan.

Ketua Pelaksana dapat mengisi data laporan kegiatan.

Untuk mengubah status dari `selesai` menjadi `laporan`, semua data laporan wajib diisi.

Kolom laporan pada tabel `kegiatan`:

```txt
laporan text nullable
jumlah_peserta_hadir integer nullable
catatan_laporan text nullable
tanggal_laporan datetime nullable
```

Aturan:

- `laporan` wajib diisi sebelum status menjadi `laporan`.
- `jumlah_peserta_hadir` wajib diisi sebelum status menjadi `laporan`.
- `tanggal_laporan` otomatis diisi saat status berubah menjadi `laporan`.
- `catatan_laporan` boleh nullable atau optional.
- Foto kegiatan harus bisa dikelola melalui Relation Manager Filament.
- Jika status sudah `laporan`, data bisa tampil di halaman laporan/dokumentasi website publik jika `aktif = true`.

---

# 11. Tabel Foto Kegiatan

Buat tabel:

```txt
foto_kegiatan
```

Struktur tabel:

```txt
id
kegiatan_id
foto
caption nullable
aktif boolean default true
created_at
updated_at
```

Catatan:

- Tidak perlu kolom `urutan`.
- Foto kegiatan memiliki relasi many-to-one ke kegiatan.
- Satu kegiatan bisa memiliki banyak foto.
- Gunakan Relation Manager Filament untuk mengelola foto kegiatan.
- Relation Manager foto kegiatan hanya tampil jika status kegiatan sudah:
    - `selesai`
    - `laporan`

---

# 12. Relasi Model

Pada model `Kegiatan`, tambahkan relasi:

```php
public function fotoKegiatan()
{
    return $this->hasMany(FotoKegiatan::class);
}
```

Pada model `FotoKegiatan`, tambahkan relasi:

```php
public function kegiatan()
{
    return $this->belongsTo(Kegiatan::class);
}
```

Pada model `Kegiatan`, cast status ke enum:

```php
protected $casts = [
    'status' => StatusKegiatan::class,
    'aktif' => 'boolean',
    'tanggal' => 'date',
    'jam_mulai' => 'datetime:H:i',
    'jam_selesai' => 'datetime:H:i',
    'tanggal_review' => 'datetime',
    'tanggal_laporan' => 'datetime',
];
```

Sesuaikan cast `jam_mulai` dan `jam_selesai` dengan tipe kolom yang digunakan.

---

# 13. Migration Tambahan Tabel Kegiatan

Tambahkan kolom berikut pada tabel `kegiatan`:

```txt
status string default menunggu_review
catatan_review text nullable
reviewed_by foreignId nullable
tanggal_review datetime nullable
laporan text nullable
jumlah_peserta_hadir integer nullable
catatan_laporan text nullable
tanggal_laporan datetime nullable
```

Pastikan default status:

```txt
menunggu_review
```

Tambahkan foreign key `reviewed_by` ke tabel `users`.

Jika menggunakan soft delete dan base table, ikuti struktur project yang sudah ada.

---

# 14. Aturan Akses Berdasarkan Role

## 14.1 Super Admin

Super Admin bisa:

- Melihat semua kegiatan
- Membuat kegiatan
- Mengedit semua kegiatan
- Menghapus kegiatan
- Mengubah semua status
- Mengelola peserta
- Mengelola laporan
- Mengelola foto kegiatan
- Override seluruh flow

Super Admin tidak dibatasi oleh flow normal.

---

## 14.2 Ketua Pelaksana

Ketua Pelaksana bisa:

- Membuat pengajuan kegiatan
- Melihat kegiatan miliknya
- Mengedit kegiatan miliknya jika status:
    - `menunggu_review`
    - `perlu_revisi`
- Melihat catatan revisi dari Sekretaris
- Mengubah status setelah kegiatan disetujui menjadi:
    - `pendaftaran_dibuka`
    - `pendaftaran_ditutup`
    - `dibatalkan`
- Mengubah status menjadi `selesai` secara manual jika acara sudah selesai
- Mengisi laporan kegiatan jika status sudah `selesai`
- Mengubah status menjadi `laporan` jika data laporan sudah lengkap
- Mengelola foto kegiatan jika status sudah:
    - `selesai`
    - `laporan`

Ketua Pelaksana tidak boleh:

- Mengubah status menjadi `perlu_revisi`
- Mengubah status menjadi `ditolak`
- Mengubah status menjadi `disetujui`
- Mengedit kegiatan jika status `ditolak`
- Mengedit kegiatan jika status `dibatalkan`
- Menghapus kegiatan yang sudah masuk flow review, kecuali aturan project memperbolehkan

---

## 14.3 Sekretaris

Sekretaris bisa:

- Melihat pengajuan kegiatan
- Melakukan review kegiatan dengan status `menunggu_review`
- Mengubah status dari `menunggu_review` menjadi:
    - `perlu_revisi`
    - `ditolak`
    - `disetujui`
- Mengisi `catatan_review` jika status:
    - `perlu_revisi`
    - `ditolak`
- Melihat data kegiatan yang sudah disetujui

Sekretaris tidak boleh:

- Mengubah status pendaftaran seperti:
    - `pendaftaran_dibuka`
    - `pendaftaran_ditutup`
- Mengubah status menjadi:
    - `selesai`
    - `laporan`
    - `dibatalkan`
- Menghapus kegiatan
- Mengelola foto kegiatan, kecuali memang diizinkan oleh Super Admin

---

## 14.4 Jamaat

Jamaat bisa:

- Melihat kegiatan publik yang aktif
- Melihat detail kegiatan
- Mendaftar sebagai peserta jika status kegiatan `pendaftaran_dibuka`
- Melihat dokumentasi/laporan kegiatan yang statusnya `laporan` dan `aktif = true`

Jamaat tidak boleh:

- Mengakses form admin kegiatan
- Mengubah status kegiatan
- Mengelola laporan
- Mengelola foto kegiatan

---

# 15. Aturan UI Filament

## 15.1 Status Badge

Pada Filament Resource kegiatan, tampilkan kolom status sebagai badge.

Label status menggunakan:

```php
$status->label()
```

Warna badge menggunakan:

```php
$status->color()
```

---

## 15.2 Field Status untuk Ketua Pelaksana

Jika status masih:

```txt
menunggu_review
perlu_revisi
```

Maka field status tidak perlu bisa diedit oleh Ketua Pelaksana.

Jika status sudah:

```txt
disetujui
```

Ketua Pelaksana boleh memilih:

```txt
pendaftaran_dibuka
pendaftaran_ditutup
dibatalkan
```

Jika status:

```txt
pendaftaran_dibuka
pendaftaran_ditutup
```

Ketua Pelaksana boleh memilih:

```txt
pendaftaran_dibuka
pendaftaran_ditutup
selesai
dibatalkan
```

Jika status:

```txt
selesai
```

Ketua Pelaksana boleh memilih:

```txt
laporan
```

Tapi status `laporan` hanya bisa dipilih jika data laporan sudah lengkap.

---

## 15.3 Field Status untuk Sekretaris

Jika status:

```txt
menunggu_review
```

Sekretaris boleh memilih:

```txt
perlu_revisi
ditolak
disetujui
```

Sekretaris tidak boleh memilih status lain.

---

## 15.4 Field Status untuk Super Admin

Super Admin boleh memilih semua status.

---

## 15.5 Readonly State

Form kegiatan harus readonly jika status:

```txt
ditolak
dibatalkan
laporan
```

Khusus status `laporan`, data utama kegiatan sebaiknya readonly, tetapi data dokumentasi tetap bisa dilihat.

---

## 15.6 Catatan Review

Field `catatan_review`:

- Muncul untuk Sekretaris saat review.
- Wajib jika status dipilih menjadi:
    - `perlu_revisi`
    - `ditolak`
- Bisa dibaca oleh Ketua Pelaksana jika status:
    - `perlu_revisi`
    - `ditolak`

---

## 15.7 Data Laporan

Field laporan muncul jika status kegiatan sudah:

```txt
selesai
laporan
```

Field laporan:

```txt
laporan
jumlah_peserta_hadir
catatan_laporan
```

Validasi saat ingin mengubah status menjadi `laporan`:

```txt
laporan wajib
jumlah_peserta_hadir wajib
minimal 1 foto kegiatan wajib, jika aturan project mengharuskan dokumentasi foto
```

Jika tidak ingin foto wajib, cukup validasi laporan dan jumlah peserta hadir.

---

# 16. Relation Manager Foto Kegiatan

Buat Filament Relation Manager:

```txt
FotoKegiatanRelationManager
```

Relation Manager ini digunakan di `KegiatanResource`.

Relation Manager hanya tampil jika status kegiatan adalah:

```txt
selesai
laporan
```

Form foto kegiatan:

```txt
foto
caption
aktif
```

Aturan:

- Field `foto` wajib.
- Field `caption` nullable.
- Field `aktif` default true.
- Tidak perlu field `urutan`.

Table foto kegiatan:

```txt
foto preview
caption
aktif
created_at
```

---

# 17. Validasi Status Transition

Buat validasi agar perubahan status tidak sembarangan.

Valid transition normal:

```txt
menunggu_review → perlu_revisi
menunggu_review → ditolak
menunggu_review → disetujui

perlu_revisi → menunggu_review

disetujui → pendaftaran_dibuka
disetujui → pendaftaran_ditutup
disetujui → dibatalkan

pendaftaran_dibuka → pendaftaran_ditutup
pendaftaran_dibuka → selesai
pendaftaran_dibuka → dibatalkan

pendaftaran_ditutup → pendaftaran_dibuka
pendaftaran_ditutup → selesai
pendaftaran_ditutup → dibatalkan

selesai → laporan
```

Status final:

```txt
ditolak
dibatalkan
laporan
```

Status final tidak boleh dilanjutkan lagi oleh role normal.

Super Admin boleh override jika diperlukan.

---

# 18. Query Website Publik

## 18.1 Daftar Kegiatan yang Bisa Dilihat Publik

Untuk halaman kegiatan publik:

```txt
aktif = true
status IN (
  disetujui,
  pendaftaran_dibuka,
  pendaftaran_ditutup
)
```

Atau jika hanya ingin tampilkan yang pendaftaran sudah dibuka:

```txt
aktif = true
status = pendaftaran_dibuka
```

---

## 18.2 Daftar Dokumentasi/Laporan

Untuk halaman laporan/dokumentasi:

```txt
aktif = true
status = laporan
```

Ambil foto dari tabel:

```txt
foto_kegiatan
```

Dengan filter:

```txt
foto_kegiatan.aktif = true
```

---

# 19. Output yang Diminta

Tolong implementasikan fitur ini dengan struktur rapi:

1. Laravel Enum `StatusKegiatan`
2. Migration perubahan tabel `kegiatan`
3. Migration tabel `foto_kegiatan`
4. Model relationship:
    - `Kegiatan`
    - `FotoKegiatan`
    - `Peserta`
5. Cast enum status pada model `Kegiatan`
6. Service:
    - `KegiatanStatusService`
    - method `markExpiredActivitiesAsFinished()`
7. Optional artisan command:
    - `kegiatan:update-selesai`
    - command ini optional, jangan wajib untuk MVP
8. Filament Resource logic untuk `KegiatanResource`
9. Filament `FotoKegiatanRelationManager`
10. Validasi perubahan status berdasarkan role
11. Validasi pendaftaran peserta berdasarkan status kegiatan
12. Validasi laporan sebelum status berubah menjadi `laporan`
13. Badge status menggunakan method `label()` dan `color()` dari enum
14. Role access:

- Super Admin bisa semua
- Ketua Pelaksana mengelola pengajuan dan laporan
- Sekretaris melakukan review
- Jamaat hanya mendaftar kegiatan

Jangan ubah konsep utama database secara berlebihan.

Fokus pada lifecycle kegiatan dari:

```txt
pengajuan
→ review sekretaris
→ pendaftaran peserta
→ selesai
→ laporan/dokumentasi
```

Gunakan pendekatan yang cocok untuk Laravel + Filament dan tetap aman untuk hosting biasa tanpa wajib menjalankan queue worker.

```

```
