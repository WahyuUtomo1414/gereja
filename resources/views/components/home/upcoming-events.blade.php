    <!-- Acara Mendatang Section -->
    <div class="py-16 sm:py-24 bg-neutral border-y border-tertiary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-primary-800 font-serif">Acara Mendatang</h2>
                    <p class="mt-2 text-slate-600">Ikuti dan daftarkan diri Anda dalam berbagai kegiatan gereja.</p>
                </div>
                <a href="{{ route('events.index') }}" class="hidden sm:inline-block text-secondary-600 hover:text-secondary-700 font-medium">Lihat Semua &rarr;</a>
            </div>

            <!-- List View for Desktop -->
            <div class="hidden md:block bg-white shadow-sm rounded-lg overflow-hidden border border-tertiary">
                <table class="min-w-full divide-y divide-tertiary">
                    <thead class="bg-slate-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Tanggal</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Kegiatan</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Lokasi</th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-tertiary">
                        <!-- Item 1 -->
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center text-primary-800 font-bold">12 Okt 2026</div>
                                <div class="text-sm text-slate-500">18:00 WIB</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-primary-800">Seminar Keluarga Muda</div>
                                <div class="text-sm text-slate-500">Kategori: Keluarga</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                Ruang Serbaguna Lt. 2
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('events.show', 1) }}" class="text-secondary-600 hover:text-secondary-900 border border-secondary-600 px-4 py-2 rounded-md hover:bg-secondary-50 transition">Detail</a>
                            </td>
                        </tr>
                        <!-- Item 2 -->
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center text-primary-800 font-bold">15 Okt 2026</div>
                                <div class="text-sm text-slate-500">19:00 WIB</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-primary-800">Ibadah Padang Pemuda</div>
                                <div class="text-sm text-slate-500">Kategori: Pemuda/Remaja</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                Taman Wisata Alam
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('events.show', 2) }}" class="text-secondary-600 hover:text-secondary-900 border border-secondary-600 px-4 py-2 rounded-md hover:bg-secondary-50 transition">Detail</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Card View for Mobile -->
            <div class="md:hidden space-y-4">
                <!-- Mobile Item 1 -->
                <div class="bg-white p-5 rounded-lg shadow-sm border border-tertiary">
                    <div class="flex justify-between items-start mb-2">
                        <div class="text-primary-800 font-bold">12 Okt <span class="text-slate-500 font-normal text-sm ml-1">18:00 WIB</span></div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-100 text-primary-800">Keluarga</span>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800">Seminar Keluarga Muda</h3>
                    <p class="text-sm text-slate-500 mt-1">📍 Ruang Serbaguna Lt. 2</p>
                    <div class="mt-4">
                        <a href="{{ route('events.show', 1) }}" class="block text-center w-full text-secondary-600 border border-secondary-600 px-4 py-2 rounded-md hover:bg-secondary-50">Lihat Detail</a>
                    </div>
                </div>
                <!-- Mobile Item 2 -->
                <div class="bg-white p-5 rounded-lg shadow-sm border border-tertiary">
                    <div class="flex justify-between items-start mb-2">
                        <div class="text-primary-800 font-bold">15 Okt <span class="text-slate-500 font-normal text-sm ml-1">19:00 WIB</span></div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary-100 text-secondary-800">Pemuda</span>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800">Ibadah Padang Pemuda</h3>
                    <p class="text-sm text-slate-500 mt-1">📍 Taman Wisata Alam</p>
                    <div class="mt-4">
                        <a href="{{ route('events.show', 2) }}" class="block text-center w-full text-secondary-600 border border-secondary-600 px-4 py-2 rounded-md hover:bg-secondary-50">Lihat Detail</a>
                    </div>
                </div>
                <div class="pt-4 text-center">
                    <a href="{{ route('events.index') }}" class="text-secondary-600 font-medium border border-secondary-600 px-4 py-2 rounded-md inline-block w-full">Lihat Semua Kegiatan</a>
                </div>
            </div>
        </div>
    </div>
