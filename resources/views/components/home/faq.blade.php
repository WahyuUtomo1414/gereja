<div class="py-24 bg-slate-50 relative overflow-hidden" x-data="{ active: null }">
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
            <!-- Item 1 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300 border border-slate-100">
                <button @click="active = active === 1 ? null : 1" class="w-full px-8 py-6 text-left flex justify-between items-center focus:outline-none group">
                    <span class="text-lg font-semibold text-primary-900 group-hover:text-secondary-600 transition-colors">Apakah saya harus punya akun untuk mendaftar kegiatan?</span>
                    <span class="ml-6 flex-shrink-0 flex items-center justify-center w-10 h-10 rounded-full bg-slate-50 group-hover:bg-secondary-50 transition-colors">
                        <svg class="w-5 h-5 text-primary-900 group-hover:text-secondary-600 transform transition-transform duration-300" :class="active === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </button>
                <div x-show="active === 1" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="px-8 pb-6 pt-0 text-slate-600 leading-relaxed text-base" 
                     style="display: none;">
                    Ya, untuk memudahkan pendataan dan memastikan Anda tidak perlu mengisi data berulang kali, kami mewajibkan jemaat untuk membuat akun sebelum mendaftar ke kegiatan tertentu.
                </div>
            </div>

            <!-- Item 2 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300 border border-slate-100">
                <button @click="active = active === 2 ? null : 2" class="w-full px-8 py-6 text-left flex justify-between items-center focus:outline-none group">
                    <span class="text-lg font-semibold text-primary-900 group-hover:text-secondary-600 transition-colors">Bagaimana cara mengajukan acara gereja?</span>
                    <span class="ml-6 flex-shrink-0 flex items-center justify-center w-10 h-10 rounded-full bg-slate-50 group-hover:bg-secondary-50 transition-colors">
                        <svg class="w-5 h-5 text-primary-900 group-hover:text-secondary-600 transform transition-transform duration-300" :class="active === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </button>
                <div x-show="active === 2" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="px-8 pb-6 pt-0 text-slate-600 leading-relaxed text-base" 
                     style="display: none;">
                    Setelah Anda memiliki akun dan masuk (login), buka menu "Pengajuan Acara". Isi formulir dengan lengkap beserta proposal jika diperlukan, lalu tunggu persetujuan dari tim majelis gereja.
                </div>
            </div>

            <!-- Item 3 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300 border border-slate-100">
                <button @click="active = active === 3 ? null : 3" class="w-full px-8 py-6 text-left flex justify-between items-center focus:outline-none group">
                    <span class="text-lg font-semibold text-primary-900 group-hover:text-secondary-600 transition-colors">Apakah pengunjung baru boleh mengikuti kegiatan?</span>
                    <span class="ml-6 flex-shrink-0 flex items-center justify-center w-10 h-10 rounded-full bg-slate-50 group-hover:bg-secondary-50 transition-colors">
                        <svg class="w-5 h-5 text-primary-900 group-hover:text-secondary-600 transform transition-transform duration-300" :class="active === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </button>
                <div x-show="active === 3" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="px-8 pb-6 pt-0 text-slate-600 leading-relaxed text-base" 
                     style="display: none;">
                    Tentu saja! Kami sangat menyambut kehadiran pengunjung baru dengan sukacita. Beberapa acara bersifat terbuka untuk umum, sementara yang lain mungkin memerlukan pendaftaran demi kenyamanan bersama.
                </div>
            </div>
        </div>
        
        <div class="mt-12 text-center">
            <p class="text-slate-500">Masih punya pertanyaan? <a href="{{ route('contact') }}" class="text-secondary-600 font-semibold hover:text-secondary-700 hover:underline transition-colors">Hubungi tim kami</a></p>
        </div>
    </div>
</div>
