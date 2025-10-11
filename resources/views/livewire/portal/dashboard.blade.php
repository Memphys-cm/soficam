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
                        <div class="card-title">Recettes totales</div>
                        <div class="card-value">{{ number_format($totalSalesAmount, 0, '', ' ') }} {{ __('FCFA') }}
                        </div>
                        <div class="card-subtitle">Source de revenus top 5</div>

                        <table class="table table-sm table-borderless mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Type</th>
                                    <th scope="col" class="text-right">Montant (FCFA)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topSalesTypes as $sale)
                                    <tr>
                                        <td>{{ $sale->sales_type }}</td>
                                        <td class="text-right">
                                            {{ number_format($sale->total_sales_amount, 0, '', ' ') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card soft-card p-2">
                    <div class="d-flex align-items-center card-body">
                        <div>
                            <h6 class="text-muted">Dossiers Totaux</h6>
                            <h3 class="fw-bold">{{ number_format($totalOperations, 0, '', ' ') }}</h3>
                            <canvas id="dossierTypeChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-title">Activités récentes</div>
        <div class="row text-center my-2">
            <div class="col-md-4">
                <div class="card soft-card p-2">
                    <div class="d-flex align-items-center card-body">
                        <div>
                            <h6 class="text-muted">Évolution des Titres Fonciers du Dernier Mois</h6>
                            <canvas id="titresFoncierRecentChart" width="100%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="recent-title">Les dossiers traités</div>
                    <div class="recent-activity-chart">
                        <!-- Placeholder pour le graphique -->
                        <canvas id="operationsChart"></canvas>
                    </div>
                    {{-- <div class="card-subtitle">Évolution des dossiers traités au cours du dernier mois</div> --}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="recent-title">Recettes</div>
                    <div class="recent-activity-chart">
                        <!-- Placeholder pour le graphique -->
                        <canvas id="salesChart"></canvas>
                    </div>
                    {{-- <div class="card-subtitle">Évolution des ventes au cours du dernier mois</div> --}}
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

                const titresFoncierRecentCtx = document.getElementById('titresFoncierRecentChart').getContext('2d');

                const labels = @json(array_column($titresFoncierData, 'date'));
                const counts = @json(array_column($titresFoncierData, 'count'));

                new Chart(titresFoncierRecentCtx, {
                    type: 'line',
                    data: {
                        labels: ['01/08/2024', '31/08/2024'],
                        datasets: [{
                            label: 'Titres fonciers',
                            data: [0, counts],
                            borderColor: '#36a2eb',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });

                var ctx1 = document.getElementById('genderChart').getContext('2d');
                var chart1 = new Chart(ctx1, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: [{{ $percent_homme }}, {{ $percent_femme }}],
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
            document.addEventListener('livewire:load', function () {
                const operationsCtx = document.getElementById('operationsChart').getContext('2d');

                const labels = @json(array_column($operationsData, 'date'));
                const counts = @json(array_column($operationsData, 'count'));

                new Chart(operationsCtx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Nombre d\'opérations',
                            data: counts,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
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
                                display: false
                            }
                        }
                    }
                });
            });
        </script>
        <script>
            document.addEventListener('livewire:load', function () {
                const salesCtx = document.getElementById('salesChart').getContext('2d');

                const labels = @json(array_column($salesData, 'date'));
                const sales = @json(array_column($salesData, 'total_sales'));

                new Chart(salesCtx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total des ventes',
                            data: sales,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.1
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
                                display: false
                            }
                        }
                    }
                });
            });
        </script>
        <script>
            // Répartition des Dossiers par Type

            var ctx2 = document.getElementById('dossierTypeChart').getContext('2d');
            var data = {
                datasets: [{
                    data: [
                        {{ $operationsByStatus['en cour'] ?? 0 }},
                        {{ $operationsByStatus['terminer'] ?? 0 }},
                        {{ $operationsByStatus['en attente'] ?? 0 }}
                    ],
                    backgroundColor: ['#007bff', '#dc3545', '#ffc107']
                }],
                labels: ['En cours', 'Terminée', 'En attente']
            };

            var chart2 = new Chart(ctx2, {
                type: 'doughnut',
                data: data,
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
            var ctxtf = document.getElementById('tfEvolutionChart').getContext('2d');
            var tfEvolutionChart = new Chart(ctxtf, {
                type: 'line',
                data: {
                    labels: @json($tfDates),
                    datasets: [{
                        label: 'Titres Fonciers',
                        data: @json($tfCounts),
                        backgroundColor: 'rgba(0, 123, 255, 0.2)',
                        borderColor: '#007bff',
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            type: 'category', // Utilisation de 'category' si 'time' pose problème
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Nombre de Titres'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    }
                }
            });

            var ctxRc1 = document.getElementById('dossierTraiter').getContext('2d');
            var recentChart2 = new Chart(ctxRc1, {
                type: 'bar',
                data: {
                    labels: @json($dossierDates), // Insertion des dates
                    datasets: [{
                        label: 'Dossiers traités',
                        data: @json($dossierCounts), // Insertion du nombre de dossiers
                        backgroundColor: '#007bff', // Couleur des barres
                        borderColor: '#007bff', // Couleur des bordures
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Nombre de Dossiers'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    }
                }
            });

            var ctx3 = document.getElementById('recentChart3').getContext('2d');
            var recentChart3 = new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: @json($venteDates), // Insertion des dates
                    datasets: [{
                        label: 'Recettes',
                        data: @json($venteTotals), // Insertion des montants
                        backgroundColor: 'rgba(40, 167, 69, 0.2)', // Couleur de fond
                        borderColor: '#28a745', // Couleur des lignes
                        fill: true,
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Montant des Ventes'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    }
                }
            });
        </script>

    </div>
</div>
