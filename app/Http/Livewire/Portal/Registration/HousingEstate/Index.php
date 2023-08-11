<?php

namespace App\Http\Livewire\Portal\Registration\HousingEstate;

use Livewire\Component;
use PDF;
use Illuminate\Support\Arr;
use App\Models\TitreFoncier;
use App\Models\Registration\Block;
use App\Models\Registration\Parcel;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Models\Registration\HousingEstate;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{

    use WithDataTables;

    public HousingEstate $housing_estate;
    public $land_titles, $land_id, $area, $usable_area, $area_solde, $remaning_area;
    public $state = 0;
    public $blocks = [], $blocks_delete;
    public $newBlockName = '';
    public $newLot = ['type' => '', 'lot_affectation' => '', 'lot_no' => '', 'lot_area' => '', 'condition_lot' => '', 'lot_status' => '', 'notary_office' => '', 'notary_clerk' => '', 'geometric_pratic' => '', 'geometrician' => '', 'date' => ''];
    public $countBlock = 0;

    public function addBlock()
    {
        $this->blocks[] = [
            'land_id' =>  $this->land_id,
            'name' => $this->newBlockName,
            'parcels' => [],
        ];

        $this->newBlockName = '';
        // $this->saveBlocksToJson();
    }

    public function addLot($blockIndex)
    {
        $this->newLot = ['lot_no' => '', 'lot_area' => '', 'condition_lot' => 'standard', 'type' => '', 'lot_status' => '', 'notary_office' => '', 'notary_clerk' => '', 'geometric_pratic' => '', 'geometrician' => '', 'date' => ''];
        $this->blocks[$blockIndex]['parcels'][] = $this->newLot;
    }

    public function addLotPublic($blockIndex)
    {
        $this->newLot = ['lot_no' => '', 'lot_area' => '', 'type' => 'public', 'lot_affectation' => '', 'date' => ''];
        $this->blocks[$blockIndex]['parcels'][] = $this->newLot;
    }

    public function removeBlock($blockIndex)
    {
        unset($this->blocks[$blockIndex]);
        $this->blocks = array_values($this->blocks);
    }

    public function removeLot($blockIndex, $lotIndex)
    {
        unset($this->blocks[$blockIndex]['parcels'][$lotIndex]);
        $this->blocks[$blockIndex]['parcels'] = array_values($this->blocks[$blockIndex]['parcels']);
    }

    protected array $rules = [
        'housing_estate.maeture' => 'sometimes',
        'housing_estate.code' => 'sometimes',
        'housing_estate.property_developer' => 'sometimes',
        'housing_estate.lotisser' => 'sometimes',
        'housing_estate.estate_agent' => 'sometimes',
        'housing_estate.geometric_pratice' => 'sometimes',
        'housing_estate.geometric' => 'sometimes',
        'housing_estate.urbanist' => 'sometimes',
        'housing_estate.controller' => 'sometimes',
    ];

    public function mount()
    {
        $this->housing_estate = new HousingEstate();
        $this->land_titles = TitreFoncier::all();
    }

    public function updatedLandId($id)
    {
        $land = TitreFoncier::findOrFail($id);
        $this->area = $land->superficie_du_TF_mere;
        $this->area_solde = $land->superficie_vendue_du_TF_mere === null ? 0 : $land->superficie_vendue_du_TF_mere;
        // dd($this->area_solde);
        $this->remaning_area = $land->superficie_restant_du_TF_mere === null ? 0 : $land->superficie_restant_du_TF_mere;
    }

    public function initData($id)
    {
        $this->housing_estate = HousingEstate::findOrFail($id);
        // dd($this->housing_estate->land_title->numero_titre_foncier);
        // $this->blocks_delete = $this->housing_estate->blocks()->with('parcels')->get();
        $this->blocks = $this->housing_estate->blocks()->with('parcels')->get()->toArray();
        // dd($this->blocks);
        $this->state = 1;
    }

    public function generateUniqueCode($year, $counter)
    {
        $counterFormatted = str_pad($counter, 5, '0', STR_PAD_LEFT);
        return $year . 'LOT' . $counterFormatted;
    }

    public function store()
    {

        // if (!Gate::allows('housing_estate.create') || !Gate::allows('housing_estate.update')) {
        //     return abort(401);
        // }

        // Récupérer l'année en cours au format 'yy'
        $year = date('y');

        // Récupérer le compteur depuis la base de données (par exemple en comptant les enregistrements de lotissement existants)
        $counter = HousingEstate::count() + 1;

        // Générer le code unique
        $code = $this->generateUniqueCode($year, $counter);

        $this->validate();

        $this->housing_estate->land_id = $this->land_id;
        $this->housing_estate->code = $code;
        $this->housing_estate->save();

        if ($this->state == 0) {
            foreach ($this->blocks as $key => $blockData) {
                $block = Block::create([
                    'housing_estate_id' => $this->housing_estate->id,
                    'name' => $blockData['name']
                ]);

                foreach ($blockData['parcels'] as $lotData) {
                    // Créer un nouveau lot avec les données du tableau
                    if ($lotData['type'] != 'public') {
                        $lot = Parcel::create([
                            'block_id' => $block->id,
                            'lot_no' => $lotData['lot_no'],
                            'lot_area' => $lotData['lot_area'],
                            'lot_status' => $lotData['lot_status'],
                            'type' => $lotData['type'],
                            'notary_office' => $lotData['notary_office'],
                            'notary_clerk' => $lotData['notary_clerk'],
                            'geometric_pratic' => $lotData['geometric_pratic'],
                            'geometrician' => $lotData['geometrician'],
                            'date' => $lotData['date'],
                        ]);
                    } else {
                        $lot = Parcel::create([
                            'block_id' => $block->id,
                            'lot_no' => $lotData['lot_no'],
                            'lot_area' => $lotData['lot_area'],
                            'type' => $lotData['type'],
                            'lot_affectation' => $lotData['lot_affectation'],
                            'date' => $lotData['date'],
                        ]);
                    }
                }
            }
        } else {
            foreach ($this->blocks as $blockData) {
                $block = Block::findOrFail($blockData['id']);
                $block->update([
                    'name' => $blockData['name']
                ]);
                // Mise à jour des lots existants
                if (is_array($blockData) && isset($blockData['parcels'])) {
                    // Mise à jour des lots existants
                    foreach ($blockData['parcels'] as $lotData) {
                        $lot = Parcel::findOrFail($lotData['id']);
                        $lot->update($lotData);
                    }
                }
            }
        }
        // dd($this->blocks);

        $this->state = 0;
        $this->clearFields();
        $this->refresh(__('housing_estate successfully :state!', ['state' => $this->state ? 'Updated' : 'Created']), 'CreateUpdateHousingEstateModal');
    }

    public function delete()
    {
        // if (!Gate::allows('service.delete')) {
        //     return abort(401);
        // }

        if (!empty($this->housing_estate)) {

            // Supprimer tous les lots associés au bloc
            // $this->housing_estate->blocks()->parcels()->delete();

            // Supprimer le bloc lui-même
            $this->housing_estate->blocks()->delete();

            $this->housing_estate->delete();
        }

        $this->housing_estate = new HousingEstate();

        $this->state = 0;

        $this->refresh(__('Housing Estate successfully deleted!'), 'DeleteModal');
    }

    public function clearFields()
    {
        $this->reset([
            'blocks',
            // 'housing_estate',
            // 'amount_deposit',
            // 'remaining_amount'
        ]);
        // $this->blocks = [];
        // $this->housing_estate;
    }

    public function render()
    {

        // if (!Gate::allows('housing_estate.view')) {
        //     return abort(401);
        // }

        // dd($this->blocks);

        $housing_estates = HousingEstate::
            // withCount('users')->
            orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $housing_estates_count = HousingEstate::count();
        // dd($housing_estates_count);

        return view('livewire.portal.registration.housing-estate.index', ['housing_estates' => $housing_estates, 'housing_estates_count' => $housing_estates_count]);
    }

    public function  printPdf()
    {
        $data = [
            'housing_estate' => $this->housing_estate,
            'email' => 'john@example.com',
            // Autres données que vous souhaitez afficher dans la vue
        ];

        $pdf = PDF::loadView('livewire.portal.registration.housing-estate.print', $data);

        return $pdf->download('livewire.portal.registration.housing-estate.print.pdf');

        // $pdf = app('dompdf.wrapper')->loadView('livewire.portal.registration.housing-estate.view-housing_estate', $data);
        // $pdf->setPaper('A4'); // Vous pouvez également définir d'autres tailles de papier comme 'letter', 'legal', etc.

        // return $pdf->stream('test.pdf');
    }
    
}
