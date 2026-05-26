<div class="relative bg-white py-32 overflow-hidden border-t border-slate-100">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 bg-gradient-to-b from-white to-slate-50/50 z-0 pointer-events-none"></div>
    
    <!-- Abstract Shapes for Elegance -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[500px] h-[500px] rounded-full bg-primary-50/70 filter blur-3xl z-0 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[400px] h-[400px] rounded-full bg-secondary-50/60 filter blur-3xl z-0 pointer-events-none"></div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-secondary-600 font-bold tracking-widest uppercase text-xs sm:text-sm mb-4 block">Mari Bergabung Bersama Kami</span>
        <h2 class="text-4xl md:text-5xl font-bold text-primary-900 font-serif mb-6 leading-tight">
            Siap Terlibat dalam Pelayanan?
        </h2>
        <p class="text-lg md:text-xl text-slate-600 max-w-2xl mx-auto mb-12 font-light leading-relaxed">
            Setiap kita dipanggil untuk melayani dan menjadi berkat. Temukan tempat Anda untuk berkarya bagi kemuliaan-Nya di GPM.
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 sm:gap-6">
            <a href="{{ route('events.index') }}" class="w-full sm:w-auto px-8 py-4 text-base font-semibold rounded-full text-white bg-primary-900 hover:bg-primary-800 shadow-xl hover:shadow-2xl transform hover:-translate-y-0.5 transition-all duration-300">
                Daftar Kegiatan Sekarang
            </a>
            <a href="{{ route('events.propose') }}" class="w-full sm:w-auto px-8 py-4 border-2 border-slate-200 text-base font-semibold rounded-full text-primary-900 bg-white hover:bg-slate-50 hover:border-slate-300 shadow-sm hover:shadow-md transform hover:-translate-y-0.5 transition-all duration-300">
                Ajukan Acara Baru
            </a>
        </div>
    </div>
</div>
