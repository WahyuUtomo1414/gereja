<?php

namespace Database\Seeders;

use App\Models\JenisKegiatan;
use App\Models\Kegiatan;
use App\Models\Pembicara;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Seed kegiatan data.
     */
    public function run(): void
    {
        $ibadah = JenisKegiatan::where('nama', 'Ibadah')->firstOrFail();
        $pemuda = JenisKegiatan::where('nama', 'Pemuda/Remaja')->firstOrFail();
        $sosial = JenisKegiatan::where('nama', 'Sosial')->firstOrFail();

        $pendetaJemaat = Pembicara::where('nama', 'Pdt. Elisa Wattimena')->firstOrFail();
        $koordinatorPemuda = Pembicara::where('nama', 'Pnt. Maxi Narua')->firstOrFail();
        $koordinatorDiakonia = Pembicara::where('nama', 'Pdt. Daniel Sopacua')->firstOrFail();

        $kegiatan = [
            [
                'slug' => 'ibadah-raya-minggu-ke-2',
                'jenis_kegiatan_id' => $ibadah->id,
                'nama' => 'Ibadah Raya Minggu Ke-2',
                'ringkasan' => 'Ibadah mingguan bersama seluruh jemaat untuk bersekutu, memuji Tuhan, dan mendengarkan firman-Nya.',
                'deskripsi' => 'Ibadah Raya Minggu Ke-2 menjadi momen persekutuan seluruh jemaat untuk datang beribadah bersama dalam suasana yang hangat, tertib, dan penuh sukacita. Jemaat diajak untuk mempersiapkan hati, hadir tepat waktu, dan mengikuti seluruh rangkaian liturgi hingga selesai.',
                'tanggal' => '2026-06-12',
                'jam_mulai' => '09:00:00',
                'jam_selesai' => '11:00:00',
                'lokasi' => 'Gedung Gereja Utama GPM Sohuru',
                'pembicara_id' => $pendetaJemaat->id,
                'kuota' => null,
                'thumbnail' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC0SyV6_AD3OqBUbhxeaquqLeEQpqESYZ5wprk3v8qfUxTOu45P1WUgi9JWUisDQZizV0Th-uoECnkFDiof-IWCmXmEDIoiq_0XFDJAZopYvD6eTi3lBqiHiOGp8q7J9oftCOYcekaUI9P_eBKtbQLWn0pEWRj7QtfNxqHKqw1Z3DIFKloDShcCB94adUzJf8SDA4giNjRdOoW35lkvYrjhsLqgTyZ2x8AZxx4d5S6hzAVAmw0dRwsMlpbKDBZ27VqDNIS9yLP1LBc',
                'foto' => null,
                'kebutuhan_kegiatan' => 'Jemaat diharapkan hadir 15 menit sebelum ibadah dimulai dan menjaga ketertiban selama ibadah berlangsung.',
                'status' => 'Pendaftaran Dibuka',
            ],
            [
                'slug' => 'ibadah-padang-pemuda',
                'jenis_kegiatan_id' => $pemuda->id,
                'nama' => 'Ibadah Padang Pemuda',
                'ringkasan' => 'Persekutuan padang bagi pemuda dan remaja untuk mempererat kebersamaan, pujian, dan refleksi firman Tuhan.',
                'deskripsi' => 'Kegiatan ini dirancang untuk membangun kebersamaan pemuda dan remaja dalam suasana terbuka melalui ibadah, pujian, games rohani, dan sesi penguatan iman. Peserta diharapkan menjaga kebersihan lokasi dan mengikuti arahan panitia selama kegiatan berlangsung.',
                'tanggal' => '2026-06-15',
                'jam_mulai' => '15:30:00',
                'jam_selesai' => '19:00:00',
                'lokasi' => 'Taman Wisata Alam Sohuru',
                'pembicara_id' => $koordinatorPemuda->id,
                'kuota' => 100,
                'thumbnail' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBVtu4cC4HQJAVPLe5MiPpYjUrnG_MBdFQ2F4Dtml3JgLJnjzQYcaL-VNXv3UpsWkboUHqlW2XVPL0gXRQvTdl-GgZN8KrnaM4edgjJD8IHd1zNdsGWtXTCg2jkmgcNQv8xs0WaOCW6ijPyhTal9Cs7K32TcPs3jvri3QxiFuZXbMmnVHmNuJyh4ejkYwkzoaztMUDdwyrY9DLU-pEP1pH0GHPkzzFEE9xmYifO-gVCcQcfPafyxyXwWRzU2pAehwDACXq5UlKZkvU',
                'foto' => null,
                'kebutuhan_kegiatan' => 'Peserta membawa Alkitab, alat tulis, air minum pribadi, dan mengenakan pakaian yang sopan serta nyaman untuk kegiatan luar ruangan.',
                'status' => 'Pendaftaran Dibuka',
            ],
            [
                'slug' => 'bakti-sosial-desa-mekar',
                'jenis_kegiatan_id' => $sosial->id,
                'nama' => 'Bakti Sosial Desa Mekar',
                'ringkasan' => 'Pelayanan sosial jemaat melalui pembagian sembako dan dukungan pastoral bagi masyarakat sekitar.',
                'deskripsi' => 'Bakti Sosial Desa Mekar merupakan wujud nyata pelayanan kasih gereja kepada masyarakat. Kegiatan meliputi pembagian sembako, doa bersama, kunjungan kasih, dan pelayanan dukungan moral bagi warga yang membutuhkan.',
                'tanggal' => '2026-06-18',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '13:00:00',
                'lokasi' => 'Desa Mekar Jaya',
                'pembicara_id' => $koordinatorDiakonia->id,
                'kuota' => 50,
                'thumbnail' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC-XAh6EcczWORb_EqVCjYvpJcVE7t9lkmBydKS7_VqtpP_dPZRDgRQZnnHIWC0fZz9Rw2zBg0cexWEFVZsdCT2cEYDDJBZL_n3SU0uf7LIHwHAmq2-4eWDjIMIykUdTiPCBOOoE0GNz9bwUCU4c_kksdKzi0q_ZZvbxo_EJFMEalAsKMwDN4vYVMLNPFtunvpC5V2cNjccz44DY1aQlBYsGGxlarkTx79Dvfp7km6FxjUArIoBCQEtKCGmVFYLzTUNQljtiiLa3HQ',
                'foto' => null,
                'kebutuhan_kegiatan' => 'Peserta pelayanan diharapkan hadir tepat waktu, membawa perlengkapan pribadi secukupnya, dan siap mengikuti briefing panitia sebelum keberangkatan.',
                'status' => 'Pendaftaran Dibuka',
            ],
        ];

        foreach ($kegiatan as $item) {
            Kegiatan::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'jenis_kegiatan_id' => $item['jenis_kegiatan_id'],
                    'nama' => $item['nama'],
                    'ringkasan' => $item['ringkasan'],
                    'deskripsi' => $item['deskripsi'],
                    'tanggal' => $item['tanggal'],
                    'jam_mulai' => $item['jam_mulai'],
                    'jam_selesai' => $item['jam_selesai'],
                    'lokasi' => $item['lokasi'],
                    'pembicara_id' => $item['pembicara_id'],
                    'kuota' => $item['kuota'],
                    'thumbnail' => $item['thumbnail'],
                    'foto' => $item['foto'],
                    'kebutuhan_kegiatan' => $item['kebutuhan_kegiatan'],
                    'status' => $item['status'],
                    'active' => true,
                    'created_by' => 1,
                    'updated_by' => 1,
                ]
            );
        }
    }
}
