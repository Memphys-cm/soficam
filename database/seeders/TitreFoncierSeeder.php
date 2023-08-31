<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Region;
use App\Models\Division;
use App\Models\SubDivision;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TitreFoncierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TitreFoncier::flushEventListeners();

        $coordinates = [
            'B1' =>' 783771.1412,439362.2283',
            'B2' => '783772.7367, 439361.3785',
            'B3' => '783772.7367, 439318.5813',
            'B4' => '783772.7367, 439268.5813',
        ];

        for ($i = 0; $i < 50; $i++) {

           $titre_foncier = TitreFoncier::create([
                'uuid' => Str::uuid(),
                'numero_titre_foncier' => Str::random(11),
                'date_de_delivrance_du_TF' => fake()->date(),
                'numero_du_duplicata' => fake()->randomNumber(5, true),
                'region_id' => Region::pluck('id')->shuffle()->first(),
                'division_id' => Division::pluck('id')->shuffle()->first(),
                'sub_division_id' => SubDivision::pluck('id')->shuffle()->first(),
                'groupement' => fake()->name(),
                'lieu_dit' => fake()->name(),
                'zone' => 'urbaine',
                'numero_folio' => Str::random(2),
                'volume' => Str::random(2),
                'superficie_du_TF_mere' => fake()->randomNumber(6, true),
                'superficie_vendue_du_TF_mere' => fake()->randomNumber(6, true),
                'superficie_restant_du_TF_mere' => fake()->randomNumber(6, true),
                'etat_terrain' => 'non_batit',
                'provenance_TF' => 'mutation_totale',
                'numero_bordereau_analytique' => fake()->randomNumber(6, true),
                'coordonnees' => json_encode($coordinates),
                'limit_nord' => fake()->sentence(),
                'limit_sud' => fake()->sentence(),
                'limit_est' => fake()->sentence(),
                'limit_ouest' => fake()->sentence(),
            ]);

            $titre_foncier->users()->sync(User::pluck('id')->shuffle()->take(fake()->randomDigitNotNull())->toArray());
        }
    }
}
