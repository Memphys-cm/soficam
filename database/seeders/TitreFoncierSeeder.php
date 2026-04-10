<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Illuminate\Database\Seeder;

class TitreFoncierSeeder extends Seeder
{
    public function run(): void
    {
        TitreFoncier::flushEventListeners();

        $randTs = function (): Carbon {
            $start = Carbon::now()->copy()->startOfYear();
            $end = Carbon::now();

            return Carbon::createFromTimestamp(rand($start->timestamp, $end->timestamp));
        };

        // Polygones indicatifs (lat, lon) — Bangui, Berbérati, Bangassou
        $coordinates_utm = [
            ['451200.120, 484150.330', '451180.900, 484090.210', '451250.640, 484070.880', '451270.100, 484130.450'],
            ['451270.100, 484130.450', '451340.200, 484110.290', '451310.815, 484020.655', '451255.566, 484030.450'],
            ['451345.261, 484110.305', '451394.531, 484097.520', '451368.633, 483993.205', '451316.156, 484001.339'],
            ['748900.569, 471017.573', '748962.694, 471051.904', '749021.081, 470938.431', '748950.856, 470899.339'],
            ['748961.472, 471053.119', '749013.818, 471100.484', '749080.658, 470969.221', '749018.754, 470933.675'],
            ['748900.572, 471014.036', '748754.992, 471300.097', '749005.105, 471270.826', '749069.602, 471151.389'],
            ['612859.615, 525078.954', '612823.820, 525243.311', '613051.207, 525302.528', '613087.002, 525138.172'],
            ['612822.709, 525248.063', '613052.427, 525304.850', '612803.585, 525346.214', '613029.745, 525419.580'],
            ['612807.135, 525350.968', '612553.561, 525278.698', '612583.348, 525154.465', '612852.514, 525074.199'],
        ];

        $coordinates = [
            ['4.3650, 18.5450', '4.3650, 18.5750', '4.3950, 18.5750', '4.3950, 18.5450'],
            ['4.3950, 18.5450', '4.4050, 18.5550', '4.4000, 18.5300', '4.3850, 18.5350'],
            ['4.4080, 18.5520', '4.4120, 18.5680', '4.3980, 18.5700', '4.3920, 18.5580'],
            ['4.2480, 15.7680', '4.2520, 15.7980', '4.2720, 15.7920', '4.2680, 15.7620'],
            ['4.2550, 15.8050', '4.2650, 15.8200', '4.2780, 15.8050', '4.2680, 15.7880'],
            ['4.2400, 15.7750', '4.2350, 15.8100', '4.2580, 15.8050', '4.2620, 15.7850'],
            ['4.7300, 22.8050', '4.7300, 22.8350', '4.7520, 22.8350', '4.7520, 22.8050'],
            ['4.7380, 22.8150', '4.7420, 22.8280', '4.7280, 22.8320', '4.7220, 22.8180'],
            ['4.7200, 22.8200', '4.7050, 22.8080', '4.7120, 22.7950', '4.7280, 22.8020'],
        ];

        $d = $randTs();
        $titrefoncier1 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '1',
            'numero_titre_foncier' => 'BG/BG/001/1',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 8,
            'division_id' => 1,
            'sub_division_id' => 1,
            'groupement' => '',
            'lieu_dit' => 'PK5',
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
            'taxFoncier_amount' => 10000,
            'limit_ouest' => 'route',
            'created_at' => $d,
            'updated_at' => $d,
        ]);

        $titrefoncier1->users()->sync([4, 5]);

        $d = $randTs();
        $titrefoncier2 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '2',
            'numero_titre_foncier' => 'BG/BG/002/1',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 8,
            'division_id' => 1,
            'sub_division_id' => 1,
            'groupement' => '',
            'lieu_dit' => 'Combattants',
            'land_id' => 1,
            'zone' => 'urbain',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[1]),
            'coordonnees' => json_encode($coordinates[1]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'limit_ouest' => 'route',
            'taxFoncier_amount' => 10000,
            'created_at' => $d,
            'updated_at' => $d,
        ]);

        $titrefoncier2->users()->sync([4]);

        $d = $randTs();
        $titrefoncier3 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'BG/BG/003/1',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 8,
            'division_id' => 1,
            'sub_division_id' => 1,
            'groupement' => '',
            'lieu_dit' => 'Ouango',
            'land_id' => 1,
            'zone' => 'rurale',
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
            'taxFoncier_amount' => 10000,
            'created_at' => $d,
            'updated_at' => $d,
        ]);

        $titrefoncier3->users()->sync([6, 7]);

        $d = $randTs();
        $titrefoncier4 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'MK/MK/BR/1',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 2,
            'division_id' => 17,
            'sub_division_id' => 23,
            'groupement' => '',
            'lieu_dit' => 'Berbérati centre',
            'land_id' => 2,
            'zone' => 'rurale',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[3]),
            'coordonnees' => json_encode($coordinates[3]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'limit_ouest' => 'route',
            'is_vip' => 1,
            'taxFoncier_amount' => 10000,
            'created_at' => $d,
            'updated_at' => $d,
        ]);

        $titrefoncier4->users()->sync([8]);

        $d = $randTs();
        $titrefoncier5 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'MK/MK/BR/2',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 2,
            'division_id' => 17,
            'sub_division_id' => 23,
            'groupement' => '',
            'lieu_dit' => 'Gadzi',
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
            'taxFoncier_amount' => 10000,
            'created_at' => $d,
            'updated_at' => $d,
        ]);

        $titrefoncier5->users()->sync([9]);

        $d = $randTs();
        $titrefoncier6 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'MK/MK/BR/3',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 2,
            'division_id' => 17,
            'sub_division_id' => 23,
            'groupement' => '',
            'lieu_dit' => 'Garoua-Boulaï',
            'land_id' => 2,
            'zone' => 'urbain',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[5]),
            'coordonnees' => json_encode($coordinates[5]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'limit_ouest' => 'route',
            'taxFoncier_amount' => 10000,
            'created_at' => $d,
            'updated_at' => $d,
        ]);

        $titrefoncier6->users()->sync([10]);

        $d = $randTs();
        $titrefoncier7 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'MB/MB/BG/1',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 6,
            'division_id' => 2,
            'sub_division_id' => 8,
            'groupement' => '',
            'lieu_dit' => 'Bangassou',
            'land_id' => 3,
            'zone' => 'rurale',
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
            'taxFoncier_amount' => 10000,
            'created_at' => $d,
            'updated_at' => $d,
        ]);

        $titrefoncier7->users()->sync([11, 12, 13]);

        $d = $randTs();
        $titrefoncier8 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'MB/MB/BG/2',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 6,
            'division_id' => 2,
            'sub_division_id' => 8,
            'groupement' => '',
            'lieu_dit' => 'Bakouma',
            'land_id' => 3,
            'zone' => 'urbain',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[7]),
            'coordonnees' => json_encode($coordinates[7]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'limit_ouest' => 'route',
            'taxFoncier_amount' => 10000,
            'created_at' => $d,
            'updated_at' => $d,
        ]);

        $titrefoncier8->users()->sync([14]);

        $d = $randTs();
        $titrefoncier9 = TitreFoncier::create([
            'uuid' => Str::uuid(),
            'numero_conservation' => '3',
            'numero_titre_foncier' => 'MB/MB/BG/3',
            'date_de_delivrance_du_TF' => now()->format('Y-m-d'),
            'numero_du_duplicata' => 1,
            'region_id' => 6,
            'division_id' => 2,
            'sub_division_id' => 8,
            'groupement' => '',
            'lieu_dit' => 'Gambo',
            'land_id' => 3,
            'zone' => 'rurale',
            'numero_folio' => '1',
            'volume' => '1',
            'superficie_du_TF_mere' => 4000,
            'etat_terrain' => 'batit',
            'provenance_TF' => 'mutation_totale',
            'numero_bordereau_analytique' => '1',
            'coordonnees_utm' => json_encode($coordinates_utm[8]),
            'coordonnees' => json_encode($coordinates[8]),
            'limit_nord' => 'route',
            'limit_sud' => 'route',
            'limit_est' => 'route',
            'limit_ouest' => 'route',
            'taxFoncier_amount' => 10000,
            'created_at' => $d,
            'updated_at' => $d,
        ]);

        $titrefoncier9->users()->sync([15]);
    }
}
