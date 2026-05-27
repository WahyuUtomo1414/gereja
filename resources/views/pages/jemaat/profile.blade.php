<x-layouts.app>
    <x-slot name="title">Profil Jemaat - Gereja Protestan Maluku</x-slot>

    <section class="bg-slate-50 py-24">
        <div class="mx-auto max-w-5xl space-y-8 px-4 sm:px-6 lg:px-8">
            <div class="space-y-3">
                <p class="text-sm font-semibold tracking-[0.18em] text-secondary-600 uppercase">Area Jemaat</p>
                <h1 class="font-serif text-4xl text-primary-900">Profil Saya</h1>
                <p class="max-w-2xl text-base leading-7 text-slate-600">
                    Perbarui informasi dasar jemaat agar data pendaftaran kegiatan selalu sinkron.
                </p>
            </div>

            <x-jemaat.nav />

            <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                @if (session('status'))
                    <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('jamaat.profile.update') }}" method="POST" enctype="multipart/form-data" class="grid gap-6 md:grid-cols-2">
                    @csrf
                    @method('PUT')

                    <div class="md:col-span-2">
                        <label for="name" class="mb-2 block text-sm font-medium text-slate-700">Nama Lengkap</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $user->jemaat->nama ?? $user->name) }}" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-primary-800 focus:outline-none">
                        @error('name') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-slate-700">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $user->jemaat->email ?? $user->email) }}" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-primary-800 focus:outline-none">
                        @error('email') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="foto" class="mb-2 block text-sm font-medium text-slate-700">Foto Profil</label>
                        <input id="foto" name="foto" type="file" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-700 focus:border-primary-800 focus:outline-none">
                        @error('foto') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="alamat" class="mb-2 block text-sm font-medium text-slate-700">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="4" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-primary-800 focus:outline-none">{{ old('alamat', $user->jemaat?->alamat) }}</textarea>
                        @error('alamat') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2 flex justify-end">
                        <button type="submit" class="inline-flex items-center rounded-2xl bg-primary-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-primary-800">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>
