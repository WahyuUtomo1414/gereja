<x-layouts.app>
    <x-slot name="title">Ganti Password - Gereja Protestan Maluku</x-slot>

    <section class="bg-slate-50 py-24">
        <div class="mx-auto max-w-5xl space-y-8 px-4 sm:px-6 lg:px-8">
            <div class="space-y-3">
                <p class="text-sm font-semibold tracking-[0.18em] text-secondary-600 uppercase">Area Jemaat</p>
                <h1 class="font-serif text-4xl text-primary-900">Ganti Password</h1>
                <p class="max-w-2xl text-base leading-7 text-slate-600">
                    Gunakan password yang kuat agar akun jemaat tetap aman.
                </p>
            </div>

            <x-jemaat.nav />

            <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                @if (session('status'))
                    <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('jamaat.password.update') }}" method="POST" class="grid gap-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="current_password" class="mb-2 block text-sm font-medium text-slate-700">Password Saat Ini</label>
                        <input id="current_password" name="current_password" type="password" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-primary-800 focus:outline-none">
                        @error('current_password') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-medium text-slate-700">Password Baru</label>
                        <input id="password" name="password" type="password" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-primary-800 focus:outline-none">
                        @error('password') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-medium text-slate-700">Konfirmasi Password Baru</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-primary-800 focus:outline-none">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center rounded-2xl bg-primary-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-primary-800">
                            Simpan Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>
