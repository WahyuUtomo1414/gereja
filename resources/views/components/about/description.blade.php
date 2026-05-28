@props([
    'gereja' => null,
    'logoUrl' => null,
])

<div class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
            <!-- Image Side (Kiri) -->
            <div class="w-full lg:w-1/2">
                <div class="relative rounded-[2rem] overflow-hidden shadow-2xl group">
                    <img src="{{ $logoUrl ?? 'https://images.unsplash.com/photo-1438283173091-5dbf5c5a3206?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80' }}"
                        alt="{{ $gereja?->nama ?? 'Gereja Protestan Maluku' }}"
                        class="w-full h-[400px] md:h-[500px] {{ $logoUrl ? 'object-contain bg-slate-50 p-10' : 'object-cover' }} group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-primary-900 mix-blend-overlay opacity-10"></div>
                </div>
            </div>

            <!-- Text Side (Kanan) -->
            <div class="w-full lg:w-1/2">
                <h2 class="text-3xl md:text-4xl font-bold text-primary-900 font-serif mb-6 leading-tight">Perjalanan
                    Iman Kami</h2>

                <div class="prose prose-lg prose-slate text-slate-500 leading-relaxed font-light mb-10 text-justify">
                    {!! $gereja?->deskripsi
                        ? $gereja->deskripsi
                        : '<p><strong class="text-primary-900 font-semibold">Gereja Protestan Maluku (GPM)</strong> hadir sebagai wujud nyata kasih karunia Tuhan di tengah-tengah masyarakat dan terus bertumbuh dalam pelayanan.</p>' !!}
                </div>

            </div>
        </div>
    </div>
</div>
