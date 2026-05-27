<?php

namespace Database\Seeders;

use App\Enums\RoleUser;
use App\Models\Jemaat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class JemaatSeeder extends Seeder
{
    /**
     * Seed 20 user+jemaat records.
     */
    public function run(): void
    {
        $password = Hash::make('password');

        $items = [
            ['name' => 'Jamaat', 'email' => 'jamaat@gereja.test', 'alamat' => 'Jl. Raya Sohuru No. 1'],
            ['name' => 'Maria Lelapary', 'email' => 'maria.lelapary@gereja.test', 'alamat' => 'Jl. Bethania No. 2, Sohuru'],
            ['name' => 'Yohanis Sopamena', 'email' => 'yohanis.sopamena@gereja.test', 'alamat' => 'Jl. Kalvari No. 3, Sohuru'],
            ['name' => 'Ruth Laisatamu', 'email' => 'ruth.laisatamu@gereja.test', 'alamat' => 'Jl. Sion No. 4, Sohuru'],
            ['name' => 'Markus Narua', 'email' => 'markus.narua@gereja.test', 'alamat' => 'Jl. Maranatha No. 5, Sohuru'],
            ['name' => 'Elisabeth Heatubun', 'email' => 'elisabeth.heatubun@gereja.test', 'alamat' => 'Jl. Filadelfia No. 6, Sohuru'],
            ['name' => 'Daniel Pattiasina', 'email' => 'daniel.pattiasina@gereja.test', 'alamat' => 'Jl. Imanuel No. 7, Sohuru'],
            ['name' => 'Martha Louhenapessy', 'email' => 'martha.louhenapessy@gereja.test', 'alamat' => 'Jl. Kasih No. 8, Sohuru'],
            ['name' => 'Paulus Risteruw', 'email' => 'paulus.risteruw@gereja.test', 'alamat' => 'Jl. Ebenhaezer No. 9, Sohuru'],
            ['name' => 'Yuliana Patty', 'email' => 'yuliana.patty@gereja.test', 'alamat' => 'Jl. Damai No. 10, Sohuru'],
            ['name' => 'Samuel Keriapy', 'email' => 'samuel.keriapy@gereja.test', 'alamat' => 'Jl. Hosana No. 11, Sohuru'],
            ['name' => 'Febrina Nunumete', 'email' => 'febrina.nunumete@gereja.test', 'alamat' => 'Jl. Pniel No. 12, Sohuru'],
            ['name' => 'Andreas Tefara', 'email' => 'andreas.tefara@gereja.test', 'alamat' => 'Jl. Gloria No. 13, Sohuru'],
            ['name' => 'Mery Latumeten', 'email' => 'mery.latumeten@gereja.test', 'alamat' => 'Jl. Bahtera No. 14, Sohuru'],
            ['name' => 'Jefri Maruanaya', 'email' => 'jefri.maruanaya@gereja.test', 'alamat' => 'Jl. Petra No. 15, Sohuru'],
            ['name' => 'Natalia Aipassa', 'email' => 'natalia.aipassa@gereja.test', 'alamat' => 'Jl. Tabor No. 16, Sohuru'],
            ['name' => 'Hendrik Samkay', 'email' => 'hendrik.samkay@gereja.test', 'alamat' => 'Jl. Kanaan No. 17, Sohuru'],
            ['name' => 'Silvia Wattimena', 'email' => 'silvia.wattimena@gereja.test', 'alamat' => 'Jl. Syalom No. 18, Sohuru'],
            ['name' => 'Benny Lekatompessy', 'email' => 'benny.lekatompessy@gereja.test', 'alamat' => 'Jl. Zion No. 19, Sohuru'],
            ['name' => 'Michella Soplanit', 'email' => 'michella.soplanit@gereja.test', 'alamat' => 'Jl. Harapan No. 20, Sohuru'],
        ];

        foreach ($items as $item) {
            $user = User::query()->updateOrCreate(
                ['email' => $item['email']],
                [
                    'name' => $item['name'],
                    'email_verified_at' => now(),
                    'password' => $password,
                ]
            );

            $user->syncRoles([RoleUser::JAMAAT->value]);

            Jemaat::query()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'nama' => $item['name'],
                    'email' => $item['email'],
                    'alamat' => $item['alamat'],
                    'foto' => null,
                    'active' => true,
                    'created_by' => 1,
                    'updated_by' => 1,
                ]
            );
        }
    }
}
