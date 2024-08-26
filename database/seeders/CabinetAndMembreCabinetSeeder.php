<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\Cabinet;
use App\Models\Division;
use App\Models\SubDivision;
use Illuminate\Support\Str;
use App\Models\MembreDuCabinet;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CabinetAndMembreCabinetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cabinet::flushEventListeners();
        MembreDuCabinet::flushEventListeners();

        for($i = 0; $i < 150; $i++ ){

            Cabinet::create([
                  'uuid' => Str::uuid(),
                'region_id' => Region::pluck('id')->shuffle()->first(),
                'division_id' => Division::pluck('id')->shuffle()->first(),
                'sub_division_id' => SubDivision::pluck('id')->shuffle()->first(),
                'type_cabinet' =>'geometre',
                'nom_cabinet' => fake()->name(),
            ]);

            MembreDuCabinet::create([
                'uuid' => Str::uuid(),
                'cabinet_id' => Cabinet::pluck('id')->shuffle()->first(),
                'type_membre' => 'geometre',
                'first_name' => fake()->name(),
                'last_name' => fake()->name(),
                'phone_number' => fake()->phoneNumber(),
                'address' => fake()->address(),
            ]);
        }

        for($i = 0; $i < 25; $i++ ){

            Cabinet::create([
                'uuid' => Str::uuid(),
                'region_id' => Region::pluck('id')->shuffle()->first(),
                'division_id' => Division::pluck('id')->shuffle()->first(),
                'sub_division_id' => SubDivision::pluck('id')->shuffle()->first(),
                'type_cabinet' =>'notaire',
                'nom_cabinet' => fake()->name(),
            ]);

            MembreDuCabinet::create([
                'uuid' => Str::uuid(),
                'cabinet_id' => Cabinet::pluck('id')->shuffle()->first(),
                'type_membre' => 'notaire',
                'first_name' => fake()->name(),
                'last_name' => fake()->name(),
                'phone_number' => fake()->phoneNumber(),
                'address' => fake()->address(),
            ]);
        }

    }
}
