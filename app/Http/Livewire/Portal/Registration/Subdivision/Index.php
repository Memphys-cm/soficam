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
    public $newLot = ['lot_no' => '', 'lot_area' => '', 'condition_lot' => '', 'lot_status' => '', 'notary_office' => '' , 'notary_clerk' => '' , 'geometric_pratic' => '', 'geometrician' => '' , 'date' => ''] ;
    public $countBlock = 0;
    public $land_id;
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
        $this->newLot = ['lot_no' => '', 'lot_area' => '', 'condition_lot' => '', 'lot_status' => '', 'notary_office' => '' , 'notary_clerk' => '' , 'geometric_pratic' => '', 'geometrician' => '' , 'date' => ''] ;
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


     //Update & Store Rules
     protected array $rules = [
        'service.service_name_fr' => 'required',
        'service.service_name_en' => 'required',
        'service.code' => 'required',
        'service.status' => 'sometimes'
    ];

    public function mount()
    {
        // $url = Storage::url('blocks_data.json');
        // dd($url);
    }

    public function store()
    {
        $this->saveBlocksToJson();
    }

    public function render()
    {

        // if (!Gate::allows('service.view')) {
        //     return abort(401);
        // }

        $subdivisions = Subdivision::
        // withCount('users')->
        orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $subdivisions_count = Subdivision::count();

        return view('livewire.portal.registration.subdivision.index' , ['subdivisions' => $subdivisions,'subdivisions_count' => $subdivisions_count]);
    }
}
