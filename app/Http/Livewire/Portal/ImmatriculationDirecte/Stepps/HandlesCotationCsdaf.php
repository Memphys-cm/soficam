<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte\Stepps;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

trait HandlesCotationCsdaf
{
    public function cotationFirstStep()
    {
        // dd('ll');
        $this->validate([
            'service_id' => 'required',
            'user_id' => 'required',
        ]);

        DB::transaction(function () {
            $this->imma_directe->update([
                'service_id' => $this->service_id,
                'observation_cotation' => $this->observation,
                'cotation_user_id' => $this->user_id,
                'status_cotation' => 'done',
                'statut' => 'coter',
                'next_step' => 'ordre_versement',
                'date_cotation' => Carbon::now(),
            ]);
        });

        Session::flash('message', __('Dossier Coter Avec SUCCES!'));

        // $this->clearFields();
    }
}
