<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Préfectures de la RCA (dep. 2020–2021), rattachées aux zones économiques.
     *
     * @see https://fr.wikipedia.org/wiki/Pr%C3%A9fectures_de_la_R%C3%A9publique_centrafricaine
     */
    public function run(): void
    {
        Division::flushEventListeners();

        $divisions = [
            [1, 8, 'BG', 'BANGUI', 'BANGUI'],
            [2, 6, 'MB', 'MBOMOU', 'MBOMOU'],
            [3, 7, 'BK', 'BASSE-KOTTO', 'BASSE-KOTTO'],
            [4, 4, 'KE', 'KEMO', 'KÉMO'],
            [5, 2, 'NM', 'NANA-MAMBERE', 'NANA-MAMBÉRÉ'],
            [6, 3, 'OH', 'OUHAM', 'OUHAM'],
            [7, 2, 'SM', 'SANGHA-MBAERE', 'SANGHA-MBAÉRÉ'],
            [8, 1, 'LB', 'LOBAYE', 'LOBAYE'],
            [9, 1, 'OM', 'OMBELLA-M\'POKO', 'OMBELLA-M\'POKO'],
            [10, 3, 'OP', 'OUHAM-PENDE', 'OUHAM-PENDÉ'],
            [11, 6, 'HM', 'HAUT-MBOMOU', 'HAUT-MBOMOU'],
            [12, 4, 'OU', 'OUAKA', 'OUAKA'],
            [13, 5, 'HK', 'HAUTE-KOTTO', 'HAUTE-KOTTO'],
            [14, 5, 'BB', 'BAMINGUI-BANGORAN', 'BAMINGUI-BANGORAN'],
            [15, 5, 'VK', 'VAKAGA', 'VAKAGA'],
            [16, 4, 'NG', 'NANA-GREBIZI', 'NANA-GRÉBIZI'],
            [17, 2, 'MK', 'MAMBERE-KADEI', 'MAMBÉRÉ-KADÉÏ'],
            [18, 2, 'MM', 'MAMBERE', 'MAMBÉRÉ'],
            [19, 3, 'LP', 'LIM-PENDE', 'LIM-PENDÉ'],
            [20, 3, 'OF', 'OUHAM-FAFA', 'OUHAM-FAFA'],
        ];

        foreach ($divisions as [$id, $regionId, $code, $en, $fr]) {
            Division::create([
                'id' => $id,
                'uuid' => Str::uuid(),
                'region_id' => $regionId,
                'code' => $code,
                'division_name_en' => $en,
                'division_name_fr' => $fr,
            ]);
        }
    }
}
