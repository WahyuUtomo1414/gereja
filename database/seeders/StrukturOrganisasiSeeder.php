<?php

namespace Database\Seeders;

use App\Models\StrukturOrganisasi;
use Illuminate\Database\Seeder;

class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Seed PHBG core committee structure.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Bpk. Daniel Laisatamu',
                'jabatan' => 'Ketua',
                'order' => 1,
            ],
            [
                'nama' => 'Pnt. Bpk. Maxi Narua',
                'jabatan' => 'Wakil Ketua (Ex-Officio)',
                'order' => 2,
            ],
            [
                'nama' => 'Nn. Reinstyn Lelapary',
                'jabatan' => 'Sekretaris I',
                'order' => 3,
            ],
            [
                'nama' => 'Nn. Sensya Melly Lelapary',
                'jabatan' => 'Sekretaris II',
                'order' => 4,
            ],
            [
                'nama' => 'Bpk. Jony Lelapary',
                'jabatan' => 'Bendahara I',
                'order' => 5,
            ],
            [
                'nama' => 'Ibu. Mersy Laisatamu/Lelapary',
                'jabatan' => 'Bendahara II',
                'order' => 6,
            ],
            [
                'nama' => 'Ibu. Rode Kailola',
                'jabatan' => 'Ketua Sie Acara',
                'order' => 7,
            ],
            [
                'nama' => 'Bpk. Jemy Lelapary',
                'jabatan' => 'Ketua Sie Usaha Dana',
                'order' => 8,
            ],
            [
                'nama' => 'Bpk. Remy Luis Lelapary',
                'jabatan' => 'Ketua Sie Perlengkapan',
                'order' => 9,
            ],
            [
                'nama' => 'Ibu. Maryeke Sopamena/Lelapary',
                'jabatan' => 'Ketua Sie Konsumsi',
                'order' => 10,
            ],
        ];

        foreach ($data as $item) {
            StrukturOrganisasi::updateOrCreate(
                ['nama' => $item['nama'], 'jabatan' => $item['jabatan']],
                [
                    'foto' => null,
                    'order' => $item['order'],
                    'active' => true,
                    'created_by' => 1,
                    'updated_by' => 1,
                ]
            );
        }
    }
}
