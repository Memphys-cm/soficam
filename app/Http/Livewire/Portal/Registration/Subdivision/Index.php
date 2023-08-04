<?php

namespace App\Http\Livewire\Portal\Registration\Subdivision;

use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Models\Registration\Subdivision;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{

    use WithDataTables;

    public Subdivision $subdivision;
    public $state = 0;
    public $blocks = [];
    public $newBlockName = '';
    public $newLot = ['lot_no' => '', 'lot_area' => '', 'condition_lot' => '', 'lot_status' => '', 'notary_office' => '', 'notary_clerk' => '', 'geometric_pratic' => '', 'geometrician' => '', 'date' => ''];
    public $countBlock = 0;
    public $land_id =  1;
    // public function __construct()
    // {
    //     parent::__construct();

    //     // Load existing blocks data from the JSON file
    //     // $jsonData = Storage::exists('blocks_data.json') ? Storage::get('blocks_data.json') : '[]';
    //     // $this->blocks = json_decode($jsonData, true);


    //     // Initialize the form with a default block and an empty lot
    //     $this->blocks[] = [
    //         'land_id' => '',
    //         'name' => '',
    //         'lots' => [$this->newLot],
    //     ];
    // }



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

    // public function addDefaultLot()
    // {
    //     $this->blocks[0]['lots'][] = $this->newLot;
    //     $this->newLot = ['lot_no' => '', 'lot_area' => '', 'condition_lot' => '', 'lot_status' => '', 'notary_office' => '' , 'notary_clerk' => '' , 'geometric_pratic' => '', 'geometrician' => '' , 'date' => ''] ;

    //     $this->saveBlocksToJson();
    // }

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

    public function saveBlocksToJson()
    {
        $jsonData = json_encode($this->blocks, JSON_PRETTY_PRINT);

        // Load existing JSON data from the file, if available
        $existingData = [];
        if (Storage::exists('blocks_data.json')) {
            $existingJsonData = Storage::get('blocks_data.json');
            $existingData = json_decode($existingJsonData, true);
        }

        // Merge the existing data with the new data
        $mergedData = Arr::collapse([$existingData, $this->blocks]);

        // Save the merged data back to the file
        $mergedJsonData = json_encode($mergedData, JSON_PRETTY_PRINT);
        Storage::put('blocks_data.json', $mergedJsonData);
    }

    public function showBlocksDataView()
    {
        if (Storage::exists('blocks_data.json')) {
            $jsonData = Storage::get('blocks_data.json');
            $blocksData = json_decode($jsonData, true);

            // Filtrer les blocs avec 'name' égal à 'me'
            $filteredBlocksData = array_filter($blocksData, function ($block) {
                return isset($block['land_id']) && $block['land_id'] == $this->subdivision->id;
            });
            $this->blocks = $filteredBlocksData;
        } else {
            $this->blocks = null;
        }
    }
    public function updateBlocksAndLotsForLandId($landId, $newBlocksData)
    {
        if (Storage::exists('blocks_data.json')) {
            $jsonData = Storage::get('blocks_data.json');
            $blocksData = json_decode($jsonData, true);
    
            $blocksData = array_values(array_filter($blocksData, function ($block) use ($landId) {
                return isset($block['land_id']) && $block['land_id'] !== $landId;
            }));
    
            // Ajouter les nouvelles données pour le land_id donné
            // $newBlocksData['land_id'] = $landId;
            $blocksData[] = $newBlocksData;
    
            // Sauvegarder les modifications dans le fichier JSON
            $jsonData = json_encode($blocksData, JSON_PRETTY_PRINT);
            Storage::put('blocks_data.json', $jsonData);
        } else {
            // Si le fichier n'existe pas, vous pouvez le créer ici avec les nouvelles données pour land_id = 1.
            $jsonData = json_encode([$newBlocksData], JSON_PRETTY_PRINT);
            Storage::put('blocks_data.json', $jsonData);
        }
    }
    //Update & Store Rules
    protected array $rules = [
        'subdivision.maeture' => 'sometimes',
        'subdivision.code' => 'sometimes',
        'subdivision.property_developer' => 'sometimes',
        'subdivision.lotisser' => 'sometimes',
        'subdivision.estate_agent' => 'sometimes',
        'subdivision.geometric_pratice' => 'sometimes',
        'subdivision.geometric' => 'sometimes',
        'subdivision.urbanist' => 'sometimes',
        'subdivision.controller' => 'sometimes',
    ];

    public function mount()
    {
        $this->subdivision = new Subdivision();
    }

    public function initData($id)
    {
        $this->subdivision = Subdivision::findOrFail($id);
        $this->showBlocksDataView();
        $this->state = 1;
    }

    public function store()
    {

        // if (!Gate::allows('subdivision.create') || !Gate::allows('subdivision.update')) {
        //     return abort(401);
        // }

        $this->saveBlocksToJson();
        if ($this->state == 1) $this->updateBlocksAndLotsForLandId($this->subdivision->id, $this->blocks);
        $this->validate();

        // $this->subdivision->land_id = 1;
        // $this->subdivision->code = 2772;
        // $this->subdivision->save();

        $this->state = 0;

        $this->refresh(__('subdivision successfully :state!', ['state' => $this->state ? 'Updated' : 'Created']), 'CreateUpdateSubdivisionModal');
    }

    public function render()
    {

        // if (!Gate::allows('subdivision.view')) {
        //     return abort(401);
        // }

        // dd($this->blocks);

        $subdivisions = Subdivision::
            // withCount('users')->
            orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $subdivisions_count = Subdivision::count();
        // dd($subdivisions_count);

        return view('livewire.portal.registration.subdivision.index', ['subdivisions' => $subdivisions, 'subdivisions_count' => $subdivisions_count]);
    }
}