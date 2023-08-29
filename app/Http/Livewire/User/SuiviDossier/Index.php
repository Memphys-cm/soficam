<?php

namespace App\Http\Livewire\User\SuiviDossier;

use Livewire\Component;
use App\Models\ImmatriculationDirecte;
use App\Models\Lotissements\Parcel;
use App\Models\TitreFoncier;
use Illuminate\Support\Facades\Auth;





class Index extends Component
{
    public function render()
    {
        $user = Auth::user();
        $titrefonciers = TitreFoncier::where('user_id', $user->id)->get();
        $mutations = Parcel::where('user_id', $user->id)->get();
        $immatriculations = ImmatriculationDirecte::where('user_id', $user->id)->get();

        $combinedData = $titrefonciers->concat($mutations)->concat($immatriculations);

        return view('livewire.user.suivi-dossier.index',[
            'combinedData' => $combinedData,
        ]);
    }
}
