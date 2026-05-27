<x-layouts.app>
    <x-slot name="title">Dashboard Jemaat - Gereja Protestan Maluku</x-slot>

    <section class="bg-linear-to-br from-[#f8fafc] via-white to-[#fff7ed] py-24">
        <div class="mx-auto flex max-w-7xl flex-col gap-10 px-4 sm:px-6 lg:px-8">
            <div class="space-y-4">
                <span class="inline-flex items-center rounded-full border border-secondary-200 bg-secondary-50 px-4 py-1 text-sm font-medium tracking-[0.18em] text-secondary-700 uppercase">
                    Area Jemaat
                </span>
                <div class="max-w-3xl space-y-3">
                    <h1 class="font-serif text-4xl leading-tight text-primary-900 sm:text-5xl">
                        Dashboard Jemaat
                    </h1>
                    <p class="text-base leading-7 text-slate-600 sm:text-lg">
                        Halaman ini kita siapkan dulu sebagai pintu masuk area jemaat. Navigasi utama untuk kegiatan, profil, dan password sudah siap dipakai.
                    </p>
                </div>
            </div>

            <x-jemaat.nav />

            <div class="grid gap-6 lg:grid-cols-3">
                <article class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Kegiatan Mendatang</p>
                    <p class="mt-4 font-serif text-5xl text-primary-900">{{ $upcomingCount }}</p>
                    <p class="mt-3 text-sm leading-6 text-slate-600">Jumlah kegiatan yang sudah Anda ikuti pendaftarannya dan belum berlangsung.</p>
                </article>

                <article class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Riwayat Kegiatan</p>
                    <p class="mt-4 font-serif text-5xl text-primary-900">{{ $historyCount }}</p>
                    <p class="mt-3 text-sm leading-6 text-slate-600">Daftar kegiatan yang pernah Anda ikuti dan sudah lewat tanggal pelaksanaannya.</p>
                </article>

                <article class="rounded-[2rem] border border-slate-200 bg-primary-900 p-6 text-white shadow-sm">
                    <p class="text-sm font-medium text-white/70">Status</p>
                    <h2 class="mt-4 font-serif text-3xl">Siap Dikembangkan</h2>
                    <p class="mt-3 text-sm leading-6 text-white/80">
                        Nanti dashboard ini bisa kita isi ringkasan pendaftaran, notifikasi kegiatan, dan shortcut ke detail acara.
                    </p>
                </article>
            </div>
        </div>
    </section>
</x-layouts.app>
