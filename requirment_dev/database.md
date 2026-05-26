# Requirement Database Website Gereja

## 1. Gambaran Umum

Dokumen ini menjadi acuan awal untuk pembuatan model dan migration Laravel 13 berdasarkan ERD yang sudah disiapkan.

Secara konsep, database ini dirancang untuk website gereja dengan fokus utama pada:

- profil gereja dan informasi publik,
- manajemen kegiatan gereja,
- pendaftaran jemaat ke kegiatan,
- pengelolaan konten pendukung seperti FAQ, sambutan, struktur organisasi, dan dokumentasi kegiatan.

## 2. Konsep Database

### 2.1 Pola aplikasi

Struktur database saat ini lebih cocok disebut **single-tenant**.

Artinya:

- sistem hanya merepresentasikan **satu gereja** dalam satu instance aplikasi,
- tabel `gereja` berfungsi sebagai profil utama gereja,
- belum ada `tenant_id` atau pemisahan data antar banyak gereja dalam satu database.

Jika di masa depan sistem ingin mendukung banyak gereja dalam satu aplikasi, maka hampir semua tabel inti perlu ditambahkan `tenant_id` atau `gereja_id`.

### 2.2 Base model bersama

Semua tabel domain akan menggunakan base model / trait bersama yang saat ini sudah tersedia.

Kolom bawaan dari trait `BaseModelSoftDeleteDefault`:

- `active` boolean default `true`
- `created_by` unsigned big integer default `1`
- `updated_by` unsigned big integer nullable
- `deleted_by` unsigned big integer nullable
- `created_at`
- `updated_at`
- `deleted_at`

Konsep ini berarti:

- semua data bisa diaktifkan/nonaktifkan tanpa harus dihapus,
- semua perubahan bisa diaudit siapa pembuat, pengubah, dan penghapusnya,
- seluruh tabel domain akan mendukung soft delete.

### 2.3 Audit data

Trait `AuditedBySoftDelete` menghubungkan kolom audit ke tabel `users`, sehingga:

- `created_by` relasi ke user pembuat,
- `updated_by` relasi ke user pengubah,
- `deleted_by` relasi ke user yang melakukan soft delete.

## 3. Daftar Tabel

## 3.1 Tabel `gereja`

Fungsi:
Menyimpan profil utama gereja yang tampil di website.

Kolom utama:

- `id`
- `nama` varchar(255)
- `deskripsi` text
- `logo` varchar(255)
- `alamat` varchar(255)
- `visi` varchar(255)
- `misi` json
- `no_tlpn` varchar(18)
- `email` varchar(128)
- `sosial_media` json

Kolom base model:

- `active`
- `created_by`
- `updated_by`
- `deleted_by`
- `created_at`
- `updated_at`
- `deleted_at`

Catatan:

- tabel ini cenderung bersifat **singleton** atau hanya memiliki satu data aktif,
- `misi` dalam bentuk JSON cocok jika poin misi jumlahnya dinamis,
- `sosial_media` JSON cocok untuk menyimpan pasangan key-value seperti Instagram, YouTube, Facebook, TikTok, dan lain-lain.

## 3.2 Tabel `sambutan`

Fungsi:
Menyimpan konten sambutan pimpinan gereja untuk landing page atau halaman profil.

Kolom utama:

- `id`
- `nama` varchar(255)
- `foto` varchar(255)
- `jabatan` varchar(128)
- `deskripsi` text

Kolom base model:

- `active`
- `created_by`
- `updated_by`
- `deleted_by`
- `created_at`
- `updated_at`
- `deleted_at`

## 3.3 Tabel `struktur_organisasi`

Fungsi:
Menyimpan data pengurus atau struktur organisasi gereja.

Kolom utama:

- `id`
- `nama` varchar(255)
- `jabatan` varchar(128)
- `foto` varchar(255) nullable
- `order` numeric

Kolom base model:

- `active`
- `created_by`
- `updated_by`
- `deleted_by`
- `created_at`
- `updated_at`
- `deleted_at`

Catatan:

- kolom `order` dipakai untuk mengatur urutan tampil di halaman frontend,
- sebaiknya nanti di migration dibuat integer unsigned agar urutan lebih jelas.

## 3.4 Tabel `faq`

Fungsi:
Menyimpan daftar pertanyaan dan jawaban umum di website.

Kolom utama:

- `id`
- `pertanyaan` text
- `jawaban` text

Kolom base model:

- `active`
- `created_by`
- `updated_by`
- `deleted_by`
- `created_at`
- `updated_at`
- `deleted_at`

## 3.5 Tabel `jenis_kegiatan`

Fungsi:
Master kategori atau jenis kegiatan gereja.

Kolom utama:

- `id`
- `nama` varchar(128)
- `deskripsi` text

Kolom base model:

- `active`
- `created_by`
- `updated_by`
- `deleted_by`
- `created_at`
- `updated_at`
- `deleted_at`

Relasi:

- satu `jenis_kegiatan` memiliki banyak `kegiatan`.

## 3.6 Tabel `pembicara`

Fungsi:
Master data pembicara untuk kegiatan gereja.

Kolom utama:

- `id`
- `nama` varchar(128)
- `foto` varchar(255)
- `jabatan` varchar(128) nullable
- `latar_belakang` varchar(128) nullable

Kolom base model:

- `active`
- `created_by`
- `updated_by`
- `deleted_by`
- `created_at`
- `updated_at`
- `deleted_at`

Relasi:

- satu `pembicara` dapat digunakan di banyak `kegiatan`.

Catatan:

- bila `latar_belakang` ingin menampung bio panjang, lebih cocok `text` daripada `varchar(128)`.

## 3.7 Tabel `kegiatan`

Fungsi:
Menyimpan data utama acara atau kegiatan gereja.

Kolom utama:

- `id`
- `jenis_kegiatan_id` foreign key ke `jenis_kegiatan.id`
- `nama` varchar(255)
- `slug` varchar(255)
- `ringkasan` varchar(255)
- `deskripsi` text
- `tanggal` date
- `jam_mulai` time
- `jam_selesai` time
- `lokasi` text
- `pembicara_id` foreign key ke `pembicara.id`
- `kuota` numeric
- `thumbnail` varchar(255)
- `foto` varchar(255) nullable
- `kebutuhan_kegiatan` text
- `status` varchar(128)

Kolom base model:

- `active`
- `created_by`
- `updated_by`
- `deleted_by`
- `created_at`
- `updated_at`
- `deleted_at`

Relasi:

- banyak `kegiatan` dimiliki satu `jenis_kegiatan`,
- banyak `kegiatan` dapat merujuk ke satu `pembicara`,
- satu `kegiatan` memiliki banyak `foto_kegiatan`,
- satu `kegiatan` memiliki banyak `peserta`.

Catatan:

- `slug` sebaiknya unik untuk kebutuhan routing halaman detail kegiatan,
- `status` bisa dipakai untuk nilai seperti `draft`, `published`, `scheduled`, `closed`, atau `finished`,
- `kuota` lebih cocok dibuat integer unsigned,
- karena semua tabel sudah memakai base model, kolom `aktif` pada ERD sebaiknya **tidak diduplikasi** lagi dan cukup gunakan `active` dari trait.

## 3.8 Tabel `foto_kegiatan`

Fungsi:
Menyimpan galeri atau dokumentasi foto tambahan untuk suatu kegiatan.

Kolom utama:

- `id`
- `kegiatan_id` foreign key ke `kegiatan.id`
- `nama` varchar(128)
- `foto` varchar(255)

Kolom base model:

- `active`
- `created_by`
- `updated_by`
- `deleted_by`
- `created_at`
- `updated_at`
- `deleted_at`

Relasi:

- banyak `foto_kegiatan` dimiliki satu `kegiatan`.

## 3.9 Tabel `users`

Fungsi:
Menyimpan akun login untuk admin/pengelola dan kemungkinan akun yang terhubung ke jemaat.

Kolom utama dari ERD:

- `id`
- `nama` varchar(128)
- `email` varchar(128)
- `password` varchar(255)
- `role_id` foreign key

Catatan kondisi project saat ini:

- tabel bawaan Laravel saat ini masih menggunakan kolom `name`, bukan `nama`,
- model `User` yang ada juga masih `fillable(['name', 'email', 'password'])`,
- ERD menunjukkan adanya `role_id`, tetapi tabel `roles` belum terlihat pada diagram.

Relasi:

- satu `user` dapat memiliki satu data `jemaat`,
- `users` juga menjadi referensi audit untuk seluruh tabel melalui `created_by`, `updated_by`, dan `deleted_by`.

Catatan lanjutan:

- perlu diputuskan apakah akun admin dan akun jemaat tetap memakai satu tabel `users`,
- perlu dipastikan apakah role akan dibuat sebagai tabel master `roles` atau cukup enum sederhana.

## 3.10 Tabel `jemaat`

Fungsi:
Menyimpan profil jemaat yang terhubung ke akun user.

Kolom utama:

- `id`
- `nama` varchar(255)
- `email` varchar(128)
- `alamat` varchar(255) nullable
- `foto` varchar(255) nullable
- `user_id` foreign key ke `users.id`

Kolom base model:

- `active`
- `created_by`
- `updated_by`
- `deleted_by`
- `created_at`
- `updated_at`
- `deleted_at`

Relasi:

- satu `jemaat` dimiliki satu `user`,
- satu `jemaat` dapat memiliki banyak data `peserta`.

Catatan:

- di ERD ada penulisan yang terlihat seperti `jamaat_id` pada tabel `peserta`; sebaiknya distandarkan menjadi `jemaat_id`.

## 3.11 Tabel `peserta`

Fungsi:
Tabel transaksi pendaftaran jemaat ke kegiatan.

Kolom utama:

- `id`
- `kegiatan_id` foreign key ke `kegiatan.id`
- `jemaat_id` foreign key ke `jemaat.id`
- `catatan` text nullable

Kolom base model:

- `active`
- `created_by`
- `updated_by`
- `deleted_by`
- `created_at`
- `updated_at`
- `deleted_at`

Relasi:

- banyak `peserta` dimiliki satu `kegiatan`,
- banyak `peserta` dimiliki satu `jemaat`.

Catatan:

- tabel ini berfungsi sebagai penghubung antara `kegiatan` dan `jemaat`,
- sebaiknya nanti diberi unique constraint untuk kombinasi `kegiatan_id` + `jemaat_id` agar satu jemaat tidak mendaftar kegiatan yang sama berkali-kali.

## 4. Ringkasan Relasi

Relasi utama database:

- `jenis_kegiatan` 1:N `kegiatan`
- `pembicara` 1:N `kegiatan`
- `kegiatan` 1:N `foto_kegiatan`
- `kegiatan` 1:N `peserta`
- `users` 1:1 `jemaat`
- `jemaat` 1:N `peserta`
- `users` 1:N semua tabel audit melalui `created_by`, `updated_by`, dan `deleted_by`

## 5. Konsep Alur Data

### 5.1 Konten profil website

Halaman publik website mengambil data utama dari:

- `gereja`
- `sambutan`
- `struktur_organisasi`
- `faq`

### 5.2 Manajemen kegiatan

Admin mengelola:

- kategori kegiatan dari `jenis_kegiatan`,
- pembicara dari `pembicara`,
- data acara dari `kegiatan`,
- galeri kegiatan dari `foto_kegiatan`.

### 5.3 Pendaftaran jemaat

Alur data pendaftaran:

1. user memiliki akun pada `users`,
2. akun tersebut terhubung ke profil `jemaat`,
3. jemaat mendaftar ke satu `kegiatan`,
4. data pendaftaran disimpan di `peserta`.

## 6. Catatan Sinkronisasi Sebelum Buat Migration

Beberapa hal perlu dirapikan dulu sebelum implementasi migration Laravel 13:

- gunakan nama tabel `users` mengikuti standar Laravel, bukan `user`,
- putuskan konsistensi penggunaan `nama` atau `name` pada tabel `users`,
- tentukan apakah tabel `roles` akan dibuat karena `role_id` sudah muncul di ERD,
- standardisasi `jemaat_id` dan hindari typo `jamaat_id`,
- jangan duplikasi kolom `aktif` jika sudah memakai `active` dari base trait,
- pastikan tipe `order` dan `kuota` memakai integer unsigned,
- tentukan apakah `visi` lebih tepat `text` jika isinya bisa panjang,
- pertimbangkan `latar_belakang` menjadi `text` bila berisi biodata lengkap.

## 7. Rekomendasi Implementasi Laravel 13

Agar konsisten saat masuk ke tahap model dan migration:

- semua model domain memakai trait audit dan soft delete,
- foreign key audit `created_by`, `updated_by`, `deleted_by` diarahkan ke `users.id`,
- relasi `belongsTo`, `hasMany`, dan `hasOne` dibuat eksplisit,
- migration dibuat berurutan mulai dari master table lalu tabel transaksi,
- slug kegiatan dibuat unik,
- tabel `peserta` diberi unique index (`kegiatan_id`, `jemaat_id`).

---

Dokumen ini dipakai sebagai blueprint database. Setelah ini tahap berikutnya adalah menurunkan dokumen ini menjadi model Eloquent dan migration Laravel 13 secara konsisten dengan base model yang sudah ada.
