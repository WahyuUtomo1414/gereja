FormInput: Floating label atau label di atas dengan border slate-200.web application/stitch/projects/2405642298527865278/screens/d4cd5448bad94b01bc56f7e1c6769351
# Konsep UI/UX Website Gereja Modern

## 1. Konsep Umum Desain
Desain mengusung tema **"Digital Sanctuary"**. Website bukan sekadar portal informasi, melainkan perpanjangan tangan gereja di dunia digital yang memberikan rasa hangat, damai, dan profesional. 
- **Visual Style:** Clean modern dengan sentuhan elegan. Menggunakan whitespace yang luas untuk memberikan kesan "bernapas" dan tenang.
- **Atmosphere:** Ramah jemaat (Welcoming), Terpercaya (Trustworthy), dan Rapi (Orderly).
- **Layout:** Grid-based dengan elemen kartu (cards) yang memiliki rounded corner besar (2xl) dan bayangan halus (soft shadow) untuk menghindari kesan kaku.

## 2. Rekomendasi Warna (Palet Warna)
Menggunakan kombinasi warna yang berwibawa namun tetap hangat:
- **Primary (Navy Blue):** `#1E293B` (Slate 800) - Untuk teks utama, navbar, dan elemen formal. Memberikan kesan stabil dan berwibawa.
- **Secondary (Gold/Amber):** `#D97706` (Amber 600) - Untuk aksen, CTA, dan elemen penting. Memberikan kesan hangat dan suci.
- **Background (Cream/White):** `#F8FAFC` (Slate 50) sebagai base, dan `#FFFFFF` untuk card.
- **Accent (Soft Gray):** `#E2E8F0` (Slate 200) - Untuk border dan divider.
- **Success/Warning:** Menggunakan warna hijau/merah yang di-mute agar tetap selaras dengan palet utama.

## 3. Rekomendasi Typography
- **Heading:** `Inter` atau `Playfair Display` (untuk kesan elegan pada headline utama).
- **Body Text:** `Inter` - Sangat mudah dibaca di berbagai ukuran layar, modern, dan bersih.
- **Scale:** Menggunakan rasio *Major Second* untuk hierarki yang jelas antara judul dan konten.

## 4. Sitemap / Struktur Menu
- **Beranda (Landing Page)**
- **Kegiatan**
    - Daftar Kegiatan (Index)
    - Detail Kegiatan
- **Tentang Kami**
    - Visi Misi & Sejarah
    - Struktur Organisasi/Panitia
- **Dokumentasi**
    - Gallery Laporan Kegiatan (Index)
    - Detail Laporan
- **Pengajuan Acara** (Form khusus jemaat/panitia)
- **Akun Jemaat** (Dashboard)
    - Login / Registrasi
    - Dashboard Jemaat (Kegiatan Saya, Pengajuan Saya)

## 5. User Flow
### A. Pengunjung melihat kegiatan:
`Beranda` -> `Klik Menu Kegiatan` -> `Scroll & Filter Daftar Kegiatan` -> `Klik Card Kegiatan` -> `Lihat Detail`.

### B. Pengunjung daftar akun:
`Landing Page` -> `Klik Tombol Daftar` -> `Isi Form Registrasi` -> `Verifikasi (Opsional)` -> `Masuk ke Dashboard`.

### C. User daftar kegiatan:
`Halaman Detail Kegiatan` -> `Klik Daftar` -> `Isi Form Pendaftaran Singkat` -> `Submit` -> `Muncul Success State` -> `Cek di Dashboard 'Kegiatan Saya'`.

### D. User mengajukan acara:
`Dashboard / Menu Pengajuan` -> `Klik Ajukan Acara` -> `Isi Stepper Form (4 Tahap)` -> `Submit` -> `Menunggu Review Admin` -> `Pantau Status di Dashboard`.

## 6. Wireframe Tekstual & Detail Section

### Halaman 1: Login & Registrasi
- **Layout:** Split Screen (Desktop). Kiri: Form Login/Regis. Kanan: Foto gedung gereja/jemaat dengan quote rohani.
- **Login Form:** Logo, Judul "Shalom!", Field Email, Password, Lupa Password, Button "Masuk", Link Daftar.
- **Regis Form:** Progress bar kecil (trust indicator), Field Lengkap, WhatsApp (penting untuk koordinasi), Password, Note: "Data Anda aman".

### Halaman 2: Landing Page (Sempurna)
1. **Navbar:** Sticky, Glassmorphism effect, Logo, Menu, Button CTA "Masuk".
2. **Hero:** Foto Jemaat (Overlay), Headline "Bersama Bertumbuh...", Search Bar Kegiatan cepat.
3. **Sambutan:** Foto Pastor/Pimpinan di kiri (lingkaran/rounded), Teks sambutan hangat di kanan.
4. **Info Dasar:** 4 Grid Cards: Jadwal Ibadah, Lokasi (Link Maps), Kontak, Pelayanan.
5. **Acara Mendatang (Table View):** Baris rapi: [Tgl] [Nama Kegiatan] [Lokasi] [Button Detail].
6. **Cara Menggunakan:** Horizontal Stepper (Iconic): Buat Akun -> Pilih Acara -> Daftar -> Terlibat.
7. **FAQ:** Accordion style yang bersih.
8. **Final CTA:** Full width, warna Amber, headline ajakan bergabung.

### Halaman 3: Daftar Kegiatan (Index & Detail)
- **Index:** Sidebar filter (Kategori & Status) di kiri (Desktop), Grid Cards di kanan.
- **Card:** Image (Aspect 16:9), Category Badge (Floating), Judul Bold, Info Tgl/Waktu dengan icon.
- **Detail:** Hero image besar, Sidebar kanan berisi "Pendaftaran Card" (Sticky) yang berisi sisa kuota dan tombol "Daftar Sekarang".

### Halaman 4: Tentang Kami & Struktur
- **Visi Misi:** 1 Card Visi besar di atas, 3 Card Misi kecil di bawahnya.
- **Struktur:** Grid 4 kolom. Avatar bundar, Nama Bold, Jabatan Italic Soft, Icon WhatsApp/Email kecil.

### Halaman 5: Dokumentasi
- **Gallery:** Masonry grid untuk memberikan kesan dinamis. Filter berdasarkan tahun kegiatan.

### Halaman 6: Pengajuan Acara
- **Stepper Form:**
    - Step 1: Info Dasar (Judul, Kategori).
    - Step 2: Waktu & Tempat.
    - Step 3: Penanggung Jawab.
    - Step 4: Kebutuhan (Logistik).
- **Success State:** Ilustrasi centang hijau, estimasi waktu review (misal: 2x24 jam).

## 7. Daftar Komponen UI Reusable
1. **`EventCard`:** Reusable untuk Index dan Dashboard.
2. **`StatusBadge`:** Warna-warni (Blue: Mendatang, Green: Berhasil, Orange: Pending, Red: Selesai).
3. **`MainButton`:** Primary (Navy), Secondary (Amber), Outline (Gray).
4. **`FormInput`:** Floating label atau label di atas dengan border slate-200.
5. **`Alert`:** Untuk sukses/gagal pendaftaran.

## 8. State Management (UX)
- **Empty State:** Ilustrasi soft dengan teks "Belum ada kegiatan untuk kategori ini".
- **Loading State:** Skeleton screen (shimmer effect) pada kartu kegiatan.
- **Error State:** Border merah pada input, pesan error yang humanis (misal: "Maaf, nomor WhatsApp harus diisi").

## 9. Catatan UX untuk Laravel + Tailwind
- **Tailwind Config:** Daftarkan warna Primary dan Secondary di `tailwind.config.js`.
- **Blade Components:** Buat `x-event-card`, `x-button`, dan `x-input` agar UI konsisten di semua halaman.
- **Responsive:** Gunakan `grid-cols-1 md:grid-cols-2 lg:grid-cols-3` untuk kartu. Gunakan `hidden md:block` untuk elemen dekoratif di mobile.
- **Microcopy:** Selalu gunakan sapaan hangat seperti "Shalom", "Saudara/i", dan "Selamat Melayani".

---
**Output ini adalah cetak biru (blueprint) UI/UX. Langkah selanjutnya adalah implementasi ke dalam desain visual nyata.**
