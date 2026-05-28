@props(['laporan'])

<div class="sticky top-24 space-y-6">
    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm">
        <h3 class="text-lg font-bold font-serif text-primary-900 mb-6 border-b border-slate-100 pb-4">
            Ringkasan Laporan
        </h3>

        <div class="space-y-5">
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-secondary-600 mt-0.5">calendar_month</span>
                <div>
                    <p class="text-xs text-slate-400 font-sans font-light">Tanggal Pelaksanaan</p>
                    <p class="text-sm text-primary-900 font-medium font-sans mt-0.5">
                        {{ $laporan['tanggal_label'] }}
                    </p>
                </div>
            </div>

            @if($laporan['jam_label'])
                <div class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-secondary-600 mt-0.5">schedule</span>
                    <div>
                        <p class="text-xs text-slate-400 font-sans font-light">Waktu</p>
                        <p class="text-sm text-primary-900 font-medium font-sans mt-0.5">
                            {{ $laporan['jam_label'] }}
                        </p>
                    </div>
                </div>
            @endif

            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-secondary-600 mt-0.5">location_on</span>
                <div>
                    <p class="text-xs text-slate-400 font-sans font-light">Lokasi</p>
                    <p class="text-sm text-primary-900 font-medium font-sans mt-0.5">
                        {{ $laporan['lokasi'] }}
                    </p>
                </div>
            </div>

            @if($laporan['pembicara'])
                <div class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-secondary-600 mt-0.5">person</span>
                    <div>
                        <p class="text-xs text-slate-400 font-sans font-light">Pelayan / Pembicara</p>
                        <p class="text-sm text-primary-900 font-medium font-sans mt-0.5">
                            {{ $laporan['pembicara']['nama'] }}
                        </p>
                    </div>
                </div>
            @endif

            @if($laporan['jumlah_peserta_hadir'])
                <div class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-secondary-600 mt-0.5">groups</span>
                    <div>
                        <p class="text-xs text-slate-400 font-sans font-light">Peserta Hadir</p>
                        <p class="text-sm text-primary-900 font-medium font-sans mt-0.5">
                            {{ $laporan['jumlah_peserta_hadir'] }} orang
                        </p>
                    </div>
                </div>
            @endif

            @if($laporan['tanggal_laporan_label'])
                <div class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-secondary-600 mt-0.5">edit_document</span>
                    <div>
                        <p class="text-xs text-slate-400 font-sans font-light">Dipublikasikan</p>
                        <p class="text-sm text-primary-900 font-medium font-sans mt-0.5">
                            {{ $laporan['tanggal_laporan_label'] }}
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="bg-primary-900 text-white rounded-2xl p-6 shadow-md relative overflow-hidden border border-primary-800 text-center">
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
