<x-layouts.app>
    <x-slot name="title">Kegiatan - Gereja Modern</x-slot>

    <!-- Header Kecil -->
    <div class="bg-primary-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-white font-['Outfit']">Kegiatan Gereja</h1>
            <p class="mt-4 text-xl text-primary-100 max-w-2xl mx-auto">Temukan kegiatan, pelayanan, dan acara gereja yang dapat Anda ikuti.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-slate-900 font-['Outfit']">Daftar Kegiatan</h2>
            <p class="mt-4 text-lg text-slate-500">Di sini akan tampil grid / daftar kegiatan gereja. Klik salah satu kegiatan untuk melihat detailnya.</p>
            
            <div class="mt-8">
                <a href="{{ route('events.show', 1) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700">
                    Contoh Detail Kegiatan 1
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
