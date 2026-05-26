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

<div class="sticky top-24 space-y-6">
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
            <a href="#daftar-form" 
               class="block w-full bg-primary-800 text-white text-center font-sans text-xs font-semibold py-4 rounded-2xl hover:bg-primary-900 active:scale-[0.98] transition-all shadow-md">
                Daftar Sebagai Peserta
            </a>
        @endif
    </div>
    
    <!-- Registration Form Card -->
    @if(!$isFull)
        <div id="daftar-form" class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm border-t-4 border-t-secondary-600 scroll-mt-24">
            <h3 class="text-lg font-bold font-serif text-primary-900 mb-1">
                Formulir Pendaftaran
            </h3>
            <p class="text-xs text-slate-500 font-sans font-light mb-6">
                Lengkapi data di bawah ini untuk mengonfirmasi kehadiran Anda.
            </p>
            
            <form action="#" method="POST" class="space-y-4" onsubmit="event.preventDefault(); alert('Pendaftaran berhasil dikirim! Silakan hubungi kami untuk informasi lebih lanjut.');">
                @csrf
                <!-- Name Field -->
                <div>
                    <label class="block text-xs font-semibold text-primary-900 font-sans mb-1.5">Nama Lengkap</label>
                    @auth
                        <input type="text" 
                               value="{{ auth()->user()->nama ?? auth()->user()->name }}" 
                               readonly
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-sans text-slate-500 focus:outline-none cursor-not-allowed" />
                    @else
                        <input type="text" 
                               required
                               placeholder="Budi Santoso"
                               class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-sans text-slate-800 focus:outline-none focus:border-secondary-500 focus:ring-1 focus:ring-secondary-500 transition-all" />
                    @endauth
                </div>
                
                <!-- WhatsApp Field -->
                <div>
                    <label class="block text-xs font-semibold text-primary-900 font-sans mb-1.5">Nomor WhatsApp</label>
                    <input type="tel" 
                           required
                           placeholder="0812xxxxxx" 
                           class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-sans text-slate-800 focus:outline-none focus:border-secondary-500 focus:ring-1 focus:ring-secondary-500 transition-all" />
                </div>
                
                <!-- Notes Field -->
                <div>
                    <label class="block text-xs font-semibold text-primary-900 font-sans mb-1.5">Catatan (Opsional)</label>
                    <textarea placeholder="Ada kebutuhan khusus?" 
                              rows="3" 
                              class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-sans text-slate-800 focus:outline-none focus:border-secondary-500 focus:ring-1 focus:ring-secondary-500 transition-all resize-none"></textarea>
                </div>
                
                <!-- Consent Checkbox -->
                <div class="flex items-start gap-2.5 pt-2">
                    <input type="checkbox" 
                           id="consent" 
                           required 
                           class="mt-1 w-4 h-4 text-secondary-600 focus:ring-secondary-500 border-slate-300 rounded" />
                    <label for="consent" class="text-[11px] text-slate-500 font-sans font-light leading-normal cursor-pointer">
                        Saya bersedia mematuhi aturan kegiatan dan bersedia dihubungi terkait acara ini.
                    </label>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full mt-4 bg-secondary-600 text-white font-sans text-xs font-semibold py-3.5 rounded-2xl hover:bg-secondary-500 active:scale-[0.98] transition-all shadow-md flex items-center justify-center">
                    Kirim Pendaftaran
                </button>
            </form>
        </div>
    @endif
</div>
