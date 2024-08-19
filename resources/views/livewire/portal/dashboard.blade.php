<!-- Main Content -->
<div>
    <div class="p-5 bg-light">

        <!-- Statistiques Globales -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card soft-card p-4">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="text-muted">Titres Fonciers Total</h6>
                            <h3 class="fw-bold"> {{ $all_titres_fonciers ? $all_titres_fonciers : 0 }} </h3>
                        </div>
                        <div class="icon-soft ms-auto">
                            <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card soft-card p-4">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="text-muted">Titres Fonciers - Hommes</h6>
                            <h3 class="fw-bold">{{ $tf_homme ? $tf_homme : 0 }}</h3>
                        </div>
                        <div class="icon-soft ms-auto">
                            <i class="fas fa-male fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card soft-card p-4">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="text-muted">Titres Fonciers - Femmes</h6>
                            <h3 class="fw-bold">{{ $tf_femme ? $tf_femme : 0 }}</h3>
                        </div>
                        <div class="icon-soft ms-auto">
                            <i class="fas fa-female fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card soft-card p-4">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="text-muted">Recettes Totales</h6>
                            <h3 class="fw-bold">{{ number_format($totalSalesAmount, 0, '', ' ') }} {{ __('FCFA') }}
                            </h3>
                        </div>
                        <div class="icon-soft ms-auto">
                            <i class="fas fa-dollar-sign fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Taux de Croissance et Comparaison Régionale -->
        <div class="row mb-4">
            <div class="col-lg-6 mb-4">
                <div class="card soft-card p-4">
                    <h6 class="text-muted mb-3">Taux de Croissance des Titres Fonciers par Région</h6>
                    <canvas id="growthRateChart"></canvas>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card soft-card p-4">
                    <h6 class="text-muted mb-3">Comparaison des Performances Régionales</h6>
                    <canvas id="regionComparisonChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Graphiques et Top 5 Régions -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card soft-card p-4">
                    <h6 class="text-muted mb-3">Évolution des Titres Fonciers par Région</h6>
                    <canvas id="evolutionChart"></canvas>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card soft-card p-4">
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

        <!-- Analyse des Dossiers -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card soft-card p-4">
                    <h6 class="text-muted mb-3">Répartition des Dossiers par Type</h6>
                    <canvas id="dossierTypeChart"></canvas>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card soft-card p-4">
                    <h6 class="text-muted mb-3">Dossiers Traités par Sexe</h6>
                    <canvas id="genderChart"></canvas>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card soft-card p-4">
                    <h6 class="text-muted mb-3">Répartition des Dossiers par Région</h6>
                    <canvas id="dossierRegionChart"></canvas>
                </div>
            </div>
        </div>



        <!-- Tableau Synthétique -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card soft-card p-4">
                    <h6 class="text-muted mb-3">Données Synthétiques par Région</h6>
                    <div class="table-responsive">
                        <table class="table soft-table table-borderless">
                            <thead>
                                <tr>
                                    <th>Région</th>
                                    <th>Titres Fonciers</th>
                                    <th>Recettes</th>
                                    <th>Taux de Croissance</th>
                                    <th>Dossiers Complétés</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Région 1</td>
                                    <td>2,345</td>
                                    <td>$345,678</td>
                                    <td>5.2%</td>
                                    <td>1,234</td>
                                </tr>
                                <tr>
                                    <td>Région 2</td>
                                    <td>1,789</td>
                                    <td>$234,567</td>
                                    <td>4.8%</td>
                                    <td>987</td>
                                </tr>
                                <tr>
                                    <td>Région 3</td>
                                    <td>1,456</td>
                                    <td>$189,234</td>
                                    <td>4.2%</td>
                                    <td>876</td>
                                </tr>
                                <tr>
                                    <td>Région 4</td>
                                    <td>1,234</td>
                                    <td>$167,890</td>
                                    <td>3.9%</td>
                                    <td>765</td>
                                </tr>
                                <tr>
                                    <td>Région 5</td>
                                    <td>1,123</td>
                                    <td>$145,678</td>
                                    <td>3.5%</td>
                                    <td>654</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Soft Card Styles */
            .soft-card {
                background: #fff;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
                border-radius: 20px;
                border: none;
                transition: transform 0.2s;
            }

            .soft-card:hover {
                transform: translateY(-5px);
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
        </style>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
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
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('regionComparisonChart').getContext('2d');
                const regionComparisonChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($regionComparison->pluck('region.region_name_fr')) !!}, // Noms des régions
                        datasets: [{
                            label: 'Nombre de Titres Fonciers',
                            data: {!! json_encode($regionComparison->pluck('total')) !!},
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('evolutionChart').getContext('2d');
                const evolutionChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($evolutionData->pluck('year')->unique()) !!}, // Années
                        datasets: [
                            @foreach ($evolutionData->groupBy('region_id') as $regionId => $data)
                                {
                                    label: '{{ $data->first()->region->region_name_fr }}',
                                    data: {!! json_encode($data->pluck('total')) !!},
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
            const ctxDossierType = document.getElementById('dossierTypeChart').getContext('2d');
            const dossierTypeChart = new Chart(ctxDossierType, {
                type: 'pie',
                data: {
                    labels: ['Type 1', 'Type 2', 'Type 3', 'Type 4'],
                    datasets: [{
                        label: 'Répartition des Dossiers',
                        data: [300, 250, 200, 150],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
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

            const genderCtx = document.getElementById('genderChart').getContext('2d');
            const genderChart = new Chart(genderCtx, {
                type: 'pie',
                data: {
                    labels: ['Hommes', 'Femmes'],
                    datasets: [{
                        data: [789, 544],
                        backgroundColor: ['#36A2EB', '#FF6384'],
                        hoverBackgroundColor: ['#36A2EB', '#FF6384']
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    size: 14,
                                    family: "'Inter', sans-serif"
                                }
                            }
                        }
                    }
                }
            });
        </script>

    </div>
</div>
