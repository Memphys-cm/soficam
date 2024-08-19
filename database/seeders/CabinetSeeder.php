<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\Cabinet;
use App\Models\Division;
use App\Models\SubDivision;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CabinetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $region = Region::firstOrCreate(['nom' => 'Region Example'], ['uuid' => Str::uuid()]);
        $division = Division::firstOrCreate(['nom' => 'Division Example'], ['uuid' => Str::uuid(), 'region_id' => $region->id]);
        $subDivision = SubDivision::firstOrCreate(['nom' => 'SubDivision Example'], ['uuid' => Str::uuid(), 'division_id' => $division->id]);

        Cabinet::create([
            'uuid' => Str::uuid(),
            'region_id' => $region->id,
            'division_id' => $division->id,
            'sub_division_id' => $subDivision->id,
            'nom_cabinet' => 'Michigan',
            'type_cabinet' => 'geometre',
            'description' => 'il fait dans les meilleurs demandes et proposes plus',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        for($i=0 ; $i<50 ; $i++){

            Cabinet::create([
                'uuid' => Str::uuid(),
                'region_id' => $region->id,
                'division_id' => $division->id,
                'sub_division_id' => $subDivision->id,
                'nom_cabinet' => 'Milo ',
                'type_cabinet' => 'notaire',
                'description' => 'oofre les meilleurs services et offrent ',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
