<x-layouts.app>
    <x-slot name="title">Jadwal Kegiatan - Gereja Protestan Maluku</x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header Section -->
        <x-events.header />

        <!-- Filters & Grid Layout -->
        <div class="flex flex-col lg:flex-row gap-8 mt-12">
            <!-- Sidebar / Filters -->
            <x-events.sidebar />

            <!-- Main Grid List -->
            <x-events.grid :kegiatan="$kegiatan ?? null" />
        </div>
    </div>
</x-layouts.app>
