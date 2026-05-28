@props(['gallery'])

<div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm">
    <h2 class="text-xl md:text-2xl font-bold font-serif text-primary-900 mb-6 border-b border-slate-50 pb-3">
        Galeri & Dokumentasi
    </h2>

    @if(count($gallery))
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            @foreach($gallery as $photo)
                <div class="group relative aspect-video overflow-hidden rounded-xl border border-slate-100 bg-slate-100 transition-all duration-300 hover:shadow-md">
                    <img src="{{ $photo['foto_url'] }}"
                         alt="{{ $photo['nama'] }}"
                         class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />

                    @if($photo['nama'])
                        <div class="absolute inset-0 flex items-end bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                            <span class="text-xs font-sans font-light leading-normal text-white">{{ $photo['nama'] }}</span>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <div class="rounded-2xl border border-dashed border-slate-200 bg-slate-50 px-6 py-12 text-center">
            <span class="material-symbols-outlined mb-3 block text-4xl text-slate-300">photo_library</span>
            <p class="text-sm font-light text-slate-500">Galeri kegiatan belum tersedia untuk laporan ini.</p>
        </div>
    @endif
</div>
