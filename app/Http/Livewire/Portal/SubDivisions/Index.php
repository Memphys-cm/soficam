<?php

namespace App\Http\Livewire\Portal\SubDivisions;

use Livewire\Component;
use App\Models\Division;
use App\Models\SubDivision;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{

    use WithDataTables;

    public SubDivision $sub_division;
    public $state = 0;
    public $divisions;
    public $division_id;
    public ?string $query = null;

    //Update & Store Rules
    protected array $rules = [
        'sub_division.sub_division_name_fr' => 'required',
        'sub_division.sub_division_name_en' => 'required',
        'sub_division.code' => 'required',
        'sub_division.division_id' => 'required',
        'sub_division.prix_minima_m2' => 'required',
        'sub_division.status' => 'sometimes',
        'sub_division.total_surface_area' => 'sometimes|integer'
    ];

    public function mount()
    {
        $this->divisions = Division::select('id', 'division_name_fr', 'division_name_en')->get();

        $this->sub_division = new SubDivision();
    }


    public function store()
    {
        if (!Gate::allows('sub_division.create')|| !Gate::allows('sub_division.update')) {
            return abort(401);
        }

        $this->validate();

        $this->sub_division->save();

        $this->state = 0;
        $this->clearFields();
        $this->refresh(__('Arrondissement reussi :state!', ['state' => $this->state ? 'Mis à jour' : 'Créer']), 'CreateUpdateSubDivisionModal');
    }

    public function initData($id)
    {
        $this->sub_division = SubDivision::findOrFail($id);
        $this->state = 1;
    }

    public function delete()
    {
        if (!Gate::allows('sub_division.delete') ) {
            return abort(401);
        }

        if (!empty($this->sub_division)) {

            $this->sub_division->delete();
        }

        $this->sub_division = new SubDivision();

        $this->state = 0;

        $this->refresh(__('Arrondissement supprimée avec succès!'), 'DeleteModal');
    }
    public function clearFields()
    {
        $this->reset(
            [
                'code',
                'division_id',
                'superficie_vendu',
                'sub_division_name_en',
                'sub_division_name_fr',
                'total_surface_area',
                'prix_minima_m2',
                'status',
               
            ]
        );

    }

    public function render()
    {
        if (!Gate::allows('sub_division.view')) {
            return abort(401);
        }

        $sub_divisions = SubDivision::search($this->query)->with('division')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $sub_divisions_count = SubDivision::count();

        return view('livewire.portal.sub-divisions.index', [
            'sub_divisions' => $sub_divisions,
            'sub_divisions_count' => $sub_divisions_count,
        ])->layout('components.layouts.dashboard');
    }
   
}
