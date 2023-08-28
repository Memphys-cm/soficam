<?php

namespace App\Http\Livewire\Portal\BienImmobilier;

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

class Index extends Component
{
    use WithDataTables;

    public $status = 'pending_payment';
    public $validity, $releve_reason, $bien_immobilier, $titrefoncier;
    public $releves_type, $releve_number, $requestor_id, $price, $requestors;
    public $certificate_propriete_id, $titre_foncier_id;
    public $type = 'bien_immobilier';
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
            $bien_immobilier = ReleveImmobilier::create([
                'type' => 'bien_immobilier',
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
                'sales_type' => 'bien_immobilier',
                'created_by' => auth()->user()->name,
            ]);

            // Create the Saleable item using only the specified information
            $saleableData = [
                'sale_id' => $sale->id,
                'price' => $this->price,
                'quantity' => 1,
                'saleable_id' => $bien_immobilier->id,
                'saleable_type' => 'App\Models\ReleveImmobilier', // Adjust the namespace if different
                'created_by' => auth()->user()->name,
            ];

            DB::table('saleables')->insert($saleableData);
        });
       
        $this->clearFields();
        $this->refresh(__('Bien immobilier créé avec succès!'), 'CreateEstateModal');
    }

    public function initData($id)
    {
        $bien_immobilier = ReleveImmobilier::findOrFail($id);
        $this->bien_immobilier = $bien_immobilier;
        $this->type =  $bien_immobilier->type;
        $this->releves_type =  $bien_immobilier->releves_type;
        $this->releve_reason =  $bien_immobilier->releve_reason;
        $this->requestor_id =  $bien_immobilier->requestor_id;
        $this->price =  $bien_immobilier->price;
        $this->validity =  $bien_immobilier->validity;
        $this->releve_number =  $bien_immobilier->releve_number;
        $this->status =  $bien_immobilier->status;
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

        $this->refresh(__('Bien immobilier mis à jour !'), 'BienUpdateModal');

        $this->clearFields();
    }

    
    public function delete()
    {
        if ($this->bien_immobilier) {
            DB::transaction(function () {
                $sale = $this->bien_immobilier->sale;
                if ($sale) {
                    $sale->saleables()->delete();
                    $sale->delete();
                }
    
                $this->bien_immobilier->delete();
            });
    
            $this->refresh(__('Bien immobilier Supprimé avec succès'), 'DeleteModal');
        }
    }

    public function  printPdf($id)
    {
        $this->bien_immobilier = ReleveImmobilier::findOrFail($id);
        $data = [
            'bien_immobilier' => $this->bien_immobilier,
            'email' => 'john@example.com',
            // Autres données que vous souhaitez afficher dans la vue
        ];

        $pdf = Pdf::loadView('livewire.portal.bien-immobilier.print',$data)->setPaper('a4', 'portrait');


        return response()->streamDownload(
            fn () => print($pdf->output()),
            __('Report-') . Str::random('10') . ".pdf"
        );
    }

    public function render()
    {

        $bien_immobiliers = ReleveImmobilier::search($this->query)->where('type', 'bien_immobilier')->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $bien_immobiliers_count = ReleveImmobilier::where('type', 'bien_immobilier')->count();
        return view('livewire.portal.bien-immobilier.index', [
            'bien_immobiliers' => $bien_immobiliers,
            'bien_immobiliers_count' => $bien_immobiliers_count
        ]);
    }
}