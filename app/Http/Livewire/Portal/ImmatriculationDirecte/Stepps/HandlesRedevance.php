<?php

namespace App\Http\Livewire\Portal\ImmatriculationDirecte\Stepps;

use Carbon\Carbon;
use App\Models\Sales\Sale;
use Illuminate\Support\Facades\DB;
use App\Models\ImmatriculationDirecte;
use Illuminate\Support\Facades\Session;

trait HandlesRedevance
{
    public function ordre_redevance_fonciere()
    {
        $this->validate([
            'montant_ordre_redevance_fonciere' => 'required',
        ]);


        DB::transaction(function () {
            $this->imma_directe->update([
                'numero_redevance_fonciere' => $this->genererNumero(),
                // 'superficie_ordre_versement' => $this->superficie_ordre_versement,
                'montant_ordre_redevance_fonciere' => $this->montant_ordre_redevance_fonciere,
                'status_ordre_versement' => 'pending',
                'statut' => 'Redevance foncière en attente de paiement',
                'next_step' => 'Paiement de la Redevance Foncière',
                'ordre_redevance_fonciere' => Carbon::now(),
            ]);
        });

        $sale = Sale::create([
            // 'user_id' => $this->requestor_id,
            'sales_code' => $this->imma_directe->numero_redevance_fonciere,
            'sales_amount' => $this->montant_ordre_redevance_fonciere,
            'sales_type' => 'ordre_versement_imma_directe',
            'created_by' => auth()->user()->name,
        ]);

        // Create the Saleable item using only the specified information
        $saleableData = [
            'sale_id' => $sale->id,
            'price' => $this->montant_ordre_redevance_fonciere,
            'quantity' => 1,
            'saleable_id' => $this->imma_directe->id,
            'saleable_type' => 'App\Models\ImmatriculationDirecte', // Adjust the namespace if different
            'created_by' => auth()->user()->name,
        ];

        DB::table('saleables')->insert($saleableData);

        Session::flash('message', __('Ordre de Redevance Foncière Enregistrer Avec SUCCES!'));

        // $this->clearFields();
    }

    function genererNumero()
    {
        $dernierEnregistrement = ImmatriculationDirecte::orderBy('id', 'desc')->first();

        if ($dernierEnregistrement) {
            $dernierNumero = intval(substr($dernierEnregistrement->code, 2)); // Extrait le numéro sans "TF" et convertit en nombre
            $nouveauNumero = $dernierNumero + 1;
        } else {
            $nouveauNumero = 1;
        }

        // Formate le numéro avec des zéros à gauche (total 7 caractères)
        $numeroFormate = str_pad($nouveauNumero, 7, '0', STR_PAD_LEFT);

        // Concatène "TF" et le numéro formate pour obtenir le code unique
        $codeUnique =  $numeroFormate . "Y.30" . "/Redevance/MINCAF/41/T400";

        return $codeUnique;
    }
}

