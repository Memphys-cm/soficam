<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Zones économiques et regroupements (République centrafricaine).
     */
    public function run(): void
    {
        Region::flushEventListeners();

        $regions = [
            [1, 'PL', 'PLATEAUX (I)', 'PLATEAUX (I)'],
            [2, 'EQ', 'EQUATOR (II)', 'ÉQUATEUR (II)'],
            [3, 'YD', 'YADE (III)', 'YADE (III)'],
            [4, 'KG', 'KAGAS (IV)', 'KAGAS (IV)'],
            [5, 'FT', 'FERTIT (V)', 'FERTIT (V)'],
            [6, 'HO', 'HIGH-UBANGI (VI)', 'HAUT-OUBANGUI (VI)'],
            [7, 'BO', 'LOW-UBANGUI (VII)', 'BAS-OUBANGUI (VII)'],
            [8, 'BG', 'BANGUI CAPITAL', 'BANGUI (CAPITALE)'],
            [9, 'NO', 'NORTH', 'NORD'],
            [10, 'SU', 'SOUTH', 'SUD'],
        ];

        foreach ($regions as [$id, $code, $en, $fr]) {
            Region::create([
                'id' => $id,
                'uuid' => Str::uuid(),
                'code' => $code,
                'region_name_en' => $en,
                'region_name_fr' => $fr,
            ]);
        }
    }
}
