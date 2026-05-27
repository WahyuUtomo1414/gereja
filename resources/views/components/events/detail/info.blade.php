@props(['event'])

<div class="rounded-2xl border border-slate-100 bg-white p-8 shadow-sm">
    <h2 class="mb-6 border-b border-slate-50 pb-3 font-serif text-xl font-bold text-primary-900 md:text-2xl">
        Tentang Kegiatan
    </h2>
    <div class="space-y-4 text-sm leading-relaxed font-light text-slate-600">
        {!! $event['deskripsi'] !!}
    </div>
</div>
