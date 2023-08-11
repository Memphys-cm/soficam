<?php

namespace App\Http\Livewire\Portal\CertificatePropriete;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Sales\Sale;
use App\Models\TitreFoncier;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\CertificatePropriete;
use App\Http\Livewire\Traits\WithDataTables;


class Index extends Component
{
    use WithDataTables;

    public $status = 'pending_payment';
    public $validity, $certificate_proprietes_type, $certificate_propriete_reason, $certificatepropriete, $titre_fonciers;
    public $titre_foncier_id, $certificate_proprietes_number, $requestor_id, $price, $requestors;
    public $certificate_propriete_id;

    public function mount()
    {
        $this->titre_fonciers = TitreFoncier::select('id', 'numero_titre_foncier')->get();
        $this->requestors = User::role('user')->select('id', 'first_name', 'last_name')->get();
    }
    public function store()
    {
        
        $this->validate([
            'titre_foncier_id' => 'required',
            'certificate_proprietes_type' => 'required',
            'certificate_propriete_reason' => 'required',
            'requestor_id' => 'required',
            'price' => 'required|integer',
            'validity' => 'nullable|date',
            'certificate_proprietes_number' => 'required',
            'status' => 'required',

        ]);

        DB::transaction(function () {
            $certificatepropriete = CertificatePropriete::create([
                'titre_foncier_id' => $this->titre_foncier_id,
                'certificate_proprietes_type' => $this->certificate_proprietes_type,
                'certificate_propriete_reason' => $this->certificate_propriete_reason,
                'requestor_id' => $this->requestor_id,
                'price' => $this->price,
                'validity' => Carbon::now()->addMonths(3),
                'certificate_proprietes_number' => $this->certificate_proprietes_number,
                'status' => $this->status,
                'recorded_by' => auth()->user()->name,
            ]);

            $sale = Sale::create([
                'user_id' => $this->requestor_id,
                'sales_amount' => $this->price,
                'sales_type' => 'CertificatePropriete',
                'created_by' => auth()->user()->name,
            ]);

            // Create the Saleable item using only the specified information
            $saleableData = [
                'sale_id' => $sale->id,
                'price' => $this->price,
                'quantity' => 1,
                'saleable_id' => $certificatepropriete->id,
                'saleable_type' => 'App\Models\CertificatePropriete', // Adjust the namespace if different
                'created_by' => auth()->user()->name,
            ];

            DB::table('saleables')->insert($saleableData);
        });
       
        $this->clearFields();
        $this->refresh(__('CertificatePropriete successfully Created!'), 'CreatecertificateproprieteModal');
    }

    public function initData($id)
    {
        $certificatepropriete = CertificatePropriete::findOrFail($id);

        $this->certificatepropriete = $certificatepropriete;

        $this->titre_foncier_id =  $certificatepropriete->titre_foncier_id;
        $this->certificate_proprietes_type =  $certificatepropriete->certificate_proprietes_type;
        $this->certificate_propriete_reason =  $certificatepropriete->certificate_propriete_reason;
        $this->requestor_id =  $certificatepropriete->requestor_id;
        $this->price =  $certificatepropriete->price;
        $this->validity =  $certificatepropriete->validity;
        $this->certificate_proprietes_number =  $certificatepropriete->certificate_proprietes_number;
        $this->status =  $certificatepropriete->status;

    }
    public function clearFields()
    {
        $this->titre_foncier_id = '';
        $this->certificate_proprietes_type = '';
        $this->certificate_propriete_reason = '';
        $this->requestor_id = '';
        $this->price = '';
        $this->validity = '';
        $this->certificate_proprietes_number = '';
        $this->status = '';
    }

    public function update()
    {
        $this->validate([
            'titre_foncier_id' => 'required',
            'certificate_proprietes_type' => 'required',
            'certificate_propriete_reason' => 'required',
            'requestor_id' => 'required',
            'price' => 'required|integer',
            'validity' => 'nullable|date',
            'certificate_proprietes_number' => 'required',
            'status' => 'required',

        ]);

       
        DB::transaction(function () {
            $this->certificatepropriete->update([
                'titre_foncier_id' => $this->titre_foncier_id,
                'certificate_proprietes_type' => $this->certificate_proprietes_type,
                'certificate_propriete_reason' => $this->certificate_propriete_reason,
                'requestor_id' => $this->requestor_id,
                'price' => $this->price,
                'validity' => Carbon::now()->addMonths(3),
                'certificate_proprietes_number' => $this->certificate_proprietes_number,
                'status' => $this->status,
            ]);
        });

        $this->refresh(__('CertificatePropriete Updated Created!'), 'updatecertificateproprieteModal');

        $this->clearFields();
    }

    
    public function delete()
    {
        if ($this->certificatepropriete) {

            // Also delete created sales record
            $this->certificatepropriete->delete();
            session()->flash('message', 'CertificatePropriete deleted successfully');
        }
    }

    public function render()
    {
        $certificateproprietes = CertificatePropriete::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        $certificateproprietes_count = CertificatePropriete::count();

        return view('livewire.portal.certificate-propriete.index', [
            'certificateproprietes' => $certificateproprietes,
            'certificateproprietes_count' => $certificateproprietes_count
        ]);
    }
}
