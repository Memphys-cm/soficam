<?php

namespace App\Http\Livewire\Portal;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Region;
use App\Models\Cabinet;
use Livewire\Component;
use App\Models\AuditLog;
use App\Models\Operation;
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

    public $start_date, $end_date;
    public $start_date_tf, $end_date_tf;
    public $recentCertificateUpdates, $recentTransactions, $recentSales;

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
        return match ($timeFrame) {
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
        return match ($timeFrame) {
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
        $totalUsersWithTitre = User::whereHas('titrefonciers')->distinct()->count('id');
        $totalMenWithTitre = User::whereHas('titrefonciers')->where('sexe', 'M')->distinct()->count('id');
        $totalWomenWithTitre = User::whereHas('titrefonciers')->where('sexe', 'F')->distinct()->count('id');

        $percentMen = ($totalMenWithTitre * 100) / ($totalUsersWithTitre ?: 1);
        $percentWomen = ($totalWomenWithTitre * 100) / ($totalUsersWithTitre ?: 1);
        // dd($percentMen);

        $topSalesTypes = Sale::select('sales_type', DB::raw('SUM(sales_amount) as total_sales_amount'))
            ->groupBy('sales_type')
            ->orderBy('total_sales_amount', 'desc')
            ->take(5)
            ->get();

        $totalOperations = Operation::count();
        $operationsByStatus = Operation::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $startDate = Carbon::now()->subMonth()->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        // Obtenir le nombre de titres fonciers créés chaque jour au cours du dernier mois
        $tfEvolution = TitreFoncier::whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get()
            ->pluck('count', 'date')
            ->toArray();

        // Créer des labels et des valeurs pour le graphique
        $dates = [];
        $counts = [];
        $period = new \DatePeriod($startDate, new \DateInterval('P1D'), $endDate);

        foreach ($period as $date) {
            $formattedDate = $date->format('Y-m-d');
            $dates[] = $formattedDate;
            $counts[] = $tfEvolution[$formattedDate] ?? 0;
        }

        $today = Carbon::today();

        // Obtenez la date d'il y a un mois
        $lastMonth = $today->copy()->subMonth();

        // Récupérez les dossiers traités au cours du dernier mois, groupés par date
        $dossierData = Operation::whereBetween('created_at', [$lastMonth, $today])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Transformez les données pour les utiliser dans le graphique
        $dossierDates = $dossierData->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('d/m/Y');
        });

        $dossierCounts = $dossierData->pluck('count');

        // Récupérez les ventes du dernier mois, groupées par date
        $venteData = Sale::whereBetween('created_at', [$lastMonth, $today])
            ->selectRaw('DATE(created_at) as date, SUM(sales_amount) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Transformez les données pour les utiliser dans le graphique
        $venteDates = $venteData->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('d/m/Y');
        });

        $venteTotals = $venteData->pluck('total');



        // dd($dates, $counts);

        $data = [
            'all_titres_fonciers' => TitreFoncier::count(),
            'dossier_traites' => ImmatriculationDirecte::count(),
            'all_users_with_titre' => $totalUsersWithTitre,
            'tf_homme' => $totalMenWithTitre,
            'tf_femme' => $totalWomenWithTitre,
            'percent_homme' => $percentMen,
            'percent_femme' => $percentWomen,
            'all_cabinet_notaire' => Cabinet::where('type_cabinet', 'notaire')->count(),
            'all_cabinet_geometre' => Cabinet::where('type_cabinet', 'geometre')->count(),
            'all_notaire_membre' => MembreDuCabinet::where('type_membre', 'notaire')->count(),
            'all_geometre_membre' => MembreDuCabinet::where('type_membre', 'geometre')->count(),
            'all_lotissement' => Lotissement::count(),
            'logs' => AuditLog::latest()->take(10)->get(),
            'allsales' => Sale::where('payment_status', 'totally_paid')->count(),
            'totalPaidAmount' => Sale::where('payment_status', 'totally_paid')->sum('sales_amount'),
            'totalSalesAmount' => Sale::sum('sales_amount'),
            'topSalesTypes' => $topSalesTypes,
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
            'totalOperations' => $totalOperations,
            'operationsByStatus' => $operationsByStatus,
            'tfDates' => $dates,
            'tfCounts' => $counts,
            'dossierDates' => $dossierDates,
            'dossierCounts' => $dossierCounts,
            'venteDates' => $venteDates,
            'venteTotals' => $venteTotals
        ];

        return view('livewire.portal.dashboard', $data)
            ->layout('components.layouts.dashboard');
    }
}
