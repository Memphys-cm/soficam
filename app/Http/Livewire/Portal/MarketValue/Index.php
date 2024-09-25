<?php

namespace App\Http\Livewire\Portal\MarketValue;

use Livewire\Component;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\Land;
use App\Models\SubDivision;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{

    use WithDataTables;

    public $villageName ,$marketValue ,$sub_division_id ,$subdivisions , $land;

    public function mount()
    {
        $this->subdivisions = SubDivision::select('id', 'sub_division_name_en')->get();
    }
    
    public function store()
    {
        // Valider les champs avant la mise à jour
        $this->validate([
            'villageName' => 'required|unique:lands,name,',  // Unicité avec l'ID actuel exclu
            'marketValue' => 'required|numeric',
            'sub_division_id' => 'required|exists:sub_divisions,id'
        ]);
    
        // Mettre à jour le terrain avec les nouvelles valeurs
        $land = Land::create([
            'name' => $this->villageName,
            'market_value' => $this->marketValue,
            'sub_division_id' => $this->sub_division_id
        ]);

        $this->refresh(__('Valeur Venale creer avec success!'), 'CreatelandModal');
    }

    public function initData($id)
    {
        $this->land = Land::find($id);
        $land = $this->land;
        $this->villageName = $land->name;
        $this->marketValue = $land->market_value ? $land->market_value : 0;
        $this->sub_division_id = $land->sub_division_id;
        
    }

    public function update()
    {
        // Valider les champs avant la mise à jour
        $this->validate([
            'villageName' => 'required|unique:lands,name,' . $this->land->id,  // Unicité avec l'ID actuel exclu
            'marketValue' => 'required|numeric',
            'sub_division_id' => 'required|exists:sub_divisions,id'
        ]);
    
        // Mettre à jour le terrain avec les nouvelles valeurs
        $this->land->update([
            'name' => $this->villageName,
            'market_value' => $this->marketValue,
            'sub_division_id' => $this->sub_division_id
        ]);

        $this->refresh(__('Valeur Venale Mise a jour avec success!'), 'EditlandModal');
    }

    public function delete()
    {
        if (!Gate::allows('titre_foncier.delete')) {
            return abort(401);
        }

        if (!empty($this->land)) {
            $this->land->delete();
        }

        $this->refresh(__('Titre Foncier supprimé avec succès!'), 'DeleteModal');
    }

    public function render()
    {
        $lands = Land::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);
        $lands_count = Land::count();

        return view('livewire.portal.market-value.index', compact('lands','lands_count'))
        ->layout('components.layouts.dashboard');
    }
}
