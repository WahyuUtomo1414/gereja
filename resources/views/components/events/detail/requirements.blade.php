@props(['event', 'getVal'])

@php
    $syarat = $getVal($event, 'kebutuhan_kegiatan') ?: $getVal($event, 'syarat_ketentuan');
@endphp

@if($syarat)
    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm">
        <h2 class="text-xl md:text-2xl font-bold font-serif text-primary-900 mb-6 border-b border-slate-50 pb-3">
            Syarat Mengikuti
        </h2>
        <ul class="text-sm text-slate-600 font-light leading-relaxed space-y-3 mb-8 list-disc list-inside">
            @if(str_contains($syarat, '<li>'))
                {!! $syarat !!}
            @else
                @foreach(explode("\n", str_replace("\r", "", $syarat)) as $line)
                    @if(trim($line))
                        <li>{{ trim($line) }}</li>
                    @endif
                @endforeach
            @endif
        </ul>
        
        <!-- Share Button -->
        <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link kegiatan berhasil disalin!');" 
                class="flex items-center gap-2 border border-slate-200 text-primary-900 font-sans text-xs font-semibold px-6 py-3.5 rounded-full hover:bg-slate-50 active:scale-[0.98] transition-all">
            <span class="material-symbols-outlined text-sm">share</span>
            Bagikan Kegiatan
        </button>
    </div>
@endif
