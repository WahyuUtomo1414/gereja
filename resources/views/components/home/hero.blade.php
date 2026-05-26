<div class="relative w-full h-[100dvh] min-h-[600px] flex items-center justify-center overflow-hidden bg-primary-900">
    <!-- Background Video (or Image Fallback) -->
    <div class="absolute inset-0 w-full h-full z-0">
        <!-- Video dari assets -->
        <video autoplay loop muted playsinline class="w-full h-full object-cover opacity-90">
            <source src="{{ asset('assets/hero.mp4') }}" type="video/mp4">
            <!-- Fallback image jika video gagal dimuat -->
            <img src="https://images.unsplash.com/photo-1438283173091-5dbf5c5a3206?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" alt="Ibadah Gereja" class="w-full h-full object-cover">
        </video>
        
        <!-- Overlay Gelap (untuk memastikan teks mudah dibaca) -->
        <div class="absolute inset-0 bg-primary-900/50 mix-blend-multiply"></div>
        
        <!-- Gradient dari bawah agar menyatu mulus (seamless) dengan section bg-neutral di bawahnya -->
        <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-neutral to-transparent"></div>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto mt-8">
        <h1 class="text-3xl tracking-normal font-bold text-white sm:text-4xl md:text-5xl lg:text-6xl font-serif drop-shadow-md leading-tight">
            <span class="block mb-2">Bersama Bertumbuh dalam</span>
            <span class="block text-secondary-400 italic">Iman dan Pelayanan</span>
        </h1>
        
        <p class="mt-6 text-base text-slate-100 sm:text-lg max-w-2xl mx-auto drop-shadow font-light tracking-wide leading-relaxed">
            Hadir untuk membantu jemaat melihat jadwal kegiatan, mendaftar acara, dan berpartisipasi aktif dalam pelayanan gereja.
        </p>
        
        <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4 sm:gap-5">
            <a href="{{ route('events.index') }}" class="px-8 py-3 border border-transparent text-base font-semibold rounded-full text-primary-900 bg-white hover:bg-slate-100 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                Lihat Kegiatan
            </a>
            <a href="{{ route('about') }}" class="px-8 py-3 border border-white/60 text-base font-semibold rounded-full text-white hover:bg-white/20 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 backdrop-blur-sm">
                Mengenal Gereja Kami
            </a>
        </div>
    </div>
</div>
