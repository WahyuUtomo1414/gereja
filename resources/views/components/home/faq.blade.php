@props([
    'faqs' => collect(),
])

<div class="relative overflow-hidden bg-slate-50 py-24" x-data="{ active: null }">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-primary-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 pointer-events-none"></div>
    <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-secondary-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 pointer-events-none"></div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-primary-900 font-serif mb-4">Pertanyaan Seputar Pelayanan</h2>
            <p class="text-slate-500 max-w-2xl mx-auto text-lg font-light">Temukan jawaban untuk beberapa pertanyaan yang paling sering diajukan oleh jemaat kami.</p>
        </div>
        
        <div class="space-y-4">
            @forelse ($faqs as $faq)
                <div class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition-shadow duration-300 hover:shadow-md">
                    <button @click="active = active === {{ $faq->id }} ? null : {{ $faq->id }}" class="group flex w-full items-center justify-between px-8 py-6 text-left focus:outline-none">
                        <span class="text-lg font-semibold text-primary-900 transition-colors group-hover:text-secondary-600">{{ $faq->pertanyaan }}</span>
                        <span class="ml-6 flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-slate-50 transition-colors group-hover:bg-secondary-50">
                            <svg class="w-5 h-5 text-primary-900 transform transition-transform duration-300 group-hover:text-secondary-600" :class="active === {{ $faq->id }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </button>
                    <div x-show="active === {{ $faq->id }}"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="px-8 pb-6 pt-0 text-base leading-relaxed text-slate-600"
                         style="display: none;">
                        {{ $faq->jawaban }}
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-8 py-10 text-center text-base text-slate-500">
                    FAQ belum tersedia saat ini.
                </div>
            @endforelse
        </div>
        
        <div class="mt-12 text-center">
            <p class="text-slate-500">Masih punya pertanyaan? <a href="{{ route('about') }}#kontak" class="text-secondary-600 font-semibold hover:text-secondary-700 hover:underline transition-colors">Hubungi tim kami</a></p>
        </div>
    </div>
</div>
