<footer class="bg-white border-t border-slate-200 mt-12">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-1">
                <span class="text-xl font-bold text-primary-900 font-['Outfit']">Gereja Modern</span>
                <p class="mt-4 text-slate-500 text-sm">
                    Bersama bertumbuh dalam iman dan pelayanan. Melayani jemaat dengan kasih dan dedikasi.
                </p>
            </div>
            
            <div>
                <h3 class="text-sm font-semibold text-slate-800 tracking-wider uppercase">Menu Cepat</h3>
                <ul class="mt-4 space-y-4">
                    <li><a href="{{ route('home') }}" class="text-sm text-slate-500 hover:text-primary-900">Beranda</a></li>
                    <li><a href="{{ route('about') }}" class="text-sm text-slate-500 hover:text-primary-900">Tentang Kami</a></li>
                    <li><a href="{{ route('events.index') }}" class="text-sm text-slate-500 hover:text-primary-900">Kegiatan</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-slate-800 tracking-wider uppercase">Layanan</h3>
                <ul class="mt-4 space-y-4">
                    <li><a href="{{ route('docs.index') }}" class="text-sm text-slate-500 hover:text-primary-900">Dokumentasi</a></li>
                    <li><a href="{{ route('events.propose') }}" class="text-sm text-slate-500 hover:text-primary-900">Pengajuan Acara</a></li>
                    <li><a href="{{ route('login') }}" class="text-sm text-slate-500 hover:text-primary-900">Portal Jemaat</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-slate-800 tracking-wider uppercase">Hubungi Kami</h3>
                <ul class="mt-4 space-y-4">
                    <li class="text-sm text-slate-500">Jl. Contoh Gereja No. 123, Jakarta</li>
                    <li class="text-sm text-slate-500">WA: +62 812 3456 7890</li>
                    <li class="text-sm text-slate-500">Email: info@gerejamodern.org</li>
                </ul>
            </div>
        </div>
        <div class="mt-8 border-t border-slate-200 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm text-slate-400">
                &copy; {{ date('Y') }} Gereja Modern. Hak cipta dilindungi.
            </p>
        </div>
    </div>
</footer>
