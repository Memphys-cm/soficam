<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte\Stepps;

use Carbon\Carbon;
use App\Models\Sales\Sale;
use Illuminate\Support\Facades\DB;
use App\Models\ImmatriculationDirecte;
use Illuminate\Support\Facades\Session;

trait HandlesAvisPublicDescente
{

    public $calendarDecision;
    public $status_apres_publication;
    public $status_apres_publication_date;
    public $calendarDecision_date;

    public function mounting()
    {
        // Charger les valeurs actuelles depuis la base de données
        $this->status = $this->imma_directe->status_apres_publication ? $this->imma_directe->status_apres_publication : 0;
        $this->calendarDecision = $this->imma_directe->calendar_decision ? $this->imma_directe->calendar_decision : 0;
        $this->status_apres_publication_date = $this->imma_directe->status_apres_publication_date ? $this->imma_directe->status_apres_publication_date : '';
        $this->calendarDecision_date = $this->imma_directe->calendar_decision_date ? $this->imma_directe->calendar_decision_date : '';
    }


    public function signatureAvisCalendrier()
    {

        $this->validate([
            'calendarDecision' => 'required',
        ]);

        DB::transaction(function () {
            $this->imma_directe->update([
                'statut' => 'Avis au Public Signé',
                'next_step' => 'Instruction du Dossier – préparer la décision portant calendrier de descente sur le terrain',
                'date_avis_publique_signe' => $this->date_status,
            ]);
        });

        Session::flash('message', __('Ordre de Versement Enregistrer Avec SUCCES!'));

        // $this->clearFields();
    }

}
