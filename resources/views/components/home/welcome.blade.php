@props([
    'sambutan' => null,
])

<div class="bg-neutral py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="items-center lg:grid lg:grid-cols-2 lg:gap-16">
            <div class="relative h-96 overflow-hidden rounded-2xl bg-slate-300 shadow-lg">
                <img
                    src="{{ $sambutan?->foto ? asset('storage/'.$sambutan->foto) : 'https://images.unsplash.com/photo-1511369715783-6f6eb8b16bbd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80' }}"
                    alt="{{ $sambutan?->nama ? 'Sambutan '.$sambutan->nama : 'Sambutan Gereja' }}"
                    class="h-full w-full object-cover"
                >
            </div>

            <div class="mt-10 lg:mt-0">
                @if ($sambutan)
                    <p class="text-sm font-semibold tracking-[0.18em] text-secondary-600 uppercase">
                        {{ $sambutan->jabatan ?: 'Sambutan' }}
                    </p>
                    <h2 class="mt-3 font-serif text-3xl font-extrabold text-primary-800">
                        {{ $sambutan->nama }}
                    </h2>
                    <div class="prose prose-slate mt-6 max-w-none text-lg leading-relaxed">
                        {!! $sambutan->deskripsi !!}
                    </div>
                @else
                    <h2 class="font-serif text-3xl font-extrabold text-primary-800">Selamat Datang di Keluarga Allah</h2>
                    <p class="mt-6 text-lg leading-relaxed text-slate-600">
                        Shalom! Kami sangat bersukacita menyambut Anda. Website ini kami siapkan agar jemaat lebih mudah terhubung dengan pelayanan, kegiatan, dan komunitas gereja.
                    </p>
                @endif

                <div class="mt-8">
                    <a href="{{ route('about') }}" class="flex items-center font-semibold text-secondary-600 hover:text-secondary-700">
                        Pelajari Tentang Kami
                        <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
