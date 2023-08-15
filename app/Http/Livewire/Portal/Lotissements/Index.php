<?php

namespace App\Http\Livewire\Portal\Lotissements;

// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Illuminate\Support\Arr;
use App\Models\TitreFoncier;
use Illuminate\Support\Facades\Gate;
use App\Models\Lotissements\Lotissement;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{
    public Lotissement $lotissement;

    use WithDataTables;

    public function mount()
    {
      
    }

    public function initData($id) : void 
    {
        $this->lotissement = Lotissement::findOrFail($id);
    }
 
    public function delete()
    {
        if (!Gate::allows('lotissement.delete')) {
            return abort(401);
        }

        if (!empty($this->lotissement)) {

            // Supprimer tous les lots associés au bloc
            $this->lotissement->parcels()->delete();

            // Supprimer le bloc lui-même
            $this->lotissement->blocks()->delete();

            $this->lotissement->delete();
        }

        session()->flash('message', __('Lotissement and Blockd and Lots successfully deleted!'));

        return redirect()->route('portal.lotissements.index');
    }


    public function render()
    {
        if (!Gate::allows('lotissement.view')) {
            return abort(401);
        }

        $lotissements = Lotissement::withCount('blocks')->withCount('parcels')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $lotissements_count = Lotissement::count();

        return view('livewire.portal.lotissements.index', 
        [
            'lotissements' => $lotissements,
            'lotissements_count' => $lotissements_count
        ]);
    }

    public function  printPdf($id)
    {
        $this->lotissement = Lotissement::findOrFail($id);
        $data = [
            'housing_estate' => $this->lotissement,
            'email' => 'john@example.com',
            // Autres données que vous souhaitez afficher dans la vue
        ];

        $pdf = Pdf::loadView('livewire.portal.lotissements.print',$data);

        return $pdf->download('print.pdf');

        // $pdf = app('dompdf.wrapper')->loadView('livewire.portal.registration.housing-estate.view-housing_estate', $data);
        // $pdf->setPaper('A4'); // Vous pouvez également définir d'autres tailles de papier comme 'letter', 'legal', etc.

        // return $pdf->stream('test.pdf');
    }
    
}
