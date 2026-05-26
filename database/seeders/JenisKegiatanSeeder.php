<?php

namespace Database\Seeders;

use App\Models\JenisKegiatan;
use Illuminate\Database\Seeder;

class JenisKegiatanSeeder extends Seeder
{
    /**
     * Seed master data for jenis kegiatan.
     */
    public function run(): void
    {
        $items = [
            'Ibadah' => 'Kegiatan ibadah rutin dan ibadah khusus jemaat.',
            'Pemuda/Remaja' => 'Kegiatan pembinaan, persekutuan, dan pelayanan bagi pemuda dan remaja.',
            'Sosial' => 'Kegiatan diakonia, pelayanan masyarakat, dan bakti sosial.',
        ];

        foreach ($items as $nama => $deskripsi) {
            JenisKegiatan::updateOrCreate(
                ['nama' => $nama],
                [
                    'deskripsi' => $deskripsi,
                    'active' => true,
                    'created_by' => 1,
                    'updated_by' => 1,
                ]
            );
        }
    }
}
