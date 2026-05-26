<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Seed FAQ data for the homepage.
     */
    public function run(): void
    {
        $items = [
            [
                'pertanyaan' => 'Apakah saya harus punya akun untuk mendaftar kegiatan?',
                'jawaban' => 'Ya, untuk memudahkan pendataan dan memastikan Anda tidak perlu mengisi data berulang kali, jemaat perlu membuat akun sebelum mendaftar ke kegiatan tertentu.',
            ],
            [
                'pertanyaan' => 'Bagaimana cara mengajukan acara gereja?',
                'jawaban' => 'Setelah memiliki akun dan masuk ke sistem, buka menu pengajuan acara, isi formulir dengan lengkap, lalu tunggu proses peninjauan dari tim gereja atau majelis.',
            ],
            [
                'pertanyaan' => 'Apakah pengunjung baru boleh mengikuti kegiatan?',
                'jawaban' => 'Tentu. Pengunjung baru sangat dipersilakan mengikuti kegiatan yang terbuka untuk umum. Untuk beberapa kegiatan tertentu, pendaftaran tetap diperlukan demi kenyamanan dan pendataan.',
            ],
            [
                'pertanyaan' => 'Apakah semua kegiatan memiliki batas kuota peserta?',
                'jawaban' => 'Tidak semua. Beberapa kegiatan terbuka untuk umum tanpa batas kuota, sedangkan kegiatan tertentu seperti seminar, retreat, atau pelayanan lapangan biasanya memiliki kuota peserta.',
            ],
        ];

        foreach ($items as $item) {
            Faq::updateOrCreate(
                ['pertanyaan' => $item['pertanyaan']],
                [
                    'jawaban' => $item['jawaban'],
                    'active' => true,
                    'created_by' => 1,
                    'updated_by' => 1,
                ]
            );
        }
    }
}
