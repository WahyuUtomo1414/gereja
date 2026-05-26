<?php

namespace Database\Seeders;

use App\Models\Gereja;
use Illuminate\Database\Seeder;

class GerejaSeeder extends Seeder
{
    /**
     * Seed the gereja profile data.
     */
    public function run(): void
    {
        Gereja::updateOrCreate(
            ['nama' => 'Gereja Protestan Maluku'],
            [
                'deskripsi' => 'Gereja Protestan Maluku (GPM) hadir sebagai wujud nyata kasih karunia Tuhan di tengah-tengah masyarakat. Sejak awal berdirinya, GPM berkomitmen untuk menjadi pelita yang menerangi dan garam yang memberi rasa bagi lingkungan sekitar melalui pemberitaan firman dan tindakan kasih yang nyata. Perjalanan pelayanan kami tidak lepas dari dukungan dan doa setiap jemaat. Kami percaya bahwa gereja bukanlah sekadar gedung tempat berkumpul, melainkan persekutuan orang-orang percaya yang dipanggil untuk saling menguatkan, melayani dengan kerendahan hati, dan membawa damai sejahtera bagi dunia.',
                'logo' => 'assets/logo.png',
                'alamat' => 'Jl. Mayor Jenderal DI Panjaitan No.2, Uritetu, Sirimau, Kota Ambon, Maluku 97124, Indonesia',
                'visi' => 'Menjadi Gereja yang terus Bertumbuh, Berakar kuat dalam Firman, dan Berbuah lebat dalam melayani sesama.',
                'misi' => [
                    'Menyelenggarakan ibadah yang khusyuk, inspiratif, dan berpusat pada Kristus untuk membangun spiritualitas jemaat.',
                    'Membangun komunitas sel atau sektor yang saling peduli, menopang, dan mengasihi sebagai satu keluarga Allah.',
                    'Melakukan tindakan diakonia yang berdampak nyata bagi kesejahteraan masyarakat secara fisik, mental, dan rohani.',
                ],
                'no_tlpn' => '+62 911 354004',
                'email' => 'gereja.protestan.maluku@gmail.com',
                'sosial_media' => [
                    'website' => 'https://sinodegpm.id/',
                ],
                'active' => true,
                'created_by' => 1,
                'updated_by' => 1,
            ]
        );
    }
}
