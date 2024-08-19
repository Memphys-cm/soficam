<div>
    <div class="p-5 bg-light">

        <!-- Statistiques Globales -->
        <div class="row my-2">
            <div class="col-lg-4 col-md-6">
                <div class="card soft-card p-2">
                    <div class="d-flex align-items-center card-body">
                        <div class=" text-center">
                            <h6 class="text-muted">Titres Fonciers Total</h6>
                            <h3 class="fw-bold"> {{ $all_titres_fonciers ? $all_titres_fonciers : 0 }} </h3>
                            <div class="d-flex justify-content-center">
                                <canvas id="genderChart" width="90" height="90"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom soft-card">
                    <div class="card-body">
                        <div class="card-title">Recettes total</div>
                        <div class="card-value">{{ number_format($totalSalesAmount, 0, '', ' ') }} {{ __('FCFA') }}
                        </div>
                        <div class="card-subtitle">source de revenus top 10</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card soft-card p-2">
                    <div class="d-flex align-items-center card-body">
                        <div>
                            <h6 class="text-muted">Dossiers Totales</h6>
                            <h3 class="fw-bold">{{ number_format($totalSalesAmount, 0, '', ' ') }} {{ __('FCFA') }}
                            </h3>
                            <canvas id="dossierTypeChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-title">Activités récentes</div>
        <div class="row text-center my-2">
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="recent-title">Titres fonciers</div>
                    <div class="recent-activity-chart">
                        <!-- Example chart placeholder -->
                        <canvas id="recentChart1"></canvas>
                    </div>
                    <div class="card-subtitle">DU 17/07/2024</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="recent-title">Les dossiers traités</div>
                    <div class="recent-activity-chart">
                        <!-- Example chart placeholder -->
                        <canvas id="recentChart2"></canvas>
                    </div>
                    <div class="card-subtitle">DU 17/04/2024</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="recent-title">Recettes</div>
                    <div class="recent-activity-chart">
                        <!-- Example chart placeholder -->
                        <canvas id="recentChart3"></canvas>
                    </div>
                    <div class="card-subtitle">DU 17/07/2024</div>
                </div>
            </div>
        </div>

        <!-- Graphiques et Top 5 Régions -->
        <div class="row my-2">
            <div class="col-lg-6 mb-4">
                <div class="card soft-card p-2">
                    <div class="card-body">
                        <h6 class="text-muted mb-3">Top 5 Régions avec Titres Fonciers</h6>
                        <ul class="list-group soft-list">
                            @foreach ($topRegions as $region)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="text-dark fw-bold">{{ $region->region->region_name_fr }}</span>
                                    <span class="badge bg-primary rounded-pill">{{ $region->total }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card soft-card p-2">
                    <div class="card-body">
                        <h6 class="text-muted mb-3">Répartition des Dossiers par Région</h6>
                        <canvas id="dossierRegionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau Synthétique -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card soft-card p-2">
                    <div class="card-body">
                        <h6 class="text-muted mb-3">Données Synthétiques par Région</h6>
                        <div class="table-responsive">
                            <table class="table soft-table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Région</th>
                                        <th>Titres Fonciers</th>
                                        <th>Recettes</th>
                                        <th>Dossiers Complétés</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            canvas {
                width: 200px !important;
                /* Ajustez la largeur selon vos besoins */
                height: 200px !important;
                /* Ajustez la hauteur selon vos besoins */
            }

            canvas#dossierRegionChart {
                width: 100% !important;
                /* Ajustez la largeur selon vos besoins */
                height: 250px !important;
                /* Ajustez la hauteur selon vos besoins */
            }

            .soft-card {
                background: #fff;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
                border-radius: 20px;
                border: none;
                transition: transform 0.2s;
                display: flex;
                flex-direction: column;
                box-sizing: border-box;
            }

            .soft-card:hover {
                transform: translateY(-5px);
            }

            .row {
                display: flex;
                flex-wrap: wrap;
            }

            .card {
                flex: 1;
                display: flex;
                flex-direction: column;
                margin: 5px;
                height: 320px;
                /* Ajustez selon la hauteur souhaitée */
                box-sizing: border-box;
            }

            .card-body {
                flex: 1;
                overflow: hidden;
                /* Pour éviter le débordement */
            }

            .card-title {
                font-size: 18px;
                font-weight: 600;
                margin-bottom: 20px;
            }

            .card-value {
                font-size: 28px;
                font-weight: 700;
                color: #007bff;
                margin-bottom: 10px;
            }

            .card-subtitle {
                font-size: 14px;
                color: #888;
            }

            /* Soft Icons */
            .icon-soft {
                background-color: rgba(0, 0, 0, 0.05);
                padding: 10px;
                border-radius: 15px;
            }

            /* List group soft style */
            .soft-list .list-group-item {
                background-color: #f8f9fa;
                border-radius: 10px;
                border: none;
                margin-bottom: 10px;
            }

            /* Soft table */
            .soft-table th {
                font-weight: 600;
                text-transform: uppercase;
            }

            .soft-table td {
                font-weight: 500;
                padding: 10px 0;
            }

            /* Avatar and Header Styles */
            .avatar {
                border-radius: 50%;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .card-custom {
                border: none;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                padding: 30px;
                background-color: #ffffff;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .card-custom:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
            }

            .chart-circle {
                width: 80px;
                height: 80px;
                margin: 0 auto 20px;
            }

            .chart-circle canvas {
                max-width: 100%;
            }

            .recent-activity-chart {
                height: 130px;
            }

            .card-title {
                font-size: 18px;
                font-weight: 600;
                margin-bottom: 20px;
            }

            .card-value {
                font-size: 28px;
                font-weight: 700;
                color: #007bff;
                margin-bottom: 10px;
            }

            .card-subtitle {
                font-size: 14px;
                color: #888;
            }

            .recent-title {
                font-size: 16px;
                font-weight: 600;
                margin-bottom: 15px;
            }

            .section-title {
                font-size: 22px;
                font-weight: 700;
            }
        </style>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                var ctx1 = document.getElementById('genderChart').getContext('2d');
                var chart1 = new Chart(ctx1, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: [{{ (($tf_homme *100 ) / $all_titres_fonciers) }}, {{ (($tf_femme *100 ) / $all_titres_fonciers) }}],
                            backgroundColor: ['#007bff', '#dc3545']
                        }],
                        labels: ['homme', 'femme']
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutoutPercentage: 70
                    }
                });
                const ctx = document.getElementById('growthRateChart').getContext('2d');
                const growthRateChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($growthRates->pluck('titreFonciers.0.year')) !!}, // Années
                        datasets: [
                            @foreach ($growthRates as $region)
                                {
                                    label: '{{ $region->region_name_fr }}',
                                    data: {!! json_encode($region->titreFonciers->pluck('count')) !!},
                                    fill: false,
                                    borderColor: '{{ sprintf('#%06X', mt_rand(0, 0xffffff)) }}', // Couleur aléatoire
                                },
                            @endforeach
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            }
                        }
                    }
                });
            });
        </script>
        <script>
            // Répartition des Dossiers par Type

            var ctx2 = document.getElementById('dossierTypeChart').getContext('2d');
            var chart2 = new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [60, 30, 10],
                        backgroundColor: ['#007bff', '#dc3545', '#ffc107']
                    }],
                    labels: ['en cours', 'terminer', 'en attente']
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutoutPercentage: 70
                }
            });

            // Répartition des Dossiers par Région
            const ctxDossierRegion = document.getElementById('dossierRegionChart').getContext('2d');
            const dossierRegionChart = new Chart(ctxDossierRegion, {
                type: 'bar',
                data: {
                    labels: ['Région 1', 'Région 2', 'Région 3', 'Région 4', 'Région 5'],
                    datasets: [{
                        label: 'Nombre de Dossiers',
                        data: [120, 150, 100, 180, 160],
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });


        // Example line/bar charts
        var recentCtx1 = document.getElementById('recentChart1').getContext('2d');
        var recentChart1 = new Chart(recentCtx1, {
            type: 'line',
            data: {
                labels: ['17/07/2024', '18/07/2024', '19/07/2024'],
                datasets: [{
                    data: [12, 19, 3],
                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
                    borderColor: '#007bff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        var recentCtx2 = document.getElementById('recentChart2').getContext('2d');
        var recentChart2 = new Chart(recentCtx2, {
            type: 'bar',
            data: {
                labels: ['17/04/2024', '18/04/2024', '19/04/2024'],
                datasets: [{
                    data: [7, 11, 5],
                    backgroundColor: '#007bff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        var recentCtx3 = document.getElementById('recentChart3').getContext('2d');
        var recentChart3 = new Chart(recentCtx3, {
            type: 'line',
            data: {
                labels: ['17/07/2024', '18/07/2024', '19/07/2024'],
                datasets: [{
                    data: [10, 15, 7],
                    backgroundColor: 'rgba(40, 167, 69, 0.2)',
                    borderColor: '#28a745'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        </script>

    </div>
</div>
