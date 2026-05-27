@props(['requirements' => null])

@if ($requirements)
    <div class="rounded-2xl border border-slate-100 bg-white p-8 shadow-sm">
        <h2 class="mb-6 border-b border-slate-50 pb-3 font-serif text-xl font-bold text-primary-900 md:text-2xl">
            Syarat Mengikuti
        </h2>
        <ul class="mb-8 list-inside list-disc space-y-3 text-sm leading-relaxed font-light text-slate-600">
            @if (str_contains($requirements, '<li>'))
                {!! $requirements !!}
            @else
                @foreach (explode("\n", str_replace("\r", '', $requirements)) as $line)
                    @if (trim($line))
                        <li>{{ trim($line) }}</li>
                    @endif
                @endforeach
            @endif
        </ul>

        <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link kegiatan berhasil disalin!');"
                class="flex items-center gap-2 rounded-full border border-slate-200 px-6 py-3.5 font-sans text-xs font-semibold text-primary-900 transition-all hover:bg-slate-50 active:scale-[0.98]">
            <span class="material-symbols-outlined text-sm">share</span>
            Bagikan Kegiatan
        </button>
    </div>
@endif
