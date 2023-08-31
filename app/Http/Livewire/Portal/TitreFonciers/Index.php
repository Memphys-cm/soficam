<?php

namespace App\Http\Livewire\Portal\TitreFonciers;

use App\Models\User;
use App\Models\Region;
use Livewire\Component;
use App\Models\Division;
use App\Models\SubDivision;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\Traits\WithDataTables;
use proj4php\Proj4php;
use proj4php\Proj;
use proj4php\Point;

class Index extends Component
{
    use WithDataTables;

    public ?TitreFoncier $titrefoncier;
    public $users;
    public $user_ids = [];
    public $regions;
    public $divisions = [];
    public $sub_divisions = [];
    public $region_id;
    public $division_id;
    public $sub_division_id;

    public $numero_titre_foncier;
    public $date_de_delivrance_du_TF;
    public $numero_du_duplicata;
    public $groupement;
    public $lieu_dit;
    public $zone;
    public $numero_folio;
    public $volume;
    public $superficie_du_TF_mere;
    public $superficie_vendue_du_TF_mere;
    public $superficie_restant_du_TF_mere;
    public $etat_TF;
    public $etat_terrain;
    public $provenance_TF;
    public $numero_bordereau_analytique;
    public $volume_du_bordereau_analytique;
    public $date_detablissement_du_bordereau_analytique;
    public $limit_nord;
    public $limit_sud;
    public $limit_est;
    public $limit_ouest;
    public $recorded_by;
    public $nom_et_prenoms_de_largent_traitant;
    public $le_conservateur;
    public $numero_ccp;
    public $attachements;
    public $price;
    public $conservateurs, $conservateur_id;

    public  $state = 0;

    public ?string $query = null;

    public $coordinates = ['', ''];
    public $coordonnees = [];
    public $coordonne = [];



    public function addCoordinate()
    {
        $this->coordinates[] = [];
    }

    public function removeCoordinate($coordinateIndex)
    {
        unset($this->coordinates[$coordinateIndex]);
        $this->coordinates = array_values($this->coordinates);
    }

    public function mount()
    {
        // $utmCoordinates = [
        //     '783771.1412, 439362.2283', '783772.7367, 439361.3785', '783772.7367, 439318.5813',
        //     '783772.7367, 439268.5813', '783772.7367, 439218.5813', '783772.7367, 439116.5813',
        //     '783722.7367, 439168.5813', '783672.7367, 439168.5813', '783622.7367, 439168.5813'
        // ];
        // $convertedResults = $this->convert($utmCoordinates);


        // dd($convertedResults);

        // $this->convert();
        $this->users = User::with(['roles' => function ($role) {
            return $role->whereIn('name', ['user'])->get();
        }])->get();

        $this->conservateurs = User::role('user')->get(); // to be updated
        $this->regions = Region::select('region_name_en', 'region_name_fr', 'id')->get();
        //    $this->generateCodeTF();
    }

    public function updatedRegionID($region_id)
    {
        if (!empty($region_id)) {
            $this->divisions = Division::whereRegionId($region_id)->get();
        }
    }
    public function updatedDivisionID($division_id)
    {
        if (!empty($division_id)) {
            $this->sub_divisions = SubDivision::whereDivisionId($division_id)->get();
        }
        $this->numero_titre_foncier = $this->generateCodeTF();
    }

    public function updatedNumeroFolio()
    {
        $this->numero_titre_foncier = $this->generateCodeTF();
    }
    public function updatedNumeroDuDuplicata()
    {
        $this->numero_titre_foncier = $this->generateCodeTF();
    }

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
    

    //     return $decimalResults;
    // }
    // function convertToDMS($coordinates) {
    //     $results = [];

    //     foreach ($coordinates as $coordinate) {
    //         $parts = explode(' ', $coordinate);
    //         $longitude = $parts[0];
    //         $latitude = $parts[1];

    //         // Convertir la latitude en degrés minutes secondes
    //         $latDegrees = floor($latitude);
    //         $latMinutes = floor(($latitude - $latDegrees) * 60);
    //         $latSeconds = round((($latitude - $latDegrees) * 60 - $latMinutes) * 60, 2);

    //         // Convertir la longitude en degrés minutes secondes
    //         $lngDegrees = floor($longitude);
    //         $lngMinutes = floor(($longitude - $lngDegrees) * 60);
    //         $lngSeconds = round((($longitude - $lngDegrees) * 60 - $lngMinutes) * 60, 2);

    //         // Ajouter le résultat à votre tableau de résultats
    //         $results[] = [
    //             'latitude' => "$latDegrees °$latMinutes'$latSeconds\"",
    //             'longitude' => "$lngDegrees °$lngMinutes'$lngSeconds\""
    //         ];
    //     }

    //     return $results;
    // }


    public function generateCodeTF()
    {
        $region = Region::findOrFail($this->region_id)->code;
        $departement = Division::findOrFail($this->division_id)->code;
        $arrondissement = SubDivision::findOrFail($this->sub_division_id)->code;
        $numero = $region . "/" . $departement . "/" . 'A' . "/" . $this->numero_du_duplicata . "/" . $this->superficie_du_TF_mere . "/" . $this->numero_folio;
        return ($numero);
    }

    function genererNationalCodeUnique()
    {
        $dernierEnregistrement = TitreFoncier::orderBy('id', 'desc')->first();

        if ($dernierEnregistrement) {
            $dernierNumero = intval(substr($dernierEnregistrement->code, 2)); // Extrait le numéro sans "TF" et convertit en nombre
            $nouveauNumero = $dernierNumero + 1;
        } else {
            $nouveauNumero = 1;
        }

        // Formate le numéro avec des zéros à gauche (total 7 caractères)
        $numeroFormate = str_pad($nouveauNumero, 7, '0', STR_PAD_LEFT);

        // Concatène "TF" et le numéro formate pour obtenir le code unique
        $codeUnique = "TF" . $numeroFormate;

        return $codeUnique;
    }


    public function store()
    {
        if (!Gate::allows('titre_foncier.create')) {
            return abort(401);
        }

        $this->validate([
            'numero_titre_foncier' => 'required',
            'region_id' => 'required',
            'division_id' => 'required',
            'sub_division_id' => 'required',
            'date_de_delivrance_du_TF' => 'required|date',
            'numero_du_duplicata' => 'required|integer',
            'groupement' => 'required',
            'lieu_dit' => 'required',
            'zone' => 'required',
            'numero_folio' => 'required|integer',
            'volume' => 'required|integer',
            'superficie_du_TF_mere' => 'required',
            'etat_TF' => 'required',
            'etat_terrain' => 'required',
            'provenance_TF' => 'required',
            // 'numero_bordereau_analytique' => 'required',
            // 'volume_du_bordereau_analytique' => 'required',
            // 'date_detablissement_du_bordereau_analytique' => 'required',
            'limit_nord' => 'required',
            'limit_sud' => 'required',
            'limit_est' => 'required',
            'limit_ouest' => 'required',
            'coordonnees' => 'required',
            'numero_ccp' => 'required',
            'price' => 'nullable',
            'user_ids' => 'required|array|min:1',
            'user_ids.*' => 'required',
        ]);


        $coords = [];
        collect($this->coordonnees)->map(function ($value, $key) {
            return ['long' => explode(',', $value, 1), 'lat' => explode(',', $value, 2)];
        });

        $transform = $this->convert($this->coordonnees);
        // dd($transform);


        // $coordonne = $this->convert($this->coordonnees);
        // dd($coordonne);
        // dd(array_flatten($coords));

        // /{"B1": "564321.00, 452564.00", "B2": "564335.746, 452548.271", "B3": "564315.224,452531.059", "B4": "564303.601,452544.471"}

        $titrefoncier = TitreFoncier::create([
            'numero_titre_foncier' => $this->numero_titre_foncier,
            'national_code' => $this->genererNationalCodeUnique(),
            'region_id' => $this->region_id,
            'division_id' => $this->division_id,
            'sub_division_id' => $this->sub_division_id,
            'date_de_delivrance_du_TF' => $this->date_de_delivrance_du_TF,
            'numero_du_duplicata' => $this->numero_du_duplicata,
            'groupement' => $this->groupement,
            'lieu_dit' => $this->lieu_dit,
            'zone' => $this->zone,
            'numero_folio' => $this->numero_folio,
            'volume' => $this->volume,
            'superficie_du_TF_mere' => $this->superficie_du_TF_mere,
            'etat_TF' => $this->etat_TF,
            'etat_terrain' => $this->etat_terrain,
            'provenance_TF' => $this->provenance_TF,
            'numero_bordereau_analytique' => $this->numero_bordereau_analytique,
            'volume_du_bordereau_analytique' => $this->volume_du_bordereau_analytique,
            'date_detablissement_du_bordereau_analytique' => $this->date_detablissement_du_bordereau_analytique,
            'coordonnees' => json_encode($transform),
            // 'coordonnees' => json_encode($this->coordonnees),
            'limit_nord' => $this->limit_nord,
            'limit_sud' => $this->limit_sud,
            'limit_est' => $this->limit_est,
            'limit_ouest' => $this->limit_ouest,
            'recorded_by' => auth()->user()->name,
            'nom_et_prenoms_de_largent_traitant' => $this->nom_et_prenoms_de_largent_traitant,
            'conservateur_id' => $this->conservateur_id,
            'numero_ccp' => $this->numero_ccp,
            'price' => $this->price,
        ]);
        

        $titrefoncier->users()->sync($this->user_ids);

        if (!empty($this->attachements)) {
            $titrefoncier->addMedia($this->attachements->getRealPath())
                ->usingName($titrefoncier->numero_titre_foncier)
                ->toMediaCollection('titrefonciers');
        }

        $this->clearFields();

        $this->refresh(__('TitreFoncier successfully Created'), 'CreateTitreFoncierModal');
    }

    public function convertToUTM($decimalCoordinates)
{
    // Initialisez Proj4
    $proj4 = new Proj4php();

    // Créez les projections
    $projUTM = new Proj('+proj=utm +zone=32 +datum=WGS84 +units=m +no_defs', $proj4);
    $projWGS84 = new Proj('EPSG:4326', $proj4);

    $utmResults = [];

    foreach ($decimalCoordinates as $decimal) {
        $decimalParts = explode(',', $decimal); // Sépare les coordonnées décimales en longitude et latitude
        $lon = floatval($decimalParts[0]);
        $lat = floatval($decimalParts[1]);

        // Créez le point source avec les coordonnées géographiques
        $pointSrc = new Point($lon, $lat, $projWGS84);

        // Transformez le point entre les systèmes de coordonnées
        $pointDest = $proj4->transform($projUTM, $pointSrc);

        // Obtenez les coordonnées UTM du point de destination
        $utmX = $pointDest->x;
        $utmY = $pointDest->y;

        // Ajoutez le résultat à votre tableau de résultats en coordonnées UTM
        $utmResults[] = "$utmX, $utmY";
    }

    return $utmResults;
}


    public function initData($id)
    {
        $titrefoncier = TitreFoncier::findOrFail($id);

        $this->titrefoncier = $titrefoncier;

        $this->numero_titre_foncier =  $titrefoncier->numero_titre_foncier;
        $this->region_id =  $titrefoncier->region_id;
        $this->division_id =  $titrefoncier->division_id;
        $this->sub_division_id =  $titrefoncier->sub_division_id;
        $this->date_de_delivrance_du_TF =  $titrefoncier->date_de_delivrance_du_TF;
        $this->numero_du_duplicata =  $titrefoncier->numero_du_duplicata;
        $this->groupement =  $titrefoncier->groupement;
        $this->lieu_dit =  $titrefoncier->lieu_dit;
        $this->zone =  $titrefoncier->zone;
        $this->numero_folio =  $titrefoncier->numero_folio;
        $this->volume =  $titrefoncier->volume;
        $this->superficie_du_TF_mere =  $titrefoncier->superficie_du_TF_mere;
        $this->etat_TF =  $titrefoncier->etat_TF;
        $this->etat_terrain =  $titrefoncier->etat_terrain;
        $this->provenance_TF =  $titrefoncier->provenance_TF;
        $this->numero_bordereau_analytique =  $titrefoncier->numero_bordereau_analytique;
        $this->volume_du_bordereau_analytique =  $titrefoncier->volume_du_bordereau_analytique;
        $this->date_detablissement_du_bordereau_analytique =  $titrefoncier->date_detablissement_du_bordereau_analytique;
        $this->limit_nord =  $titrefoncier->limit_nord;
        $this->limit_sud =  $titrefoncier->limit_sud;
        $this->limit_est =  $titrefoncier->limit_est;
        $this->limit_ouest =  $titrefoncier->limit_ouest;
        $this->recorded_by =  $titrefoncier->recorded_by;
        $this->nom_et_prenoms_de_largent_traitant =  $titrefoncier->nom_et_prenoms_de_largent_traitant;
        $this->le_conservateur =  $titrefoncier->le_conservateur;
        $this->numero_ccp =  $titrefoncier->numero_ccp;
        $this->price =  $titrefoncier->price;

        $this->coordinates = $this->convertToUTM(array_values(json_decode($titrefoncier->coordonnees, true)));
        $this->coordonnees = $this->convertToUTM(array_values(json_decode($titrefoncier->coordonnees, true)));


        $this->user_ids = $titrefoncier->users->pluck('id');

        $this->state = 1;
    }

    public function update()
    {
        if (!Gate::allows('titre_foncier.update')) {
            return abort(401);
        }
        $this->validate(
            [
                'numero_titre_foncier' => 'required',
                'region_id' => 'required',
                'division_id' => 'required',
                'sub_division_id' => 'required',
                'date_de_delivrance_du_TF' => 'required|date',
                'numero_du_duplicata' => 'required|integer',
                'groupement' => 'required',
                'lieu_dit' => 'required',
                'zone' => 'required',
                'numero_folio' => 'required|integer',
                'volume' => 'required|integer',
                'superficie_du_TF_mere' => 'required',
                'etat_TF' => 'required',
                'etat_terrain' => 'required',
                'provenance_TF' => 'required',
                'numero_ccp' => 'required',
                'price' => 'nullable',
                // 'numero_bordereau_analytique' => 'required',
                // 'volume_du_bordereau_analytique' => 'required',
                // 'date_detablissement_du_bordereau_analytique' => 'required',
                'limit_nord' => 'required',
                'limit_sud' => 'required',
                'limit_est' => 'required',
                'limit_ouest' => 'required',

            ]
        );


        if (!empty($this->titrefoncier)) {

            $this->titrefoncier->update([
                'numero_titre_foncier' => $this->numero_titre_foncier,
                'region_id' => $this->region_id,
                'division_id' => $this->division_id,
                'sub_division_id' => $this->sub_division_id,
                'date_de_delivrance_du_TF' => $this->date_de_delivrance_du_TF,
                'numero_du_duplicata' => $this->numero_du_duplicata,
                'groupement' => $this->groupement,
                'lieu_dit' => $this->lieu_dit,
                'zone' => $this->zone,
                'numero_folio' => $this->numero_folio,
                'volume' => $this->volume,
                'superficie_du_TF_mere' => $this->superficie_du_TF_mere,
                'etat_TF' => $this->etat_TF,
                'etat_terrain' => $this->etat_terrain,
                'provenance_TF' => $this->provenance_TF,
                // 'numero_bordereau_analytique' => $this->numero_bordereau_analytique,
                // 'volume_du_bordereau_analytique' => $this->volume_du_bordereau_analytique,
                // 'date_detablissement_du_bordereau_analytique' => $this->date_detablissement_du_bordereau_analytique,
                'limit_nord' => $this->limit_nord,
                'limit_sud' => $this->limit_sud,
                'limit_est' => $this->limit_est,
                'limit_ouest' => $this->limit_ouest,
                'recorded_by' => auth()->user()->name,
                'nom_et_prenoms_de_largent_traitant' => $this->nom_et_prenoms_de_largent_traitant,
                'le_conservateur' => $this->le_conservateur,
                'numero_ccp' => $this->numero_ccp,
                'price' => $this->price,
                'coordonnees' => json_encode(getCoords($this->coordonnees)),
            ]);
        }

        $this->titrefoncier->users()->sync($this->user_ids);

        $this->clearFields();

        $this->refresh(__('TitreFoncier successfully Updated'), 'CreateTitreFoncierModal');

        $this->state = 0;
    }

    public function delete()
    {
        if (!Gate::allows('titre_foncier.delete')) {
            return abort(401);
        }

        if (!empty($this->titrefoncier)) {
            $this->titrefoncier->delete();
            $this->titrefoncier->users()->detach();
        }

        $this->state = 0;

        $this->clearFields();

        $this->refresh(__('TitreFoncier successfully deleted!'), 'DeleteModal');
    }

    public function clearFields()
    {
        $this->reset(
            [
                'numero_titre_foncier',
                'date_de_delivrance_du_TF',
                'numero_du_duplicata',
                'groupement',
                'lieu_dit',
                'zone',
                'numero_folio',
                'volume',
                'superficie_du_TF_mere',
                'superficie_vendue_du_TF_mere',
                'superficie_restant_du_TF_mere',
                'etat_TF',
                'etat_terrain',
                'provenance_TF',
                'numero_bordereau_analytique',
                'volume_du_bordereau_analytique',
                'date_detablissement_du_bordereau_analytique',
                'limit_nord',
                'limit_sud',
                'limit_est',
                'limit_ouest',
                'recorded_by',
                'nom_et_prenoms_de_largent_traitant',
                'le_conservateur',
                'coordonnees',
                'user_ids',
                'numero_ccp',
                'price',
            ]
        );

        $this->user_ids = [];
    }

    public function  printPdf($id)
    {
        $this->titrefoncier = TitreFoncier::findOrFail($id);
        $data = [
            'titrefoncier' => $this->titrefoncier,
            'email' => 'john@example.com',
            // Autres données que vous souhaitez afficher dans la vue
        ];

        $pdf = Pdf::loadView('livewire.portal.titre-fonciers.print', $data)->setPaper('a4', 'portrait');


        return response()->streamDownload(
            fn () => print($pdf->output()),
            __('Report-') . Str::random('10') . ".pdf"
        );
    }

    public function render()
    {
        if (!Gate::allows('titre_foncier.view')) {
            return abort(401);
        }

        $titrefonciers = TitreFoncier::search($this->query)->with('users')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $titrefonciers_count = TitreFoncier::count();

        return view('livewire.portal.titre-fonciers.index', [
            'titrefonciers' => $titrefonciers,
            'titrefonciers_count' => $titrefonciers_count,
        ])->layout('components.layouts.dashboard');
    }
}