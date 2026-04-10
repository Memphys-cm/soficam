<div class="dashboard-scope bg-light min-vh-100">
    <div class="px-4 pb-5 pt-4">

        {{-- KPI principaux : 3 colonnes × 2 lignes (lg+) --}}
        <section class="dashboard-kpi-section mb-4" aria-label="{{ __('Indicateurs') }}">
        <div class="row g-3">
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="kpi-card h-100">
                    <div class="kpi-icon kpi-icon-users text-primary"><i class="bi bi-people-fill"></i></div>
                    <div class="kpi-label">{{ __('Utilisateurs') }}</div>
                    <div class="kpi-value">{{ number_format($total_users, 0, ',', ' ') }}</div>
                    <div class="kpi-hint">+{{ $users_30d }} {{ __('sur 30 j.') }}</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="kpi-card h-100">
                    <div class="kpi-icon bg-indigo-soft text-indigo"><i class="bi bi-file-earmark-text-fill"></i></div>
                    <div class="kpi-label">{{ __('Titres fonciers') }}</div>
                    <div class="kpi-value">{{ number_format($all_titres_fonciers, 0, ',', ' ') }}</div>
                    <div class="kpi-hint">+{{ $titres_fonciers_30d }} {{ __('sur 30 j.') }}</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="kpi-card h-100">
                    <div class="kpi-icon bg-teal-soft text-teal"><i class="bi bi-folder2-open"></i></div>
                    <div class="kpi-label">{{ __('Immatriculations') }}</div>
                    <div class="kpi-value">{{ number_format($dossier_traites, 0, ',', ' ') }}</div>
                    <div class="kpi-hint">+{{ $immatriculations_30d }} {{ __('sur 30 j.') }}</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="kpi-card h-100">
                    <div class="kpi-icon kpi-icon-warn text-warning"><i class="bi bi-gear-wide-connected"></i></div>
                    <div class="kpi-label">{{ __('Opérations') }}</div>
                    <div class="kpi-value">{{ number_format($totalOperations, 0, ',', ' ') }}</div>
                    <div class="kpi-hint">+{{ $operations_30d }} {{ __('sur 30 j.') }}</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="kpi-card h-100">
                    <div class="kpi-icon kpi-icon-ok text-success"><i class="bi bi-patch-check-fill"></i></div>
                    <div class="kpi-label">{{ __('Certificats de propriété') }}</div>
                    <div class="kpi-value">{{ number_format($total_certificats_propriete, 0, ',', ' ') }}</div>
                    <div class="kpi-hint">+{{ $certificats_30d }} {{ __('sur 30 j.') }}</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="kpi-card h-100">
                    <div class="kpi-icon kpi-icon-money text-danger"><i class="bi bi-currency-exchange"></i></div>
                    <div class="kpi-label">{{ __('Recettes (toutes ventes)') }}</div>
                    <div class="kpi-value small-fs">{{ number_format($totalSalesAmount ?? 0, 0, ',', ' ') }} <span class="fs-6">FCFA</span></div>
                    <div class="kpi-hint">{{ __('Payées') }} : {{ number_format($totalPaidAmount ?? 0, 0, ',', ' ') }} FCFA</div>
                </div>
            </div>
        </div>
        </section>

        {{-- Second rang : acteurs & filtre --}}
        <div class="row g-3 mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="insight-tile">
                    <i class="bi bi-building text-primary"></i>
                    <div>
                        <div class="insight-title">{{ __('Cabinets notaires') }}</div>
                        <div class="insight-num">{{ $all_cabinet_notaire }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="insight-tile">
                    <i class="bi bi-rulers text-info"></i>
                    <div>
                        <div class="insight-title">{{ __('Cabinets géomètres') }}</div>
                        <div class="insight-num">{{ $all_cabinet_geometre }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="insight-tile">
                    <i class="bi bi-grid-1x2 text-secondary"></i>
                    <div>
                        <div class="insight-title">{{ __('Lotissements') }}</div>
                        <div class="insight-num">{{ $all_lotissement }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="insight-tile border-primary border-opacity-25">
                    <i class="bi bi-person-badge text-primary"></i>
                    <div>
                        <div class="insight-title">{{ __('Propriétaires (TF)') }}</div>
                        <div class="insight-num">{{ $all_users_with_titre }}</div>
                        <div class="small text-muted">{{ round($percent_homme) }}% H · {{ round($percent_femme) }}% F</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-2">
            {{-- Genre propriétaires TF --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <h2 class="h6 fw-bold mb-0">{{ __('Répartition H/F (détenteurs de TF)') }}</h2>
                        <p class="small text-muted mb-0">{{ __('Basé sur le sexe enregistré') }}</p>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center" style="min-height:220px" wire:ignore>
                        <canvas id="chartGender" height="200" width="200"></canvas>
                    </div>
                </div>
            </div>
            {{-- Statut géomètre --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <h2 class="h6 fw-bold mb-0">{{ __('Opérations — statut géomètre') }}</h2>
                    </div>
                    <div class="card-body d-flex justify-content-center" style="min-height:220px" wire:ignore>
                        <canvas id="chartGeomStatus" height="200" width="200"></canvas>
                    </div>
                </div>
            </div>
            {{-- Top types de vente --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <h2 class="h6 fw-bold mb-0">{{ __('Recettes par type de vente') }}</h2>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <div class="table-responsive">
                            <table class="table table-sm align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>{{ __('Type') }}</th>
                                        <th class="text-end">{{ __('Montant') }} (FCFA)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($topSalesTypes as $sale)
                                        <tr>
                                            <td class="text-break">{{ $sale->sales_type ?? '—' }}</td>
                                            <td class="text-end fw-semibold">{{ number_format($sale->total_sales_amount, 0, ',', ' ') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-muted text-center py-3">{{ __('Aucune vente enregistrée') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Évolution 30j TF --}}
        <div class="row g-4 mb-2">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div>
                            <h2 class="h6 fw-bold mb-0">{{ __('Titres fonciers créés — 30 derniers jours') }}</h2>
                            <p class="small text-muted mb-0">{{ __('Volume quotidien') }}</p>
                        </div>
                    </div>
                    <div class="card-body px-4 pb-4" wire:ignore>
                        <div style="height:280px">
                            <canvas id="chartTf30"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-2">
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <h2 class="h6 fw-bold mb-0">{{ __('Régions les plus représentées (TF)') }}</h2>
                    </div>
                    <div class="card-body px-4 pb-4" wire:ignore>
                        <div style="height:300px">
                            <canvas id="chartRegions"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <h2 class="h6 fw-bold mb-0">{{ __('Sous-préfectures / arrondissements (TF)') }}</h2>
                    </div>
                    <div class="card-body px-4 pb-4" wire:ignore>
                        <div style="height:300px">
                            <canvas id="chartSubDivisions"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-2">
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <h2 class="h6 fw-bold mb-0">{{ __('Localités (lieux-dits) les plus cités') }}</h2>
                    </div>
                    <div class="card-body px-4 pb-4" wire:ignore>
                        <div style="height:280px">
                            <canvas id="chartLieux"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <h2 class="h6 fw-bold mb-0">{{ __('Procédures — opérations par type') }}</h2>
                        <p class="small text-muted mb-0">{{ __('Mutation, morcellement, retrait d’indivision, etc.') }}</p>
                    </div>
                    <div class="card-body px-4 pb-4" wire:ignore>
                        <div style="height:280px">
                            <canvas id="chartProcedure"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-2">
            <div class="col-xl-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <h2 class="h6 fw-bold mb-0">{{ __('Dossiers d’immatriculation par statut') }}</h2>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center" style="min-height:260px" wire:ignore>
                        <canvas id="chartImmatStatut" height="220" width="220"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <h2 class="h6 fw-bold mb-0">{{ __('TF par zone') }}</h2>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <ul class="list-group list-group-flush">
                            @forelse ($tfByZone as $row)
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-body">{{ $row->label ?? $row->zone ?? '—' }}</span>
                                    <span class="badge bg-primary rounded-pill">{{ $row->total }}</span>
                                </li>
                            @empty
                                <li class="list-group-item text-muted px-0">{{ __('Aucune donnée') }}</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <h2 class="h6 fw-bold mb-0">{{ __('TF par état du terrain') }}</h2>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <ul class="list-group list-group-flush">
                            @forelse ($tfByEtatTerrain as $row)
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-body">{{ $row->label ?? $row->etat_terrain ?? '—' }}</span>
                                    <span class="badge bg-secondary rounded-pill">{{ $row->total }}</span>
                                </li>
                            @empty
                                <li class="list-group-item text-muted px-0">{{ __('Aucune donnée') }}</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Mois en cours : opérations & ventes --}}
        <div class="row g-4 mb-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <h2 class="h6 fw-bold mb-0">{{ __('Opérations créées — mois en cours') }}</h2>
                    </div>
                    <div class="card-body px-4 pb-4" wire:ignore>
                        <div style="height:240px">
                            <canvas id="chartOpsMonth"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <h2 class="h6 fw-bold mb-0">{{ __('Ventes — mois en cours') }}</h2>
                    </div>
                    <div class="card-body px-4 pb-4" wire:ignore>
                        <div style="height:240px">
                            <canvas id="chartSalesMonth"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filtre période & journaux --}}
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                        <h2 class="h6 fw-bold mb-0">{{ __('Indicateurs sur période (TF & recettes)') }}</h2>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <p class="small text-muted">{{ __('Ajustez les dates dans le composant Livewire si vous exposez des champs wire:model — valeurs actuelles du mois glissant.') }}</p>
                        <dl class="row small mb-0">
                            <dt class="col-6">{{ __('TF créés (fenêtre)') }}</dt>
                            <dd class="col-6 text-end fw-semibold">{{ number_format($filter_tf, 0, ',', ' ') }}</dd>
                            <dt class="col-6">{{ __('Montant ventes (fenêtre)') }}</dt>
                            <dd class="col-6 text-end fw-semibold">{{ number_format($filter_amount, 0, ',', ' ') }} FCFA</dd>
                            <dt class="col-6">{{ __('Ventes soldées') }}</dt>
                            <dd class="col-6 text-end fw-semibold">{{ number_format($allsales, 0, ',', ' ') }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
                        <h2 class="h6 fw-bold mb-0">{{ __('Activité récente (audit)') }}</h2>
                        <span class="badge bg-light text-dark">{{ __('Dernières') }} {{ $logs->count() }}</span>
                    </div>
                    <div class="card-body px-2 pb-2">
                        <div class="table-responsive" style="max-height:320px">
                            <table class="table table-sm table-hover mb-0">
                                <thead class="table-light sticky-top">
                                    <tr>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Utilisateur') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($logs as $log)
                                        <tr>
                                            <td class="text-nowrap small">{{ $log->created_at?->format('d/m/Y H:i') }}</td>
                                            <td class="small">{{ $log->user?->email ?? '—' }}</td>
                                            <td class="small text-break">{{ \Illuminate\Support\Str::limit($log->action_type ?? '—', 48) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted py-4">{{ __('Aucun journal') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .dashboard-scope { --dash-accent: #4f46e5; }
        .dashboard-kpi-section {
            padding-bottom: 0.25rem;
            border-bottom: 1px solid rgba(15, 23, 42, 0.06);
        }
        .kpi-card {
            background: #fff;
            border-radius: 1rem;
            padding: 1.1rem 1rem;
            box-shadow: 0 4px 24px rgba(15, 23, 42, 0.06);
            border: 1px solid rgba(15, 23, 42, 0.06);
            transition: transform .15s ease, box-shadow .15s ease;
        }
        .kpi-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(15, 23, 42, 0.1);
        }
        .kpi-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: .75rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            margin-bottom: .6rem;
        }
        .bg-indigo-soft { background: rgba(79, 70, 229, 0.12) !important; }
        .text-indigo { color: #4f46e5 !important; }
        .bg-teal-soft { background: rgba(13, 148, 136, 0.12) !important; }
        .text-teal { color: #0d9488 !important; }
        .kpi-label { font-size: .72rem; text-transform: uppercase; letter-spacing: .04em; color: #64748b; font-weight: 600; }
        .kpi-value { font-size: 1.5rem; font-weight: 800; color: #0f172a; line-height: 1.2; }
        .kpi-value.small-fs { font-size: 1.15rem; }
        .kpi-hint { font-size: .75rem; color: #94a3b8; margin-top: .25rem; }
        .insight-tile {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: #fff;
            border-radius: .875rem;
            padding: 1rem 1.25rem;
            border: 1px solid rgba(15, 23, 42, 0.06);
            box-shadow: 0 2px 12px rgba(15, 23, 42, 0.04);
        }
        .insight-tile i { font-size: 1.75rem; opacity: .9; }
        .insight-title { font-size: .75rem; text-transform: uppercase; color: #64748b; font-weight: 600; }
        .insight-num { font-size: 1.35rem; font-weight: 800; color: #0f172a; }
        .kpi-icon-users { background: rgba(37, 99, 235, 0.12) !important; }
        .kpi-icon-warn { background: rgba(245, 158, 11, 0.15) !important; }
        .kpi-icon-ok { background: rgba(16, 185, 129, 0.12) !important; }
        .kpi-icon-money { background: rgba(220, 38, 38, 0.1) !important; }
    </style>

    <script>
            (function () {
                const palette = ['#4f46e5', '#0ea5e9', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6', '#ec4899', '#64748b'];
                let dashboardChartInstances = [];

                function doughnutIfData(ctx, labels, data, colors) {
                    if (typeof Chart === 'undefined') {
                        return null;
                    }
                    if (!data || !data.length || data.every(v => v === 0)) {
                        return null;
                    }
                    const ch = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: labels,
                            datasets: [{ data: data, backgroundColor: colors || palette, borderWidth: 0 }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: { legend: { position: 'bottom', labels: { boxWidth: 10, font: { size: 11 } } } }
                        }
                    });
                    dashboardChartInstances.push(ch);
                    return ch;
                }

                function barChart(ctx, labels, data, horizontal) {
                    if (typeof Chart === 'undefined') {
                        return null;
                    }
                    if (!labels || !labels.length) {
                        return null;
                    }
                    const ch = new Chart(ctx, {
                        type: horizontal ? 'bar' : 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: '{{ __('Volume') }}',
                                data: data,
                                backgroundColor: palette.map(c => c + '99'),
                                borderColor: palette,
                                borderWidth: 1,
                                borderRadius: 4
                            }]
                        },
                        options: {
                            indexAxis: horizontal ? 'y' : 'x',
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                x: horizontal ? { beginAtZero: true } : { beginAtZero: true },
                                y: horizontal ? {} : { beginAtZero: true }
                            },
                            plugins: { legend: { display: false } }
                        }
                    });
                    dashboardChartInstances.push(ch);
                    return ch;
                }

                function lineChart(ctx, labels, data) {
                    if (typeof Chart === 'undefined') {
                        return null;
                    }
                    const ch = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: @json(__('TF / jour')),
                                data: data,
                                fill: true,
                                tension: .35,
                                borderColor: '#4f46e5',
                                backgroundColor: 'rgba(79, 70, 229, 0.12)',
                                borderWidth: 2,
                                pointRadius: 0,
                                pointHoverRadius: 4
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { beginAtZero: true, ticks: { precision: 0 } },
                                x: { grid: { display: false } }
                            },
                            plugins: { legend: { display: false } }
                        }
                    });
                    dashboardChartInstances.push(ch);
                    return ch;
                }

                function initCharts() {
                    dashboardChartInstances.forEach(function (c) {
                        try { c.destroy(); } catch (e) {}
                    });
                    dashboardChartInstances = [];

                    const genderCtx = document.getElementById('chartGender');
                    if (genderCtx) {
                        doughnutIfData(genderCtx.getContext('2d'),
                            [@json(__('Hommes')), @json(__('Femmes'))],
                            [{{ round($percent_homme, 2) }}, {{ round($percent_femme, 2) }}],
                            ['#2563eb', '#e11d48']
                        );
                    }

                    const geomCtx = document.getElementById('chartGeomStatus');
                    if (geomCtx) {
                        doughnutIfData(geomCtx.getContext('2d'),
                            @json($geomStatusChart['labels']),
                            @json($geomStatusChart['values'])
                        );
                    }

                    const tf30 = document.getElementById('chartTf30');
                    if (tf30) {
                        lineChart(tf30.getContext('2d'), @json($tfDates), @json($tfCounts));
                    }

                    const r = document.getElementById('chartRegions');
                    if (r) {
                        barChart(r.getContext('2d'), @json($topRegionsChart['labels']), @json($topRegionsChart['values']), true);
                    }
                    const sd = document.getElementById('chartSubDivisions');
                    if (sd) {
                        barChart(sd.getContext('2d'), @json($topSubDivisionsChart['labels']), @json($topSubDivisionsChart['values']), true);
                    }
                    const lx = document.getElementById('chartLieux');
                    if (lx) {
                        barChart(lx.getContext('2d'), @json($topLieuxChart['labels']), @json($topLieuxChart['values']), true);
                    }
                    const pr = document.getElementById('chartProcedure');
                    if (pr) {
                        barChart(pr.getContext('2d'), @json($operationsTypeChart['labels']), @json($operationsTypeChart['values']), true);
                    }

                    const im = document.getElementById('chartImmatStatut');
                    if (im) {
                        doughnutIfData(im.getContext('2d'),
                            @json($immatStatutChart['labels']),
                            @json($immatStatutChart['values'])
                        );
                    }

                    const om = document.getElementById('chartOpsMonth');
                    if (om) {
                        barChart(om.getContext('2d'), @json($operationsMonthLabels), @json($operationsMonthCounts), false);
                    }
                    const sm = document.getElementById('chartSalesMonth');
                    if (sm && typeof Chart !== 'undefined') {
                        const salesCh = new Chart(sm.getContext('2d'), {
                            type: 'line',
                            data: {
                                labels: @json($salesMonthLabels),
                                datasets: [{
                                    label: 'FCFA',
                                    data: @json($salesMonthTotals),
                                    fill: true,
                                    tension: .25,
                                    borderColor: '#0d9488',
                                    backgroundColor: 'rgba(13, 148, 136, 0.15)',
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: { y: { beginAtZero: true } },
                                plugins: { legend: { display: false } }
                            }
                        });
                        dashboardChartInstances.push(salesCh);
                    }
                }

                document.addEventListener('DOMContentLoaded', initCharts);
                document.addEventListener('livewire:load', initCharts);
            })();
        </script>
</div>
