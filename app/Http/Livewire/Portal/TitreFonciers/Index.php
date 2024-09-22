<?php

namespace App\Http\Livewire\Portal\TitreFonciers;

use App\Exports\TitreFonciers;
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
use App\Models\Land;
use proj4php\Proj4php;
use proj4php\Proj;
use proj4php\Point;

class Index extends Component
{
    use WithDataTables;

    const PERCENTAGE_TAX_FONCIER = 0.001;
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
    public $attachments;
    public $taxFoncier_amount;
    public $conservateurs, $conservateur_id, $selector, $element, $subdivisions, $is_vip, $subdivision_id, $inter_start, $inter_end;

    public  $state = 0;

    public ?string $query = null;

    public $coordinates = ['', ''];
    public $coordonnees = [];
    public $coordonne = [];


    public $region_code, $division_code , $sub_division_code;
    public $lands = [];  // Liste des villages
    public $land_id;  // Sélection du village
    public $manualVillage = false;  // Activer l'entrée manuelle
    public $manualVillageName;  // Nom du village entré manuellement

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
        $this->users = User::with(['roles' => function ($role) {
            return $role->whereIn('name', ['user'])->get();
        }])->get();
        $this->conservateurs = User::with(['roles' => function ($role) {
            return $role->where('name', ['Conservateur'])->get();
        }])->get();
        $this->regions = Region::select('region_name_en', 'region_name_fr', 'id')->get();
        $this->divisions = Division::select('division_name_en', 'division_name_fr', 'id')->get();
        $this->subdivisions = SubDivision::select('sub_division_name_en', 'sub_division_name_fr', 'id')->get();
    }

    public function updatedRegionID($region_id)
    {
        if (!empty($region_id)) {
            $this->divisions = Division::whereRegionId($region_id)->get();
            $this->region_code = Region::whereId($region_id)->first()->code;

            // $this->numero_titre_foncier = $this->generateCodeTF();
        }
    }

    public function updatedDivisionID($division_id)
    {
        if (!empty($division_id)) {
            $this->sub_divisions = SubDivision::whereDivisionId($division_id)->get();
            $this->division_code = Division::whereId($division_id)->first()->code;
            // $this->numero_titre_foncier = $this->generateCodeTF();
        }
    }
    public function updatedSubDivisionID($sub_division_id)
    {
        if (!empty($sub_division_id)) {
            $this->lands = Land::whereSubDivisionId($sub_division_id)->get();
            $this->sub_division_code = SubDivision::whereId($sub_division_id)->first()->code;
            // $this->numero_titre_foncier = $this->generateCodeTF();
        }
    }

    // public function updatedNumeroFolio()
    // {
    //     $this->numero_titre_foncier = $this->generateCodeTF();
    // }

    // public function updatedNumeroDuDuplicata()
    // {
    //     $this->numero_titre_foncier = $this->generateCodeTF();
    // }

    public function updatedSuperficieDuTFMere($value)
    {
        if ($value) {
            $this->superficie_du_TF_mere = $value;
            // $this->numero_titre_foncier = $this->generateCodeTF();
        }
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

    public function generateCodeTF()
    {
        $numero = $this->region_code . "/" . $this->division_code . "/" . 'A' . "/" . $this->numero_titre_foncier;
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

        if($this->manualVillage == true) {

            $this->validate([
                'manualVillageName' => 'required|unique:lands,name',  // Vérification de l'unicité
            ]);

            $land = Land::create([
                'name' => $this->manualVillageName,
                'sub_division_id' => $this->sub_division_id
            ]);

            $this->land_id = $land->id;

        }

        $this->validate([
            'numero_titre_foncier' => 'required|unique:titre_fonciers',
            // 'numero_conservation' => 'required|unique:titrefonciers',
            'region_id' => 'required',
            'division_id' => 'required',
            'sub_division_id' => 'required',
            'land_id' => 'required',
            'date_de_delivrance_du_TF' => 'required|date',
            'numero_du_duplicata' => 'required|integer',
            'groupement' => 'required',
            // 'lieu_dit' => 'required',
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
            'taxFoncier_amount' => 'nullable',
            'user_ids' => 'required|array|min:1',
            'user_ids.*' => 'required',
        ]);

        

        $transform = $this->convert($this->coordonnees);

        $selectedSubDivision = SubDivision::findOrFail($this->sub_division_id);

        // Extract the prix_minima_m2 from the selected sub_division
        $prixMinimaM2 = $selectedSubDivision->prix_minima_m2;
        $taxFoncier_amount_perm2 = $this->superficie_du_TF_mere * $prixMinimaM2;

        // Calculate the tax_foncier based on the formula
        $taxFoncier_amount = self::PERCENTAGE_TAX_FONCIER * $taxFoncier_amount_perm2;



        $titrefoncier = TitreFoncier::create([
            'numero_titre_foncier' => $this->generateCodeTF(),
            'numero_conservation' => $this->numero_titre_foncier,
            'national_code' => $this->genererNationalCodeUnique(),
            'region_id' => $this->region_id,
            'division_id' => $this->division_id,
            'sub_division_id' => $this->sub_division_id,
            'date_de_delivrance_du_TF' => $this->date_de_delivrance_du_TF,
            'numero_du_duplicata' => $this->numero_du_duplicata,
            'groupement' => $this->groupement,
            // 'lieu_dit' => $this->lieu_dit,
            'land_id' => $this->land_id,
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
            'coordonnees_utm' => json_encode($this->coordonnees),
            'limit_nord' => $this->limit_nord,
            'limit_sud' => $this->limit_sud,
            'limit_est' => $this->limit_est,
            'limit_ouest' => $this->limit_ouest,
            'recorded_by' => auth()->user()->name,
            'nom_et_prenoms_de_largent_traitant' => $this->nom_et_prenoms_de_largent_traitant,
            'conservateur_id' => $this->conservateur_id,
            'numero_ccp' => $this->numero_ccp,
            'taxFoncier_amount' => $taxFoncier_amount,
            'is_vip' => $this->is_vip === true ?  1 : 0,
        ]);

        $titrefoncier->users()->sync($this->user_ids);

        if (!empty($this->attachements)) {
            foreach ($this->attachements as $attachement) {
                $titrefoncier->addMedia($attachement->getRealPath())
                    ->usingName($titrefoncier->uuid)
                    ->toMediaCollection('titrefonciers');
            }
        }

        $this->clearFields();

        $this->refresh(__('Titre Foncier créé avec succes'), 'CreateTitreFoncierModal');
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

        // $this->updatedRegionID($id);
        // $this->updatedDivisionID($id);

        $this->titrefoncier = $titrefoncier;

        $this->numero_titre_foncier =  $titrefoncier->numero_conservation;
        $this->is_vip = $titrefoncier->is_vip === false ? 0 : 1;
        $this->region_id =  $titrefoncier->region_id;
        $this->division_id =  $titrefoncier->division_id;
        $this->sub_division_id =  $titrefoncier->sub_division_id;
        $this->land_id = $titrefoncier->land_id;
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
        $this->taxFoncier_amount =  $titrefoncier->taxFoncier_amount;

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

        if($this->manualVillage == true) {

            $this->validate([
                'manualVillageName' => 'required|unique:lands,name',  // Vérification de l'unicité
            ]);

            $land = Land::create([
                'name' => $this->manualVillageName,
                'sub_division_id' => $this->sub_division_id
            ]);

            $this->land_id = $land->id;

        }

        $this->validate(
            [
                // 'numero_titre_foncier' => 'required',
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
                'taxFoncier_amount' => 'nullable',
                // 'numero_bordereau_analytique' => 'required',
                // 'volume_du_bordereau_analytique' => 'required',
                // 'date_detablissement_du_bordereau_analytique' => 'required',
                'limit_nord' => 'required',
                'limit_sud' => 'required',
                'limit_est' => 'required',
                'limit_ouest' => 'required',

            ]
        );

        $transform = $this->convert($this->coordonnees);

        if (!empty($this->titrefoncier)) {

            $selectedSubDivision = SubDivision::findOrFail($this->sub_division_id);

            // Extract the prix_minima_m2 from the selected sub_division
            $prixMinimaM2 = $selectedSubDivision->prix_minima_m2;
            $taxFoncier_amount_perm2 = $this->superficie_du_TF_mere * $prixMinimaM2;


            // Calculate the tax_foncier based on the formula
            // $taxFoncier_amount = 0.001 * $price;
            $taxFoncier_amount = self::PERCENTAGE_TAX_FONCIER * $taxFoncier_amount_perm2;

            $this->titrefoncier->update([
                // 'numero_titre_foncier' => $this->generateCodeTF(),
                'numero_conservation' => $this->numero_titre_foncier,
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
                'taxFoncier_amount' => $this->taxFoncier_amount,
                'coordonnees' => json_encode($transform),
                'coordonnees_utm' => json_encode($this->coordonnees),
                'is_vip' => $this->is_vip === true ?  1 : 0,
            ]);
        }

        $this->titrefoncier->users()->sync($this->user_ids);

        $this->clearFields();

        $this->refresh(__('Titre Foncier mis a jour avec succès'), 'CreateTitreFoncierModal');

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

        $this->refresh(__('Titre Foncier supprimé avec succès!'), 'DeleteModal');
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
            fn() => print($pdf->output()),
            __('Bordereau-analytique-TF-') . Str::random('10') . ".pdf"
        );
    }

    public function BuildingQuery()
    {
        return TitreFoncier::query()
            ->when($this->query && $this->query != "all", function ($query) {
                return $query->whereHas('users', function ($query) {
                    $query->where('first_name', 'like', '%' . $this->query . '%');
                })->orWhere('numero_titre_foncier', 'like', '%'. $this->query. '%');
            })
            ->when($this->region_id && $this->region_id != "all", function ($query) {
                return $query->where('region_id',  $this->region_id);
            })
            ->when($this->division_id && $this->division_id != "all", function ($query) {
                return $query->where('division_id',  $this->division_id);
            })
            ->when($this->subdivision_id && $this->subdivision_id != "all", function ($query) {
                return $query->where('sub_division_id',  $this->subdivision_id);
            })
            ->when($this->inter_start && $this->inter_end, function ($query) {
                return $query->whereBetween(DB::raw('DATE(created_at)'), [
                    Carbon::parse($this->inter_start),
                    Carbon::parse($this->inter_end)
                ]);
            })
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc'); // Gérer le tri dynamique
    }

    public function export()
    {
        auditLog(
            auth()->user(),
            'sales_report_exported',
            'web',
            __('Exported excel file for Sales')
        );
        return (new \App\Exports\TitreFonciers(
            $this->region_id,
            $this->division_id,
            $this->subdivision_id,
            $this->inter_start,
            $this->inter_end,
            $this->orderBy,
            $this->orderAsc
        ))->download('taxes_foncieres.xlsx');
        
       
    }


    public function render()
    {
        if (!Gate::allows('titre_foncier.view')) {
            return abort(401);
        }
        if (auth()->user()->hasRole('super_admin')) {
            $titrefonciers = $this->BuildingQuery()->paginate($this->perPage);
        } else {
            $titrefonciers = $this->BuildingQuery()->paginate($this->perPage)->where('is_vip', false);
        }

        $titrefonciers_count = TitreFoncier::count();

        $tf = TitreFoncier::find(18);
        // dd($tf->subDivision);

        return view('livewire.portal.titre-fonciers.index', [
            'titrefonciers' => $titrefonciers,
            'titrefonciers_count' => $titrefonciers_count,
        ]);
    }
}
