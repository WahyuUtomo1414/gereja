<x-layouts.app>
    <x-slot name="title">{{ $laporan['nama'] }} - Laporan Kegiatan - Gereja Protestan Maluku</x-slot>

    <x-docs.detail.hero :laporan="$laporan" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-8 space-y-12">
                <x-docs.detail.info :laporan="$laporan" />
                <x-docs.detail.gallery :gallery="$laporan['galeri']" />
            </div>

            <div class="lg:col-span-4 relative">
                <x-docs.detail.sidebar :laporan="$laporan" />
            </div>
        </div>
    </div>

    <x-home.final-cta />
</x-layouts.app>
