@props(['members' => null])

@php
// Fallback dummy data if $members is not passed or is empty
$dummyMembers = [
    [
        'nama' => 'Ps. David Emmanuel',
        'jabatan' => 'Gembala Sidang',
        'foto' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400&q=80',
        'deskripsi' => 'Memimpin visi spiritual gereja dan membimbing umat dalam pemahaman Firman yang mendalam.',
        'order' => 1
    ],
    [
        'nama' => 'Sarah Wijaya',
        'jabatan' => 'Sekretaris Jemaat',
        'foto' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&q=80',
        'deskripsi' => 'Mengelola administrasi gereja dan komunikasi internal komunitas.',
        'order' => 2
    ],
    [
        'nama' => 'Budi Santoso',
        'jabatan' => 'Bendahara',
        'foto' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=400&q=80',
        'deskripsi' => 'Bertanggung jawab atas pengelolaan keuangan dan transparansi dana gereja.',
        'order' => 3
    ],
    [
        'nama' => 'Maria Elena',
        'jabatan' => 'Koordinator Acara',
        'foto' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=400&q=80',
        'deskripsi' => 'Merancang dan mengoordinasikan berbagai kegiatan dan ibadah khusus.',
        'order' => 4
    ],
];

// Determine data to use: if members is passed and has data, use it; otherwise use dummy
$items = ($members && count($members) > 0) ? $members : $dummyMembers;

// Handle sorting. Since the user said they will use a sort column (which is 'order' in the migration),
// we will sort by 'order' or 'sort'.
if (is_array($items)) {
    usort($items, function($a, $b) {
        $orderA = is_array($a) ? ($a['order'] ?? $a['sort'] ?? 0) : ($a->order ?? $a->sort ?? 0);
        $orderB = is_array($b) ? ($b['order'] ?? $b['sort'] ?? 0) : ($b->order ?? $b->sort ?? 0);
        return $orderA <=> $orderB;
    });
} else {
    // If it's a Laravel Collection (like Eloquent results)
    $items = $items->sortBy(function($item) {
        return $item->order ?? $item->sort ?? 0;
    })->values()->all();
}

// Extract the first item (e.g. Gembala Sidang) which will be centered at the top
$firstItem = null;
$otherItems = [];
foreach ($items as $item) {
    if ($firstItem === null) {
        $firstItem = $item;
    } else {
        $otherItems[] = $item;
    }
}

// Helper function to safely read fields from array or object
$getVal = function($item, $key, $default = '') {
    if (is_array($item)) {
        return $item[$key] ?? $default;
    }
    return $item->$key ?? $default;
};

// Map of default descriptions for common positions if DB does not have a description column
$fallbackDescriptions = [
    'gembala sidang' => 'Memimpin visi spiritual gereja dan membimbing umat dalam pemahaman Firman yang mendalam.',
    'sekretaris jemaat' => 'Mengelola administrasi gereja dan komunikasi internal komunitas.',
    'bendahara' => 'Bertanggung jawab atas pengelolaan keuangan dan transparansi dana gereja.',
    'koordinator acara' => 'Merancang dan mengoordinasikan berbagai kegiatan dan ibadah khusus.',
];
@endphp

<div class="py-24 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-3xl md:text-4xl font-bold text-primary-900 font-serif mb-4">Struktur Pelayanan</h2>
            <p class="text-slate-500 max-w-2xl mx-auto text-lg font-light">Tim pelayan yang berdedikasi untuk memfasilitasi kehidupan berjemaat.</p>
        </div>
        
        <div class="flex flex-col items-center gap-8 md:gap-12">
            <!-- Level 1 (Top Centered Card) -->
            @if($firstItem)
                <div class="w-full flex justify-center">
                    <div class="w-full max-w-xs">
                        <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 text-center group h-full flex flex-col justify-between">
                            <div>
                                <div class="w-24 h-24 mx-auto mb-5 rounded-full overflow-hidden border-4 border-slate-50 shadow-inner group-hover:border-secondary-100 transition-colors duration-300">
                                    @php
                                        $foto1 = $getVal($firstItem, 'foto');
                                        $fotoUrl1 = $foto1 ? (str_starts_with($foto1, 'http') ? $foto1 : asset('storage/' . $foto1)) : 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400&q=80';
                                    @endphp
                                    <img src="{{ $fotoUrl1 }}" alt="{{ $getVal($firstItem, 'nama') }}" class="w-full h-full object-cover">
                                </div>
                                <h3 class="text-lg font-bold text-primary-900 mb-1">{{ $getVal($firstItem, 'nama') }}</h3>
                                <p class="text-[10px] text-secondary-600 font-bold uppercase tracking-widest mb-4">{{ $getVal($firstItem, 'jabatan') }}</p>
                                @php
                                    $desc1 = $getVal($firstItem, 'deskripsi') ?: ($fallbackDescriptions[strtolower(trim($getVal($firstItem, 'jabatan')))] ?? '');
                                @endphp
                                @if($desc1)
                                    <p class="text-sm text-slate-500 font-light leading-relaxed">
                                        {{ $desc1 }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Level 2 (Subsequent Cards in Grid) -->
            @if(count($otherItems) > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full max-w-5xl justify-items-center">
                    @foreach($otherItems as $item)
                        <div class="w-full max-w-xs">
                            <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 text-center group flex flex-col justify-between h-full">
                                <div>
                                    <div class="w-24 h-24 mx-auto mb-5 rounded-full overflow-hidden border-4 border-slate-50 shadow-inner group-hover:border-secondary-100 transition-colors duration-300">
                                        @php
                                            $fotoSub = $getVal($item, 'foto');
                                            $fotoUrlSub = $fotoSub ? (str_starts_with($fotoSub, 'http') ? $fotoSub : asset('storage/' . $fotoSub)) : 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&q=80';
                                        @endphp
                                        <img src="{{ $fotoUrlSub }}" alt="{{ $getVal($item, 'nama') }}" class="w-full h-full object-cover">
                                    </div>
                                    <h3 class="text-lg font-bold text-primary-900 mb-1">{{ $getVal($item, 'nama') }}</h3>
                                    <p class="text-[10px] text-secondary-600 font-bold uppercase tracking-widest mb-4">{{ $getVal($item, 'jabatan') }}</p>
                                    @php
                                        $descSub = $getVal($item, 'deskripsi') ?: ($fallbackDescriptions[strtolower(trim($getVal($item, 'jabatan')))] ?? '');
                                    @endphp
                                    @if($descSub)
                                        <p class="text-sm text-slate-500 font-light leading-relaxed">
                                            {{ $descSub }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
