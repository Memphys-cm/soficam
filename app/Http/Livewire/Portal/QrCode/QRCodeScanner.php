<?php

namespace App\Http\Livewire\Portal\QrCode;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Barryvdh\DomPDF\Facade\Pdf;

class QRCodeScanner extends Component
{
    public $scanResult = 'Result Here';

    public function onScanSuccess($data)
    {
        if ($data) {
            $this->QRCodeData($data);
        }
    }

    private function QRCodeData($data)
    {
        // Assuming $data contains the ID of the bien_immobilier
        $bien_immobilier = ReleveImmobilier::findOrFail($data);

        if ($bien_immobilier) {
            $this->scanResult = 'Document';

            // Call the printPdf function here
            $this->printPdf($bien_immobilier->id);
        } else {
            $this->scanResult = 'No matching property found with this QR code';
        }
    }

    public function  printPdf($id)
    {
        $this->bien_immobilier = ReleveImmobilier::findOrFail($id);
        $data = [
            'bien_immobilier' => $this->bien_immobilier,
            // Autres données que vous souhaitez afficher dans la vue
        ];

        $pdf = Pdf::loadView('livewire.portal.bien-immobilier.print', $data)->setPaper('a4', 'portrait');

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
