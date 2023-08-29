<?php

namespace App\Http\Livewire\Portal\QrCode;

use Livewire\Component;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ReleveImmobilier;

class QRCodeScanner extends Component
{
    protected $listeners = ['qrCodeScanned'];
    public $bien_immobilier;

    public function qrCodeScanned($data)
    {
        return $data;
    }

    public function  printPdf($id)
    {
        $this->bien_immobilier = ReleveImmobilier::findOrFail($id);
        $data = [
            'bien_immobilier' => $this->bien_immobilier,
            'email' => 'john@example.com',
            // Autres données que vous souhaitez afficher dans la vue
        ];

        $pdf = Pdf::loadView('livewire.portal.bien-immobilier.print',$data)->setPaper('a4', 'portrait');

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
