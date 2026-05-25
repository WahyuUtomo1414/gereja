<x-layouts.app>
    <x-slot name="title">Dokumentasi - Gereja Modern</x-slot>

    <!-- Header Kecil -->
    <div class="bg-primary-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-white font-['Outfit']">Dokumentasi Kegiatan</h1>
            <p class="mt-4 text-xl text-primary-100 max-w-2xl mx-auto">Lihat kembali momen pelayanan, ibadah, dan kegiatan gereja yang telah dilaksanakan.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            <p class="mt-4 text-lg text-slate-500">Halaman ini akan menampilkan galeri foto dari berbagai kegiatan.</p>
            
            <div class="mt-8">
                <a href="{{ route('docs.show', 1) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700">
                    Contoh Galeri Dokumentasi 1
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
