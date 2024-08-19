<?php

namespace App\Http\Livewire\Portal;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Region;
use App\Models\Cabinet;
use Livewire\Component;
use App\Models\AuditLog;
use App\Models\Sales\Sale;
use App\Models\TitreFoncier;
use App\Models\CertificatePropriete;
use App\Models\MembreDuCabinet;
use App\Models\ImmatriculationDirecte;
use App\Models\Lotissements\Lotissement;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $timeFrameTransactions = 'today';
    public $timeFrameSales = 'today';
    public $timeFrameCertificateUpdates = 'today';
    public $sortBy = 'asc';

    public $start_date, $end_date;
    public $start_date_tf, $end_date_tf;

    public function mount()
    {
        $now = Carbon::now();
        $this->end_date_tf = $now->format('Y-m-d');
        $this->start_date_tf = $now->subMonth()->format('Y-m-d');
        $this->end_date = $now->format('Y-m-d');
        $this->start_date = $now->subMonth()->format('Y-m-d');
        $this->loadRecentActivities();
    }

    private function getStartDate($timeFrame)
    {
        $date = Carbon::now()->startOfDay();
        return match($timeFrame) {
            'yesterday' => $date->subDay(),
            'this_week' => $date->startOfWeek(),
            'last_week' => $date->subWeek(),
            'last_month' => $date->subMonth(),
            'last_year' => $date->subYear(),
            default => $date,
        };
    }

    private function getEndDate($timeFrame)
    {
        $date = Carbon::now()->endOfDay();
        return match($timeFrame) {
            'yesterday' => Carbon::yesterday()->endOfDay(),
            'this_week' => $date->endOfWeek(),
            'last_week' => $date->subWeek(),
            'last_month' => $date->subMonth(),
            'last_year' => $date->subYear(),
            default => $date,
        };
    }

    public function loadRecentActivities()
    {
        $this->recentTransactions = TitreFoncier::whereBetween('created_at', [$this->getStartDate($this->timeFrameTransactions), $this->getEndDate($this->timeFrameTransactions)])
            ->orderBy('created_at', $this->sortBy)
            ->get();

        $this->recentSales = Sale::whereBetween('created_at', [$this->getStartDate($this->timeFrameSales), $this->getEndDate($this->timeFrameSales)])
            ->orderBy('created_at', $this->sortBy)
            ->get();

        $this->recentCertificateUpdates = CertificatePropriete::whereBetween('created_at', [$this->getStartDate($this->timeFrameCertificateUpdates), $this->getEndDate($this->timeFrameCertificateUpdates)])
            ->orderBy('created_at', $this->sortBy)
            ->get();
    }

    public function render()
    {
        $now = Carbon::now();

        $data = [
            'all_titres_fonciers' => TitreFoncier::count(),
            'dossier_traites' => ImmatriculationDirecte::count(),
            'all_users_with_titre' => User::whereHas('titrefonciers')->get(),
            'total_users' => User::whereHas('titrefonciers')->count() ?: 1,
            'tf_homme' => User::whereHas('titrefonciers')->where('sexe', 'M')->count(),
            'tf_femme' => User::whereHas('titrefonciers')->where('sexe', 'F')->count(),
            'percent_homme' => (User::whereHas('titrefonciers')->where('sexe', 'M')->count() * 100) / (User::whereHas('titrefonciers')->count() ?: 1),
            'percent_femme' => (User::whereHas('titrefonciers')->where('sexe', 'F')->count() * 100) / (User::whereHas('titrefonciers')->count() ?: 1),
            'all_cabinet_notaire' => Cabinet::where('type_cabinet', 'notaire')->count(),
            'all_cabinet_geometre' => Cabinet::where('type_cabinet', 'geometre')->count(),
            'all_notaire_membre' => MembreDuCabinet::where('type_membre', 'notaire')->count(),
            'all_geometre_membre' => MembreDuCabinet::where('type_membre', 'geometre')->count(),
            'all_lotissement' => Lotissement::count(),
            'logs' => AuditLog::latest()->take(10)->get(),
            'allsales' => Sale::where('payment_status', 'totally_paid')->count(),
            'totalPaidAmount' => Sale::where('payment_status', 'totally_paid')->sum('sales_amount'),
            'totalSalesAmount' => Sale::sum('sales_amount'),
            'filter_amount' => Sale::whereBetween('created_at', [$this->start_date, $this->end_date])->sum('sales_amount'),
            'filter_tf' => TitreFoncier::whereBetween('created_at', [$this->start_date_tf, $this->end_date_tf])->count(),
            'topRegions' => TitreFoncier::select('region_id', DB::raw('count(*) as total'))
                ->groupBy('region_id')
                ->orderBy('total', 'desc')
                ->take(5)
                ->with('region')
                ->get(),
            'growthRates' => Region::with(['titreFonciers' => function ($query) {
                $query->select('region_id', DB::raw('YEAR(date_de_delivrance_du_TF) as year'), DB::raw('COUNT(*) as count'))
                    ->groupBy('region_id', 'year');
            }])->get(),
            'regionComparison' => TitreFoncier::select('region_id', DB::raw('COUNT(*) as total'))
                ->groupBy('region_id')
                ->with('region')
                ->get(),
            'evolutionData' => TitreFoncier::select('region_id', DB::raw('YEAR(date_de_delivrance_du_TF) as year'), DB::raw('COUNT(*) as total'))
                ->groupBy('region_id', 'year')
                ->with('region')
                ->get(),
        ];

        return view('livewire.portal.dashboard', $data)
            ->layout('components.layouts.dashboard');
    }
}
