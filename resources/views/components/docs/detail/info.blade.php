@props(['laporan'])

<div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm">
    <h2 class="text-xl md:text-2xl font-bold font-serif text-primary-900 mb-6 border-b border-slate-50 pb-3">
        Laporan Kegiatan
    </h2>
    <div class="text-sm text-slate-600 font-light leading-relaxed space-y-4">
        {!! $laporan['laporan_html'] !!}
    </div>
</div>
