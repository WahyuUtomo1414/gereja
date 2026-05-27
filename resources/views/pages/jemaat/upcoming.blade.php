<x-layouts.app>
    <x-slot name="title">Acara Mendatang - Gereja Protestan Maluku</x-slot>

    <section class="bg-slate-50 py-24">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">
            <div class="space-y-3">
                <p class="text-sm font-semibold tracking-[0.18em] text-secondary-600 uppercase">Area Jemaat</p>
                <h1 class="font-serif text-4xl text-primary-900">Acara yang Akan Datang</h1>
                <p class="max-w-2xl text-base leading-7 text-slate-600">
                    Kegiatan yang sudah Anda daftar dan belum berlangsung akan muncul di sini.
                </p>
            </div>

            <x-jemaat.nav />

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @forelse ($kegiatan as $item)
                    <article class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm font-medium text-secondary-600">{{ $item->jenisKegiatan?->nama ?? 'Kegiatan Gereja' }}</p>
                        <h2 class="mt-3 font-serif text-2xl text-primary-900">{{ $item->nama }}</h2>
                        <div class="mt-4 space-y-2 text-sm text-slate-600">
                            <p>{{ $item->tanggal?->translatedFormat('d F Y') }}</p>
                            <p>{{ $item->jam_mulai }}{{ $item->jam_selesai ? ' - '.$item->jam_selesai : '' }}</p>
                            <p>{{ $item->lokasi ?: 'Lokasi akan diumumkan' }}</p>
                        </div>
                        <a href="{{ route('events.show', $item->id) }}" class="mt-6 inline-flex items-center text-sm font-semibold text-primary-900 hover:text-secondary-600">
                            Lihat Detail
                        </a>
                    </article>
                @empty
                    <div class="rounded-[2rem] border border-dashed border-slate-300 bg-white px-6 py-12 text-center text-slate-500 md:col-span-2 xl:col-span-3">
                        Belum ada kegiatan mendatang yang sudah Anda ikuti.
                    </div>
                @endforelse
            </div>

            {{ $kegiatan->links() }}
        </div>
    </section>
</x-layouts.app>
