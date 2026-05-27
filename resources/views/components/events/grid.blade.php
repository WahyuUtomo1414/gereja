@props(['kegiatan'])

@php
$getCategoryBadgeClass = function ($category) {
    $categoryLower = strtolower(trim($category));

    return match (true) {
        str_contains($categoryLower, 'ibadah') => 'bg-blue-50 text-blue-700 border border-blue-100',
        str_contains($categoryLower, 'pemuda'), str_contains($categoryLower, 'remaja') => 'bg-amber-50 text-amber-700 border border-amber-100',
        str_contains($categoryLower, 'sosial') => 'bg-emerald-50 text-emerald-700 border border-emerald-100',
        str_contains($categoryLower, 'doa') => 'bg-indigo-50 text-indigo-700 border border-indigo-100',
        str_contains($categoryLower, 'anak') => 'bg-rose-50 text-rose-700 border border-rose-100',
        str_contains($categoryLower, 'keluarga') => 'bg-teal-50 text-teal-700 border border-teal-100',
        default => 'bg-slate-50 text-slate-700 border border-slate-100',
    };
};
@endphp

<main class="flex-1">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($kegiatan as $item)
            <article class="group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition-all duration-300 hover:shadow-md">
                <div class="relative aspect-video w-full overflow-hidden bg-slate-100">
                    <img src="{{ $item['thumbnail_url'] ?? 'https://images.unsplash.com/photo-1544427928-c49cd7f40173?auto=format&fit=crop&w=600&q=80' }}"
                         alt="{{ $item['nama'] }}"
                         class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />

                    <div class="absolute top-4 left-4">
                        <span class="rounded-full px-3 py-1 font-sans text-xs font-semibold shadow-sm {{ $getCategoryBadgeClass($item['kategori']) }}">
                            {{ $item['kategori'] }}
                        </span>
                    </div>

                    @if ($item['is_full'])
                        <div class="absolute top-4 right-4 z-10">
                            <span class="rounded-full bg-red-500 px-2.5 py-1 font-sans text-[10px] font-bold tracking-wider text-white uppercase shadow-sm">
                                Penuh
                            </span>
                        </div>
                    @endif
                </div>

                <div class="flex flex-1 flex-col p-6">
                    <div class="mb-3 flex items-center space-x-2 font-sans text-xs text-slate-400">
                        <span class="material-symbols-outlined text-sm">calendar_today</span>
                        <span>{{ $item['tanggal_label'] }} • {{ $item['jam_label'] }}</span>
                    </div>

                    <h3 class="mb-2 line-clamp-2 font-serif text-lg font-bold text-primary-900 transition-colors hover:text-secondary-600">
                        <a href="{{ $item['detail_url'] }}">{{ $item['nama'] }}</a>
                    </h3>

                    <p class="mb-6 line-clamp-3 flex-1 text-sm leading-relaxed font-light text-slate-500">
                        {{ $item['ringkasan'] }}
                    </p>

                    <div class="mb-6 space-y-2 border-t border-slate-50 pt-4">
                        <div class="flex items-center text-xs font-light text-slate-500">
                            <span class="material-symbols-outlined mr-2 text-[18px] text-slate-400">location_on</span>
                            <span>{{ $item['lokasi'] }}</span>
                        </div>
                        <div class="flex items-center text-xs font-light text-slate-500">
                            @if ($item['is_full'])
                                <span class="material-symbols-outlined mr-2 text-[18px] text-red-400">group_off</span>
                                <span class="font-medium text-red-500">Kuota Penuh</span>
                            @elseif ($item['kuota'] !== null && $item['kuota'] > 0)
                                <span class="material-symbols-outlined mr-2 text-[18px] text-secondary-500">group</span>
                                <span>Sisa <strong class="font-semibold text-secondary-600">{{ $item['kuota'] - $item['kuota_terisi'] }}</strong> Kuota</span>
                            @else
                                <span class="material-symbols-outlined mr-2 text-[18px] text-secondary-500">group</span>
                                <span class="font-medium text-secondary-600">Terbuka untuk umum</span>
                            @endif
                        </div>
                    </div>

                    @if ($item['is_full'] || $item['status'] === 'pendaftaran_ditutup')
                        <button class="w-full cursor-not-allowed rounded-2xl bg-slate-100 py-3.5 font-sans text-xs font-medium text-slate-400">
                            {{ $item['is_full'] ? 'Kuota Terpenuhi' : 'Pendaftaran Ditutup' }}
                        </button>
                    @else
                        <a href="{{ $item['detail_url'] }}"
                           class="w-full rounded-2xl bg-primary-800 py-3.5 text-center font-sans text-xs font-medium text-white transition-all hover:bg-primary-900 active:scale-[0.98]">
                            Lihat Detail
                        </a>
                    @endif
                </div>
            </article>
        @empty
            <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-14 text-center text-slate-500 md:col-span-2 xl:col-span-3">
                Belum ada kegiatan yang sesuai dengan filter saat ini.
            </div>
        @endforelse
    </div>

    <div class="mt-12 flex justify-center">
        {{ $kegiatan->links() }}
    </div>
</main>
