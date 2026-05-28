<x-layouts.app>
    <x-slot name="title">Dashboard Jemaat - Gereja Protestan Maluku</x-slot>

    <section class="bg-linear-to-br from-[#f8fafc] via-white to-[#fff7ed] py-24 min-h-[80vh]">
        <div class="mx-auto flex max-w-7xl flex-col gap-10 px-4 sm:px-6 lg:px-8">
            <div class="space-y-4">
                <span
                    class="inline-flex items-center rounded-full border border-secondary-200 bg-secondary-50 px-4 py-1 text-sm font-medium tracking-[0.18em] text-secondary-700 uppercase">
                    Dashboard Jemaat
                </span>
                <div class="max-w-3xl space-y-3">
                    <h1 class="font-serif text-4xl leading-tight text-primary-900 sm:text-5xl">
                        Selamat Datang, {{ auth()->user()->jemaat->nama ?? auth()->user()->name }}
                    </h1>
                    <p class="text-base leading-7 text-slate-600 sm:text-lg">
                        Kelola pendaftaran kegiatan Anda, pantau riwayat pelayanan, dan perbarui profil dengan mudah
                        dari halaman dashboard ini.
                    </p>
                </div>
            </div>

            <x-jemaat.nav />

            <div class="grid gap-6 lg:grid-cols-3">
                <article
                    class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <span class="material-symbols-outlined text-secondary-500">event_upcoming</span>
                            <p class="text-sm font-semibold text-slate-500">Kegiatan Mendatang</p>
                        </div>
                        <p class="mt-2 font-serif text-5xl text-primary-900">{{ $upcomingCount }}</p>
                        <p class="mt-3 text-sm leading-relaxed text-slate-600">Jumlah kegiatan yang sudah Anda ikuti
                            pendaftarannya dan belum berlangsung.</p>
                    </div>
                </article>

                <article
                    class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <span class="material-symbols-outlined text-slate-400">history</span>
                            <p class="text-sm font-semibold text-slate-500">Riwayat Kegiatan</p>
                        </div>
                        <p class="mt-2 font-serif text-5xl text-primary-900">{{ $historyCount }}</p>
                        <p class="mt-3 text-sm leading-relaxed text-slate-600">Daftar kegiatan yang pernah Anda ikuti
                            dan sudah lewat tanggal pelaksanaannya.</p>
                    </div>
                </article>

                <article
                    class="rounded-[2rem] border border-primary-800 bg-primary-900 p-6 text-white shadow-md flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute -right-6 -bottom-6 w-32 h-32 rounded-full bg-white/5 pointer-events-none">
                    </div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="material-symbols-outlined text-secondary-400">bolt</span>
                            <h2 class="font-serif text-xl font-bold">Pintasan Cepat</h2>
                        </div>
                        <p class="text-sm leading-relaxed text-white/80 mb-6">
                            Akses menu yang paling sering digunakan untuk kebutuhan administrasi pelayanan Anda.
                        </p>
                    </div>
                    <div class="relative z-10 flex flex-col gap-3 mt-auto">
                        <a href="{{ route('events.index') }}"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-secondary-600 px-4 py-3 text-sm font-semibold text-white transition-all hover:bg-secondary-500 shadow-sm hover:shadow active:scale-[0.98]">
                            <span class="material-symbols-outlined text-sm">search</span>
                            Cari Kegiatan Baru
                        </a>
                        <a href="{{ route('jamaat.profile') }}"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-white/10 border border-white/20 px-4 py-3 text-sm font-medium text-white transition-all hover:bg-white/20 active:scale-[0.98]">
                            <span class="material-symbols-outlined text-sm">edit</span>
                            Ubah Profil
                        </a>
                    </div>
                </article>
            </div>

            @if (isset($recentUpcoming) && $recentUpcoming->count() > 0)
                <div class="mt-8">
                    <div class="flex items-center justify-between mb-6 border-b border-slate-200 pb-4">
                        <h2 class="font-serif text-2xl font-bold text-primary-900">Kegiatan Terdekat Anda</h2>
                        <a href="{{ route('jamaat.upcoming') }}"
                            class="text-sm font-semibold text-secondary-600 hover:text-secondary-700 flex items-center gap-1">
                            Lihat Semua <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($recentUpcoming as $kegiatan)
                            <a href="{{ route('events.show', $kegiatan->slug ?? $kegiatan->id) }}"
                                class="group flex flex-col bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                                <div class="relative h-40 overflow-hidden bg-slate-100">
                                    @if ($kegiatan->foto)
                                        @if (Str::startsWith($kegiatan->foto, 'http'))
                                            <img src="{{ $kegiatan->foto }}" alt="{{ $kegiatan->nama }}"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                        @else
                                            <img src="{{ Storage::url($kegiatan->foto) }}" alt="{{ $kegiatan->nama }}"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                        @endif
                                    @else
                                        <div
                                            class="w-full h-full flex items-center justify-center text-slate-400 bg-slate-200">
                                            <span class="material-symbols-outlined text-4xl opacity-50">image</span>
                                        </div>
                                    @endif

                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="inline-flex items-center rounded-full bg-white/90 backdrop-blur-sm px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-primary-900 shadow-sm border border-white/50">
                                            {{ $kegiatan->jenisKegiatan->nama ?? 'Umum' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-5 flex-grow flex flex-col">
                                    <h3
                                        class="font-serif text-lg font-bold text-primary-900 mb-3 group-hover:text-secondary-600 transition-colors line-clamp-2">
                                        {{ $kegiatan->nama }}
                                    </h3>

                                    <div class="space-y-2 mt-auto pt-4 border-t border-slate-50">
                                        <div class="flex items-center gap-2 text-xs text-slate-500">
                                            <span
                                                class="material-symbols-outlined text-[16px] text-secondary-500">calendar_today</span>
                                            <span>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('l, d F Y') }}</span>
                                        </div>
                                        <div class="flex items-center gap-2 text-xs text-slate-500">
                                            <span
                                                class="material-symbols-outlined text-[16px] text-secondary-500">schedule</span>
                                            <span>{{ \Carbon\Carbon::parse($kegiatan->jam_mulai)->format('H:i') }}
                                                WIT</span>
                                        </div>
                                        <div class="flex items-center gap-2 text-xs text-slate-500">
                                            <span
                                                class="material-symbols-outlined text-[16px] text-secondary-500">location_on</span>
                                            <span class="truncate">{{ $kegiatan->lokasi }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>
