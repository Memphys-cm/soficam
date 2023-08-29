<?php

namespace App\Http\Livewire\Portal\QrCode;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ReleveImmobilier;

class QRCodeScanner extends Component
{
    public $bien_immobilier;
    public $scanResult = 'Result Here';

   
    public function onScanSuccess($data)
    {
        dd('hello');
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
            
            // Generate the PDF content
            $pdfContent = view('livewire.portal.bien-immobilier.print', compact('bien_immobilier', 'qrCode'));

            // Download the PDF
            return response()->streamDownload(
                fn () => print($pdfContent),
                __('Report-') . Str::random('10') . ".pdf"
            );
        } else {
            $this->scanResult = 'No matching property found with this QR code';
        }
    }

    public function render()
    {
        return view('livewire.portal.qr-code.q-r-code-scanner');
    }
}
