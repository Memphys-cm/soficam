<?php

namespace App\Http\Controllers;

use App\Models\CertificatePropriete;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function verify($uuid)
    {
        // Trouver l'élément en fonction de l'UUID
        $element = CertificatePropriete::where('uuid', $uuid)->first();

        // dd($element->titreFoncier);

        if (!$element) {
            // Si l'élément n'existe pas, retourner une vue avec un message d'erreur
            return view('livewire.verify.certificate-propriate', [
                'message' => 'Le certificat de propriété n\'existe pas.',
                'element' => null
            ]);
        }

        // Si l'élément existe, retourner la vue avec les détails du certificat
        return view('livewire.verify.certificate-propriate', [
            'message' => null,
            'element' => $element
        ]);
    }
}
