<?php

namespace Database\Seeders;

use App\Models\Sambutan;
use Illuminate\Database\Seeder;

class SambutanSeeder extends Seeder
{
    public function run(): void
    {
        Sambutan::query()->updateOrCreate(
            ['nama' => 'Pdt. Elisa Wattimena'],
            [
                'foto' => null,
                'jabatan' => 'Pendeta Jemaat',
                'deskripsi' => '<p>Shalom. Dengan penuh sukacita kami menyambut setiap jemaat dan pengunjung yang hadir di ruang digital Gereja Protestan Maluku. Website ini kami hadirkan agar informasi pelayanan, kegiatan, dan persekutuan dapat diakses dengan lebih mudah, hangat, dan teratur.</p><p>Kiranya melalui setiap ibadah, pelayanan, dan karya kasih yang kita jalani bersama, jemaat semakin bertumbuh dalam iman, pengharapan, dan kasih di dalam Kristus.</p>',
                'active' => true,
                'created_by' => 1,
                'updated_by' => 1,
            ]
        );
    }
}
