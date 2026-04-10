<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class ConservationSeeder extends Seeder
{
    public function run(): void
    {
        $conservations = [
            ['code' => 'CF-BG-01', 'division_id' => 1, 'conservation_name_en' => 'Bangui land office', 'conservation_name_fr' => 'Conservation foncière Bangui'],
            ['code' => 'CF-MB-01', 'division_id' => 2, 'conservation_name_en' => 'Mbomou land office', 'conservation_name_fr' => 'Conservation foncière Mbomou'],
            ['code' => 'CF-BK-01', 'division_id' => 3, 'conservation_name_en' => 'Basse-Kotto land office', 'conservation_name_fr' => 'Conservation foncière Basse-Kotto'],
            ['code' => 'CF-KE-01', 'division_id' => 4, 'conservation_name_en' => 'Kémo land office', 'conservation_name_fr' => 'Conservation foncière Kémo'],
            ['code' => 'CF-NM-01', 'division_id' => 5, 'conservation_name_en' => 'Nana-Mambéré land office', 'conservation_name_fr' => 'Conservation foncière Nana-Mambéré'],
            ['code' => 'CF-OH-01', 'division_id' => 6, 'conservation_name_en' => 'Ouham land office', 'conservation_name_fr' => 'Conservation foncière Ouham'],
            ['code' => 'CF-SM-01', 'division_id' => 7, 'conservation_name_en' => 'Sangha-Mbaéré land office', 'conservation_name_fr' => 'Conservation foncière Sangha-Mbaéré'],
            ['code' => 'CF-LB-01', 'division_id' => 8, 'conservation_name_en' => 'Lobaye land office', 'conservation_name_fr' => 'Conservation foncière Lobaye'],
            ['code' => 'CF-OM-01', 'division_id' => 9, 'conservation_name_en' => 'Ombella-M\'Poko land office', 'conservation_name_fr' => 'Conservation foncière Ombella-M\'Poko'],
            ['code' => 'CF-OP-01', 'division_id' => 10, 'conservation_name_en' => 'Ouham-Pendé land office', 'conservation_name_fr' => 'Conservation foncière Ouham-Pendé'],
            ['code' => 'CF-HM-01', 'division_id' => 11, 'conservation_name_en' => 'Haut-Mbomou land office', 'conservation_name_fr' => 'Conservation foncière Haut-Mbomou'],
            ['code' => 'CF-OU-01', 'division_id' => 12, 'conservation_name_en' => 'Ouaka land office', 'conservation_name_fr' => 'Conservation foncière Ouaka'],
            ['code' => 'CF-HK-01', 'division_id' => 13, 'conservation_name_en' => 'Haute-Kotto land office', 'conservation_name_fr' => 'Conservation foncière Haute-Kotto'],
            ['code' => 'CF-BB-01', 'division_id' => 14, 'conservation_name_en' => 'Bamingui-Bangoran land office', 'conservation_name_fr' => 'Conservation foncière Bamingui-Bangoran'],
            ['code' => 'CF-VK-01', 'division_id' => 15, 'conservation_name_en' => 'Vakaga land office', 'conservation_name_fr' => 'Conservation foncière Vakaga'],
            ['code' => 'CF-NG-01', 'division_id' => 16, 'conservation_name_en' => 'Nana-Grébizi land office', 'conservation_name_fr' => 'Conservation foncière Nana-Grébizi'],
            ['code' => 'CF-MK-01', 'division_id' => 17, 'conservation_name_en' => 'Mambéré-Kadéï land office', 'conservation_name_fr' => 'Conservation foncière Mambéré-Kadéï'],
            ['code' => 'CF-MM-01', 'division_id' => 18, 'conservation_name_en' => 'Mambéré land office', 'conservation_name_fr' => 'Conservation foncière Mambéré'],
            ['code' => 'CF-LP-01', 'division_id' => 19, 'conservation_name_en' => 'Lim-Pendé land office', 'conservation_name_fr' => 'Conservation foncière Lim-Pendé'],
            ['code' => 'CF-OF-01', 'division_id' => 20, 'conservation_name_en' => 'Ouham-Fafa land office', 'conservation_name_fr' => 'Conservation foncière Ouham-Fafa'],
        ];

        foreach ($conservations as $conservation) {
            DB::table('conservations')->insert([
                'uuid' => Str::uuid(),
                'code' => $conservation['code'],
                'division_id' => $conservation['division_id'],
                'conservation_name_en' => $conservation['conservation_name_en'],
                'conservation_name_fr' => $conservation['conservation_name_fr'],
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
