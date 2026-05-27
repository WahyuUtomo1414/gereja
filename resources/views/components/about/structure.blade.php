@props([
    'firstMember' => null,
    'otherMembers' => collect(),
])

<div class="py-24 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-3xl md:text-4xl font-bold text-primary-900 font-serif mb-4">Struktur Pelayanan</h2>
            <p class="text-slate-500 max-w-2xl mx-auto text-lg font-light">Tim pelayan yang berdedikasi untuk memfasilitasi kehidupan berjemaat.</p>
        </div>
        
        <div class="flex flex-col items-center gap-8 md:gap-12">
            <!-- Level 1 (Top Centered Card) -->
            @if($firstMember)
                <div class="w-full flex justify-center">
                    <div class="w-full max-w-xs">
                        <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 text-center group h-full flex flex-col justify-between">
                            <div>
                                <div class="w-24 h-24 mx-auto mb-5 rounded-full overflow-hidden border-4 border-slate-50 shadow-inner group-hover:border-secondary-100 transition-colors duration-300">
                                    @if($firstMember['foto_url'])
                                        <img src="{{ $firstMember['foto_url'] }}" alt="{{ $firstMember['nama'] }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="flex h-full w-full items-center justify-center bg-slate-100 text-slate-400">
                                            <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4.501 20.118a8.25 8.25 0 0114.998 0"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <h3 class="text-lg font-bold text-primary-900 mb-1">{{ $firstMember['nama'] }}</h3>
                                <p class="text-[10px] text-secondary-600 font-bold uppercase tracking-widest mb-4">{{ $firstMember['jabatan'] }}</p>
                                @if($firstMember['deskripsi'])
                                    <p class="text-sm text-slate-500 font-light leading-relaxed">
                                        {{ $firstMember['deskripsi'] }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Level 2 (Subsequent Cards in Grid) -->
            @if(count($otherMembers) > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full max-w-5xl justify-items-center">
                    @foreach($otherMembers as $item)
                        <div class="w-full max-w-xs">
                            <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 text-center group flex flex-col justify-between h-full">
                                <div>
                                    <div class="w-24 h-24 mx-auto mb-5 rounded-full overflow-hidden border-4 border-slate-50 shadow-inner group-hover:border-secondary-100 transition-colors duration-300">
                                        @if($item['foto_url'])
                                            <img src="{{ $item['foto_url'] }}" alt="{{ $item['nama'] }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="flex h-full w-full items-center justify-center bg-slate-100 text-slate-400">
                                                <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4.501 20.118a8.25 8.25 0 0114.998 0"></path></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <h3 class="text-lg font-bold text-primary-900 mb-1">{{ $item['nama'] }}</h3>
                                    <p class="text-[10px] text-secondary-600 font-bold uppercase tracking-widest mb-4">{{ $item['jabatan'] }}</p>
                                    @if($item['deskripsi'])
                                        <p class="text-sm text-slate-500 font-light leading-relaxed">
                                            {{ $item['deskripsi'] }}
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
