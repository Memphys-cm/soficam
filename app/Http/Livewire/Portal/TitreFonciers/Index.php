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
    public $conservateurs, $conservateur_id;

    public  $state = 0;

    public ?string $query = null;

    public $coordinates = ['', ''];
    public $coordonnees = [];



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

        $this->conservateurs = User::role('CONSERVATEUR')->get();
        $this->regions = Region::select('region_name_en', 'region_name_fr', 'id')->get();
        // $this->numero_titre_foncier = $this->generateCodeTF();
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
    }

    public function generateCodeTF()
    {
        // $departements = Division::all();
        // $codesUtilises = [];

        // foreach ($departements as $departement) {
        //     $nomsBlocs = explode(' ', $departement->division_name_fr);
        //     $count = count($nomsBlocs);

        //     if ($count === 1) {
        //         $code = substr($nomsBlocs[0], 0, 2);
        //     } elseif ($count > 1) {
        //         $code = substr($nomsBlocs[0], 0, 1) . substr($nomsBlocs[$count - 1], 0, 1);
        //     }
        //     // dump(strtoupper($code));
        //     $departement->update(['code' => strtoupper($code)]);
        // }

        $region = Region::findOrFail($this->region_id)->code;
        $departement = Division::findOrFail($this->division_id)->code;
        // $arrondissement = SubDivision::findOrFail($this->sub_division_id)->code;

        $numero = $region . "/" . $departement . "/" . 'A' . "/" . $this->numero_du_duplicata . "/" . $this->superficie_du_TF_mere . "/" . $this->numero_folio;
        //  dd($numero);   
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
        $this->generateCodeTF();
        if (!Gate::allows('titre_foncier.create')) {
            return abort(401);
        }
        // dd($this->user_ids);

        $this->validate([
            'numero_titre_foncier' => 'required',
            'region_id' => 'required',
            'division_id' => 'required',
            'sub_division_id' => 'required',
            'date_de_delivrance_du_TF' => 'required|date',
            // 'numero_du_duplicata' => 'required|integer',
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
            'user_ids' => 'required|array|min:1',
            'user_ids.*' => 'required',
        ]);

        // dd($this->coordonnees);

        $coords = [];
        collect($this->coordonnees)->map(function ($value, $key) {
            return ['long' => explode(',', $value, 1), 'lat' => explode(',', $value, 2)];
        });
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
            'coordonnees' => json_encode($this->coordonnees),
            'limit_nord' => $this->limit_nord,
            'limit_sud' => $this->limit_sud,
            'limit_est' => $this->limit_est,
            'limit_ouest' => $this->limit_ouest,
            'recorded_by' => auth()->user()->name,
            'nom_et_prenoms_de_largent_traitant' => $this->nom_et_prenoms_de_largent_traitant,
            'conservateur_id' => $this->conservateur_id,
            'numero_ccp' => $this->numero_ccp,
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

        $this->coordinates = array_values(json_decode($titrefoncier->coordonnees, true));
        $this->coordonnees = array_values(json_decode($titrefoncier->coordonnees, true));


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

        $pdf = Pdf::loadView('livewire.portal.titre-fonciers.print',$data)->setPaper('a4', 'portrait');


        return response()->streamDownload(
            fn () => print($pdf->output()),
            __('Report-') . Str::random('10') . ".pdf"
        );
    }

    public function render()
    {
    // dd('ddd');
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
