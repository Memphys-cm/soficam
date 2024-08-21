<?php

namespace Database\Seeders;

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
            ["11.555430587076, 3.9710172344522", "11.555444921682, 3.9710095095432", "11.555443731353, 3.9706227161", "11.555442340839, 3.9701708250328", "11.555440950485, 3.9697189339603", "11.555438114657, 3.9687970761555", "11.554989600554, 3.9692684388417", "11.554539640658, 3.9692698345558", "11.554089680603, 3.9692712300248"],
            ["11.516213163344588,3.8722015777978243", "11.517413319973969,3.876725140525764", "11.513612823982697,3.87599338937199", "11.514479603770468,3.8710706833373365", "11.516213163344588,3.8696736939774325", "11.518546801234777,3.8692745537378244", "11.522547323331793,3.870338927293801", "11.522413972594592,3.873132901512321", "11.518813502707786,3.8760599122306587", "11.516213163344588,3.8722015777978243"]
        ];

        // Récupérer toutes les régions, divisions et subdivisions existantes
        $regions = Region::all();
        $counter = 0;

        foreach ($regions as $region) {
            $divisions = Division::where('region_id', $region->id)->get();

            foreach ($divisions as $division) {
                $subdivisions = SubDivision::where('division_id', $division->id)->get();

                foreach ($subdivisions as $subdivision) {
                    if ($counter >= 50000) {
                        break 3; // Sortir des trois boucles si on atteint 90 000
                    }

                    TitreFoncier::create([
                        'uuid' => Str::uuid(),
                        'numero_titre_foncier' => Str::random(11),
                        'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
                        'numero_du_duplicata' => 1,
                        'region_id' => $region->id,
                        'division_id' => $division->id,
                        'sub_division_id' => $subdivision->id,
                        'groupement' => '',
                        'lieu_dit' => 'Mambila',
                        'zone' => 'urbain',
                        'numero_folio' => '1',
                        'volume' => '1',
                        'superficie_du_TF_mere' => 4000,
                        'etat_terrain' => 'non_batit',
                        'provenance_TF' => 'mutation_totale',
                        'numero_bordereau_analytique' => '1',
                        'coordonnees' => json_encode($coordinates[array_rand($coordinates)]),
                        'limit_nord' => 'route',
                        'limit_sud' => 'route',
                        'limit_est' => 'route',
                        'limit_ouest' => 'route',
                    ]);

                    $counter++;
                }
            }
        }
    }
}
