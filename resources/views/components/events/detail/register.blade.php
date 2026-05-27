@props(['event'])

<div x-data="{ showDaftarModal: false, showLoginPromptModal: false }" class="sticky top-24 space-y-6">
    <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
        <h3 class="mb-6 border-b border-slate-100 pb-4 font-serif text-lg font-bold text-primary-900">
            Ringkasan Kegiatan
        </h3>

        <div class="mb-8 space-y-5">
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined mt-0.5 text-secondary-600">calendar_month</span>
                <div>
                    <p class="font-sans text-xs font-light text-slate-400">Tanggal</p>
                    <p class="mt-0.5 font-sans text-sm font-medium text-primary-900">{{ $event['tanggal_label'] }}</p>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined mt-0.5 text-secondary-600">schedule</span>
                <div>
                    <p class="font-sans text-xs font-light text-slate-400">Waktu</p>
                    <p class="mt-0.5 font-sans text-sm font-medium text-primary-900">{{ $event['jam_label'] }}</p>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined mt-0.5 text-secondary-600">location_on</span>
                <div>
                    <p class="font-sans text-xs font-light text-slate-400">Lokasi</p>
                    <p class="mt-0.5 font-sans text-sm font-medium text-primary-900">{{ $event['lokasi'] }}</p>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined mt-0.5 text-secondary-600">group</span>
                <div class="w-full">
                    <p class="font-sans text-xs font-light text-slate-400">Kuota</p>
                    @if ($event['kuota'] !== null && $event['kuota'] > 0)
                        <div class="mt-1.5 flex w-full items-center gap-3">
                            <div class="h-2 flex-grow overflow-hidden rounded-full bg-slate-100 shadow-inner">
                                <div class="h-full rounded-full bg-secondary-600" style="width: {{ $event['persen_kuota'] }}%"></div>
                            </div>
                            <span class="whitespace-nowrap font-sans text-xs font-semibold text-primary-900">
                                {{ $event['kuota_terisi'] }}/{{ $event['kuota'] }}
                            </span>
                        </div>
                    @else
                        <p class="mt-0.5 font-sans text-sm font-medium text-secondary-600">Terbuka untuk umum</p>
                    @endif
                </div>
            </div>
        </div>

        @if ($event['is_full'])
            <button class="w-full cursor-not-allowed rounded-2xl bg-slate-100 py-4 font-sans text-xs font-semibold text-slate-400 shadow-inner">
                Kuota Terpenuhi
            </button>
        @elseif ($event['status'] === 'pendaftaran_ditutup')
            <button class="w-full cursor-not-allowed rounded-2xl bg-slate-100 py-4 font-sans text-xs font-semibold text-slate-400 shadow-inner">
                Pendaftaran Ditutup
            </button>
        @else
            @auth
                <button @click="showDaftarModal = true"
                        class="flex w-full items-center justify-center gap-2 rounded-2xl bg-primary-800 py-4 text-center font-sans text-xs font-semibold text-white shadow-md transition-all hover:bg-primary-900 active:scale-[0.98]">
                    <span class="material-symbols-outlined text-sm">how_to_reg</span>
                    Daftar Sebagai Peserta
                </button>
            @else
                <button @click="showLoginPromptModal = true"
                        class="flex w-full items-center justify-center gap-2 rounded-2xl bg-primary-800 py-4 text-center font-sans text-xs font-semibold text-white shadow-md transition-all hover:bg-primary-900 active:scale-[0.98]">
                    <span class="material-symbols-outlined text-sm">login</span>
                    Daftar Sebagai Peserta
                </button>
            @endauth
        @endif
    </div>

    <template x-teleport="body">
        <div x-show="showLoginPromptModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center bg-primary-950/60 p-4 backdrop-blur-sm"
             style="display: none;">
            <div @click.away="showLoginPromptModal = false"
                 class="relative w-full max-w-md overflow-hidden rounded-3xl border border-slate-100 bg-white p-8 text-center shadow-2xl">
                <button @click="showLoginPromptModal = false" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600">
                    <span class="material-symbols-outlined">close</span>
                </button>

                <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full border border-amber-100 bg-amber-50 text-amber-600">
                    <span class="material-symbols-outlined text-3xl">lock</span>
                </div>

                <h3 class="mb-3 font-serif text-xl font-bold text-primary-900">Masuk Terlebih Dahulu</h3>
                <p class="mb-6 text-sm leading-relaxed font-light text-slate-500">
                    Untuk mendaftar sebagai peserta kegiatan ini, Anda harus masuk ke dalam akun Anda terlebih dahulu agar kami dapat mencatat data kehadiran Anda dengan benar.
                </p>

                <div class="flex flex-col gap-3">
                    <a href="{{ route('login') }}" class="flex w-full items-center justify-center gap-2 rounded-2xl bg-primary-800 py-3.5 font-sans text-xs font-semibold text-white shadow-md transition-all hover:bg-primary-900 active:scale-[0.98]">
                        <span class="material-symbols-outlined text-sm">login</span>
                        Masuk ke Akun
                    </a>
                    <a href="{{ route('register') }}" class="w-full rounded-2xl border border-slate-200 py-3.5 font-sans text-xs font-semibold text-slate-700 transition-all hover:bg-slate-50 active:scale-[0.98]">
                        Daftar Akun Baru
                    </a>
                </div>
            </div>
        </div>
    </template>

    <template x-teleport="body">
        <div x-show="showDaftarModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center bg-primary-950/60 p-4 backdrop-blur-sm"
             style="display: none;">
            <div @click.away="showDaftarModal = false"
                 class="w-full max-w-lg overflow-hidden rounded-3xl border border-slate-100 bg-white shadow-2xl">
                <div class="flex items-center justify-between border-b border-slate-100 bg-slate-50 px-6 py-4">
                    <div>
                        <h3 class="font-serif text-lg font-bold text-primary-900">Formulir Pendaftaran</h3>
                        <p class="mt-0.5 font-sans text-[11px] font-light text-slate-400">Konfirmasi kehadiran Anda pada kegiatan ini</p>
                    </div>
                    <button @click="showDaftarModal = false" class="text-slate-400 hover:text-slate-600">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <form action="#" method="POST" class="space-y-4 p-6" onsubmit="event.preventDefault(); alert('Pendaftaran berhasil dikirim!'); showDaftarModal = false;">
                    @csrf

                    <div class="flex gap-3 rounded-2xl border border-blue-100 bg-blue-50 p-4 text-xs leading-normal text-blue-800">
                        <span class="material-symbols-outlined text-lg text-blue-600">info</span>
                        <div>Berikut adalah data diri Anda yang terdaftar di sistem kami.</div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-1.5 block font-sans text-xs font-semibold text-primary-900">Nama Lengkap</label>
                            <input type="text" value="{{ auth()->user()?->jemaat?->nama ?? auth()->user()?->name ?? '-' }}" readonly class="w-full cursor-not-allowed rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 font-sans text-sm text-slate-500 outline-none" />
                        </div>
                        <div>
                            <label class="mb-1.5 block font-sans text-xs font-semibold text-primary-900">Alamat Email</label>
                            <input type="email" value="{{ auth()->user()?->jemaat?->email ?? auth()->user()?->email ?? '-' }}" readonly class="w-full cursor-not-allowed rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 font-sans text-sm text-slate-500 outline-none" />
                        </div>
                    </div>

                    <div>
                        <label class="mb-1.5 block font-sans text-xs font-semibold text-primary-900">Alamat Tempat Tinggal</label>
                        <input type="text" value="{{ auth()->user()?->jemaat?->alamat ?? '-' }}" readonly class="w-full cursor-not-allowed rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 font-sans text-sm text-slate-500 outline-none" />
                    </div>

                    <div>
                        <label class="mb-1.5 block font-sans text-xs font-semibold text-primary-900">Catatan Khusus</label>
                        <textarea name="catatan" rows="3" placeholder="Tambahkan catatan bila diperlukan..." class="w-full resize-none rounded-xl border border-slate-200 bg-white px-4 py-3 font-sans text-sm text-slate-800 transition-all focus:border-secondary-500 focus:outline-none focus:ring-1 focus:ring-secondary-500"></textarea>
                    </div>

                    <div class="flex items-start gap-2.5 pt-2">
                        <input type="checkbox" id="modal-consent" required class="mt-1 h-4 w-4 rounded border-slate-300 text-secondary-600 focus:ring-secondary-500" />
                        <label for="modal-consent" class="cursor-pointer font-sans text-[11px] leading-normal font-light text-slate-500">
                            Saya menyatakan data di atas sudah benar dan bersedia mematuhi tata tertib kegiatan yang ditentukan.
                        </label>
                    </div>

                    <div class="mt-6 flex justify-end gap-3 border-t border-slate-100 bg-white pt-4">
                        <button type="button" @click="showDaftarModal = false" class="rounded-xl border border-slate-200 px-5 py-3 font-sans text-xs font-semibold text-slate-700 transition-all hover:bg-slate-50 active:scale-[0.98]">
                            Batal
                        </button>
                        <button type="submit" class="rounded-xl bg-secondary-600 px-6 py-3 font-sans text-xs font-semibold text-white shadow-md transition-all hover:bg-secondary-500 active:scale-[0.98]">
                            Kirim Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>
