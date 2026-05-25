<x-layouts.app>
    <x-slot name="title">Detail Dokumentasi - Gereja Modern</x-slot>

    <!-- Header Kecil -->
    <div class="bg-primary-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-white font-['Outfit']">Album Dokumentasi #{{ $id }}</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            <p class="text-lg text-slate-500">Grid masonry berisi foto-foto kegiatan akan ditampilkan di sini.</p>
            <div class="mt-8">
                <a href="{{ route('docs.index') }}" class="text-primary-600 hover:text-primary-900 font-medium">
                    &larr; Kembali ke Daftar Dokumentasi
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
