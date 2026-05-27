# Dokumentasi Frontend - Gereja Protestan Maluku (GPM)

Dokumen ini menjelaskan struktur folder, arsitektur komponen, konsep desain, serta panduan pengikatan data (*data binding*) untuk seluruh halaman *Frontend* yang telah dibangun menggunakan **Laravel Blade**, **Tailwind CSS v4**, dan **Alpine.js**.

---

## 📂 Struktur Folder Views & Komponen

Semua file antarmuka pengguna berada di dalam direktori `resources/views/`. Berikut adalah peta struktur foldernya:

```text
resources/views/
├── auth/                               # Rencana Halaman Autentikasi
│   ├── login.blade.php
│   └── register.blade.php
│
├── components/                         # Komponen Reusable (Blade Components)
│   ├── layouts/
│   │   └── app.blade.php               # Wrapper Layout Utama (Head, Alpine.js, Vite, Icons)
│   │
│   ├── about/                          # Section Halaman Tentang Kami
│   │   ├── banner.blade.php            # Banner Pembuka
│   │   ├── description.blade.php       # Deskripsi & Foto Sejarah (Merged dengan Banner)
│   │   ├── vision.blade.php            # Visi Gereja
│   │   ├── mission.blade.php           # Misi Gereja
│   │   ├── structure.blade.php         # Struktur Organisasi (Layout Piramida & Auto-Sort)
│   │   └── contact.blade.php           # Formulir Kontak, Peta, & Informasi
│   │
│   ├── events/                         # Section Halaman Jadwal Kegiatan (Index)
│   │   ├── header.blade.php            # Judul & Deskripsi Halaman
│   │   ├── sidebar.blade.php           # Form Pencarian, Filter Kategori, & Status + Btn Terapkan
│   │   ├── grid.blade.php              # Kisi-kisi Kartu Kegiatan & Pagination Numerik
│   │   │
│   │   └── detail/                     # Section Halaman Detail Kegiatan (Show)
│   │       ├── hero.blade.php          # Visual Banner Besar, Badge Kategori Emas & Status
│   │       ├── info.blade.php          # Deskripsi Lengkap Kegiatan
│   │       ├── speakers.blade.php      # Daftar Kisi-Kisi Profil Pembicara/Pelayan
│   │       ├── requirements.blade.php  # Daftar Syarat Ketentuan & Tombol Bagikan (Clipboard)
│   │       └── register.blade.php      # Ringkasan Info (Sticky) & Modal Pendaftaran (Alpine.js)
│   │
│   ├── docs/                           # Section Halaman Laporan & Dokumentasi (Index)
│   │   ├── header.blade.php            # Judul Halaman & Search Bar Terpusat (Tanpa Filter Samping)
│   │   ├── grid.blade.php              # Grid List Laporan 3 Kolom & Pagination Numerik
│   │   │
│   │   └── detail/                     # Section Halaman Detail Laporan (Show)
│   │       ├── hero.blade.php          # Banner Atas & Badge Status "Laporan Selesai"
│   │       ├── info.blade.php          # Artikel Ulasan Rangkuman Kegiatan
│   │       ├── gallery.blade.php       # Galeri Foto Kegiatan (Layout 2 Kolom ke Bawah + Hover Caption)
│   │       └── sidebar.blade.php       # Ringkasan Info Pelaksanaan & Card CTA Jadwal Kegiatan Baru
│   │
│   ├── navbar.blade.php                # Navigasi Atas (Glassmorphism & Responsif)
│   └── footer.blade.php                # Footer Informasi Jemaat
│
└── pages/                              # Halaman Utama (Views)
    ├── about.blade.php                 # Halaman Tentang Kami (/tentang)
    ├── home.blade.php                  # Halaman Beranda (/)
    ├── contact.blade.php               # Halaman Kontak (/kontak)
    ├── events/
    │   ├── index.blade.php             # Halaman Daftar Jadwal Kegiatan (/kegiatan)
    │   └── show.blade.php              # Halaman Detail Kegiatan (/kegiatan/{id_atau_slug})
    └── docs/
        ├── index.blade.php             # Halaman Daftar Dokumentasi (/dokumentasi)
        └── show.blade.php              # Halaman Detail Dokumentasi (/dokumentasi/{id_atau_slug})
```

---

## 🎨 Konsep Desain & Variabel Tema (Tailwind CSS v4)

Warna dan tipografi telah diatur secara terpusat di dalam file `resources/css/app.css` menggunakan sintaks `@theme` baru dari Tailwind CSS v4:

- **Primary Colors (Navy Slate):** Mewakili rasa sakral, tenang, dan profesional.
  - `--color-primary-800: #1e293b`
  - `--color-primary-900: #0f172a` (Warna teks heading & elemen utama)
- **Secondary Colors (Warm Gold/Amber):** Mewakili kehangatan, cahaya, dan pelayanan.
  - `--color-secondary-600: #d97706` (Aksen tombol, ikon, & border penunjuk)
- **Typography:**
  - Font Serif (untuk Heading/Judul): **Playfair Display** (`font-serif`)
  - Font Sans-Serif (untuk Body/Teks): **Inter** (`font-sans`)
- **Icons:** Menggunakan pustaka Google **Material Symbols Outlined** (diimpor di `layouts/app.blade.php`).

---

## 🖥️ Fitur Unggulan Komponen Frontend

### 1. Auto-Sorting & Layout Piramida (`components/about/structure.blade.php`)
- **Masalah:** Mengurutkan struktur kepengurusan dari database tanpa memisahkan baris kepengurusan atas dan bawah secara hardcode.
- **Solusi:** Di dalam komponen, koleksi data (baik array dummy maupun Eloquent Collection) secara otomatis diurutkan menaik (`asc`) berdasarkan kolom `order` atau `sort`.
- **Layout Piramida:** Program memisahkan elemen pertama (urutan terkecil, misalnya Gembala Sidang) untuk diposisikan di tengah atas (Level 1) secara mandiri. Elemen-elemen berikutnya otomatis diisi ke dalam grid 3-kolom di bawahnya (Level 2).
- **Fallback Deskripsi:** Jika data di database tidak memiliki kolom deskripsi (sesuai skema migrasi awal), komponen menyediakan pemetaan teks bawaan berdasarkan nama jabatan agar visual kartu kepengurusan tetap terisi penuh dan premium.

### 2. CTA & Modal Pendaftaran Interaktif (`components/events/detail/register.blade.php`)
- **Pengguna Belum Login (Guest):** Mengklik tombol *"Daftar Sebagai Peserta"* memicu modal peringatan dengan Alpine.js yang meminta pengguna melakukan masuk akun (*login*) terlebih dahulu, dilengkapi link cepat ke halaman pendaftaran/masuk.
- **Pengguna Sudah Login (Auth):** Mengklik tombol memicu modal formulir pendaftaran. Data pribadi pengguna (Nama Lengkap, Email, dan Alamat Tempat Tinggal) akan langsung terisi secara **Read-Only** (menghindari kecurangan data). Pengguna hanya perlu mengisi kolom textarea *Catatan Khusus* (misal: alergi makanan, kebutuhan medis) dan menyetujui syarat tata tertib.

### 3. Galeri Foto 2 Kolom Laporan (`components/docs/detail/gallery.blade.php`)
- Foto dokumentasi kegiatan dirapikan ke dalam **kisi-kisi 2 kolom ke bawah** secara responsif.
- Foto memiliki efek animasi mikro saat di-hover (sedikit membesar) dan secara anggun memunculkan overlay gelap transparan berisi judul foto (*caption*) di atasnya.

---

## 🛠️ Panduan Pengikatan Data Database (Untuk Developer Backend)

Seluruh komponen dirancang agar kompatibel dengan data real dari Eloquent Model. Ketika database telah siap dan diisi data, Anda hanya perlu mengirimkan variabel dari Controller ke view utama:

### 1. Pengikatan Data Struktur Organisasi
Di Controller (`PageController.php`):
```python
use App\Models\StrukturOrganisasi;

public function about()
{
    // Mengambil kepengurusan yang aktif diurutkan berdasarkan kolom order
    $struktur = StrukturOrganisasi::orderBy('order', 'asc')->get();
    
    return view('pages.about', compact('struktur'));
}
```
Di View (`pages/about.blade.php`):
```html
<!-- Cukup teruskan koleksi data ke komponen -->
<x-about.structure :members="$struktur" />
```

### 2. Pengikatan Data Jadwal Kegiatan (Index & Detail)
Di Controller (`PageController.php`):
```python
use App\Models\Kegiatan;
use Illuminate\Http\Request;

public function events(Request $request)
{
    $query = Kegiatan::query();

    // Filter Pencarian Teks
    if ($request->filled('search')) {
        $query->where('nama', 'like', '%' . $request->search . '%');
    }

    // Filter Kategori (jenis_kegiatan)
    if ($request->filled('kategori')) {
        $query->whereHas('jenisKegiatan', function($q) use ($request) {
            $q->where('slug', $request->kategori);
        });
    }

    // Filter Status
    if ($request->filled('status')) {
        $query->whereIn('status', $request->status);
    }

    // Menggunakan Pagination bawaan Laravel (misal: 6 data per halaman)
    $kegiatan = $query->orderBy('tanggal', 'asc')->paginate(6);

    return view('pages.events.index', compact('kegiatan'));
}

public function eventShow($id_atau_slug)
{
    // Cari kegiatan berdasarkan ID atau slug beserta relasi pembicara & kategori
    $kegiatan = Kegiatan::with(['jenisKegiatan', 'pembicara'])
        ->where('id', $id_atau_slug)
        ->orWhere('slug', $id_atau_slug)
        ->firstOrFail();

    return view('pages.events.show', compact('kegiatan'));
}
```
Di View utama (`pages/events/index.blade.php`):
```html
<!-- Komponen grid mendeteksi secara otomatis jika tipe datanya adalah Paginator -->
<x-events.grid :kegiatan="$kegiatan" />
```

### 3. Pengikatan Data Laporan Kegiatan & Galeri (Index & Detail)
Di Controller (`PageController.php`):
```python
use App\Models\Kegiatan;

public function docs()
{
    // Laporan adalah kegiatan yang statusnya selesai/terlaksana
    $laporan = Kegiatan::where('status', 'Selesai')
        ->orderBy('tanggal', 'desc')
        ->paginate(9);

    return view('pages.docs.index', compact('laporan'));
}

public function docShow($id_atau_slug)
{
    // Muat kegiatan beserta relasi foto galeri dokumentasinya
    $laporan = Kegiatan::with(['fotoKegiatan', 'pembicara'])
        ->where('id', $id_atau_slug)
        ->orWhere('slug', $id_atau_slug)
        ->firstOrFail();

    return view('pages.docs.show', compact('laporan'));
}
```
Di View utama (`pages/docs/show.blade.php`):
```html
<!-- Komponen secara otomatis memetakan relasi fotoKegiatan jikalau objek dilewatkan -->
<x-docs.detail.gallery :laporan="$laporanDetail" />
```
