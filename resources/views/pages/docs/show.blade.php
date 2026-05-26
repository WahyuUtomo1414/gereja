<x-layouts.app>
    @php
        // Dummy data for activity report detail
        $reportDummy = [
            'id' => $id ?? 1,
            'nama' => 'Ibadah Syukur Paskah 2026',
            'slug' => 'ibadah-syukur-paskah-2026',
            'ringkasan' => 'Pelaksanaan perayaan Paskah bersama dengan penuh sukacita dan kedamaian, dihadiri oleh seluruh jemaat.',
            'deskripsi' => '<p>Puji Tuhan Yesus Kristus, seluruh rangkaian ibadah syukur Paskah Jemaat GPM Ambon tahun 2026 telah terlaksana dengan sangat khidmat, lancar, dan penuh sukacita. Ibadah Paskah yang dimulai sejak pukul 05.00 WIT (Fajar Paskah) hingga Ibadah Raya Paskah pukul 09.00 WIT dihadiri oleh ratusan kepala keluarga dan jemaat.</p><p>Pembawaan firman mengajak seluruh jemaat untuk merenungkan makna kebangkitan Kristus sebagai sumber kekuatan baru dalam memelihara kerukunan, iman yang teguh, dan terus melayani dengan hati yang tulus dalam kehidupan bermasyarakat sehari-hari. Terima kasih atas partisipasi aktif seluruh panitia, paduan suara, serta jemaat sekalian.</p>',
            'tanggal' => '2026-04-05',
            'jam_mulai' => '05:00:00',
            'jam_selesai' => '11:00:00',
            'lokasi' => 'Main Sanctuary GPM',
            'lokasi_alamat' => 'Jl. Pattimura No. 10, Kel. Uritetu, Kec. Sirimau, Kota Ambon',
            'foto' => 'https://images.unsplash.com/photo-1444427928-c49cd7f40173?auto=format&fit=crop&w=1200&q=80',
            'jenis_kegiatan' => [
                'id' => 1,
                'nama' => 'Ibadah'
            ],
            'pembicara' => [
                [
                    'nama' => 'Pdt. Johanes Latupapua, M.Th',
                    'foto' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=150&q=80',
                    'jabatan' => 'Pendeta Jemaat GPM Ambon'
                ]
            ],
            'foto_kegiatan' => [
                ['foto' => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=600&q=80', 'nama' => 'Prosesi Fajar Paskah Jemaat GPM'],
                ['foto' => 'https://images.unsplash.com/photo-1544027983-3ef1a0043c92?auto=format&fit=crop&w=600&q=80', 'nama' => 'Paduan Suara Wadah Pelayanan Perempuan'],
                ['foto' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&w=600&q=80', 'nama' => 'Ibadah Raya Paskah Pukul 09.00 WIT'],
                ['foto' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?auto=format&fit=crop&w=600&q=80', 'nama' => 'Pembagian Telur Paskah untuk Anak Sekolah Minggu']
            ]
        ];

        // Helpers to safely fetch data from arrays or objects
        $getVal = function($item, $key, $default = '') {
            if (is_array($item)) {
                return $item[$key] ?? $default;
            }
            return $item->$key ?? $default;
        };

        $getCategoryName = function($item) {
            if (is_array($item)) {
                return $item['jenis_kegiatan']['nama'] ?? $item['jenis_kegiatan_nama'] ?? 'Umum';
            }
            if (isset($item->jenisKegiatan)) {
                return $item->jenisKegiatan->nama;
            }
            return $item->jenis_keg_nama ?? 'Umum';
        };

        $formatDateIndo = function($dateStr) {
            try {
                $date = \Carbon\Carbon::parse($dateStr);
                $days = ['Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];
                $months = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                
                $dayEng = $date->format('l');
                $monthEng = $date->format('F');
                
                $dayInd = $days[$dayEng] ?? $dayEng;
                $monthInd = $months[$monthEng] ?? $monthEng;
                
                return $dayInd . ', ' . $date->format('d') . ' ' . $monthInd . ' ' . $date->format('Y');
            } catch (\Exception $e) {
                return $dateStr;
            }
        };
        
        $laporanDetail = isset($laporan) ? $laporan : $reportDummy;
    @endphp

    <x-slot name="title">{{ $getVal($laporanDetail, 'nama') }} - Laporan Kegiatan - Gereja Protestan Maluku</x-slot>

    <!-- Hero Banner Component -->
    <x-docs.detail.hero :laporan="$laporanDetail" :getVal="$getVal" :getCategoryName="$getCategoryName" />

    <!-- Content Sections Wrapper -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Left Column (Details & Gallery) -->
            <div class="lg:col-span-8 space-y-12">
                <!-- Info Section -->
                <x-docs.detail.info :laporan="$laporanDetail" :getVal="$getVal" />
                
                <!-- 2-Column Gallery Section -->
                <x-docs.detail.gallery :laporan="$laporanDetail" :getVal="$getVal" />
            </div>

            <!-- Right Column (Sidebar Card with CTA) -->
            <div class="lg:col-span-4 relative">
                <x-docs.detail.sidebar :laporan="$laporanDetail" :getVal="$getVal" :formatDateIndo="$formatDateIndo" />
            </div>
        </div>
    </div>
</x-layouts.app>
