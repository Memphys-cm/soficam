<?php

namespace App\Http\Livewire\Portal\Lotissements;

use PDF;
use Livewire\Component;
use Illuminate\Support\Arr;
use App\Models\TitreFoncier;
use App\Models\Registration\Block;
use App\Models\Registration\Parcel;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Models\Lotissements\Lotissement;
use App\Models\Registration\HousingEstate;
use App\Http\Livewire\Traits\WithDataTables;

class Index extends Component
{

    use WithDataTables;

    public function mount()
    {
      
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
