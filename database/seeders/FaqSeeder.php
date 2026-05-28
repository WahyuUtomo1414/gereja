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
                'pertanyaan' => 'Apakah pengunjung baru boleh datang ke gereja?',
                'jawaban' => 'Tentu. Pengunjung baru sangat dipersilakan untuk datang dan mengikuti ibadah atau kegiatan yang terbuka untuk umum. Gereja terbuka bagi siapa saja yang ingin beribadah, belajar, dan bertumbuh bersama.',
            ],
            [
                'pertanyaan' => 'Saya baru ingin mengenal iman Kristen, apakah boleh ikut kegiatan?',
                'jawaban' => 'Boleh. Anda dapat mengikuti ibadah atau kegiatan yang terbuka untuk umum. Jika membutuhkan arahan lebih lanjut, Anda juga dapat menghubungi pihak gereja agar dibantu mendapatkan informasi yang sesuai.',
            ],
            [
                'pertanyaan' => 'Di mana saya bisa melihat jadwal ibadah dan kegiatan gereja?',
                'jawaban' => 'Jadwal ibadah dan kegiatan gereja dapat dilihat melalui menu Jadwal Kegiatan. Pada halaman tersebut tersedia informasi tanggal, waktu, lokasi, dan detail kegiatan yang sedang atau akan dilaksanakan.',
            ],
            [
                'pertanyaan' => 'Apakah saya harus punya akun untuk mendaftar kegiatan?',
                'jawaban' => 'Ya, akun diperlukan jika Anda ingin mendaftar sebagai peserta kegiatan tertentu. Akun membantu proses pendataan peserta agar lebih rapi dan memudahkan panitia dalam mengelola kehadiran.',
            ],
            [
                'pertanyaan' => 'Bagaimana jika saya membutuhkan informasi lebih lanjut?',
                'jawaban' => 'Anda dapat menghubungi kontak gereja yang tersedia di website. Pihak gereja akan membantu memberikan informasi terkait ibadah, kegiatan, pelayanan, atau hal lain yang ingin Anda ketahui.',
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
