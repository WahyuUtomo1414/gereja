@props([
    'gereja' => null,
])

<div class="py-24 relative overflow-hidden bg-primary-50">
    <div class="absolute -right-20 -top-20 w-96 h-96 bg-secondary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40"></div>
    <div class="absolute -left-20 -bottom-20 w-96 h-96 bg-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40"></div>
    
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-primary-900 font-serif mb-10 flex items-center justify-center gap-4">
            <span class="w-16 h-px bg-primary-300"></span>
            Visi Gereja
            <span class="w-16 h-px bg-primary-300"></span>
        </h2>
        
        <div class="bg-white p-10 md:p-16 rounded-3xl shadow-xl border border-white relative">
            <span class="absolute top-4 left-6 text-6xl text-primary-100 font-serif leading-none">"</span>
            <div class="prose prose-slate relative z-10 mx-auto max-w-none text-2xl md:text-4xl text-primary-800 font-serif leading-relaxed italic">
                {!! $gereja?->visi
                    ? $gereja->visi
                    : 'Menjadi Gereja yang terus Bertumbuh, Berakar kuat dalam Firman, dan Berbuah lebat dalam melayani sesama.' !!}
            </div>
            <span class="absolute bottom-[-1rem] right-6 text-6xl text-primary-100 font-serif leading-none rotate-180">"</span>
        </div>
    </div>
</div>
