@props(['laporan', 'getVal', 'getCategoryName'])

@php
    $nama = $getVal($laporan, 'nama');
    $ringkasan = $getVal($laporan, 'ringkasan');
    $foto = $getVal($laporan, 'foto');
    $fotoUrl = $foto ? (str_starts_with($foto, 'http') ? $foto : asset('storage/' . $foto)) : 'https://images.unsplash.com/photo-1544427928-c49cd7f40173?auto=format&fit=crop&w=1200&q=80';
    $kategori = $getCategoryName($laporan);

    $getCategoryHeroBadgeClass = function($category) {
        $categoryLower = strtolower(trim($category));
        if (str_contains($categoryLower, 'ibadah')) {
            return 'bg-blue-500/20 text-blue-300 border border-blue-500/30';
        } elseif (str_contains($categoryLower, 'pemuda') || str_contains($categoryLower, 'remaja')) {
            return 'bg-amber-500/20 text-amber-300 border border-amber-500/30';
        } elseif (str_contains($categoryLower, 'sosial')) {
            return 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30';
        } elseif (str_contains($categoryLower, 'doa')) {
            return 'bg-indigo-500/20 text-indigo-300 border border-indigo-500/30';
        } elseif (str_contains($categoryLower, 'anak')) {
            return 'bg-rose-500/20 text-rose-300 border border-rose-500/30';
        } elseif (str_contains($categoryLower, 'keluarga') || str_contains($categoryLower, 'pernikahan')) {
            return 'bg-teal-500/20 text-teal-300 border border-teal-500/30';
        }
        return 'bg-slate-500/20 text-slate-300 border border-slate-500/30';
    };
@endphp

<section class="relative w-full h-[400px] md:h-[450px] flex items-end">
    <!-- Background Image with Gradient Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ $fotoUrl }}" alt="{{ $nama }}" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-primary-950 via-primary-900/60 to-transparent"></div>
    </div>
    
    <!-- Hero Details Container -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="flex flex-wrap gap-2.5 mb-4">
            <!-- Category Badge -->
            <span class="backdrop-blur-md px-3 py-1 rounded-full text-xs font-semibold shadow-sm {{ $getCategoryHeroBadgeClass($kategori) }}">
                {{ $kategori }}
            </span>
            
            <!-- Document Report Badge -->
            <span class="bg-white/10 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-1 border border-white/20 shadow-sm">
                <span class="material-symbols-outlined text-[15px]">task_alt</span> Laporan Selesai
            </span>
        </div>
        
        <!-- Title & Subtitle -->
        <h1 class="text-3xl md:text-5xl font-bold font-serif text-white mb-4 leading-tight">
            {{ $nama }}
        </h1>
        <p class="text-base md:text-lg text-slate-200 font-light max-w-3xl leading-relaxed">
            {{ $ringkasan }}
        </p>
    </div>
</section>
