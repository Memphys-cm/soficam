<?php

namespace App\Http\Livewire\Portal;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Cabinet;
use Livewire\Component;
use App\Models\AuditLog;
use App\Models\Sales\Sale;
use App\Models\TitreFoncier;
use App\Models\MembreDuCabinet;
use Illuminate\Support\Facades\DB;
use App\Models\CertificatePropriete;
use App\Models\ImmatriculationDirecte;
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
    public $start_date , $end_date;
    public $start_date_tf , $end_date_tf;
    public $end_date_dos , $start_date_dos;

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
        $dossier_traites = ImmatriculationDirecte::count();
        $usersWithTitreFoncier = User::whereHas('titrefonciers')->get();
        $total_users = $usersWithTitreFoncier->count();
        $tf_homme = $usersWithTitreFoncier->where('sexe', 'M')->count();
        $tf_femme = $usersWithTitreFoncier->where('sexe', 'F')->count();
        $percent_homme = ($tf_homme * 100) / $total_users;
        $percent_femme = ($tf_femme * 100) / $total_users;
        $all_cabinet_notaire = Cabinet::where('type_cabinet', 'notaire')->count();
        $all_cabinet_geometre = Cabinet::where('type_cabinet', 'geometre')->count();
        $all_notaire_membre = MembreDuCabinet::where('type_membre', 'notaire')->count();
        $all_geometre_membre = MembreDuCabinet::where('type_membre', 'geometre')->count();
        $all_lotissement = Lotissement::count();
        $logs = AuditLog::orderBy('created_at', 'desc')->get()->take(10);
        $allsales = Sale::where('payment_status', 'totally_paid')->count();
        $totalPaidAmount = Sale::where('payment_status', 'totally_paid')->sum('sales_amount');
        $totalSalesAmount = DB::table('sales')->sum('sales_amount');
        $filter_amount = Sale::whereBetween('created_at', [$this->start_date, $this->end_date])->get()->sum('sales_amount');
        $filter_tf = TitreFoncier::whereBetween('created_at', [$this->start_date_tf, $this->end_date_tf])->get()->count();



        return view('livewire.portal.dashboard', [
            'logs' => $logs,
            'allsales' => $allsales,
            'totalPaidAmount' => $totalPaidAmount,
            'all_titres_fonciers' => $all_titres_fonciers,
            'tf_homme' => $tf_homme,
            'tf_femme' => $tf_femme,
            'percent_homme' => $percent_homme,
            'percent_femme' => $percent_femme,
            'all_lotissement' => $all_lotissement,
            'all_cabinet_notaire' => $all_cabinet_notaire,
            'all_cabinet_geometre' => $all_cabinet_geometre,
            'all_notaire_membre' => $all_notaire_membre,
            'all_geometre_membre' => $all_geometre_membre,
            'dossier_traites' => $dossier_traites,
            'totalSalesAmount' => $totalSalesAmount,
            'filter_amount' => $filter_amount,
            'filter_tf' => $filter_tf
        ])->layout('components.layouts.dashboard');
    }
}
