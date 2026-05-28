@props(['laporan'])

<section class="relative w-full h-[400px] md:h-[450px] flex items-end">
    <div class="absolute inset-0 z-0">
        <img src="{{ $laporan['thumbnail_url'] ?? 'https://images.unsplash.com/photo-1504052434569-70ad5836ab65?auto=format&fit=crop&w=1200&q=80' }}"
             alt="{{ $laporan['nama'] }}"
             class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-primary-950 via-primary-900/60 to-transparent"></div>
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="flex flex-wrap gap-2.5 mb-4">
            <span class="rounded-full border border-emerald-500/30 bg-emerald-500/20 px-3 py-1 text-xs font-semibold text-emerald-200 shadow-sm backdrop-blur-md">
                {{ $laporan['kategori'] }}
            </span>

            <span class="flex items-center gap-1 rounded-full border border-white/20 bg-white/10 px-3 py-1 text-xs font-semibold text-white shadow-sm backdrop-blur-md">
                <span class="material-symbols-outlined text-[15px]">task_alt</span> Laporan Selesai
            </span>
        </div>

        <h1 class="text-3xl md:text-5xl font-bold font-serif text-white mb-4 leading-tight">
            {{ $laporan['nama'] }}
        </h1>
        <p class="text-base md:text-lg text-slate-200 font-light max-w-3xl leading-relaxed">
            {{ $laporan['ringkasan'] }}
        </p>
    </div>
</section>
