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

        $coordinates_utm = [
            ["789756.840, 438092.480", "789739.299, 437981.110", "789795.344, 437969.446", "789816.437, 438081.934"],
            ["789816.437, 438081.934", "789879.705, 438070.294", "789853.815, 437963.655", "789796.566, 437969.450"],
            ["789883.261, 438070.305", "789934.531, 438057.520", "789908.633, 437953.205", "789856.156, 437961.339"],
            ["586819.569, 454717.573", "586882.694, 454751.904", "586941.081, 454638.431", "586870.856, 454599.339"],
            ["586881.472, 454753.119", "586933.818, 454800.484", "587000.658, 454669.221", "586938.754, 454633.675"],
            ["586819.572, 454714.036", "586673.992, 455000.097", "586924.105, 454970.826", "586988.602, 454851.389"],
            ["530859.615, 460078.954", "530823.820, 460243.311", "531051.207, 460302.528", "531087.002, 460138.172"],
            ["530822.709, 460248.063", "531052.427, 460304.850", "530803.585, 460346.214", "531029.745, 460419.580"],
            ["530807.135, 460350.968", "530553.561, 460278.698", "530583.348, 460154.465", "530852.514, 460074.199"]
        ];

        $coordinates = [
            ["11.609260, 3.959373", "11.609099, 3.958367", "11.609603, 3.958260", "11.609796, 3.959276"],
            ["11.609796, 3.959276", "11.610365, 3.959169", "11.610129, 3.958206", "11.609614, 3.958260"],
            ["11.610397, 3.959169", "11.610858, 3.959052", "11.610622, 3.958110", "11.610150, 3.958185"],
            ["9.782203, 4.113517", "9.782772, 4.113827", "9.783297, 4.112800", "9.782664, 4.112447"],
            ["9.782761, 4.113838", "9.783233, 4.114266", "9.783834, 4.113078", "9.783276, 4.112757"],
            ["9.782203, 4.113485", "9.780894, 4.116074", "9.783147, 4.115807", "9.783727, 4.114726"],
            ["9.278055, 4.162356", "9.277733, 4.163843", "9.279782, 4.164378", "9.280104, 4.162891"],
            ["9.277723, 4.163886", "9.279793, 4.164399", "9.277551, 4.164774", "9.279589, 4.165437"],
            ["9.277583, 4.164817", "9.275298, 4.164164", "9.275566, 4.163040", "9.277991, 4.162313"]
        ];

        // Récupérer toutes les régions, divisions et subdivisions existantes

                foreach ($subdivisions as $subdivision) {
                    if ($counter >= 900) {
                        break 3; // Sortir des trois boucles si on atteint 90 000
                    }

        $titrefoncier1 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '1',
            'numero_titre_foncier' => 'CE/MA/A/S/1',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 2,
            'division_id' => 10,
            'sub_division_id' => 59,
            'groupement' => '',
            'lieu_dit' => 'Mambila',
            'land_id' => 1,
            'zone' => 'urbain',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'non_batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[0]),
            'coordonnees' => json_encode($coordinates[0]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'taxFoncier_amount'=>10000,
            'limit_ouest' => 'route',
        ]);

        $titrefoncier1->users()->sync([4, 5]);

        $titrefoncier2 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '2',
            'numero_titre_foncier' => 'CE/MA/A/S/2',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 2,
            'division_id' => 10,
            'sub_division_id' => 59,
            'groupement' => '',
            'lieu_dit' => 'Mambila',
            'land_id' => 1,
            'zone' => 'urbain',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'non_batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[1]),
            'coordonnees' => json_encode($coordinates[1]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'limit_ouest' => 'route',
            'taxFoncier_amount'=>10000
        ]);

        $titrefoncier2->users()->sync([4]);

        $titrefoncier3 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'CE/MA/A/S/3',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 2,
            'division_id' => 10,
            'sub_division_id' => 59,
            'groupement' => '',
            'lieu_dit' => 'Mambila',
            'land_id' => 1,
            'zone' => 'urbain',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'non_batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[2]),
            'coordonnees' => json_encode($coordinates[2]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'limit_ouest' => 'route',
            'taxFoncier_amount'=>10000
        ]);

        $titrefoncier3->users()->sync([6, 7]);

        $titrefoncier4 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'LT/W/A/D/1',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 5,
            'division_id' => 29,
            'sub_division_id' => 202,
            'groupement' => '',
            'lieu_dit' => 'Mambila',
            'land_id' => 2,
            'zone' => 'urbain',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'non_batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[3]),
            'coordonnees' => json_encode($coordinates[3]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'limit_ouest' => 'route',
            'is_vip' => 1,
            'taxFoncier_amount'=>10000
        ]);

        $titrefoncier4->users()->sync([8]);

        $titrefoncier5 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'LT/W/A/D/2',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 5,
            'division_id' => 29,
            'sub_division_id' => 202,
            'groupement' => '',
            'lieu_dit' => 'Mambila',
            'land_id' => 2,
            'zone' => 'urbain',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'non_batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[4]),
            'coordonnees' => json_encode($coordinates[4]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'limit_ouest' => 'route',
            'taxFoncier_amount'=>10000
        ]);

        $titrefoncier5->users()->sync([9]);

        $titrefoncier6 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'LT/W/A/D/3',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 5,
            'division_id' => 29,
            'sub_division_id' => 202,
            'groupement' => '',
            'lieu_dit' => 'Mambila',
            'land_id' => 2,
            'zone' => 'urbain',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'non_batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[5]),
            'coordonnees' => json_encode($coordinates[5]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'limit_ouest' => 'route',
            'taxFoncier_amount'=>10000
        ]);

        $titrefoncier6->users()->sync([10]);

        $titrefoncier7 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'SO/W/A/B/1',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 10,
            'division_id' => 53,
            'sub_division_id' => 327,
            'groupement' => '',
            'lieu_dit' => 'Mambila',
            'land_id' => 3,
            'zone' => 'urbain',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'non_batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[6]),
            'coordonnees' => json_encode($coordinates[6]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'limit_ouest' => 'route',
            'is_vip' => 1,
            'taxFoncier_amount'=>10000
        ]);

        $titrefoncier7->users()->sync([11, 12, 13]);

        $titrefoncier8 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'SO/W/A/B/2',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 10,
            'division_id' => 53,
            'sub_division_id' => 327,
            'groupement' => '',
            'lieu_dit' => 'Mambila',
            'land_id' => 3,
            'zone' => 'urbain',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'non_batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[7]),
            'coordonnees' => json_encode($coordinates[7]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'limit_ouest' => 'route',
            'taxFoncier_amount'=>10000
        ]);

        $titrefoncier8->users()->sync([14]);

        $titrefoncier9 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'SO/W/A/B/3',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 10,
            'division_id' => 53,
            'sub_division_id' => 327,
            'groupement' => '',
            'lieu_dit' => 'Mambila',
            'land_id' => 3,
            'zone' => 'urbain',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'non_batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[8]),
            'coordonnees' => json_encode($coordinates[8]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'limit_ouest' => 'route',
            'taxFoncier_amount'=>10000
        ]);

        $titrefoncier9->users()->sync([15]);
    }
}
