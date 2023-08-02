<?php

namespace App\Http\Livewire\Portal\Registration\Subdivision;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use App\Models\Registration\Subdivision;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{

    use WithDataTables;
    
    public Subdivision $subdivision;
    public $state = 0;
    public $blocks = [];
    public $newBlockName = '';
    public $newLot = ['numero' => '', 'superficie' => '', 'etat' => ''];

    public function __construct()
    {
        parent::__construct();

        // Initialize the form with a default block and an empty lot
        $this->blocks[] = [
            'name' => '',
            'lots' => [$this->newLot],
        ];
    }

    

    public function addBlock()
    {
        $this->blocks[] = [
            'name' => $this->newBlockName,
            'lots' => [],
        ];

        $this->newBlockName = '';
    }

    public function addDefaultLot()
    {
        $this->blocks[0]['lots'][] = $this->newLot;
        $this->newLot = ['numero' => '', 'superficie' => '', 'etat' => ''];
    }

    public function addLot($blockIndex)
    {
        $this->blocks[$blockIndex]['lots'][] = $this->newLot;
        $this->newLot = ['numero' => '', 'superficie' => '', 'etat' => ''];
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


     //Update & Store Rules
     protected array $rules = [
        'service.service_name_fr' => 'required',
        'service.service_name_en' => 'required',
        'service.code' => 'required',
        'service.status' => 'sometimes'
    ];



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
