<?php

namespace App\Http\Livewire\Portal\ReleveImmobilier\Immobilier;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Sales\Sale;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ReleveImmobilier;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\WithDataTables;
use App\Models\Sales\Saleable;

class Index extends Component
{
    use WithDataTables;

    public $status = 'pending_payment';
    public $validity, $releve_reason, $immobilier, $titrefoncier;
    public $releves_type, $releve_number, $requestor_id, $price, $requestors;
    public $certificate_propriete_id, $titre_foncier_id;
    public $type = 'immobilier';
    public $titre_foncier_options = [];


    public function mount()
    {
        $this->requestors = User::role('user')->select('id', 'first_name', 'last_name')->get();
        $this->titrefoncier = TitreFoncier::all();
    }
    public function store()
    {
        
        $this->validate([
            'type' => 'nullable',
            'releves_type' => 'required',
            'releve_reason' => 'required',
            'requestor_id' => 'required',
            'price' => 'required|integer',
            'validity' => 'nullable|date',
            'releve_number' => 'required',
            'titre_foncier_id' => 'required',
            'status' => 'nullable',

        ]);

        DB::transaction(function () {
            $immobilier = ReleveImmobilier::create([
                'type' => 'immobilier',
                'releve_reason' => $this->releve_reason,
                'requestor_id' => $this->requestor_id,
                'price' => $this->price,
                'validity' => Carbon::now()->addMonths(3),
                'releve_number' => $this->releve_number,
                'status' => $this->status,
                'titre_foncier_id' => $this->titre_foncier_id,
                'releves_type' => $this->releves_type,
                'recorded_by' => auth()->user()->name,
            ]);

            $sale = Sale::create([
                'user_id' => $this->requestor_id,
                'sales_amount' => $this->price,
                'sales_type' => 'immobilier',
                'created_by' => auth()->user()->name,
            ]);

            // Create the Saleable item using only the specified information
            Saleable::create([
                'sale_id' => $sale->id,
                'price' => $this->price,
                'quantity' => 1,
                'saleable_id' => $immobilier->id,
                'saleable_type' => 'App\Models\ReleveImmobilier', // Adjust the namespace if different
                'created_by' => auth()->user()->name,
            ]);
            
        });
       
        $this->clearFields();
        $this->refresh(__('immobilier successfully Created!'), 'createimmobilierModal');
    }

    public function initData($id)
    {
        $immobilier = ReleveImmobilier::findOrFail($id);
        $this->immobilier = $immobilier;
        $this->type =  $immobilier->type;
        $this->releves_type =  $immobilier->releves_type;
        $this->releve_reason =  $immobilier->releve_reason;
        $this->requestor_id =  $immobilier->requestor_id;
        $this->price =  $immobilier->price;
        $this->validity =  $immobilier->validity;
        $this->releve_number =  $immobilier->releve_number;
        $this->status =  $immobilier->status;
        //$this->titre_foncier_id = $titre_foncier_id;

    }
    public function clearFields()
    {
        $this->type = '';
        $this->releves_type = '';
        $this->releve_reason = '';
        $this->requestor_id = '';
        $this->price = '';
        $this->validity = '';
        $this->releve_number = '';
        $this->status = '';
        $this->titre_foncier_id = '';
    }

    public function update()
    {
        $this->validate([
            'type' => 'nullable',
            'releves_type' => 'required',
            'releve_reason' => 'required',
            'requestor_id' => 'required',
            'price' => 'required|integer',
            'validity' => 'nullable|date',
            'releve_number' => 'required',
            'status' => 'nullable',

        ]);       
        DB::transaction(function () {
            $this->immobilier->update([
                'type' => $this->type,
                'releves_type' => $this->releves_type,
                'releve_reason' => $this->releve_reason,
                'requestor_id' => $this->requestor_id,
                'price' => $this->price,
                'validity' => Carbon::now()->addMonths(3),
                'releve_number' => $this->releve_number,
                'status' => $this->status,
            ]);
        });

        $this->refresh(__('immobilier Updated Created!'), 'updateimmobilierModal');

        $this->clearFields();
    }

    
    public function delete()
    {
        if ($this->immobilier) {
            DB::transaction(function () {
                $sale = $this->immobilier->sale;
                if ($sale) {
                    $sale->saleables()->delete();
                    $sale->delete();
                }
    
                $this->immobilier->delete();
            });
    
            $this->refresh(__('immobilier deleted successfully'), 'DeleteModal');
        }
    }

    public function  printPdf($id)
    {
        $this->immobilier = ReleveImmobilier::findOrFail($id);
        $data = [
            'element' => $this->immobilier,
            'email' => 'john@example.com',
            // Autres données que vous souhaitez afficher dans la vue
        ];

        $pdf = Pdf::loadView('livewire.portal.releve-immobilier.immobilier.print',$data)->setPaper('a4', 'portrait');


        return response()->streamDownload(
            fn () => print($pdf->output()),
            __('Report-') . Str::random('10') . ".pdf"
        );
    }

    public function render()
    {

        $immobiliers = ReleveImmobilier::search($this->query)->where('type', 'immobilier')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $immobiliers_count = ReleveImmobilier::where('type', 'immobilier')->count();
        return view('livewire..portal.releve-immobilier.immobilier.index', [
            'immobiliers' => $immobiliers,
            'immobiliers_count' => $immobiliers_count
        ]);
    }
}
