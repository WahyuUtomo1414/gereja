# Design System: Digital Sanctuary

Berdasarkan referensi desain, berikut adalah panduan sistem desain (UI Kit) yang akan diterapkan pada proyek website Gereja Modern.

## 1. Warna (Colors)
Sistem warna menggunakan palet bernuansa tenang, formal, namun tetap ada aksen hangat.
- **Primary:** `#1E293B` (Dark Slate / Navy gelap) - Digunakan untuk teks utama, tombol utama, dan elemen penekanan.
- **Secondary:** `#D97706` (Amber / Orange) - Digunakan untuk aksen, tombol sekunder, status peringatan/penting.
- **Tertiary:** `#E2E8F0` (Light Gray / Slate 200) - Digunakan untuk garis pembatas (border), elemen latar belakang sekunder, dan kartu.
- **Neutral:** `#F8FAFC` (Off-White / Slate 50) - Digunakan untuk latar belakang utama aplikasi agar tidak terlalu menyilaukan dibandingkan putih murni.

## 2. Tipografi (Typography)
- **Headline (Judul):** `Playfair Display` (Serif)
  Memberikan kesan klasik, formal, elegan, dan institusional yang cocok untuk entitas gereja.
- **Body & Label (Teks Paragraf/UI):** `Inter` (Sans-serif)
  Memberikan tingkat keterbacaan yang tinggi untuk teks panjang, form, dan elemen antarmuka lainnya.

## 3. Komponen UI Dasar
- **Buttons (Tombol):**
  - **Primary:** Latar belakang `#1E293B` dengan teks putih.
  - **Secondary / Outlined:** Garis luar `#1E293B` atau `#D97706` dengan latar transparan.
  - **Inverted:** Digunakan di atas latar belakang gelap.
- **Bentuk (Shapes):**
  Menggunakan sudut yang membulat halus (*rounded-md* atau *rounded-lg*) pada elemen seperti tombol, *card*, dan input pencarian.
- **Search Bar:** Input dengan ikon *magnifying glass* (kaca pembesar) di sebelah kiri, *border* halus warna tertiary, dan *background* putih.
- **Icons:** Gaya *solid* dan *outline* yang rapi (seperti rumah untuk beranda, kaca pembesar untuk cari, profil untuk pengguna).

---
*Catatan: Desain ini diterapkan langsung menggunakan konfigurasi Tailwind CSS v4 di `resources/css/app.css`.*
