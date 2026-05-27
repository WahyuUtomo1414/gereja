@props([
    'gereja' => null,
])

<div class="relative mt-16 overflow-hidden bg-primary-900 py-24 sm:mt-0 sm:py-32">
    <!-- Subtle gradient -->
    <div class="absolute inset-0 bg-gradient-to-t from-primary-950 to-primary-800"></div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-white font-serif tracking-tight mb-6">
            Tentang <span class="text-secondary-400 italic">{{ $gereja?->nama ?? 'Gereja Kami' }}</span>
        </h1>
        <p class="text-lg md:text-xl text-primary-100 max-w-2xl mx-auto font-light leading-relaxed">
            Mengenal lebih dekat perjalanan, nilai-nilai, dan pelayanan {{ $gereja?->nama ?? 'gereja kami' }}.
        </p>
    </div>
</div>
