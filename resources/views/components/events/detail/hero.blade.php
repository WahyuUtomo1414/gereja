@props(['event', 'getVal', 'getCategoryName'])

@php
    $nama = $getVal($event, 'nama');
    $ringkasan = $getVal($event, 'ringkasan');
    $status = $getVal($event, 'status');
    $foto = $getVal($event, 'foto');
    $fotoUrl = $foto ? (str_starts_with($foto, 'http') ? $foto : asset('storage/' . $foto)) : 'https://images.unsplash.com/photo-1544427928-c49cd7f40173?auto=format&fit=crop&w=1200&q=80';
    $kategori = $getCategoryName($event);
    
    $kuota = $getVal($event, 'kuota');
    $kuotaTerisi = $getVal($event, 'kuota_terisi', 0);
    $isFull = ($status === 'Kuota Penuh' || ($kuota !== null && $kuota > 0 && $kuotaTerisi >= $kuota));
@endphp

<section class="relative w-full h-[450px] md:h-[500px] flex items-end">
    <!-- Background Image with Gradient Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ $fotoUrl }}" alt="{{ $nama }}" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-primary-950 via-primary-900/60 to-transparent"></div>
    </div>
    
    <!-- Hero Details Container -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="flex flex-wrap gap-2.5 mb-4">
            <!-- Category Badge -->
            <span class="bg-white/10 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-medium border border-white/20 shadow-sm">
                {{ $kategori }}
            </span>
            
            <!-- Status Badge -->
            @if($isFull)
                <span class="bg-red-500/20 backdrop-blur-md text-red-300 px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-1 border border-red-500/30 shadow-sm">
                    <span class="material-symbols-outlined text-[15px]">cancel</span> Kuota Penuh
                </span>
            @else
                <span class="bg-emerald-500/20 backdrop-blur-md text-emerald-300 px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-1 border border-emerald-500/30 shadow-sm">
                    <span class="material-symbols-outlined text-[15px]">check_circle</span> Pendaftaran Buka
                </span>
            @endif
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
