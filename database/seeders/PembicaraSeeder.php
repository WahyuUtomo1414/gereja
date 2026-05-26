<?php

namespace Database\Seeders;

use App\Models\Pembicara;
use Illuminate\Database\Seeder;

class PembicaraSeeder extends Seeder
{
    /**
     * Seed master data for pembicara.
     */
    public function run(): void
    {
        $items = [
            [
                'nama' => 'Pdt. Elisa Wattimena',
                'foto' => null,
                'jabatan' => 'Pendeta Jemaat',
                'latar_belakang' => 'Melayani dalam pembinaan jemaat dan pelayanan firman mingguan.',
            ],
            [
                'nama' => 'Pnt. Maxi Narua',
                'foto' => null,
                'jabatan' => 'Koordinator Pemuda',
                'latar_belakang' => 'Aktif mendampingi pelayanan pemuda dan remaja di jemaat.',
            ],
            [
                'nama' => 'Pdt. Daniel Sopacua',
                'foto' => null,
                'jabatan' => 'Koordinator Diakonia',
                'latar_belakang' => 'Terlibat dalam pelayanan sosial jemaat dan penguatan relasi dengan masyarakat.',
            ],
        ];

        foreach ($items as $item) {
            Pembicara::updateOrCreate(
                ['nama' => $item['nama']],
                [
                    'foto' => $item['foto'],
                    'jabatan' => $item['jabatan'],
                    'latar_belakang' => $item['latar_belakang'],
                    'active' => true,
                    'created_by' => 1,
                    'updated_by' => 1,
                ]
            );
        }
    }
}
