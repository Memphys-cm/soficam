<?php

namespace App\Http\Livewire\Portal\Notary;

use App\Models\Notary;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public ?string $query = null;
    public int $perPage = 15;
    public string $orderAsc = 'desc';
    public string $orderBy = 'created_at';

    public $name, $post;
    public  $notary;
    public $notaryId;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|unique:notaries',
            'post' => 'required',
        ]);
    }


    public function store()
    {
        // Validate the input fields
        $this->validate([
            'name' => 'required|unique:notaries',
            'post' => 'required',
        ]);

        // Create a new notary
        $notary = new Notary();
        $notary->name = $this->name;
        $notary->post = $this->post;
        $notary->save();

        // Show success message, reset fields, and close the modal
        session()->flash('message', 'New notary added successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->clearFields();
    }

    public function update()
    {
        // Validate the input fields
        $this->validate([
            'name' => 'required',
            'post' => 'required',
        ]);
        DB::transaction(function () {
            $this->notary->update([
                'name' => $this->name,
                'post' => $this->post,
            ]);
        });
        session()->flash('message', 'Notary updated successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function initData($id)
    {
        $notary = Notary::findOrFail($id);
        $this->notary = $notary;
        $this->notaryId = $id;
        $this->name = $notary->name;
        $this->post = $notary->post;
    }



    public function delete()
    {
        if ($this->notary) {
            $this->notary->delete();
            session()->flash('message', 'notary deleted successfully');
            $this->dispatchBrowserEvent('close-modal');
        }
    }



    public function clearFields()
    {
        $this->name = '';
        $this->post = '';
    }

    public function render()
    {
        $notarys = Notary::search($this->query)->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        return view('livewire..portal.notary.index', compact('notarys'));
    }
}
