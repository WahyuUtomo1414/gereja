@props(['event'])

@php
$getCategoryHeroBadgeClass = function ($category) {
    $categoryLower = strtolower(trim($category));

    return match (true) {
        str_contains($categoryLower, 'ibadah') => 'bg-blue-500/20 text-blue-300 border border-blue-500/30',
        str_contains($categoryLower, 'pemuda'), str_contains($categoryLower, 'remaja') => 'bg-amber-500/20 text-amber-300 border border-amber-500/30',
        str_contains($categoryLower, 'sosial') => 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30',
        str_contains($categoryLower, 'doa') => 'bg-indigo-500/20 text-indigo-300 border border-indigo-500/30',
        str_contains($categoryLower, 'anak') => 'bg-rose-500/20 text-rose-300 border border-rose-500/30',
        str_contains($categoryLower, 'keluarga'), str_contains($categoryLower, 'pernikahan') => 'bg-teal-500/20 text-teal-300 border border-teal-500/30',
        default => 'bg-slate-500/20 text-slate-300 border border-slate-500/30',
    };
};
@endphp

<section class="relative flex h-[450px] w-full items-end md:h-[500px]">
    <div class="absolute inset-0 z-0">
        <img src="{{ $event['foto_url'] ?? 'https://images.unsplash.com/photo-1544427928-c49cd7f40173?auto=format&fit=crop&w=1200&q=80' }}" alt="{{ $event['nama'] }}" class="h-full w-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-primary-950 via-primary-900/60 to-transparent"></div>
    </div>

    <div class="relative z-10 mx-auto w-full max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
        <div class="mb-4 flex flex-wrap gap-2.5">
            <span class="rounded-full px-3 py-1 text-xs font-semibold shadow-sm backdrop-blur-md {{ $getCategoryHeroBadgeClass($event['kategori']) }}">
                {{ $event['kategori'] }}
            </span>

            @if ($event['is_full'])
                <span class="flex items-center gap-1 rounded-full border border-red-500/30 bg-red-500/20 px-3 py-1 text-xs font-semibold text-red-300 shadow-sm backdrop-blur-md">
                    <span class="material-symbols-outlined text-[15px]">cancel</span> Kuota Penuh
                </span>
            @else
                <span class="{{ $event['status'] === 'pendaftaran_dibuka' ? 'border-emerald-500/30 bg-emerald-500/20 text-emerald-300' : 'border-slate-400/30 bg-slate-500/20 text-slate-200' }} flex items-center gap-1 rounded-full px-3 py-1 text-xs font-semibold shadow-sm backdrop-blur-md">
                    <span class="material-symbols-outlined text-[15px]">{{ $event['status'] === 'pendaftaran_dibuka' ? 'check_circle' : 'schedule' }}</span> {{ $event['status_label'] }}
                </span>
            @endif
        </div>

        <h1 class="mb-4 font-serif text-3xl font-bold leading-tight text-white md:text-5xl">
            {{ $event['nama'] }}
        </h1>
        <p class="max-w-3xl text-base leading-relaxed font-light text-slate-200 md:text-lg">
            {{ $event['ringkasan'] }}
        </p>
    </div>
</section>
