<x-layouts.app>
    <x-slot name="title">Tentang Kami - Gereja Protestan Maluku</x-slot>

    <!-- 1. Banner Sederhana -->
    <x-about.banner :gereja="$gereja" />

    <!-- 2. Deskripsi -->
    <x-about.description :gereja="$gereja" :logo-url="$logoUrl" />

    <!-- 3. Visi -->
    <x-about.vision :gereja="$gereja" />

    <!-- 4. Misi -->
    <x-about.mission :gereja="$gereja" />

    <!-- 5. Struktur Organisasi -->
    <x-about.structure :first-member="$firstMember" :other-members="$otherMembers" />

    <!-- 6. Kontak -->
    <x-about.contact :gereja="$gereja" />
</x-layouts.app>
