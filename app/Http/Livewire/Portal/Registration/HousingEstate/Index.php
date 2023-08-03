<?php

namespace App\Http\Livewire\Portal\Registration\HousingEstate;

use Livewire\Component;
use Illuminate\Support\Arr;
use App\Models\Registration\Block;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Models\Registration\HousingEstate;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\Registration\Parcel;

class Index extends Component
{

    use WithDataTables;

    public HousingEstate $housing_estate;
    public $state = 0;
    public $blocks = [];
    public $newBlockName = '';
    public $newLot = ['lot_no' => '', 'lot_area' => '', 'condition_lot' => '', 'lot_status' => '', 'notary_office' => '', 'notary_clerk' => '', 'geometric_pratic' => '', 'geometrician' => '', 'date' => ''];
    public $countBlock = 0;
    public $land_id;

    public function addBlock()
    {
        $this->blocks[] = [
            'land_id' =>  $this->land_id,
            'name' => $this->newBlockName,
            'lots' => [],
        ];

        $this->newBlockName = '';
        // $this->saveBlocksToJson();
    }

    public function addLot($blockIndex)
    {
        $this->blocks[$blockIndex]['lots'][] = $this->newLot;
        $this->newLot = ['lot_no' => '', 'lot_area' => '', 'condition_lot' => '', 'lot_status' => '', 'notary_office' => '', 'notary_clerk' => '', 'geometric_pratic' => '', 'geometrician' => '', 'date' => ''];
    }

    public function removeBlock($blockIndex)
    {
        unset($this->blocks[$blockIndex]);
        $this->blocks = array_values($this->blocks);
    }

    public function removeLot($blockIndex, $lotIndex)
    {
        unset($this->blocks[$blockIndex]['lots'][$lotIndex]);
        $this->blocks[$blockIndex]['lots'] = array_values($this->blocks[$blockIndex]['lots']);
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
    }

    public function initData($id)
    {
        $this->housing_estate = HousingEstate::findOrFail($id);
        $this->state = 1;
    }

    public function store()
    {

        // if (!Gate::allows('housing_estate.create') || !Gate::allows('housing_estate.update')) {
        //     return abort(401);
        // }
        $this->validate();

        $this->housing_estate->land_id = 1;
        $this->housing_estate->code = 2772;
        $this->housing_estate->save();

        foreach ($this->blocks as $key => $blockData) {
            $block = Block::create([
                'housing_estate_id' => $this->housing_estate->id,
                'name' => $blockData['name']
            ]);

            foreach ($blockData['lots'] as $lotData) {
                // Créer un nouveau lot avec les données du tableau
                $lot = Parcel::create([
                    'block_id' => $block->id,
                    'lot_no' => $lotData['lot_no'],
                    'lot_area' => $lotData['lot_area'],
                    'lot_status' => $lotData['lot_status'],
                    'notary_office' => $lotData['notary_office'],
                    'notary_clerk' => $lotData['notary_clerk'],
                    'geometric_pratic' => $lotData['geometric_pratic'],
                    'geometrician' => $lotData['geometrician'],
                    'date' => $lotData['date'],
                ]);
            }
        }

        // dd($this->blocks);

        $this->state = 0;

        $this->refresh(__('housing_estate successfully :state!', ['state' => $this->state ? 'Updated' : 'Created']), 'CreateUpdateHousingEstateModal');
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

        return view('livewire.portal.registration.housing-estate.index' , ['housing_estates' => $housing_estates, 'housing_estates_count' => $housing_estates_count]);
    }
}
