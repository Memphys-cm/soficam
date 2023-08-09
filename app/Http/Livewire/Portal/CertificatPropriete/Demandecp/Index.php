<?php

namespace App\Http\Livewire\Portal\CertificatPropriete\Demandecp;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\CertificatPropriete\Demandecp;

class Index extends Component
{
    use WithFileUploads;
    public $reason;
    public $purchaser_name;
    public $land_owner;
    public $status = 'waiting'; // Default status is "waiting"
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public ?string $query = null;
    public int $perPage = 15;
    public string $orderAsc = 'desc';
    public string $orderBy = 'created_at';

    public  $file, $rejected_reason;
    public  $cpdemande;
    public $cpdemandeId;

   
    public function store()
{

    // Validate the input fields
    $this->validate([
        'land_owner' => 'required',
        'reason' => 'required',
        'file' => 'file|mimes:jpeg,png,jpg,gif,svg,pdf,docx|max:2080|nullable',
        'purchaser_name' => 'required',
    ]);
    $filePath = null;

    if ($this->file) {
        $filePath = $this->file->store('public/storage/documents');
        // Rest of your code to store the file path in the database or perform other actions
    }
        // Create a new notary
    $cpdemande = new Demandecp();
    $cpdemande->land_owner = $this->land_owner;
    $cpdemande->reason = $this->reason;
    $cpdemande->file = $filePath;
    $cpdemande->purchaser_name = $this->purchaser_name;
    $cpdemande->status = $this->status;
    $cpdemande->save();
    
    // Show success message, reset fields, and close the modal
    session()->flash('message', 'CP Office Added successfully');
    $this->clearFields();

    return redirect()->to(route('portal.demandecp.index'));
    // $this->emit('refresh');
}




    public function update()
    {
        // Validate the input fields
        $this->validate([
            'land_owner' => 'required',
            'reason' => 'required',
            'file' => 'file|mimes:jpeg,png,jpg,gif,svg,pdf,docx|max:2080|nullable',
            'purchaser_name' => 'required',
            'rejected_reason' => 'required',
        ]);
        DB::transaction(function () {
            $this->cpdemande->update([
                'land_owner' => $this->land_owner,
                'reason' => $this->reason,
                'status' => $this->status,
                'file' => $this->file,
                'rejected_reason' => $this->rejected_reason,
                'purchaser_name' => $this->purchaser_name,
            ]);
        });
        session()->flash('message', 'CP Office Updated successfully');
        return redirect()->to(route('portal.demandecp.index'));
    }

    public function initData($id)
    {
        $cpdemande = Demandecp::findOrFail($id);
        $this->cpdemande = $cpdemande;
        $this->cpdemandeId = $id;
        $this->land_owner = $cpdemande->land_owner;
        $this->reason = $cpdemande->reason;
        $this->file = $cpdemande->file;
        $this->purchaser_name = $cpdemande->purchaser_name;
    }
  

    public function delete()
    {
        if ($this->cpdemande) {
            $this->cpdemande->delete();
            session()->flash('message', 'CP Office deleted successfully');
            return redirect()->to(route('portal.demandecp.index'));
        }
    }
   
    public function clearFields()
    {
        $this->land_owner = '';
        $this->reason = '';
        $this->file = '';
        $this->purchaser_name = '';
    }

    public function render()
    {
        $cpdemandes = Demandecp::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        return view('livewire.portal.certificat-propriete.demandecp.index', compact('cpdemandes'));
    }
}
