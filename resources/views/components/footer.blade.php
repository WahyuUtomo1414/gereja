<footer class="bg-white border-t border-slate-200 mt-12">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Kolom 1: Nama Gereja -->
            <div class="col-span-1">
                <span class="text-2xl font-bold text-primary-900 font-['Outfit']">Gereja Modern</span>
                <p class="mt-4 text-slate-600 text-base">
                    Bersama bertumbuh dalam iman dan pelayanan. Melayani jemaat dengan kasih dan dedikasi.
                </p>
            </div>
            
            <!-- Kolom 2: Halaman -->
            <div>
                <h3 class="text-base font-bold text-slate-800 tracking-wider uppercase">Halaman</h3>
                <ul class="mt-4 space-y-4">
                    <li><a href="{{ route('home') }}" class="text-base text-slate-600 hover:text-primary-900">Beranda</a></li>
                    <li><a href="{{ route('events.index') }}" class="text-base text-slate-600 hover:text-primary-900">Jadwal Kegiatan</a></li>
                    <li><a href="{{ route('about') }}" class="text-base text-slate-600 hover:text-primary-900">Tentang Kami</a></li>
                    <li><a href="{{ route('docs.index') }}" class="text-base text-slate-600 hover:text-primary-900">Laporan Kegiatan</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Kontak & Peta -->
            <div>
                <h3 class="text-base font-bold text-slate-800 tracking-wider uppercase">Kontak</h3>
                <ul class="mt-4 space-y-3 mb-6">
                    <li class="text-base text-slate-600 flex items-start">
                        <span class="mr-2">📍</span> Jl. Contoh Gereja No. 123, Jakarta
                    </li>
                    <li class="text-base text-slate-600 flex items-start">
                        <span class="mr-2">📞</span> WA: +62 812 3456 7890
                    </li>
                    <li class="text-base text-slate-600 flex items-start">
                        <span class="mr-2">✉️</span> info@gerejamodern.org
                    </li>
                </ul>
                
                <!-- Peta Google Maps Iframe -->
                <div class="w-full h-48 bg-slate-200 rounded-lg overflow-hidden border border-slate-300 shadow-sm">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.24009761962!2d106.74558557351634!3d-6.229746487843232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
        
        <div class="mt-12 border-t border-slate-200 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-base text-slate-500">
                &copy; {{ date('Y') }} Gereja Modern. Hak cipta dilindungi.
            </p>
        </div>
    </div>
</footer>
