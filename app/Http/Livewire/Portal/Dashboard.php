<?php

namespace App\Http\Livewire\Portal;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Cabinet;
use Livewire\Component;
use App\Models\AuditLog;
use App\Models\Operation;
use App\Models\Sales\Sale;
use App\Models\TitreFoncier;
use App\Models\MembreDuCabinet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\CertificatePropriete;
use App\Models\ImmatriculationDirecte;
use App\Models\Lotissements\Lotissement;

class Dashboard extends Component
{
    public $timeFrameTransactions = 'today';

    public $timeFrameSales = 'today';

    public $timeFrameCertificateUpdates = 'today';

    public $sortBy = 'asc';

    public $start_date;

    public $end_date;

    public $start_date_tf;

    public $end_date_tf;

    public $recentCertificateUpdates;

    public $recentTransactions;

    public $recentSales;

    public function mount(): void
    {
        $now = Carbon::now();
        $this->end_date_tf = $now->format('Y-m-d');
        $this->start_date_tf = $now->copy()->subMonth()->format('Y-m-d');
        $this->end_date = $now->format('Y-m-d');
        $this->start_date = $now->copy()->subMonth()->format('Y-m-d');
        $this->loadRecentActivities();
    }

    private function getStartDate($timeFrame): Carbon
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

    private function getEndDate($timeFrame): Carbon
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

    public function loadRecentActivities(): void
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

        $topSalesTypes = Sale::select('sales_type', DB::raw('SUM(sales_amount) as total_sales_amount'))
            ->groupBy('sales_type')
            ->orderBy('total_sales_amount', 'desc')
            ->take(5)
            ->get();

        $totalOperations = Operation::count();

        $operationsByStatusRows = Operation::query()
            ->select('statut_geometre', DB::raw('count(*) as c'))
            ->groupBy('statut_geometre')
            ->get();

        $statusLabels = [
            'pending_payment' => __('Paiement en attente'),
            'ongoing' => __('En cours'),
            'completed' => __('Terminé'),
            'pending' => __('En attente'),
        ];

        $startDate = Carbon::now()->subDays(29)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $tfEvolution = TitreFoncier::whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get()
            ->pluck('count', 'date')
            ->toArray();

        $tfDates = [];
        $tfCounts = [];
        $period = new \DatePeriod($startDate, new \DateInterval('P1D'), $endDate->copy()->addDay());

        foreach ($period as $date) {
            $formattedDate = $date->format('Y-m-d');
            $tfDates[] = $date->format('d/m');
            $tfCounts[] = $tfEvolution[$formattedDate] ?? 0;
        }

        $titresFoncierData = TitreFoncier::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $tfMonthLabels = $titresFoncierData->pluck('date')->map(fn ($d) => Carbon::parse($d)->format('d/m'));
        $tfMonthCounts = $titresFoncierData->pluck('count');

        $operationsData = Operation::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $operationsMonthLabels = $operationsData->pluck('date')->map(fn ($d) => Carbon::parse($d)->format('d/m'));
        $operationsMonthCounts = $operationsData->pluck('count');

        $salesData = Sale::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->selectRaw('DATE(created_at) as date, SUM(sales_amount) as total_sales')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $salesMonthLabels = $salesData->pluck('date')->map(fn ($d) => Carbon::parse($d)->format('d/m'));
        $salesMonthTotals = $salesData->pluck('total_sales');

        $thirtyDaysAgo = Carbon::now()->subDays(30);

        $topRegions = TitreFoncier::query()
            ->select('region_id', DB::raw('count(*) as total'))
            ->groupBy('region_id')
            ->orderByDesc('total')
            ->take(8)
            ->with('region')
            ->get();

        $topSubDivisions = TitreFoncier::query()
            ->select('sub_division_id', DB::raw('count(*) as total'))
            ->whereNotNull('sub_division_id')
            ->groupBy('sub_division_id')
            ->orderByDesc('total')
            ->take(8)
            ->with('sub_division')
            ->get();

        $topLieuxDits = TitreFoncier::query()
            ->select('lieu_dit', DB::raw('count(*) as total'))
            ->whereNotNull('lieu_dit')
            ->where('lieu_dit', '!=', '')
            ->groupBy('lieu_dit')
            ->orderByDesc('total')
            ->take(8)
            ->get();

        $operationsByType = Operation::query()
            ->select('type_operation', DB::raw('count(*) as total'))
            ->groupBy('type_operation')
            ->orderByDesc('total')
            ->get();

        $immatByStatut = ImmatriculationDirecte::query()
            ->select('statut', DB::raw('count(*) as total'))
            ->whereNotNull('statut')
            ->where('statut', '!=', '')
            ->groupBy('statut')
            ->orderByDesc('total')
            ->get();

        $tfByZone = TitreFoncier::query()
            ->select('zone', DB::raw('count(*) as total'))
            ->whereNotNull('zone')
            ->where('zone', '!=', '')
            ->groupBy('zone')
            ->orderBy('zone')
            ->get()
            ->map(function ($row) {
                $row->label = match ($row->zone) {
                    'urbain' => __('Urbaine'),
                    'rurale' => __('Rurale'),
                    default => Str::title(str_replace('_', ' ', (string) $row->zone)),
                };

                return $row;
            });

        $tfByEtatTerrain = TitreFoncier::query()
            ->select('etat_terrain', DB::raw('count(*) as total'))
            ->whereNotNull('etat_terrain')
            ->where('etat_terrain', '!=', '')
            ->groupBy('etat_terrain')
            ->orderBy('etat_terrain')
            ->get()
            ->map(function ($row) {
                $row->label = match ($row->etat_terrain) {
                    'batit' => __('Bâti'),
                    'non_batit' => __('Non bâti'),
                    default => Str::title(str_replace('_', ' ', (string) $row->etat_terrain)),
                };

                return $row;
            });

        $topRegionsChart = [
            'labels' => $topRegions->map(fn ($r) => optional($r->region)->region_name_fr ?? ('#'.$r->region_id))->values()->all(),
            'values' => $topRegions->pluck('total')->values()->all(),
        ];

        $topSubDivisionsChart = [
            'labels' => $topSubDivisions->map(fn ($r) => optional($r->sub_division)->sub_division_name_fr ?? ('#'.$r->sub_division_id))->values()->all(),
            'values' => $topSubDivisions->pluck('total')->values()->all(),
        ];

        $topLieuxChart = [
            'labels' => $topLieuxDits->pluck('lieu_dit')->map(fn ($l) => Str::limit($l, 28))->values()->all(),
            'values' => $topLieuxDits->pluck('total')->values()->all(),
        ];

        $operationsTypeChart = [
            'labels' => $operationsByType->map(fn ($r) => Str::limit(str_replace('_', ' ', (string) $r->type_operation), 36))->values()->all(),
            'values' => $operationsByType->pluck('total')->values()->all(),
        ];

        $immatStatutChart = [
            'labels' => $immatByStatut->pluck('statut')->map(fn ($s) => Str::limit((string) $s, 24))->values()->all(),
            'values' => $immatByStatut->pluck('total')->values()->all(),
        ];

        $geomStatusChart = [
            'labels' => $operationsByStatusRows->map(fn ($r) => $statusLabels[$r->statut_geometre] ?? $r->statut_geometre)->values()->all(),
            'values' => $operationsByStatusRows->pluck('c')->values()->all(),
        ];

        $data = [
            'all_titres_fonciers' => TitreFoncier::count(),
            'titres_fonciers_30d' => TitreFoncier::where('created_at', '>=', $thirtyDaysAgo)->count(),
            'dossier_traites' => ImmatriculationDirecte::count(),
            'immatriculations_30d' => ImmatriculationDirecte::where('created_at', '>=', $thirtyDaysAgo)->count(),
            'total_users' => User::count(),
            'users_30d' => User::where('created_at', '>=', $thirtyDaysAgo)->count(),
            'all_users_with_titre' => $totalUsersWithTitre,
            'percent_homme' => $percentMen,
            'percent_femme' => $percentWomen,
            'all_cabinet_notaire' => Cabinet::where('type_cabinet', 'notaire')->count(),
            'all_cabinet_geometre' => Cabinet::where('type_cabinet', 'geometre')->count(),
            'all_notaire_membre' => MembreDuCabinet::where('type_membre', 'notaire')->count(),
            'all_geometre_membre' => MembreDuCabinet::where('type_membre', 'geometre')->count(),
            'all_lotissement' => Lotissement::count(),
            'total_certificats_propriete' => CertificatePropriete::count(),
            'certificats_30d' => CertificatePropriete::where('created_at', '>=', $thirtyDaysAgo)->count(),
            'logs' => AuditLog::with('user')->latest()->take(12)->get(),
            'allsales' => Sale::where('payment_status', 'totally_paid')->count(),
            'totalPaidAmount' => Sale::where('payment_status', 'totally_paid')->sum('sales_amount'),
            'totalSalesAmount' => Sale::sum('sales_amount'),
            'topSalesTypes' => $topSalesTypes,
            'filter_amount' => Sale::whereBetween('created_at', [$this->start_date, $this->end_date])->sum('sales_amount'),
            'filter_tf' => TitreFoncier::whereBetween('created_at', [$this->start_date_tf, $this->end_date_tf])->count(),
            'tfByZone' => $tfByZone,
            'tfByEtatTerrain' => $tfByEtatTerrain,
            'topRegionsChart' => $topRegionsChart,
            'topSubDivisionsChart' => $topSubDivisionsChart,
            'topLieuxChart' => $topLieuxChart,
            'operationsTypeChart' => $operationsTypeChart,
            'immatStatutChart' => $immatStatutChart,
            'geomStatusChart' => $geomStatusChart,
            'totalOperations' => $totalOperations,
            'operations_30d' => Operation::where('created_at', '>=', $thirtyDaysAgo)->count(),
            'tfDates' => $tfDates,
            'tfCounts' => $tfCounts,
            'tfMonthLabels' => $tfMonthLabels,
            'tfMonthCounts' => $tfMonthCounts,
            'operationsMonthLabels' => $operationsMonthLabels,
            'operationsMonthCounts' => $operationsMonthCounts,
            'salesMonthLabels' => $salesMonthLabels,
            'salesMonthTotals' => $salesMonthTotals,
        ];

        return view('livewire.portal.dashboard', $data)
            ->layout('components.layouts.dashboard');
    }
}
