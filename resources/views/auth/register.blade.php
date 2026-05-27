<x-layouts.app>
    <x-slot name="title">Daftar - Gereja Protestan Maluku</x-slot>

    <section class="bg-[radial-gradient(circle_at_top,#fff7ed_0%,#f8fafc_35%,#e2e8f0_100%)] py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[2rem] border border-white/70 bg-white/85 shadow-[0_30px_80px_-40px_rgba(15,23,42,0.45)] backdrop-blur">
                <div class="grid min-h-[720px] lg:grid-cols-[440px_minmax(0,1fr)]">
                    <div class="flex flex-col justify-between bg-white px-8 py-10 sm:px-10 lg:px-11">
                        <div class="space-y-10">
                            <div class="space-y-5">
                                <div class="inline-flex items-center gap-3 text-primary-900">
                                    <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-secondary-500 text-white shadow-lg shadow-secondary-500/30">
                                        <span class="material-symbols-outlined text-[22px]">person_add</span>
                                    </span>
                                    <div>
                                        <p class="font-serif text-2xl">Jadi Bagian Jemaat</p>
                                        <p class="text-sm text-slate-500">Mulai dari sini</p>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <h1 class="font-serif text-5xl leading-none text-primary-900 sm:text-[3.4rem]">Daftar Akun Baru</h1>
                                    <p class="max-w-sm text-base leading-7 text-slate-600">
                                        Buat akun jemaat untuk mengikuti kegiatan, memperbarui profil, dan mengakses dashboard pribadi.
                                    </p>
                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="rounded-[1.5rem] border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form action="{{ route('register.store') }}" method="POST" class="space-y-6">
                                @csrf

                                <div class="space-y-2">
                                    <label for="name" class="text-sm font-medium text-slate-700">Nama Lengkap</label>
                                    <input
                                        id="name"
                                        name="name"
                                        type="text"
                                        value="{{ old('name') }}"
                                        placeholder="Masukkan nama lengkap"
                                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary-800 focus:bg-white focus:outline-none"
                                    >
                                </div>

                                <div class="space-y-2">
                                    <label for="email" class="text-sm font-medium text-slate-700">Email</label>
                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        value="{{ old('email') }}"
                                        placeholder="Masukkan alamat email"
                                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary-800 focus:bg-white focus:outline-none"
                                    >
                                </div>

                                <div class="space-y-2">
                                    <label for="password" class="text-sm font-medium text-slate-700">Password</label>
                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        placeholder="Masukkan password"
                                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary-800 focus:bg-white focus:outline-none"
                                    >
                                </div>

                                <div class="space-y-2">
                                    <label for="password_confirmation" class="text-sm font-medium text-slate-700">Konfirmasi Password</label>
                                    <input
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        type="password"
                                        placeholder="Ulangi password"
                                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary-800 focus:bg-white focus:outline-none"
                                    >
                                </div>

                                <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-primary-950 px-4 py-3.5 text-sm font-semibold text-white transition hover:bg-primary-900">
                                    Daftar Akun
                                    <span class="material-symbols-outlined text-[18px]">east</span>
                                </button>
                            </form>
                        </div>

                        <p class="mt-10 text-sm text-slate-500">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="font-semibold text-secondary-600 hover:text-secondary-700">Masuk di sini.</a>
                        </p>
                    </div>

                    <div class="relative hidden overflow-hidden bg-primary-950 lg:block">
                        <img
                            src="https://images.unsplash.com/photo-1504052434569-70ad5836ab65?auto=format&fit=crop&w=1400&q=80"
                            alt="Komunitas gereja"
                            class="absolute inset-0 h-full w-full object-cover"
                        >
                        <div class="absolute inset-0 bg-linear-to-br from-primary-950/30 via-primary-950/50 to-primary-950/82"></div>
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(245,158,11,0.24),transparent_40%)]"></div>

                        <div class="relative flex h-full items-end p-10">
                            <div class="max-w-md rounded-[2rem] border border-white/20 bg-white/12 p-8 text-white shadow-2xl backdrop-blur-md">
                                <span class="text-secondary-300">"</span>
                                <p class="mt-4 font-serif text-4xl leading-tight">
                                    Setiap langkah kecil menuju persekutuan yang lebih hangat dimulai dari satu akun yang terhubung.
                                </p>
                                <p class="mt-6 text-sm tracking-[0.2em] text-white/70 uppercase">Community Journey</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
