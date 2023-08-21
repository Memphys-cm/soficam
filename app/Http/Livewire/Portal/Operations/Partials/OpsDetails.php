<?php

namespace App\Http\Livewire\Portal\Operations\Partials;

use App\Models\User;
use LaravelFileViewer;
use Livewire\Component;
use App\Models\Operation;
use App\Models\MembreDuCabinet;
use App\Models\Lotissements\Parcel;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Traits\WithDataTables;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class OpsDetails extends Component
{
   
    use WithDataTables;
    public $parcel, $notaires, $users, $operation, $geometres, $membres = [];
    public $user_ids = [];
    public $medias = [];


    public function mount($operation_id)
    {
        $this->operation = Operation::findOrFail($operation_id);
        $this->users = User::role('user')->select('id', 'first_name', 'last_name')->get();
        $this->medias = $this->operation->getMedia("*");

    }

    public function fileViewer(Media $media)
    {
        $filepath = 'public/' .$media->model_id."/". $media->file_name;
        $file_url = $media->getUrl() ;// asset('storage/' . $media->file_name);

        $file_data = [
            [
                'label' => __('File_Name'),
                'value' => $media->file_name
            ]
        ];

        return LaravelFileViewer::show($media->file_name, $filepath, $file_url, $file_data);
    }
    public function render()
    {
        return view('livewire.portal.operations.partials.ops-details');
    }
}
