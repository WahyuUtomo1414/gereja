<x-layouts.app>
    @php
        // Dummy data for event detail
        $eventDummy = [
            'id' => $id ?? 1,
            'nama' => 'Seminar Keluarga Bahagia',
            'slug' => 'seminar-keluarga-bahagia',
            'ringkasan' => 'Membangun fondasi kuat untuk keluarga yang harmonis di era digital, dipandu oleh konselor keluarga berpengalaman.',
            'deskripsi' => '<p>Keluarga adalah inti dari komunitas yang sehat. Dalam seminar interaktif ini, kita akan menjelajahi prinsip-prinsip komunikasi yang efektif, resolusi konflik, dan cara menjaga keintiman di tengah kesibukan modern.</p><p>Sesi ini dirancang tidak hanya untuk pasangan suami istri, tetapi juga untuk individu yang ingin mempersiapkan diri untuk pernikahan. Melalui diskusi terbuka, studi kasus, dan latihan praktis, peserta akan dilengkapi dengan alat untuk membangun "sanctuary" atau tempat perlindungan yang damai di dalam rumah mereka sendiri.</p>',
            'tanggal' => '2026-08-24',
            'jam_mulai' => '09:00:00',
            'jam_selesai' => '15:00:00',
            'lokasi' => 'Aula Utama Digital Sanctuary',
            'lokasi_alamat' => 'Jl. Damai Sejahtera No. 12, Jakarta',
            'kuota' => 100,
            'kuota_terisi' => 75,
            'status' => 'Pendaftaran Dibuka',
            'foto' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA0blteT0-ACTbv-n-2knaG-TaEQN6qYj4ynrglvCbQHzdsJ1TaeCAHvQ0TIz909RK3vIduFxbswVnT6gmR-6TVf00fTh3paxFWHWCspRk5Sfsqm5RWzuQd3pn_L6SnHmsljuwMmBLT7ZEE2i9ujpykgsSf2wx3Uzv-9_uf1-BWWJee64QnAg4YUS3pe2MG3wDv5or0FXFKsrpeMpwj-SvT6dthraS1LNB1l6XpdywDAwgD1GhEeTynNV0_lW-lHQoWgbI2rbTf2_M',
            'jenis_kegiatan' => [
                'id' => 5,
                'nama' => 'Pernikahan & Keluarga'
            ],
            'pembicara' => [
                [
                    'nama' => 'Bpk. Andreas Susanto',
                    'foto' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC6WNR7PLTMkfei3I40enMCxG8u0DWvePykYE9TCPqwXkxBwbulh-8rWqfNe-f_SJ9oRkzPkne_aOji6tzgo3qP6zYJAKaynevbB8kUixwZmG-2AbdoB4d0xI6Us61mgE3flCHGnElyxS7eTUp62BVcsVaNI46Ub5Iz-kMDnTq9_0rqCLpuhySRRB4HMQQnJEQqiPQxrbWns25jVwnbn3mOrvFpKkg2PRfv4r83ffUWdGOX-qF8g-cnVtNdiypUpzgK0rZ-Up6uhIM',
                    'jabatan' => 'Konselor Keluarga Senior'
                ],
                [
                    'nama' => 'Ibu Maria Susanto',
                    'foto' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuApVjARNUP6QPx_WIxjWFLHpKpOG0Alz5t0DnTvkc2BHqBAitNQllJmo_-NVLOkTrmgf6t3Pz2zsDrI3JFaIq_ctKggsV5BCXRK1xjuvkH1Wp9Am4uhH6Sk8kxWu3yGIwOYQ7GC6SV90VHRLO0JLQXZyZ5zw4YcKnTm3BDufBZxthfZxo7B47pBYcn1cxoBKlpwXCgUnXIqOhHdGRWj3kwnzVlchw0zTHxz7fejYajyRCWmk_TtmI9iemj5Usod8m0EttF30iC-hxE',
                    'jabatan' => 'Praktisi Psikologi Anak'
                ]
            ],
            'syarat_ketentuan' => '<li>Terbuka untuk umum, pasangan menikah maupun lajang.</li><li>Wajib mendaftar sebelum H-2 acara.</li><li>Diharapkan hadir 15 menit sebelum acara dimulai.</li><li>Membawa alat tulis (opsional).</li>'
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
            return $item->jenis_kegiatan_nama ?? 'Umum';
        };

        $formatDateIndo = function($dateStr, $timeStr = null) {
            try {
                $date = \Carbon\Carbon::parse($dateStr);
                $days = ['Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];
                $months = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                
                $dayEng = $date->format('l');
                $monthEng = $date->format('F');
                
                $dayInd = $days[$dayEng] ?? $dayEng;
                $monthInd = $months[$monthEng] ?? $monthEng;
                
                $timeFormatted = $timeStr ? ' • ' . \Carbon\Carbon::parse($timeStr)->format('H:i') . ' WIT' : '';
                
                return $dayInd . ', ' . $date->format('d') . ' ' . $monthInd . ' ' . $date->format('Y') . $timeFormatted;
            } catch (\Exception $e) {
                return $dateStr . ($timeStr ? ' • ' . $timeStr : '');
            }
        };
        
        $kegiatanDetail = isset($kegiatan) ? $kegiatan : $eventDummy;
    @endphp

    <x-slot name="title">{{ $getVal($kegiatanDetail, 'nama') }} - Gereja Protestan Maluku</x-slot>

    <!-- Hero Banner component -->
    <x-events.detail.hero :event="$kegiatanDetail" :getVal="$getVal" :getCategoryName="$getCategoryName" />

    <!-- Content Sections Wrapper -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Left Column (Details) -->
            <div class="lg:col-span-8 space-y-12">
                <!-- Info Section -->
                <x-events.detail.info :event="$kegiatanDetail" :getVal="$getVal" />
                
                <!-- Speakers Section -->
                <x-events.detail.speakers :event="$kegiatanDetail" :getVal="$getVal" />
                
                <!-- Requirements Section -->
                <x-events.detail.requirements :event="$kegiatanDetail" :getVal="$getVal" />
            </div>

            <!-- Right Column (Sidebar Cards) -->
            <div class="lg:col-span-4 relative">
                <x-events.detail.register :event="$kegiatanDetail" :getVal="$getVal" :formatDateIndo="$formatDateIndo" />
            </div>
        </div>
    </div>

    <!-- Final CTA Section -->
    <x-home.final-cta />
</x-layouts.app>
