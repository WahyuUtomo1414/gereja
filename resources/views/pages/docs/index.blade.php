<x-layouts.app>
    <x-slot name="title">Dokumentasi & Laporan Kegiatan - Gereja Protestan Maluku</x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Centered Header and Search Bar -->
        <x-docs.header />

        <!-- 3-Column List & Pagination (No filter sidebar) -->
        <div class="mt-12">
            <x-docs.grid :laporan="$laporan ?? null" />
        </div>
    </div>
</x-layouts.app>
