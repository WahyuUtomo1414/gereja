@props([
    'gereja' => null,
])

<div class="py-24 bg-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-primary-900 font-serif mb-4">Misi Pelayanan</h2>
            <p class="text-slate-500 max-w-2xl mx-auto text-lg font-light">Langkah nyata kami dalam mewujudkan visi gereja di tengah dunia.</p>
        </div>
        
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse (($gereja?->misi ?? []) as $index => $mission)
                <div class="group rounded-3xl border border-slate-100 bg-slate-50 p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-primary-100 text-2xl font-bold text-primary-700 shadow-sm transition-colors duration-300 group-hover:bg-primary-900 group-hover:text-white">{{ $index + 1 }}</div>
                    <p class="text-slate-600 font-light leading-relaxed">{{ $mission }}</p>
                </div>
            @empty
                <div class="rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center text-slate-500 md:col-span-2 lg:col-span-3">
                    Misi pelayanan belum tersedia.
                </div>
            @endforelse
        </div>
    </div>
</div>
