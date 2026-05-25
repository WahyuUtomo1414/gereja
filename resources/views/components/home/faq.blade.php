    <!-- FAQ Section -->
    <div class="py-16 bg-neutral border-t border-tertiary" x-data="{ active: null }">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-primary-800 font-serif text-center mb-10">Pertanyaan yang Sering Diajukan</h2>
            <div class="space-y-4">
                <!-- Item 1 -->
                <div class="bg-white border border-tertiary rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <button @click="active = active === 1 ? null : 1" class="w-full px-6 py-5 text-left font-bold text-primary-800 flex justify-between items-center focus:outline-none">
                        <span class="text-lg">Apakah saya harus punya akun untuk mendaftar kegiatan?</span>
                        <svg class="w-6 h-6 text-secondary-500 transform transition-transform duration-300" :class="active === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="active === 1" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="px-6 pb-5 pt-0 text-slate-600 bg-white" 
                         style="display: none;">
                        Ya, untuk memudahkan pendataan dan agar Anda tidak perlu mengisi data berulang kali, kami mewajibkan jemaat untuk membuat akun sebelum mendaftar ke kegiatan tertentu.
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="bg-white border border-tertiary rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <button @click="active = active === 2 ? null : 2" class="w-full px-6 py-5 text-left font-bold text-primary-800 flex justify-between items-center focus:outline-none">
                        <span class="text-lg">Bagaimana cara mengajukan acara gereja?</span>
                        <svg class="w-6 h-6 text-secondary-500 transform transition-transform duration-300" :class="active === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="active === 2" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="px-6 pb-5 pt-0 text-slate-600 bg-white" 
                         style="display: none;">
                        Setelah Anda memiliki akun dan masuk (login), buka menu "Pengajuan Acara". Isi formulir dengan lengkap beserta proposal jika diperlukan, lalu tunggu persetujuan dari tim admin gereja.
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="bg-white border border-tertiary rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <button @click="active = active === 3 ? null : 3" class="w-full px-6 py-5 text-left font-bold text-primary-800 flex justify-between items-center focus:outline-none">
                        <span class="text-lg">Apakah pengunjung baru boleh mengikuti kegiatan?</span>
                        <svg class="w-6 h-6 text-secondary-500 transform transition-transform duration-300" :class="active === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="active === 3" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="px-6 pb-5 pt-0 text-slate-600 bg-white" 
                         style="display: none;">
                        Tentu saja! Kami sangat menyambut kehadiran pengunjung baru. Beberapa acara mungkin bersifat publik dan tidak memerlukan pendaftaran, sementara yang lain memerlukannya demi kenyamanan bersama.
                    </div>
                </div>
            </div>
        </div>
    </div>
