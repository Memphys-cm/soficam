<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::flushEventListeners();

        Region::create([
            'id' => 1,
            'code' => 'AD',
            'region_name_en' => 'ADAMAWA',
            'region_name_fr' => 'ADAMAOUA'
        ]);

        Region::create([
            'id' => 2,
            'code' => 'CE',
            'region_name_en' => 'CENTER',
            'region_name_fr' => 'CENTRE'
        ]);

        Region::create([
            'id' => 3,
            'code' => 'ES',
            'region_name_en' => 'EAST',
            'region_name_fr' => 'EST'
        ]);
        Region::create([
            'id' => 4,
            'code' => 'EN',
            'region_name_en' => 'FAR NORTH',
            'region_name_fr' => 'EXTREME NORD'
        ]);
        Region::create([
            'id' => 5,
            'code' => 'LT',
            'region_name_en' => 'LITTORAL',
            'region_name_fr' => 'LITTORAL'
        ]);
        Region::create([
            'id' => 6,
            'code' => 'ND',
            'region_name_en' => 'NORTH',
            'region_name_fr' => 'NORD'
        ]);
        Region::create([
            'id' => 7,
            'code' => 'NO',
            'region_name_en' => 'NORTH WEST',
            'region_name_fr' => 'NORD OUEST'
        ]);
        Region::create([
            'id' => 8,
            'code' => 'OU',
            'region_name_en' => 'WEST',
            'region_name_fr' => 'OUEST'
        ]);

        Region::create([
            'id' => 9,
            'code' => 'SU',
            'region_name_en' => 'SOUTH',
            'region_name_fr' => 'SUD'
        ]);

        Region::create([
            'id' => 10,
            'code' => 'SO',
            'region_name_en' => 'SOUTH WEST',
            'region_name_fr' => 'SUD-OUEST'
        ]);
    }
}
