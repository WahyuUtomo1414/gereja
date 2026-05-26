@props(['laporan' => null])

@php
// Fallback dummy data if $laporan is not passed or empty
$dummyLaporan = [
    [
        'id' => 1,
        'nama' => 'Ibadah Syukur Paskah 2026',
        'slug' => 'ibadah-syukur-paskah-2026',
        'ringkasan' => 'Pelaksanaan perayaan Paskah bersama dengan penuh sukacita dan kedamaian, dihadiri oleh seluruh jemaat.',
        'tanggal' => '2026-04-05',
        'lokasi' => 'Main Sanctuary',
        'thumbnail' => 'https://images.unsplash.com/photo-1444427928-c49cd7f40173?auto=format&fit=crop&w=600&q=80',
        'jenis_kegiatan' => [
            'id' => 1,
            'nama' => 'Ibadah'
        ]
    ],
    [
        'id' => 2,
        'nama' => 'Penyaluran Sembako Jemaat',
        'slug' => 'penyaluran-sembako-jemaat',
        'ringkasan' => 'Laporan penyaluran bantuan sosial berupa bahan pangan pokok bagi jemaat yang membutuhkan di wilayah sektor 3.',
        'tanggal' => '2026-04-18',
        'lokasi' => 'Gedung Serbaguna GPM',
        'thumbnail' => 'https://images.unsplash.com/photo-1544027983-3ef1a0043c92?auto=format&fit=crop&w=600&q=80',
        'jenis_kegiatan' => [
            'id' => 6,
            'nama' => 'Sosial'
        ]
    ],
    [
        'id' => 3,
        'nama' => 'Retreat Pemuda GPM 2026',
        'slug' => 'retreat-pemuda-gpm-2026',
        'ringkasan' => 'Dokumentasi kegiatan pembinaan rohani pemuda jemaat bertema "Tumbuh Bersama di Dalam Kasih Kristus".',
        'tanggal' => '2026-05-10',
        'lokasi' => 'Pusat Retret Halong',
        'thumbnail' => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=600&q=80',
        'jenis_kegiatan' => [
            'id' => 3,
            'nama' => 'Pemuda/Remaja'
        ]
    ]
];

$items = ($laporan && count($laporan) > 0) ? $laporan : $dummyLaporan;

// Helpers to access properties/keys from arrays or objects
$getVal = function($item, $key, $default = '') {
    if (is_array($item)) {
        return $item[$key] ?? $default;
    }
    return $item->$key ?? $default;
};

$getCategoryName = function($item) {
    if (is_array($item)) {
        return $item['jenis_kegiatan']['nama'] ?? $item['jenis_kegiatan_nama'] ?? 'Umum';
    }
    if (isset($item->jenisKegiatan)) {
        return $item->jenisKegiatan->nama;
    }
    return $item->jenis_kegiatan_nama ?? 'Umum';
};

$formatDateIndo = function($dateStr) {
    try {
        $date = \Carbon\Carbon::parse($dateStr);
        $days = ['Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];
        $months = ['Jan' => 'Jan', 'Feb' => 'Feb', 'Mar' => 'Mar', 'Apr' => 'Apr', 'May' => 'Mei', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Agt', 'Sep' => 'Sep', 'Oct' => 'Okt', 'Nov' => 'Nov', 'Dec' => 'Des'];
        
        $dayEng = $date->format('l');
        $monthEng = $date->format('M');
        
        $dayInd = $days[$dayEng] ?? $dayEng;
        $monthInd = $months[$monthEng] ?? $monthEng;
        
        return $dayInd . ', ' . $date->format('d') . ' ' . $monthInd . ' ' . $date->format('Y');
    } catch (\Exception $e) {
        return $dateStr;
    }
};

$getCategoryBadgeClass = function($category) {
    $categoryLower = strtolower(trim($category));
    if (str_contains($categoryLower, 'ibadah')) {
        return 'bg-blue-50 text-blue-700 border border-blue-100';
    } elseif (str_contains($categoryLower, 'pemuda') || str_contains($categoryLower, 'remaja')) {
        return 'bg-amber-50 text-amber-700 border border-amber-100';
    } elseif (str_contains($categoryLower, 'sosial')) {
        return 'bg-emerald-50 text-emerald-700 border border-emerald-100';
    } elseif (str_contains($categoryLower, 'doa')) {
        return 'bg-indigo-50 text-indigo-700 border border-indigo-100';
    } elseif (str_contains($categoryLower, 'anak')) {
        return 'bg-rose-50 text-rose-700 border border-rose-100';
    } elseif (str_contains($categoryLower, 'keluarga')) {
        return 'bg-teal-50 text-teal-700 border border-teal-100';
    }
    return 'bg-slate-50 text-slate-700 border border-slate-100';
};
@endphp

<div class="space-y-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($items as $item)
            @php
                $id = $getVal($item, 'id');
                $nama = $getVal($item, 'nama');
                $slug = $getVal($item, 'slug');
                $ringkasan = $getVal($item, 'ringkasan');
                $tanggal = $getVal($item, 'tanggal');
                $lokasi = $getVal($item, 'lokasi');
                
                $thumbnail = $getVal($item, 'thumbnail');
                $thumbnailUrl = $thumbnail ? (str_starts_with($thumbnail, 'http') ? $thumbnail : asset('storage/' . $thumbnail)) : 'https://images.unsplash.com/photo-1544427928-c49cd7f40173?auto=format&fit=crop&w=600&q=80';
                
                $kategori = $getCategoryName($item);
            @endphp
            <article class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden flex flex-col h-full group hover:shadow-md transition-all duration-300">
                <!-- Thumbnail -->
                <div class="relative w-full aspect-video bg-slate-100 overflow-hidden">
                    <img src="{{ $thumbnailUrl }}" 
                         alt="{{ $nama }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    
                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="font-sans text-xs font-semibold px-3 py-1 rounded-full shadow-sm {{ $getCategoryBadgeClass($kategori) }}">
                            {{ $kategori }}
                        </span>
                    </div>
                </div>

                <!-- Card Content -->
                <div class="p-6 flex flex-col flex-1">
                    <!-- Date -->
                    <div class="flex items-center text-slate-400 mb-3 text-xs font-sans space-x-2">
                        <span class="material-symbols-outlined text-sm">calendar_today</span>
                        <span>{{ $formatDateIndo($tanggal) }}</span>
                    </div>

                    <!-- Title -->
                    <h3 class="font-serif font-bold text-lg text-primary-900 mb-2 line-clamp-2 hover:text-secondary-600 transition-colors">
                        <a href="{{ route('docs.show', $slug ?: $id) }}">
                            {{ $nama }}
                        </a>
                    </h3>

                    <!-- Summary -->
                    <p class="text-sm text-slate-500 font-light leading-relaxed mb-6 line-clamp-3 flex-1">
                        {{ $ringkasan }}
                    </p>

                    <!-- Location info -->
                    <div class="flex items-center text-slate-500 text-xs font-light mb-6 border-t border-slate-50 pt-4">
                        <span class="material-symbols-outlined mr-2 text-[18px] text-slate-400">location_on</span>
                        <span>{{ $lokasi }}</span>
                    </div>

                    <!-- Action Button -->
                    <a href="{{ route('docs.show', $slug ?: $id) }}" 
                       class="w-full bg-primary-800 text-white text-center font-sans text-xs font-medium py-3.5 rounded-2xl hover:bg-primary-900 active:scale-[0.98] transition-all shadow-md">
                        Lihat Laporan
                    </a>
                </div>
            </article>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="flex justify-center pt-4">
        @if($laporan instanceof \Illuminate\Pagination\AbstractPaginator)
            {{ $laporan->links() }}
        @else
            <nav class="flex items-center space-x-1.5" aria-label="Pagination">
                <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-slate-200 text-slate-400 hover:bg-slate-50 cursor-not-allowed transition-all">
                    <span class="material-symbols-outlined text-lg">chevron_left</span>
                </a>
                <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-primary-800 text-white font-sans text-sm font-semibold shadow-sm">
                    1
                </a>
                <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 hover:text-primary-900 transition-all font-sans text-sm">
                    2
                </a>
                <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 hover:text-primary-900 transition-all font-sans text-sm">
                    3
                </a>
                <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 hover:text-primary-900 transition-all">
                    <span class="material-symbols-outlined text-lg">chevron_right</span>
                </a>
            </nav>
        @endif
    </div>
</div>
