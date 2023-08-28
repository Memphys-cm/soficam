<?php

namespace App\Http\Livewire\Portal\QrCode;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Barryvdh\DomPDF\Facade\Pdf;

class QRCodeScanner extends Component
{
    public $scanResult = null;

    public function onScanSuccess($data)
    {
        $response = $this->checkQrCodeWithServer($data);

        if ($response == 1) {
            $this->generatePdfAndDownload($data);
        } else {
            $this->scanResult = 'No user found with this QR code';
        }
    }

    private function generatePdfAndDownload($data)
    {
        // Vous pouvez obtenir l'ID du document à partir des données scannées
        $documentId = $this->fetchDocumentIdFromData($data);

        // Utilisez la fonction printPdf pour générer et télécharger le document
        $pdfResponse = $this->printPdf($documentId);

        // Vous pouvez éventuellement afficher un message de succès
        $this->scanResult = 'Document généré et téléchargé avec succès';
    }


    public function  printPdf($id)
    {
        $this->bien_immobilier = ReleveImmobilier::findOrFail($id);
        $data = [
            'bien_immobilier' => $this->bien_immobilier,
            'email' => 'john@example.com',
            // Autres données que vous souhaitez afficher dans la vue
        ];

        $pdf = Pdf::loadView('livewire.portal.titre-fonciers.print', $data)->setPaper('a4', 'portrait');


        return response()->streamDownload(
            fn () => print($pdf->output()),
            __('Report-') . Str::random('10') . ".pdf"
        );
    }

    public function render()
    {
        return view('livewire.portal.qr-code.q-r-code-scanner');
    }
}
