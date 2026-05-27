@props([
    'gereja' => null,
])

<div id="kontak" class="py-24 bg-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-16">
            <!-- Text & Info -->
            <div class="w-full lg:w-5/12 flex flex-col justify-center">
                <span class="text-secondary-600 font-bold tracking-widest uppercase text-xs mb-3 block">Tetap Terhubung</span>
                <h2 class="text-3xl md:text-4xl font-bold font-serif text-primary-900 mb-6">Hubungi Kami</h2>
                <p class="text-slate-500 font-light mb-12 leading-relaxed text-lg">
                    Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan seputar pelayanan, jadwal ibadah, atau ingin berpartisipasi dalam komunitas.
                </p>
                
                <div class="space-y-8">
                    <!-- Alamat -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-slate-50 text-primary-900 rounded-full flex items-center justify-center mr-5 flex-shrink-0 border border-slate-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary-900 mb-1">Alamat Pusat</h4>
                            <p class="text-slate-500 text-sm leading-relaxed">
                                {{ $gereja?->alamat ?? 'Alamat gereja belum tersedia.' }}
                            </p>
                        </div>
                    </div>
                    
                    <!-- Telepon -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-slate-50 text-primary-900 rounded-full flex items-center justify-center mr-5 flex-shrink-0 border border-slate-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary-900 mb-1">Telepon</h4>
                            <p class="text-slate-500 text-sm leading-relaxed">{{ $gereja?->no_tlpn ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-slate-50 text-primary-900 rounded-full flex items-center justify-center mr-5 flex-shrink-0 border border-slate-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary-900 mb-1">Email</h4>
                            <p class="text-slate-500 text-sm leading-relaxed">{{ $gereja?->email ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Map Side -->
            <div class="w-full lg:w-7/12">
                <div class="w-full h-[400px] lg:h-[500px] rounded-3xl overflow-hidden shadow-xl border border-slate-100">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.653496035043!2d128.1793798!3d-3.6997424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6ce8305c249a5b%3A0xc3c9a17382f7c00e!2sGereja%20Protestan%20Maluku!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
