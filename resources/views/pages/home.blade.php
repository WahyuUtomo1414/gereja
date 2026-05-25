<x-layouts.app>
    <!-- Hero Section -->
    <div class="relative bg-primary-900 overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-primary-900 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left pt-12">
                        <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl font-serif">
                            <span class="block xl:inline">Bersama Bertumbuh dalam</span>
                            <span class="block text-secondary-400">Iman dan Pelayanan</span>
                        </h1>
                        <p class="mt-3 text-base text-primary-100 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Website ini hadir untuk membantu jemaat melihat jadwal kegiatan, mendaftar acara, dan mengajukan pelayanan gereja dengan lebih mudah.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="{{ route('events.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-primary-900 bg-white hover:bg-slate-50 md:py-4 md:text-lg md:px-10 transition">
                                    Lihat Kegiatan
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="{{ route('events.propose') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-800 hover:bg-primary-700 md:py-4 md:text-lg md:px-10 transition">
                                    Ajukan Acara
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- Right Side Image Placeholder (Can be a background image with overlay) -->
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-primary-800 hidden lg:block opacity-50">
            <!-- Image placeholder -->
        </div>
    </div>

    <!-- Info Bar -->
    <div class="bg-secondary-500 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col md:flex-row justify-around text-center text-sm font-medium">
                <div class="py-2">📍 Jl. Contoh Gereja No. 123, Jakarta</div>
                <div class="py-2">⏰ Ibadah Raya: Minggu, 09.00 & 17.00</div>
                <div class="py-2">📞 Hubungi: +62 812 3456 7890</div>
            </div>
        </div>
    </div>

    <!-- Blank content filler to show the page works -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-slate-900 font-serif">Selamat Datang di Halaman Beranda</h2>
            <p class="mt-4 text-lg text-slate-500">Silakan gunakan navigasi di atas untuk berpindah halaman.</p>
        </div>
    </div>
</x-layouts.app>
