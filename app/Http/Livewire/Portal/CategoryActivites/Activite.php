<?php

namespace App\Http\Livewire\Portal\CategoryActivites;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use App\Models\Activite as ModelsActivite;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\CategoryActivite;

class Activite extends Component
{
    use WithDataTables;

    public ?ModelsActivite $activite;
    public $state = 0;
    public $categories;
    public $category_activite_id;

    //Update & Store Rules
    protected array $rules = [
        'activite.nom_activite' => 'required',
        'activite.type_de_facturation' => 'required',
        'activite.value' => 'required',
        'activite.value_minimale' => 'required',
        'activite.category_activite_id' => 'required',
        'activite.status' => 'sometimes'
    ];

    public function mount()
    {
        $this->categories = CategoryActivite::select('id', 'nom_category', 'grand_section')->get();

        $this->activite = new ModelsActivite();
    }


    public function store()
    {
        if (!Gate::allows('category_activites_and_activite.create') || !Gate::allows('category_activites_and_activite.update')) {
            return abort(401);
        }

        $this->validate();

        $this->activite->save();

        $this->state = 0;

        $this->clearFields();

        $this->refresh(__('Activite successfully :state!', ['state' => $this->state ? 'Updated' : 'Created']), 'CreateUpdateActiviteModal');
    }

    public function initData($id)
    {
       $this->activite = ModelsActivite::findOrFail($id);
    
       $this->state = 1;
    }

    public function delete()
    {
        if (!Gate::allows('category_activites_and_activite.delete')) {
            return abort(401);
        }

        if (!empty($this->activite)) {

            $this->activite->delete();
        }

        $this->activite = new ModelsActivite();

        $this->state = 0;

        $this->clearFields();

        $this->refresh(__('Activités supprimées avec succès!'), 'DeleteModal');
    }


    public function clearFields()
    {
        $this->activite->nom_activite = '';
        $this->activite->type_de_facturation = null;
        $this->activite->value = null;
        $this->activite->value_minimale = null;
        $this->activite->category_activite_id = null;
        $this->activite->status = null;
            
    }

    public function render()
    {
        if (!Gate::allows('category_activites_and_activite.view')) {
            return abort(401);
        }

        $activites = ModelsActivite::search($this->query)->with('category')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $activites_count = ModelsActivite::count();

        return view('livewire.portal.category-activites.activite', ['activites' => $activites, 'activites_count' => $activites_count])->layout('components.layouts.dashboard');

    }
}
