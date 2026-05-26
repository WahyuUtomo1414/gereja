@props(['laporan', 'getVal'])

@php
    $gallery = [];
    $rawPhotos = $getVal($laporan, 'foto_kegiatan');
    
    // Support both dummy array and Eloquent relation (fotoKegiatan)
    if (is_array($rawPhotos) && count($rawPhotos) > 0) {
        $gallery = $rawPhotos;
    } else {
        // Eloquent relation check
        if (is_object($laporan) && isset($laporan->fotoKegiatan) && $laporan->fotoKegiatan !== null) {
            $gallery = $laporan->fotoKegiatan;
        }
    }
    
    // Fallback default photos if empty
    if (count($gallery) === 0) {
        $gallery = [
            ['foto' => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=600&q=80', 'nama' => 'Sesi Pembukaan & Pujian'],
            ['foto' => 'https://images.unsplash.com/photo-1544027983-3ef1a0043c92?auto=format&fit=crop&w=600&q=80', 'nama' => 'Diskusi Panel Bersama Pembicara'],
            ['foto' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&w=600&q=80', 'nama' => 'Sesi Doa Bersama'],
            ['foto' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?auto=format&fit=crop&w=600&q=80', 'nama' => 'Ramah Tamah & Foto Bersama']
        ];
    }
@endphp

<div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm">
    <h2 class="text-xl md:text-2xl font-bold font-serif text-primary-900 mb-6 border-b border-slate-50 pb-3">
        Galeri & Dokumentasi
    </h2>
    
    <!-- 2 Columns Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($gallery as $photo)
            @php
                $img = $getVal($photo, 'foto');
                $imgUrl = $img ? (str_starts_with($img, 'http') ? $img : asset('storage/' . $img)) : 'https://images.unsplash.com/photo-1544427928-c49cd7f40173?auto=format&fit=crop&w=600&q=80';
                $caption = $getVal($photo, 'nama') ?: $getVal($photo, 'caption');
            @endphp
            <div class="group relative aspect-video bg-slate-100 rounded-xl overflow-hidden border border-slate-100 hover:shadow-md transition-all duration-300">
                <img src="{{ $imgUrl }}" alt="{{ $caption }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                @if($caption)
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <span class="text-xs text-white font-sans font-light leading-normal">{{ $caption }}</span>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
