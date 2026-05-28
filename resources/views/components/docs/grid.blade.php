@props(['laporan'])

<div class="space-y-12">
    @if($laporan->count())
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach($laporan as $item)
                <article class="flex h-full flex-col overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition-all duration-300 group hover:shadow-md">
                    <div class="relative aspect-video w-full overflow-hidden bg-slate-100">
                        <img src="{{ $item['thumbnail_url'] ?? 'https://images.unsplash.com/photo-1504052434569-70ad5836ab65?auto=format&fit=crop&w=1200&q=80' }}"
                             alt="{{ $item['nama'] }}"
                             class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />

                        <div class="absolute left-4 top-4">
                            <span class="rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 font-sans text-xs font-semibold text-emerald-700 shadow-sm">
                                {{ $item['kategori'] }}
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-1 flex-col p-6">
                        <div class="mb-3 flex items-center space-x-2 text-xs font-sans text-slate-400">
                            <span class="material-symbols-outlined text-sm">calendar_today</span>
                            <span>{{ $item['tanggal_label'] }}</span>
                        </div>

                        <h3 class="mb-2 line-clamp-2 font-serif text-lg font-bold text-primary-900 transition-colors hover:text-secondary-600">
                            <a href="{{ $item['detail_url'] }}">
                                {{ $item['nama'] }}
                            </a>
                        </h3>

                        <p class="mb-6 line-clamp-3 flex-1 text-sm font-light leading-relaxed text-slate-500">
                            {{ $item['ringkasan'] }}
                        </p>

                        <div class="mb-6 flex items-center border-t border-slate-50 pt-4 text-xs font-light text-slate-500">
                            <span class="material-symbols-outlined mr-2 text-[18px] text-slate-400">location_on</span>
                            <span>{{ $item['lokasi'] }}</span>
                        </div>

                        <a href="{{ $item['detail_url'] }}"
                           class="block w-full rounded-2xl bg-primary-800 py-3.5 text-center font-sans text-xs font-medium text-white shadow-md transition-all hover:bg-primary-900 active:scale-[0.98]">
                            Lihat Laporan
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="rounded-3xl border border-dashed border-slate-200 bg-white px-8 py-16 text-center shadow-sm">
            <span class="material-symbols-outlined mb-4 block text-5xl text-slate-300">assignment</span>
            <h3 class="mb-2 font-serif text-2xl font-bold text-primary-900">Belum Ada Laporan Kegiatan</h3>
            <p class="mx-auto max-w-2xl text-sm font-light leading-relaxed text-slate-500">
                Laporan kegiatan akan tampil di halaman ini setelah panitia menyelesaikan dokumentasi dan publikasi hasil pelayanan.
            </p>
        </div>
    @endif

    <div class="flex justify-center pt-4">
        {{ $laporan->links() }}
    </div>
</div>
