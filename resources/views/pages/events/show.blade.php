<x-layouts.app>
    <x-slot name="title">Detail Kegiatan - Gereja Modern</x-slot>

    <!-- Header Kecil -->
    <div class="bg-primary-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-white font-['Outfit']">Detail Kegiatan #{{ $id }}</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            <p class="text-lg text-slate-500">Halaman ini akan menampilkan informasi lengkap tentang kegiatan beserta tombol "Daftar Sebagai Peserta".</p>
            <div class="mt-8">
                <a href="{{ route('events.index') }}" class="text-primary-600 hover:text-primary-900 font-medium">
                    &larr; Kembali ke Daftar Kegiatan
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
