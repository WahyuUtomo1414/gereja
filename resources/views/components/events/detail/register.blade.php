@props(['event', 'getVal', 'formatDateIndo'])

@php
    $id = $getVal($event, 'id');
    $nama = $getVal($event, 'nama');
    $slug = $getVal($event, 'slug');
    $tanggal = $getVal($event, 'tanggal');
    $jamMulai = $getVal($event, 'jam_mulai');
    $jamSelesai = $getVal($event, 'jam_selesai');
    $lokasi = $getVal($event, 'lokasi');
    $lokasiAlamat = $getVal($event, 'lokasi_alamat') ?: 'Jl. Gereja Protestan Maluku, Ambon';
    $status = $getVal($event, 'status');
    $kuota = $getVal($event, 'kuota');
    $kuotaTerisi = $getVal($event, 'kuota_terisi', 0);
    
    $isFull = ($status === 'Kuota Penuh' || ($kuota !== null && $kuota > 0 && $kuotaTerisi >= $kuota));
    
    $waktuFormatted = '';
    if ($jamMulai) {
        $mulai = \Carbon\Carbon::parse($jamMulai)->format('H:i');
        $selesai = $jamSelesai ? \Carbon\Carbon::parse($jamSelesai)->format('H:i') : '';
        $waktuFormatted = $mulai . ($selesai ? ' - ' . $selesai : '') . ' WIT';
    }
    
    $persenKuota = 0;
    if ($kuota !== null && $kuota > 0) {
        $persenKuota = round(($kuotaTerisi / $kuota) * 100);
    }
@endphp

<div x-data="{ showDaftarModal: false, showLoginPromptModal: false }" class="sticky top-24 space-y-6">
    <!-- Summary Card -->
    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm">
        <h3 class="text-lg font-bold font-serif text-primary-900 mb-6 border-b border-slate-100 pb-4">
            Ringkasan Kegiatan
        </h3>
        
        <div class="space-y-5 mb-8">
            <!-- Date -->
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-secondary-600 mt-0.5">calendar_month</span>
                <div>
                    <p class="text-xs text-slate-400 font-sans font-light">Tanggal</p>
                    <p class="text-sm text-primary-900 font-medium font-sans mt-0.5">
                        {{ $formatDateIndo($tanggal, null) }}
                    </p>
                </div>
            </div>
            
            <!-- Time -->
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-secondary-600 mt-0.5">schedule</span>
                <div>
                    <p class="text-xs text-slate-400 font-sans font-light">Waktu</p>
                    <p class="text-sm text-primary-900 font-medium font-sans mt-0.5">
                        {{ $waktuFormatted }}
                    </p>
                </div>
            </div>
            
            <!-- Location -->
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-secondary-600 mt-0.5">location_on</span>
                <div>
                    <p class="text-xs text-slate-400 font-sans font-light">Lokasi</p>
                    <p class="text-sm text-primary-900 font-medium font-sans mt-0.5">
                        {{ $lokasi }}
                    </p>
                    <p class="text-xs text-slate-500 font-sans font-light mt-1">
                        {{ $lokasiAlamat }}
                    </p>
                </div>
            </div>
            
            <!-- Quota progress bar -->
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-secondary-600 mt-0.5">group</span>
                <div class="w-full">
                    <p class="text-xs text-slate-400 font-sans font-light">Kuota</p>
                    @if($kuota !== null && $kuota > 0)
                        <div class="flex items-center gap-3 mt-1.5 w-full">
                            <div class="bg-slate-100 h-2 rounded-full overflow-hidden flex-grow shadow-inner">
                                <div class="bg-secondary-600 h-full rounded-full" style="width: {{ $persenKuota }}%"></div>
                            </div>
                            <span class="text-xs font-semibold text-primary-900 font-sans whitespace-nowrap">
                                {{ $kuotaTerisi }}/{{ $kuota }}
                            </span>
                        </div>
                    @else
                        <p class="text-sm text-secondary-600 font-medium font-sans mt-0.5">
                            Terbuka untuk umum
                        </p>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Registration Action Trigger -->
        @if($isFull)
            <button class="w-full bg-slate-100 text-slate-400 font-sans text-xs font-semibold py-4 rounded-2xl cursor-not-allowed shadow-inner">
                Kuota Terpenuhi
            </button>
        @else
            @auth
                <button @click="showDaftarModal = true" 
                        class="w-full bg-primary-800 text-white text-center font-sans text-xs font-semibold py-4 rounded-2xl hover:bg-primary-900 active:scale-[0.98] transition-all shadow-md flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-sm">how_to_reg</span>
                    Daftar Sebagai Peserta
                </button>
            @else
                <button @click="showLoginPromptModal = true" 
                        class="w-full bg-primary-800 text-white text-center font-sans text-xs font-semibold py-4 rounded-2xl hover:bg-primary-900 active:scale-[0.98] transition-all shadow-md flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-sm">login</span>
                    Daftar Sebagai Peserta
                </button>
            @endauth
        @endif
    </div>

    <!-- Modal 1: Login Prompt (For Non-Logged In Users) -->
    <template x-teleport="body">
        <div x-show="showLoginPromptModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center bg-primary-950/60 backdrop-blur-sm p-4"
             style="display: none;">
            
            <div @click.away="showLoginPromptModal = false" 
                 class="bg-white rounded-3xl w-full max-w-md shadow-2xl border border-slate-100 overflow-hidden transform transition-all p-8 text-center relative">
                
                <!-- Close Button -->
                <button @click="showLoginPromptModal = false" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600">
                    <span class="material-symbols-outlined">close</span>
                </button>

                <!-- Warning Icon -->
                <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-6 border border-amber-100">
                    <span class="material-symbols-outlined text-3xl">lock</span>
                </div>

                <h3 class="text-xl font-bold font-serif text-primary-900 mb-3">
                    Masuk Terlebih Dahulu
                </h3>
                <p class="text-sm text-slate-500 font-light leading-relaxed mb-6">
                    Untuk mendaftar sebagai peserta kegiatan ini, Anda harus masuk ke dalam akun Anda terlebih dahulu agar kami dapat mencatat data kehadiran Anda dengan benar.
                </p>

                <!-- CTA Actions -->
                <div class="flex flex-col gap-3">
                    <a href="{{ route('login') }}" class="w-full bg-primary-800 text-white font-sans text-xs font-semibold py-3.5 rounded-2xl hover:bg-primary-900 active:scale-[0.98] transition-all shadow-md flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-sm">login</span>
                        Masuk ke Akun
                    </a>
                    <a href="{{ route('register') }}" class="w-full border border-slate-200 text-slate-700 font-sans text-xs font-semibold py-3.5 rounded-2xl hover:bg-slate-50 active:scale-[0.98] transition-all">
                        Daftar Akun Baru
                    </a>
                </div>
            </div>
        </div>
    </template>

    <!-- Modal 2: Registration Form (For Logged In Users) -->
    <template x-teleport="body">
        <div x-show="showDaftarModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center bg-primary-950/60 backdrop-blur-sm p-4"
             style="display: none;">
            
            <div @click.away="showDaftarModal = false" 
                 class="bg-white rounded-3xl w-full max-w-lg shadow-2xl border border-slate-100 overflow-hidden transform transition-all">
                
                <!-- Modal Header -->
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold font-serif text-primary-900">Formulir Pendaftaran</h3>
                        <p class="text-[11px] text-slate-400 font-sans font-light mt-0.5">Konfirmasi kehadiran Anda pada kegiatan ini</p>
                    </div>
                    <button @click="showDaftarModal = false" class="text-slate-400 hover:text-slate-600">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <form action="#" method="POST" class="p-6 space-y-4" onsubmit="event.preventDefault(); alert('Pendaftaran berhasil dikirim! Silakan hubungi kami untuk informasi lebih lanjut.'); showDaftarModal = false;">
                    @csrf
                    
                    <!-- Alert: User Data Info -->
                    <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 flex gap-3 text-xs text-blue-800 leading-normal">
                        <span class="material-symbols-outlined text-blue-600 text-lg flex-shrink-0">info</span>
                        <div>
                            Berikut adalah data diri Anda yang terdaftar di sistem kami.
                        </div>
                    </div>

                    <!-- User Data Fields (Read Only) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-primary-900 font-sans mb-1.5">Nama Lengkap</label>
                            @auth
                                <input type="text" 
                                       value="{{ auth()->user()->jemaat->nama ?? auth()->user()->nama ?? auth()->user()->name ?? 'Budi Santoso' }}" 
                                       readonly
                                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-sans text-slate-500 cursor-not-allowed outline-none" />
                            @else
                                <input type="text" 
                                       value="Budi Santoso" 
                                       readonly
                                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-sans text-slate-500 cursor-not-allowed outline-none" />
                            @endauth
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-primary-900 font-sans mb-1.5">Alamat Email</label>
                            @auth
                                <input type="email" 
                                       value="{{ auth()->user()->jemaat->email ?? auth()->user()->email ?? 'budi.santoso@gmail.com' }}" 
                                       readonly
                                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-sans text-slate-500 cursor-not-allowed outline-none" />
                            @else
                                <input type="email" 
                                       value="budi.santoso@gmail.com" 
                                       readonly
                                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-sans text-slate-500 cursor-not-allowed outline-none" />
                            @endauth
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-primary-900 font-sans mb-1.5">Alamat Tempat Tinggal</label>
                        @auth
                            <input type="text" 
                                   value="{{ auth()->user()->jemaat->alamat ?? 'Jl. Diponegoro No. 45, Ambon' }}" 
                                   readonly
                                   class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-sans text-slate-500 cursor-not-allowed outline-none" />
                        @else
                            <input type="text" 
                                   value="Jl. Diponegoro No. 45, Ambon" 
                                   readonly
                                   class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-sans text-slate-500 cursor-not-allowed outline-none" />
                        @endauth
                        <p class="text-[10px] text-slate-400 mt-1 font-sans font-light italic">
                            * Hubungi sekretariat gereja jika ingin mengubah data kependudukan jemaat Anda.
                        </p>
                    </div>

                    <!-- Notes Field (Editable) -->
                    <div>
                        <label class="block text-xs font-semibold text-primary-900 font-sans mb-1.5">Catatan Khusus</label>
                        <textarea name="catatan" 
                                  placeholder="Tambahkan catatan (misalnya: riwayat alergi, kebutuhan transportasi, atau info medis penting lainnya)..." 
                                  rows="3" 
                                  class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-sans text-slate-800 focus:outline-none focus:border-secondary-500 focus:ring-1 focus:ring-secondary-500 transition-all resize-none"></textarea>
                    </div>

                    <!-- Consent Checkbox -->
                    <div class="flex items-start gap-2.5 pt-2">
                        <input type="checkbox" 
                               id="modal-consent" 
                               required 
                               class="mt-1 w-4 h-4 text-secondary-600 focus:ring-secondary-500 border-slate-300 rounded" />
                        <label for="modal-consent" class="text-[11px] text-slate-500 font-sans font-light leading-normal cursor-pointer">
                            Saya menyatakan data di atas sudah benar dan bersedia mematuhi tata tertib kegiatan yang ditentukan.
                        </label>
                    </div>

                    <!-- Modal Footer Buttons -->
                    <div class="border-t border-slate-100 pt-4 mt-6 flex justify-end gap-3 bg-white">
                        <button type="button" @click="showDaftarModal = false" class="border border-slate-200 text-slate-700 font-sans text-xs font-semibold px-5 py-3 rounded-xl hover:bg-slate-50 active:scale-[0.98] transition-all">
                            Batal
                        </button>
                        <button type="submit" class="bg-secondary-600 text-white font-sans text-xs font-semibold px-6 py-3 rounded-xl hover:bg-secondary-500 active:scale-[0.98] transition-all shadow-md">
                            Kirim Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>
