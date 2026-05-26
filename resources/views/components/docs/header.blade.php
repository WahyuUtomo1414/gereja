<header class="mb-12 text-center">
    <h1 class="text-4xl md:text-5xl font-bold font-serif text-primary-900 mb-4">
        Laporan & Dokumentasi Kegiatan
    </h1>
    <p class="text-lg text-slate-500 font-light max-w-2xl mx-auto leading-relaxed mb-8">
        Lihat kembali momen pelayanan, ibadah, dan kegiatan sosial gereja yang telah dilaksanakan.
    </p>
    
    <!-- Search Bar Form -->
    <form action="{{ route('docs.index') }}" method="GET" class="relative w-full max-w-md mx-auto">
        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
            search
        </span>
        <input type="text" 
               name="search"
               value="{{ request('search') }}"
               placeholder="Cari dokumentasi..." 
               class="w-full bg-white border border-slate-200 rounded-2xl py-3.5 pl-12 pr-4 text-sm text-slate-800 focus:outline-none focus:border-secondary-500 focus:ring-1 focus:ring-secondary-500 transition-all shadow-sm" />
    </form>
</header>
