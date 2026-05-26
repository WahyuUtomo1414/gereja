@props(['laporan', 'getVal', 'formatDateIndo'])

@php
    $id = $getVal($laporan, 'id');
    $nama = $getVal($laporan, 'nama');
    $tanggal = $getVal($laporan, 'tanggal');
    $jamMulai = $getVal($laporan, 'jam_mulai');
    $jamSelesai = $getVal($laporan, 'jam_selesai');
    $lokasi = $getVal($laporan, 'lokasi');
    $lokasiAlamat = $getVal($laporan, 'lokasi_alamat') ?: 'Jl. Gereja Protestan Maluku, Ambon';
    
    $waktuFormatted = '';
    if ($jamMulai) {
        $mulai = \Carbon\Carbon::parse($jamMulai)->format('H:i');
        $selesai = $jamSelesai ? \Carbon\Carbon::parse($jamSelesai)->format('H:i') : '';
        $waktuFormatted = $mulai . ($selesai ? ' - ' . $selesai : '') . ' WIT';
    }

    // Resolve speaker name
    $speakerNama = '';
    $rawSpeakers = $getVal($laporan, 'pembicara');
    if (is_array($rawSpeakers) && count($rawSpeakers) > 0) {
        $speakerNama = $getVal($rawSpeakers[0], 'nama');
    } else {
        if (is_object($laporan) && isset($laporan->pembicara) && $laporan->pembicara !== null) {
            $speakerNama = $laporan->pembicara->nama;
        }
    }
@endphp

<div class="sticky top-24 space-y-6">
    <!-- Summary Card -->
    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm">
        <h3 class="text-lg font-bold font-serif text-primary-900 mb-6 border-b border-slate-100 pb-4">
            Ringkasan Laporan
        </h3>
        
        <div class="space-y-5">
            <!-- Date -->
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-secondary-600 mt-0.5">calendar_month</span>
                <div>
                    <p class="text-xs text-slate-400 font-sans font-light">Tanggal Pelaksanaan</p>
                    <p class="text-sm text-primary-900 font-medium font-sans mt-0.5">
                        {{ $formatDateIndo($tanggal) }}
                    </p>
                </div>
            </div>
            
            <!-- Time -->
            @if($waktuFormatted)
                <div class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-secondary-600 mt-0.5">schedule</span>
                    <div>
                        <p class="text-xs text-slate-400 font-sans font-light">Waktu</p>
                        <p class="text-sm text-primary-900 font-medium font-sans mt-0.5">
                            {{ $waktuFormatted }}
                        </p>
                    </div>
                </div>
            @endif
            
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

            <!-- Speaker/Servant -->
            @if($speakerNama)
                <div class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-secondary-600 mt-0.5">person</span>
                    <div>
                        <p class="text-xs text-slate-400 font-sans font-light">Pelayan / Pembicara</p>
                        <p class="text-sm text-primary-900 font-medium font-sans mt-0.5">
                            {{ $speakerNama }}
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    <!-- CTA Card: Join Next Event / Give -->
    <div class="bg-primary-900 text-white rounded-2xl p-6 shadow-md relative overflow-hidden border border-primary-800 text-center">
        <!-- Accent circles decoration -->
        <div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-white/5 pointer-events-none"></div>
        <div class="absolute -left-6 -top-6 w-16 h-16 rounded-full bg-white/5 pointer-events-none"></div>

        <span class="material-symbols-outlined text-secondary-400 text-4xl mb-4 block">event_upcoming</span>
        
        <h4 class="text-base font-bold font-serif mb-2">Ikuti Kegiatan Selanjutnya</h4>
        <p class="text-xs text-slate-300 font-sans font-light leading-relaxed mb-6">
            Mari ambil bagian untuk bertumbuh bersama dalam iman dan persekutuan komunitas di ibadah serta pelayanan mendatang.
        </p>
        
        <a href="{{ route('events.index') }}" 
           class="w-full bg-secondary-600 hover:bg-secondary-500 text-white text-center font-sans text-xs font-semibold py-3.5 rounded-2xl active:scale-[0.98] transition-all shadow-md block">
            Lihat Jadwal Kegiatan
        </a>
    </div>
</div>
