<?php

namespace Database\Seeders;

use App\Enums\StatusKegiatan;
use App\Models\JenisKegiatan;
use App\Models\Kegiatan;
use App\Models\Pembicara;
use App\Models\User;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Seed kegiatan data.
     */
    public function run(): void
    {
        $ketuaPelaksana = User::query()->where('email', 'ketua.panitia@gereja.test')->first();

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
                'thumbnail' => 'https://images.unsplash.com/photo-1544427928-c49cd7f40173?auto=format&fit=crop&w=1200&q=80',
                'foto' => null,
                'kebutuhan_kegiatan' => "Terbuka untuk jemaat dan pengunjung umum.\nJemaat diharapkan hadir 15 menit sebelum ibadah dimulai.\nMengikuti ibadah dengan tertib dan menjaga suasana khidmat.\nJika mendaftar sebagai peserta, pastikan data akun sudah sesuai.",
                'status' => StatusKegiatan::PENDAFTARAN_DIBUKA->value,
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
                'thumbnail' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=1200&q=80',
                'foto' => null,
                'kebutuhan_kegiatan' => "Terbuka untuk jemaat dan pengunjung umum.\nJemaat diharapkan hadir 15 menit sebelum ibadah dimulai.\nMengikuti ibadah dengan tertib dan menjaga suasana khidmat.\nJika mendaftar sebagai peserta, pastikan data akun sudah sesuai.",
                'status' => StatusKegiatan::PENDAFTARAN_DIBUKA->value,
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
                'thumbnail' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=1200&q=80',
                'foto' => null,
                'kebutuhan_kegiatan' => "Terbuka untuk jemaat dan pengunjung umum.\nJemaat diharapkan hadir 15 menit sebelum ibadah dimulai.\nMengikuti ibadah dengan tertib dan menjaga suasana khidmat.\nJika mendaftar sebagai peserta, pastikan data akun sudah sesuai.",
                'status' => StatusKegiatan::PENDAFTARAN_DIBUKA->value,
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
                    'created_by' => $ketuaPelaksana?->id ?? 1,
                    'updated_by' => $ketuaPelaksana?->id ?? 1,
                ]
            );
        }
    }
}
