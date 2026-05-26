@props(['kegiatan' => null])

@php
// Fallback dummy data if $kegiatan is not passed or empty
$dummyKegiatan = [
    [
        'id' => 1,
        'nama' => 'Ibadah Raya Minggu Ke-2',
        'slug' => 'ibadah-raya-minggu-ke-2',
        'ringkasan' => 'Ibadah mingguan bersama seluruh jemaat. Mari merayakan kebaikan Tuhan dengan pujian dan penyembahan yang hangat.',
        'tanggal' => '2026-06-12',
        'jam_mulai' => '09:00:00',
        'lokasi' => 'Main Sanctuary',
        'kuota' => null,
        'kuota_terisi' => 0,
        'status' => 'Pendaftaran Dibuka',
        'thumbnail' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC0SyV6_AD3OqBUbhxeaquqLeEQpqESYZ5wprk3v8qfUxTOu45P1WUgi9JWUisDQZizV0Th-uoECnkFDiof-IWCmXmEDIoiq_0XFDJAZopYvD6eTi3lBqiHiOGp8q7J9oftCOYcekaUI9P_eBKtbQLWn0pEWRj7QtfNxqHKqw1Z3DIFKloDShcCB94adUzJf8SDA4giNjRdOoW35lkvYrjhsLqgTyZ2x8AZxx4d5S6hzAVAmw0dRwsMlpbKDBZ27VqDNIS9yLP1LBc',
        'jenis_kegiatan' => [
            'id' => 1,
            'nama' => 'Ibadah'
        ]
    ],
    [
        'id' => 2,
        'nama' => 'Youth Revival Night',
        'slug' => 'youth-revival-night',
        'ringkasan' => 'Malam pujian, penyembahan, dan persekutuan khusus untuk kaum muda. Temukan komunitas yang mendukung pertumbuhan imanmu.',
        'tanggal' => '2026-06-17',
        'jam_mulai' => '19:00:00',
        'lokasi' => 'Youth Hall (Lantai 2)',
        'kuota' => 100,
        'kuota_terisi' => 76,
        'status' => 'Pendaftaran Dibuka',
        'thumbnail' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBVtu4cC4HQJAVPLe5MiPpYjUrnG_MBdFQ2F4Dtml3JgLJnjzQYcaL-VNXv3UpsWkboUHqlW2XVPL0gXRQvTdl-GgZN8KrnaM4edgjJD8IHd1zNdsGWtXTCg2jkmgcNQv8xs0WaOCW6ijPyhTal9Cs7K32TcPs3jvri3QxiFuZXbMmnVHmNuJyh4ejkYwkzoaztMUDdwyrY9DLU-pEP1pH0GHPkzzFEE9xmYifO-gVCcQcfPafyxyXwWRzU2pAehwDACXq5UlKZkvU',
        'jenis_kegiatan' => [
            'id' => 3,
            'nama' => 'Pemuda/Remaja'
        ]
    ],
    [
        'id' => 3,
        'nama' => 'Bakti Sosial Desa Mekar',
        'slug' => 'bakti-sosial-desa-mekar',
        'ringkasan' => 'Kegiatan pelayanan masyarakat membagikan sembako dan pelayanan kesehatan gratis untuk warga sekitar.',
        'tanggal' => '2026-06-18',
        'jam_mulai' => '08:00:00',
        'lokasi' => 'Desa Mekar Jaya',
        'kuota' => 50,
        'kuota_terisi' => 50,
        'status' => 'Kuota Penuh',
        'thumbnail' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC-XAh6EcczWORb_EqVCjYvpJcVE7t9lkmBydKS7_VqtpP_dPZRDgRQZnnHIWC0fZz9Rw2zBg0cexWEFVZsdCT2cEYDDJBZL_n3SU0uf7LIHwHAmq2-4eWDjIMIykUdTiPCBOOoE0GNz9bwUCU4c_kksdKzi0q_ZZvbxo_EJFMEalAsKMwDN4vYVMLNPFtunvpC5V2cNjccz44DY1aQlBYsGGxlarkTx79Dvfp7km6FxjUArIoBCQEtKCGmVFYLzTUNQljtiiLa3HQ',
        'jenis_kegiatan' => [
            'id' => 6,
            'nama' => 'Sosial'
        ]
    ]
];

$items = ($kegiatan && count($kegiatan) > 0) ? $kegiatan : $dummyKegiatan;

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

$formatDateIndo = function($dateStr, $timeStr) {
    try {
        $date = \Carbon\Carbon::parse($dateStr);
        $days = ['Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];
        $months = ['Jan' => 'Jan', 'Feb' => 'Feb', 'Mar' => 'Mar', 'Apr' => 'Apr', 'May' => 'Mei', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Agt', 'Sep' => 'Sep', 'Oct' => 'Okt', 'Nov' => 'Nov', 'Dec' => 'Des'];
        
        $dayEng = $date->format('l');
        $monthEng = $date->format('M');
        
        $dayInd = $days[$dayEng] ?? $dayEng;
        $monthInd = $months[$monthEng] ?? $monthEng;
        
        $timeFormatted = $timeStr ? \Carbon\Carbon::parse($timeStr)->format('H:i') : '';
        
        return $dayInd . ', ' . $date->format('d') . ' ' . $monthInd . ($timeFormatted ? ' • ' . $timeFormatted . ' WIT' : '');
    } catch (\Exception $e) {
        return $dateStr . ($timeStr ? ' • ' . $timeStr : '');
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

<main class="flex-1">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($items as $item)
            @php
                $id = $getVal($item, 'id');
                $nama = $getVal($item, 'nama');
                $slug = $getVal($item, 'slug');
                $ringkasan = $getVal($item, 'ringkasan');
                $tanggal = $getVal($item, 'tanggal');
                $jamMulai = $getVal($item, 'jam_mulai');
                $lokasi = $getVal($item, 'lokasi');
                $kuota = $getVal($item, 'kuota');
                $kuotaTerisi = $getVal($item, 'kuota_terisi', 0);
                $status = $getVal($item, 'status');
                
                $thumbnail = $getVal($item, 'thumbnail');
                $thumbnailUrl = $thumbnail ? (str_starts_with($thumbnail, 'http') ? $thumbnail : asset('storage/' . $thumbnail)) : 'https://images.unsplash.com/photo-1544427928-c49cd7f40173?auto=format&fit=crop&w=600&q=80';
                
                $kategori = $getCategoryName($item);
                $isFull = ($status === 'Kuota Penuh' || ($kuota !== null && $kuota > 0 && $kuotaTerisi >= $kuota));
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

                    <!-- Full Quota Badge Overlay -->
                    @if($isFull)
                        <div class="absolute top-4 right-4 z-10">
                            <span class="bg-red-500 text-white font-sans text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full shadow-sm">
                                Penuh
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Card Content -->
                <div class="p-6 flex flex-col flex-1">
                    <!-- Date & Time -->
                    <div class="flex items-center text-slate-400 mb-3 text-xs font-sans space-x-2">
                        <span class="material-symbols-outlined text-sm">calendar_today</span>
                        <span>{{ $formatDateIndo($tanggal, $jamMulai) }}</span>
                    </div>

                    <!-- Title -->
                    <h3 class="font-serif font-bold text-lg text-primary-900 mb-2 line-clamp-2 hover:text-secondary-600 transition-colors">
                        <a href="{{ route('events.show', $slug ?: $id) }}">
                            {{ $nama }}
                        </a>
                    </h3>

                    <!-- Summary -->
                    <p class="text-sm text-slate-500 font-light leading-relaxed mb-6 line-clamp-3 flex-1">
                        {{ $ringkasan }}
                    </p>

                    <!-- Quick Info Icons -->
                    <div class="space-y-2 mb-6 border-t border-slate-50 pt-4">
                        <div class="flex items-center text-slate-500 text-xs font-light">
                            <span class="material-symbols-outlined mr-2 text-[18px] text-slate-400">location_on</span>
                            <span>{{ $lokasi }}</span>
                        </div>
                        <div class="flex items-center text-slate-500 text-xs font-light">
                            @if($isFull)
                                <span class="material-symbols-outlined mr-2 text-[18px] text-red-400">group_off</span>
                                <span class="text-red-500 font-medium">Kuota Penuh</span>
                            @elseif($kuota !== null && $kuota > 0)
                                <span class="material-symbols-outlined mr-2 text-[18px] text-secondary-500">group</span>
                                <span>Sisa <strong class="text-secondary-600 font-semibold">{{ $kuota - $kuotaTerisi }}</strong> Kuota</span>
                            @else
                                <span class="material-symbols-outlined mr-2 text-[18px] text-secondary-500">group</span>
                                <span class="text-secondary-600 font-medium">Terbuka untuk umum</span>
                            @endif
                        </div>
                    </div>

                    <!-- Action Button -->
                    @if($isFull)
                        <button class="w-full bg-slate-100 text-slate-400 font-sans text-xs font-medium py-3.5 rounded-2xl cursor-not-allowed">
                            Kuota Terpenuhi
                        </button>
                    @else
                        <a href="{{ route('events.show', $slug ?: $id) }}" 
                           class="w-full bg-primary-800 text-white text-center font-sans text-xs font-medium py-3.5 rounded-2xl hover:bg-primary-900 active:scale-[0.98] transition-all">
                            Lihat Detail
                        </a>
                    @endif
                </div>
            </article>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
        @if($kegiatan instanceof \Illuminate\Pagination\AbstractPaginator)
            {{ $kegiatan->links() }}
        @else
            <!-- Premium Static/Mock Pagination -->
            <nav class="flex items-center space-x-1.5" aria-label="Pagination">
                <!-- Previous Page -->
                <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-slate-200 text-slate-400 hover:bg-slate-50 transition-all cursor-not-allowed">
                    <span class="material-symbols-outlined text-lg">chevron_left</span>
                </a>
                
                <!-- Page Numbers -->
                <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-primary-800 text-white font-sans text-sm font-semibold shadow-sm">
                    1
                </a>
                <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 hover:text-primary-900 transition-all font-sans text-sm">
                    2
                </a>
                <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 hover:text-primary-900 transition-all font-sans text-sm">
                    3
                </a>
                
                <!-- Next Page -->
                <a href="#" class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 hover:text-primary-900 transition-all">
                    <span class="material-symbols-outlined text-lg">chevron_right</span>
                </a>
            </nav>
        @endif
    </div>
</main>
