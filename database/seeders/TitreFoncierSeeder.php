<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\Division;
use App\Models\SubDivision;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Collection;
use proj4php\Proj4php;
use proj4php\Proj;
use proj4php\Point;

class TitreFoncierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function convert($utmCoordinates)
    {
        // Initialisez Proj4
        $proj4 = new Proj4php();

        // Créez les projections
        $projUTM = new Proj('+proj=utm +zone=32 +datum=WGS84 +units=m +no_defs', $proj4);
        $projWGS84 = new Proj('EPSG:4326', $proj4);

        $decimalResults = [];

        foreach ($utmCoordinates as $utm) {
            $utmParts = explode(',', $utm); // Sépare les coordonnées UTM en X et Y
            $utmX = floatval($utmParts[0]);
            $utmY = floatval($utmParts[1]);

            // Créez le point source avec les coordonnées UTM
            $pointSrc = new Point($utmX, $utmY, $projUTM);

            // Transformez le point entre les systèmes de coordonnées
            $pointDest = $proj4->transform($projWGS84, $pointSrc);

            // Obtenez les coordonnées lat/lon du point de destination
            $lat = $pointDest->y;
            $lon = $pointDest->x;

            // Ajoutez le résultat à votre tableau de résultats en coordonnées décimales
            $decimalResults[] = "$lon, $lat";
        }

        return $decimalResults;
    }
    public function run(): void
    {
        TitreFoncier::flushEventListeners();


        // Récupérer les IDs des utilisateurs et des titres fonciers
        $users = DB::table('users')->pluck('id');
        $titresFoncier = DB::table('titre_fonciers')->pluck('id');

        // Convertir les IDs en collections pour faciliter les opérations
        $usersCollection = $users instanceof Collection ? $users : collect($users);
        $titresFoncierCollection = $titresFoncier instanceof Collection ? $titresFoncier : collect($titresFoncier);

        // Créer un tableau d'associations
        $associations = [];

        // Associer les titres fonciers aux utilisateurs
        foreach ($usersCollection as $userId) {
            // Vérifier que l'utilisateur existe dans la collection
            if ($usersCollection->contains($userId)) {
                // Prendre 5 titres fonciers aléatoires pour chaque utilisateur
                $randomTitles = $titresFoncierCollection->random(min(5, $titresFoncierCollection->count()));
                foreach ($randomTitles as $titleId) {
                    // Vérifier que le titre foncier existe dans la collection
                    if ($titresFoncierCollection->contains($titleId)) {
                        $associations[] = ['titre_foncier_id' => $titleId, 'user_id' => $userId];
                    }
                }
            }
        }

        // Insérer les données dans la table titrefoncier_user
        if (!empty($associations)) {
            DB::table('titrefoncier_user')->insert($associations);
        }

        $coordinates = [
            ["604588.9956404036, 1283523.1884052807", "604479.3739269332, 1283505.014106314", "604467.5203713928, 1283560.7118539717"],
            #Douala
            ["585950, 444731", "586077, 444748", "585978, 444525", "586135,444537"],
            ["585065, 444181", "585018, 444133", "585102, 444077", "585135,444121"],

            #Sud-Ouest
            ["528421, 613749", "528658, 613775", "528538, 613456"]
        ];



           TitreFoncier::create([
                'uuid' => Str::uuid(),
                'numero_titre_foncier' => "CE/CE10/A/1",
                'date_de_delivrance_du_TF' => '2023-01-01',
                'numero_du_duplicata' => 1,
                'numero_conservation' => 1,
                'region_id' => Region::where('id', 2)->first()->id,
                'division_id' => Division::where('id', 10)->first()->id,
                'sub_division_id' => SubDivision::where('id', 59)->first()->id,
                'groupement' => '',
                'lieu_dit' => 'Mambila' ,
                'zone'=>'urbain',
                'numero_folio' => '1' ,
                'volume' => '1' ,
                'superficie_du_TF_mere' => 4000 ,
                'etat_terrain' => 'non_batit',
                'provenance_TF' => 'mutation_totale',
                'numero_bordereau_analytique' => '1',
                'coordonnees' => json_encode($this->convert($coordinates[0])),
                'coordonnees_utm' => json_encode($coordinates[0]),
                'limit_nord' => 'route' ,
                'limit_sud' => 'route',
                'limit_est' => 'route',
                'limit_ouest' => 'route',
            ]);
            TitreFoncier::create([
                'uuid' => Str::uuid(),
                'numero_titre_foncier' => "LT/LT26/A/2",
                'date_de_delivrance_du_TF' => '2023-01-01',
                'numero_du_duplicata' => 1,
                'region_id' => Region::where('id', 5)->first()->id,
                'division_id' => Division::where('id', 26)->first()->id,
                'sub_division_id' => SubDivision::where('id', 170)->first()->id,
                'groupement' => '',
                'numero_conservation' => 2,
                'lieu_dit' => 'Mambila' ,
                'zone'=>'urbain',
                'numero_folio' => '1' ,
                'volume' => '1' ,
                'superficie_du_TF_mere' => 4000 ,
                'etat_terrain' => 'non_batit',
                'provenance_TF' => 'mutation_totale',
                'numero_bordereau_analytique' => '1',
                'coordonnees' => json_encode($this->convert($coordinates[1])),
                'coordonnees_utm' => json_encode($coordinates[1]),
                'limit_nord' => 'route' ,
                'limit_sud' => 'route',
                'limit_est' => 'route',
                'limit_ouest' => 'route',
            ]);
            TitreFoncier::create([
                'uuid' => Str::uuid(),
                'numero_titre_foncier' => "LT/LT26/A/3",
                'date_de_delivrance_du_TF' => '2023-01-01',
                'numero_du_duplicata' => 1,
                'numero_conservation' => 3,
                'region_id' => Region::where('id', 5)->first()->id,
                'division_id' => Division::where('id', 26)->first()->id,
                'sub_division_id' => SubDivision::where('id', 170)->first()->id,
                'groupement' => '',
                'lieu_dit' => 'Mambila' ,
                'zone'=>'urbain',
                'numero_folio' => '1' ,
                'volume' => '1' ,
                'superficie_du_TF_mere' => 4000 ,
                'etat_terrain' => 'non_batit',
                'provenance_TF' => 'mutation_totale',
                'numero_bordereau_analytique' => '1',
                'coordonnees' => json_encode($this->convert($coordinates[2])),
                'coordonnees_utm' => json_encode($coordinates[2]),
                'limit_nord' => 'route' ,
                'limit_sud' => 'route',
                'limit_est' => 'route',
                'limit_ouest' => 'route',
            ]);
            TitreFoncier::create([
                'uuid' => Str::uuid(),
                'numero_titre_foncier' => 'SO/SO53/A/4',
                'date_de_delivrance_du_TF' => '2023-01-01',
                'numero_du_duplicata' => 1,
                'numero_conservation' => 4,
                'region_id' => Region::where('id', 10)->first()->id,
                'division_id' => Division::where('id', 53)->first()->id,
                'sub_division_id' => SubDivision::where('id', 322)->first()->id,
                'groupement' => '',
                'lieu_dit' => 'Mambila' ,
                'zone'=>'urbain',
                'numero_folio' => '1' ,
                'volume' => '1' ,
                'superficie_du_TF_mere' => 4000 ,
                'etat_terrain' => 'non_batit',
                'provenance_TF' => 'mutation_totale',
                'numero_bordereau_analytique' => '1',
                'coordonnees' => json_encode($this->convert($coordinates[3])),
                'coordonnees_utm' => json_encode($coordinates[3]),
                'limit_nord' => 'route' ,
                'limit_sud' => 'route',
                'limit_est' => 'route',
                'limit_ouest' => 'route',
            ]);
            TitreFoncier::create([
                'uuid' => Str::uuid(),
                'numero_titre_foncier' => 'CE/CE10/A/2',
                'date_de_delivrance_du_TF' => '2023-01-01',
                'numero_du_duplicata' => 1,
                'numero_conservation' => 5,
                'region_id' => Region::where('id', 1)->first()->id,
                'division_id' => Division::where('id', 2)->first()->id,
                'sub_division_id' => SubDivision::where('id', 4)->first()->id,
                'groupement' => '',
                'lieu_dit' => 'Mambila' ,
                'zone'=>'urbain',
                'numero_folio' => '1' ,
                'volume' => '1' ,
                'superficie_du_TF_mere' => 4000 ,
                'etat_terrain' => 'non_batit',
                'provenance_TF' => 'mutation_totale',
                'numero_bordereau_analytique' => '1',
                'coordonnees' => json_encode($this->convert($coordinates[0])),
                'coordonnees_utm' => json_encode($coordinates[0]),
                'limit_nord' => 'route' ,
                'limit_sud' => 'route',
                'limit_est' => 'route',
                'limit_ouest' => 'route',
            ]);
            TitreFoncier::create([
                'uuid' => Str::uuid(),
                'numero_titre_foncier' => 'CE/CE10/A/4',
                'date_de_delivrance_du_TF' => '2023-01-01',
                'numero_du_duplicata' => 1,
                'numero_conservation' => 6,
                'region_id' => Region::where('id', 1)->first()->id,
                'division_id' => Division::where('id', 2)->first()->id,
                'sub_division_id' => SubDivision::where('id', 5)->first()->id,
                'groupement' => '',
                'lieu_dit' => 'Mambila' ,
                'zone'=>'urbain',
                'numero_folio' => '1' ,
                'volume' => '1' ,
                'superficie_du_TF_mere' => 4000 ,
                'etat_terrain' => 'non_batit',
                'provenance_TF' => 'mutation_totale',
                'numero_bordereau_analytique' => '1',
                'coordonnees' => json_encode($this->convert($coordinates[0])),
                'coordonnees_utm' => json_encode($coordinates[0]),
                'limit_nord' => 'route' ,
                'limit_sud' => 'route',
                'limit_est' => 'route',
                'limit_ouest' => 'route',
            ]);
            TitreFoncier::create([
                'uuid' => Str::uuid(),
                'numero_titre_foncier' => 'CE/CE10/A/5',
                'date_de_delivrance_du_TF' => '2023-01-01',
                'numero_du_duplicata' => 1,
                'numero_conservation' => 7,
                'region_id' => Region::where('id', 1)->first()->id,
                'division_id' => Division::where('id', 3)->first()->id,
                'sub_division_id' => SubDivision::where('id', 6)->first()->id,
                'groupement' => '',
                'lieu_dit' => 'Mambila' ,
                'zone'=>'urbain',
                'numero_folio' => '1' ,
                'volume' => '1' ,
                'superficie_du_TF_mere' => 4000 ,
                'etat_terrain' => 'non_batit',
                'provenance_TF' => 'mutation_totale',
                'numero_bordereau_analytique' => '1',
                'coordonnees' => json_encode($this->convert($coordinates[0])),
                'coordonnees_utm' => json_encode($coordinates[0]),
                'limit_nord' => 'route' ,
                'limit_sud' => 'route',
                'limit_est' => 'route',
                'limit_ouest' => 'route',
            ]);
            TitreFoncier::create([
                'uuid' => Str::uuid(),
                'numero_titre_foncier' => 'LT/LT26/A/13',
                'date_de_delivrance_du_TF' => '2023-01-01',
                'numero_du_duplicata' => 1,
                'numero_conservation' => 8,
                'region_id' => Region::where('id', 1)->first()->id,
                'division_id' => Division::where('id', 3)->first()->id,
                'sub_division_id' => SubDivision::where('id', 7)->first()->id,
                'groupement' => '',
                'lieu_dit' => 'Mambila' ,
                'zone'=>'urbain',
                'numero_folio' => '1' ,
                'volume' => '1' ,
                'superficie_du_TF_mere' => 4000 ,
                'etat_terrain' => 'non_batit',
                'provenance_TF' => 'mutation_totale',
                'numero_bordereau_analytique' => '1',
                'coordonnees' => json_encode($this->convert($coordinates[2])),
                'coordonnees_utm' => json_encode($coordinates[2]),
                'limit_nord' => 'route' ,
                'limit_sud' => 'route',
                'limit_est' => 'route',
                'limit_ouest' => 'route',
            ]);
            TitreFoncier::create([
                'uuid' => Str::uuid(),
                'numero_titre_foncier' => 'LT/LT26/A/5',
                'date_de_delivrance_du_TF' => '2023-01-01',
                'numero_du_duplicata' => 1,
                'numero_conservation' => 9,
                'region_id' => Region::where('id', 1)->first()->id,
                'division_id' => Division::where('id', 4)->first()->id,
                'sub_division_id' => SubDivision::where('id', 10)->first()->id,
                'groupement' => '',
                'lieu_dit' => 'Mambila' ,
                'zone'=>'urbain',
                'numero_folio' => '1' ,
                'volume' => '1' ,
                'superficie_du_TF_mere' => 4000 ,
                'etat_terrain' => 'non_batit',
                'provenance_TF' => 'mutation_totale',
                'numero_bordereau_analytique' => '1',
                'coordonnees' => json_encode($this->convert($coordinates[2])),
                'coordonnees_utm' => json_encode($coordinates[2]),
                'limit_nord' => 'route' ,
                'limit_sud' => 'route',
                'limit_est' => 'route',
                'limit_ouest' => 'route',
            ]);
            TitreFoncier::create([
                'uuid' => Str::uuid(),
                'numero_titre_foncier' => 'LT/LT26/A/7',
                'date_de_delivrance_du_TF' => '2023-01-01',
                'numero_du_duplicata' => 1,
                'numero_conservation' => 10,
                'region_id' => Region::where('id', 1)->first()->id,
                'division_id' => Division::where('id', 4)->first()->id,
                'sub_division_id' => SubDivision::where('id', 11)->first()->id,
                'groupement' => '',
                'lieu_dit' => 'Mambila' ,
                'zone'=>'urbain',
                'numero_folio' => '1' ,
                'volume' => '1' ,
                'superficie_du_TF_mere' => 4000 ,
                'etat_terrain' => 'non_batit',
                'provenance_TF' => 'mutation_totale',
                'numero_bordereau_analytique' => '1',
                'coordonnees' => json_encode($this->convert($coordinates[2])),
                'coordonnees_utm' => json_encode($coordinates[2]),
                'limit_nord' => 'route' ,
                'limit_sud' => 'route',
                'limit_est' => 'route',
                'limit_ouest' => 'route',
            ]);
            TitreFoncier::create([
                'uuid' => Str::uuid(),
                'numero_titre_foncier' => 'LT/LT26/A/8',
                'date_de_delivrance_du_TF' => '2023-01-01',
                'numero_du_duplicata' => 1,
                'numero_conservation' => 11,
                'region_id' => Region::where('id', 1)->first()->id,
                'division_id' => Division::where('id', 5)->first()->id,
                'sub_division_id' => SubDivision::where('id', 14)->first()->id,
                'groupement' => '',
                'lieu_dit' => 'Mambila' ,
                'zone'=>'urbain',
                'numero_folio' => '1' ,
                'volume' => '1' ,
                'superficie_du_TF_mere' => 4000 ,
                'etat_terrain' => 'non_batit',
                'provenance_TF' => 'mutation_totale',
                'numero_bordereau_analytique' => '1',
                'coordonnees' => json_encode($this->convert($coordinates[2])),
                'coordonnees_utm' => json_encode($coordinates[2]),
                'limit_nord' => 'route' ,
                'limit_sud' => 'route',
                'limit_est' => 'route',
                'limit_ouest' => 'route',
            ]);
    }
}
