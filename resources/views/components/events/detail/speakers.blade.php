@props(['speakers' => []])

@if (count($speakers) > 0)
    <div class="rounded-2xl border border-slate-100 bg-white p-8 shadow-sm">
        <h2 class="mb-6 border-b border-slate-50 pb-3 font-serif text-xl font-bold text-primary-900 md:text-2xl">
            Pembicara / Pelayan
        </h2>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            @foreach ($speakers as $speaker)
                <div class="flex items-center gap-4">
                    <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-full border border-slate-100 bg-slate-100 shadow-inner">
                        <img src="{{ $speaker['foto_url'] ?? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=150&q=80' }}" alt="{{ $speaker['nama'] }}" class="h-full w-full object-cover">
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-primary-900">{{ $speaker['nama'] }}</h3>
                        <p class="mt-0.5 text-xs font-light italic text-slate-500">{{ $speaker['jabatan'] ?: 'Pelayan Jemaat' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
