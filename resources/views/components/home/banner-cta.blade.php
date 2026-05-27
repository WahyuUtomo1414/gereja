<div class="relative bg-primary-900 mt-20 mb-20 shadow-2xl mx-4 sm:mx-6 lg:mx-8 rounded-3xl overflow-hidden group">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 transition-transform duration-1000 group-hover:scale-105">
        <img class="w-full h-full object-cover opacity-90" src="https://images.unsplash.com/photo-1438283173091-5dbf5c5a3206?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80" alt="Ibadah Bersama">
        <div class="absolute inset-0 bg-primary-900/80 mix-blend-multiply" aria-hidden="true"></div>
        <!-- Elegant subtle gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-primary-900 via-primary-900/90 to-transparent"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-6 py-16 lg:px-16 lg:py-24 flex flex-col lg:flex-row lg:items-center lg:justify-between z-10">
        <div class="max-w-2xl">
            <h2 class="text-3xl font-bold tracking-normal text-white sm:text-4xl lg:text-5xl font-serif mb-4 leading-tight">
                Kami Menyambut Anda <br><span class="text-secondary-400 italic font-medium">dengan Sukacita</span>
            </h2>
            <p class="mt-4 text-lg text-primary-100 font-light leading-relaxed tracking-wide">
                Setiap langkah adalah perjalanan iman. Mari beribadah, melayani, dan bertumbuh bersama dalam komunitas Gereja Protestan Maluku yang penuh kasih.
            </p>
        </div>
        
        <div class="mt-10 lg:mt-0 lg:ml-8 flex-shrink-0">
            <a href="{{ route('about') }}#kontak" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-semibold rounded-full text-primary-900 bg-white hover:bg-slate-50 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                Hubungi Kami Sekarang
                <svg class="ml-3 w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
    
    <!-- Decorative geometric shape for extra aesthetics -->
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-secondary-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none"></div>
</div>
