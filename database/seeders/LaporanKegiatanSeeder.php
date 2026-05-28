<?php

namespace Database\Seeders;

use App\Enums\StatusKegiatan;
use App\Models\FotoKegiatan;
use App\Models\JenisKegiatan;
use App\Models\Kegiatan;
use App\Models\Pembicara;
use App\Models\User;
use Illuminate\Database\Seeder;

class LaporanKegiatanSeeder extends Seeder
{
    public function run(): void
    {
        $ketuaPelaksana = User::query()->where('email', 'ketua.panitia@gereja.test')->first();

        $ibadah = JenisKegiatan::query()->where('nama', 'Ibadah')->firstOrFail();
        $sosial = JenisKegiatan::query()->where('nama', 'Sosial')->firstOrFail();

        $pendetaJemaat = Pembicara::query()->where('nama', 'Pdt. Elisa Wattimena')->firstOrFail();
        $koordinatorDiakonia = Pembicara::query()->where('nama', 'Pdt. Daniel Sopacua')->firstOrFail();

        $laporanKegiatan = [
            [
                'slug' => 'laporan-ibadah-syukur-paskah-2026',
                'jenis_kegiatan_id' => $ibadah->id,
                'nama' => 'Laporan Ibadah Syukur Paskah 2026',
                'ringkasan' => 'Ibadah syukur Paskah terlaksana dengan penuh sukacita, dihadiri jemaat lintas sektor, dan berjalan tertib sampai selesai.',
                'deskripsi' => '<p>Ibadah Syukur Paskah 2026 menjadi salah satu momentum penting persekutuan jemaat untuk merayakan kebangkitan Kristus dalam suasana yang khidmat, tertib, dan penuh pengharapan.</p>',
                'laporan' => '<p>Puji syukur kepada Tuhan, seluruh rangkaian <strong>Ibadah Syukur Paskah 2026</strong> telah terlaksana dengan baik dan membawa sukacita bagi jemaat. Liturgi berjalan tertib, pujian dipersembahkan dengan penuh penghayatan, dan firman Tuhan menjadi penguatan bagi seluruh peserta ibadah.</p><p>Panitia bersyukur karena kehadiran jemaat sangat baik, pelayanan musik dan paduan suara berlangsung lancar, serta koordinasi antar pelayan dapat berjalan efektif. Setelah ibadah selesai, jemaat juga mengikuti ramah tamah singkat yang mempererat kebersamaan antar keluarga gereja.</p><p>Melalui kegiatan ini, gereja kembali diingatkan untuk hidup dalam pengharapan kebangkitan, bertumbuh dalam kasih, dan terus menjadi berkat bagi lingkungan sekitar.</p>',
                'tanggal' => '2026-04-05',
                'jam_mulai' => '05:30:00',
                'jam_selesai' => '10:30:00',
                'lokasi' => 'Gedung Gereja Utama GPM Sohuru',
                'pembicara_id' => $pendetaJemaat->id,
                'kuota' => null,
                'thumbnail' => 'https://images.unsplash.com/photo-1504052434569-70ad5836ab65?auto=format&fit=crop&w=1200&q=80',
                'foto' => null,
                'kebutuhan_kegiatan' => 'Ibadah telah terlaksana sesuai agenda liturgi dan dukungan seluruh pelayan.',
                'status' => StatusKegiatan::LAPORAN->value,
                'jumlah_peserta_hadir' => 186,
                'catatan_laporan' => 'Antusiasme jemaat sangat baik dan perlengkapan liturgi tersedia lengkap.',
                'tanggal_laporan' => '2026-04-06 10:00:00',
            ],
            [
                'slug' => 'laporan-bakti-sosial-kasih-sektor-sohuru',
                'jenis_kegiatan_id' => $sosial->id,
                'nama' => 'Laporan Bakti Sosial Kasih Sektor Sohuru',
                'ringkasan' => 'Pelayanan sosial jemaat berjalan lancar melalui pembagian sembako, doa keluarga, dan kunjungan kasih ke warga yang membutuhkan.',
                'deskripsi' => '<p>Kegiatan bakti sosial ini menjadi bentuk nyata kehadiran gereja di tengah masyarakat melalui aksi kasih dan kepedulian yang terarah.</p>',
                'laporan' => '<p>Kegiatan <strong>Bakti Sosial Kasih Sektor Sohuru</strong> dilaksanakan dengan lancar dan melibatkan kolaborasi panitia, pemuda, serta warga jemaat dari beberapa sektor pelayanan. Dalam kegiatan ini, bantuan sembako dibagikan kepada keluarga yang membutuhkan disertai doa dan penguatan pastoral.</p><p>Selain pembagian bantuan, tim pelayanan juga melakukan kunjungan kasih ke beberapa rumah jemaat lanjut usia dan keluarga yang sedang mengalami pergumulan. Sambutan masyarakat sangat baik dan menjadi pengingat bahwa pelayanan gereja harus terus hadir secara nyata.</p><p>Panitia mencatat bahwa koordinasi logistik sudah berjalan efektif, namun untuk kegiatan berikutnya diperlukan penambahan relawan distribusi agar pelayanan lapangan lebih ringan dan cepat.</p>',
                'tanggal' => '2026-04-18',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '13:30:00',
                'lokasi' => 'Balai Pertemuan Jemaat Sohuru',
                'pembicara_id' => $koordinatorDiakonia->id,
                'kuota' => 60,
                'thumbnail' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=1200&q=80',
                'foto' => null,
                'kebutuhan_kegiatan' => 'Distribusi bantuan, kunjungan kasih, dan doa keluarga.',
                'status' => StatusKegiatan::LAPORAN->value,
                'jumlah_peserta_hadir' => 54,
                'catatan_laporan' => 'Perlu tambahan relawan distribusi untuk kegiatan sosial berikutnya.',
                'tanggal_laporan' => '2026-04-18 18:15:00',
            ],
        ];

        foreach ($laporanKegiatan as $item) {
            $kegiatan = Kegiatan::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'jenis_kegiatan_id' => $item['jenis_kegiatan_id'],
                    'nama' => $item['nama'],
                    'ringkasan' => $item['ringkasan'],
                    'deskripsi' => $item['deskripsi'],
                    'laporan' => $item['laporan'],
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
                    'jumlah_peserta_hadir' => $item['jumlah_peserta_hadir'],
                    'catatan_laporan' => $item['catatan_laporan'],
                    'tanggal_laporan' => $item['tanggal_laporan'],
                    'active' => true,
                    'created_by' => $ketuaPelaksana?->id ?? 1,
                    'updated_by' => $ketuaPelaksana?->id ?? 1,
                ]
            );

            $galeri = match ($item['slug']) {
                'laporan-ibadah-syukur-paskah-2026' => [
                    [
                        'nama' => 'Pembukaan Ibadah Syukur Paskah',
                        'foto' => 'https://images.unsplash.com/photo-1519491050282-cf00c82424b4?auto=format&fit=crop&w=1200&q=80',
                    ],
                    [
                        'nama' => 'Pujian Jemaat dan Paduan Suara',
                        'foto' => 'https://images.unsplash.com/photo-1507692049790-de58290a4334?auto=format&fit=crop&w=1200&q=80',
                    ],
                    [
                        'nama' => 'Penyampaian Firman Tuhan',
                        'foto' => 'https://images.unsplash.com/photo-1438232992991-995b7058bbb3?auto=format&fit=crop&w=1200&q=80',
                    ],
                ],
                default => [
                    [
                        'nama' => 'Persiapan dan Pengepakan Bantuan',
                        'foto' => 'https://images.unsplash.com/photo-1469571486292-b53601020f1f?auto=format&fit=crop&w=1200&q=80',
                    ],
                    [
                        'nama' => 'Penyaluran Bantuan kepada Warga',
                        'foto' => 'https://images.unsplash.com/photo-1593113598332-cd59a93a13d1?auto=format&fit=crop&w=1200&q=80',
                    ],
                    [
                        'nama' => 'Doa dan Kunjungan Kasih',
                        'foto' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=1200&q=80',
                    ],
                ],
            };

            foreach ($galeri as $foto) {
                FotoKegiatan::updateOrCreate(
                    [
                        'kegiatan_id' => $kegiatan->id,
                        'nama' => $foto['nama'],
                    ],
                    [
                        'foto' => $foto['foto'],
                        'caption' => $foto['nama'],
                        'active' => true,
                        'created_by' => $ketuaPelaksana?->id ?? 1,
                        'updated_by' => $ketuaPelaksana?->id ?? 1,
                    ]
                );
            }
        }
    }
}
