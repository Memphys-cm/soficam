<?php

namespace App\Http\Livewire\Portal;

use Carbon\Carbon;
use App\Models\Cabinet;
use Livewire\Component;
use App\Models\AuditLog;
use App\Models\Sales\Sale;
use App\Models\TitreFoncier;
use App\Models\MembreDuCabinet;
use App\Models\CertificatePropriete;
use App\Models\Lotissements\Lotissement;

class Dashboard extends Component
{
    public $timeFrameTransactions = 'today';
    public $timeFrameSales = 'today';
    public $timeFrameCertificateUpdates = 'today';
    public $sortBy = 'asc';

    public $recentTransactions = [];
    public $recentSales = [];
    public $recentCertificateUpdates = [];

    public function mount()
    {
        $this->loadRecentActivities();
    }




    

    public function loadRecentActivities()
{
    $startDateTransactions = $this->getStartDate($this->timeFrameTransactions);
    $endDateTransactions = $this->getEndDate($this->timeFrameTransactions);
    $this->recentTransactions = TitreFoncier::whereBetween('created_at', [$startDateTransactions, $endDateTransactions])
                                            ->orderBy('created_at', $this->sortBy)
                                            ->get();

    $startDateSales = $this->getStartDate($this->timeFrameSales);
    $endDateSales = $this->getEndDate($this->timeFrameSales);
    $this->recentSales = Sale::whereBetween('created_at', [$startDateSales, $endDateSales])
                             ->orderBy('created_at', $this->sortBy)
                             ->get();

    $startDateCertificateUpdates = $this->getStartDate($this->timeFrameCertificateUpdates);
    $endDateCertificateUpdates = $this->getEndDate($this->timeFrameCertificateUpdates);
    $this->recentCertificateUpdates = CertificatePropriete::whereBetween('created_at', [$startDateCertificateUpdates, $endDateCertificateUpdates])
                                                        ->orderBy('created_at', $this->sortBy)
                                                        ->get();
}


    private function getStartDate($timeFrame)
    {
        $startDate = Carbon::now()->startOfDay();

        if ($timeFrame === 'yesterday') {
            $startDate->subDay();
        } elseif ($timeFrame === 'this_week') {
            $startDate->startOfWeek();
        } elseif ($timeFrame === 'last_week') {
            $startDate->subWeek();
        } elseif ($timeFrame === 'last_month') {
            $startDate->subMonth();
        } elseif ($timeFrame === 'last_year') {
            $startDate->subYear();
        }

        return $startDate;
    }

    private function getEndDate($timeFrame)
    {
        $endDate = Carbon::now()->endOfDay();
    
        if ($timeFrame === 'yesterday') {
            $endDate = Carbon::yesterday()->endOfDay();
        } elseif ($timeFrame === 'this_week') {
            $endDate->endOfWeek();
        } elseif ($timeFrame === 'last_week') {
            $endDate->subWeek();
        } elseif ($timeFrame === 'last_month') {
            $endDate->subMonth();
        } elseif ($timeFrame === 'last_year') {
            $endDate->subYear();
        }
    
        return $endDate;
    }
    


    public function render()
    {
        $all_titres_fonciers = TitreFoncier::count();
        $all_cabinet_notaire = Cabinet::where('type_cabinet', 'notaire')->count();
        $all_notaire_membre = MembreDuCabinet::where('type_membre', 'notaire')->count();
        $all_lotissement = Lotissement::count();
        $logs = AuditLog::orderBy('created_at', 'desc')->get()->take(10);
        $allsales = Sale::where('payment_status', 'totally_paid')->count();
        $totalPaidAmount = Sale::where('payment_status', 'totally_paid')->sum('sales_amount');



        return view('livewire.portal.dashboard', [
            'logs' => $logs,
            'allsales' => $allsales,
            'totalPaidAmount' => $totalPaidAmount,
            'all_titres_fonciers' => $all_titres_fonciers,
            'all_lotissement' => $all_lotissement,
            'all_cabinet_notaire' => $all_cabinet_notaire,
            'all_notaire_membre' => $all_notaire_membre,
        ])->layout('components.layouts.dashboard');
    }
}
