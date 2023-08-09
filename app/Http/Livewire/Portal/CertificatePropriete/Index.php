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
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public ?string $query = null;
    public int $perPage = 15;
    public string $orderAsc = 'desc';
    public string $orderBy = 'created_at';
    // public $user_ids = [];
    public $status = 'pending_payment';
    public $validity, $certificate_proprietes_type, $certificate_propriete_reason, $certificatepropriete, $titre_fonciers;
    public $titre_foncier_id, $certificate_proprietes_number, $requestor_id, $price, $requestors, $users;
    public $certificate_propriete_id;

    public function mount()
    {
        $this->users = User::select('id', 'first_name')->get();
        $this->titre_fonciers = TitreFoncier::select('id', 'numero_titre_foncier')->get();
        $this->requestors = User::select('id')->get();
    }
    public function store()
    {
        
        $this->validate([
            
            'titre_foncier_id' => 'required',
            'certificate_proprietes_type' => 'required',
            'certificate_propriete_reason' => 'required',
            'requestor_id' => 'required',
            'price' => 'required',
            'validity' => 'nullable|date',
            'certificate_proprietes_number' => 'required',
            'status' => 'required',

        ]);
        // dd('heloo');

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
                'saleable_id' => $certificatepropriete->id, // Adjust as needed
                'created_by' => auth()->user()->name,
            ];

            DB::table('saleables')->insert($saleableData);
        });
       

        // Create the Saleable item using only the specified information
       

       
        // $certificatepropriete->users()->sync($this->user_ids);
        // $this->refresh(__('CertificatePropriete sales completed successfully!'), 'CreateCertificateProprieteModal');
        // session()->flash('message', 'CertificatePropriete successfully Created');
        $this->clearFields();
        $this->refresh(__('CertificatePropriete successfully Created!'), 'CreateCertificateProprieteModal');
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
        // $this->user_ids = $certificatepropriete->users;

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
            'price' => 'required',
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

        
        // $this->certificatepropriete->users()->sync($this->user_ids);

        $this->clearFields();
        session()->flash('message', 'CertificatePropriete successfully Created');

        // $this->refresh(__('CertificatePropriete Updated Created!'), 'CreateCertificateProprieteModal');
    }

    
    public function delete()
    {
        if ($this->certificatepropriete) {
            $this->certificatepropriete->delete();
            session()->flash('message', 'CertificatePropriete deleted successfully');
        }
    }

    public function render()
    {
        $certificateproprietes = CertificatePropriete::orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        return view('livewire.portal.certificate-propriete.index', compact('certificateproprietes'));
    }
}
