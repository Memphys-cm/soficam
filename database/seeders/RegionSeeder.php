<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'uuid' => Str::uuid(),
            'code' => 'AD',
            'region_name_en' => 'ADAMAWA',
            'region_name_fr' => 'ADAMAOUA'
        ]);

        Region::create([
            'id' => 2,
            'uuid' => Str::uuid(),
            'code' => 'CE',
            'region_name_en' => 'CENTER',
            'region_name_fr' => 'CENTRE'
        ]);

        Region::create([
            'id' => 3,
            'uuid' => Str::uuid(),
            'code' => 'ES',
            'region_name_en' => 'EAST',
            'region_name_fr' => 'EST'
        ]);
        Region::create([
            'id' => 4,
            'uuid' => Str::uuid(),
            'code' => 'EN',
            'region_name_en' => 'FAR NORTH',
            'region_name_fr' => 'EXTREME NORD'
        ]);
        Region::create([
            'id' => 5,
            'uuid' => Str::uuid(),
            'code' => 'LT',
            'region_name_en' => 'LITTORAL',
            'region_name_fr' => 'LITTORAL'
        ]);
        Region::create([
            'id' => 6,
            'uuid' => Str::uuid(),
            'code' => 'ND',
            'region_name_en' => 'NORTH',
            'region_name_fr' => 'NORD'
        ]);
        Region::create([
            'id' => 7,
            'uuid' => Str::uuid(),
            'code' => 'NO',
            'region_name_en' => 'NORTH WEST',
            'region_name_fr' => 'NORD OUEST'
        ]);
        Region::create([
            'id' => 8,
            'uuid' => Str::uuid(),
            'code' => 'OU',
            'region_name_en' => 'WEST',
            'region_name_fr' => 'OUEST'
        ]);

        Region::create([
            'id' => 9,
            'uuid' => Str::uuid(),
            'code' => 'SU',
            'region_name_en' => 'SOUTH',
            'region_name_fr' => 'SUD'
        ]);

        Region::create([
            'id' => 10,
            'uuid' => Str::uuid(),
            'code' => 'SO',
            'region_name_en' => 'SOUTH WEST',
            'region_name_fr' => 'SUD-OUEST'
        ]);
    }
}
