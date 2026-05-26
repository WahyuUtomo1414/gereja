@props(['event', 'getVal'])

@php
    $speakers = [];
    $rawSpeakers = $getVal($event, 'pembicara');
    
    // Support both multi-speakers (for dummy mockup) and single speaker relation (for database)
    if (is_array($rawSpeakers) && count($rawSpeakers) > 0) {
        $speakers = $rawSpeakers;
    } else {
        // Eloquent relation check
        if (is_object($event) && isset($event->pembicara) && $event->pembicara !== null) {
            $speakers[] = $event->pembicara;
        }
    }
@endphp

@if(count($speakers) > 0)
    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm">
        <h2 class="text-xl md:text-2xl font-bold font-serif text-primary-900 mb-6 border-b border-slate-50 pb-3">
            Pembicara / Pelayan
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach($speakers as $speaker)
                @php
                    $namaSpeaker = $getVal($speaker, 'nama');
                    $jabatanSpeaker = $getVal($speaker, 'jabatan') ?: $getVal($speaker, 'latar_belakang', 'Pelayan Jemaat');
                    $fotoSpeaker = $getVal($speaker, 'foto');
                    $fotoSpeakerUrl = $fotoSpeaker ? (str_starts_with($fotoSpeaker, 'http') ? $fotoSpeaker : asset('storage/' . $fotoSpeaker)) : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=150&q=80';
                @endphp
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full overflow-hidden bg-slate-100 border border-slate-100 flex-shrink-0 shadow-inner">
                        <img src="{{ $fotoSpeakerUrl }}" alt="{{ $namaSpeaker }}" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-primary-900">{{ $namaSpeaker }}</h3>
                        <p class="text-xs text-slate-500 font-light italic mt-0.5">{{ $jabatanSpeaker }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
