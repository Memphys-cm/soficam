<div class="container-fluid mt-4">
    <!-- Filters Section -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Options de Filtrage</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Date Range Filter -->
                <div class="col-md-4">
                    <label for="startYear">Année Début</label>
                    <select id="startYear" class="form-control" wire:model="startYear">
                        @for ($year = 1900; $year <= date('Y'); $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="endYear">Année Fin</label>
                    <select id="endYear" class="form-control" wire:model="endYear">
                        @for ($year = 1900; $year <= date('Y'); $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>

                <!-- Gender Filter -->
                <div class="col-md-4">
                    <label for="gender">Sexe</label>
                    <select id="gender" class="form-control" wire:model="gender">
                        <option value="">Tous</option>
                        <option value="M">Homme</option>
                        <option value="F">Femme</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="card">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Répartition des Titres Fonciers par Région</h4>
        </div>
        <div class="card-body" style="overflow-x: scroll">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Année</th>
                        <th>Adamoua</th>
                        <th>Centre (Hors Yaoundé)</th>
                        <th>Yaoundé</th>
                        <th>Est</th>
                        <th>Extrême-Nord</th>
                        <th>Littoral (Hors Douala)</th>
                        <th>Douala</th>
                        <th>Nord</th>
                        <th>Nord-Ouest</th>
                        <th>Ouest</th>
                        <th>Sud</th>
                        <th>Sud-Ouest</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Initialisation des totaux par région
                        $totalsByRegion = [
                            'ADAMAOUA' => 0,
                            'Centre (Hors Yaoundé)' => 0,
                            'Yaoundé' => 0,
                            'EST' => 0,
                            'EXTREME NORD' => 0,
                            'Littoral (Hors Douala)' => 0,
                            'Douala' => 0,
                            'NORD' => 0,
                            'NORD OUEST' => 0,
                            'OUEST' => 0,
                            'SUD' => 0,
                            'SUD-OUEST' => 0,
                        ];
                    @endphp

                    @forelse ($tableData as $year => $regions)
                        <tr>
                            <td>{{ $year }}</td>
                            @foreach ($totalsByRegion as $region => $total)
                                <td>{{ $regions[$region] ?? 0 }}</td>
                                @php
                                    // Ajoute les valeurs aux totaux par région
                                    $totalsByRegion[$region] += $regions[$region] ?? 0;
                                @endphp
                            @endforeach
                            <td>{{ array_sum($regions) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="14" class="text-center">Aucune donnée trouvée pour ces filtres</td>
                        </tr>
                    @endforelse

                    <!-- Totaux par région -->
                    <tr class="font-weight-bold bg-light">
                        <td>Total</td>
                        @foreach ($totalsByRegion as $total)
                            <td>{{ $total }}</td>
                        @endforeach
                        <td>{{ array_sum($totalsByRegion) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- resources/views/titres/index.blade.php --}}
    <div class="card mt-5" style="overflow-x: scroll">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th rowspan="2">Nombre de titres fonciers établis par immatriculation directe sur l'étendue du
                        territoire et du national</th>
                    <th rowspan="2">Personne physique</th>
                    <th colspan="2">En 2019</th>
                    <th colspan="2">En 2020</th>
                    <th colspan="2">En 2021</th>
                    <th colspan="2">En 2022</th>
                    <th colspan="2">En 2023</th>
                </tr>
                <tr>
                    <th>Superficie (en m²)</th>
                    <th>En</th>
                    <th>Superficie (en m²)</th>
                    <th>En</th>
                    <th>Superficie (en m²)</th>
                    <th>En</th>
                    <th>Superficie (en m²)</th>
                    <th>En</th>
                    <th>Superficie (en m²)</th>
                    <th>En</th>
                </tr>
            </thead>
            <tbody>
                {{-- Personnes physiques Hommes --}}
                <tr>
                    <td rowspan="2">Personnes physiques</td>
                    <td>Hommes</td>
                    @foreach ([2019, 2020, 2021, 2022, 2023] as $year)
                        @php
                            $hommes = $titresFoncier
                                ->where('type_personne', 'physique')
                                ->where('sexe', 'M')
                                ->where('annee', $year);
                        @endphp
                        <td>{{ $hommes->sum('superficie') }}</td>
                        <td>{{ $hommes->sum('nombre') }}</td>
                    @endforeach
                </tr>
                {{-- Personnes physiques Femmes --}}
                <tr>
                    <td>Femmes</td>
                    @foreach ([2019, 2020, 2021, 2022, 2023] as $year)
                        @php
                            $femmes = $titresFoncier
                                ->where('type_personne', 'physique')
                                ->where('sexe', 'F')
                                ->where('annee', $year);
                        @endphp
                        <td>{{ $femmes->sum('superficie') }}</td>
                        <td>{{ $femmes->sum('nombre') }}</td>
                    @endforeach
                </tr>
                {{-- Total Personnes physiques --}}
                <tr>
                    <td colspan="2">Total</td>
                    @foreach ([2019, 2020, 2021, 2022, 2023] as $year)
                        @php
                            $totalPhysique = $titresFoncier->where('type_personne', 'physique')->where('annee', $year);
                        @endphp
                        <td>{{ $totalPhysique->sum('superficie') }}</td>
                        <td>{{ $totalPhysique->sum('nombre') }}</td>
                    @endforeach
                </tr>
                {{-- Personnes morales De Droit public --}}
                <tr>
                    <td rowspan="3">Personnes morales</td>
                    <td>De Droit public</td>
                    @foreach ([2019, 2020, 2021, 2022, 2023] as $year)
                        @php
                            $public = $titresFoncier
                                ->where('type_personne', 'morale')
                                ->where('nature_personne', 'De Droit public')
                                ->where('annee', $year);
                        @endphp
                        <td>{{ $public->sum('superficie') }}</td>
                        <td>{{ $public->sum('nombre') }}</td>
                    @endforeach
                </tr>
                {{-- Personnes morales De Droit privé --}}
                <tr>
                    <td>De Droit privé</td>
                    @foreach ([2019, 2020, 2021, 2022, 2023] as $year)
                        @php
                            $prive = $titresFoncier
                                ->where('type_personne', 'morale')
                                ->where('nature_personne', 'De Droit privé')
                                ->where('annee', $year);
                        @endphp
                        <td>{{ $prive->sum('superficie') }}</td>
                        <td>{{ $prive->sum('nombre') }}</td>
                    @endforeach
                </tr>
                {{-- Personnes morales Collectivités coutumières --}}
                <tr>
                    <td>Collectivités coutumières</td>
                    @foreach ([2019, 2020, 2021, 2022, 2023] as $year)
                        @php
                            $collectivites = $titresFoncier
                                ->where('type_personne', 'morale')
                                ->where('nature_personne', 'Collectivités coutumières')
                                ->where('annee', $year);
                        @endphp
                        <td>{{ $collectivites->sum('superficie') }}</td>
                        <td>{{ $collectivites->sum('nombre') }}</td>
                    @endforeach
                </tr>
                {{-- Total Personnes morales --}}
                <tr>
                    <td colspan="2">Total</td>
                    @foreach ([2019, 2020, 2021, 2022, 2023] as $year)
                        @php
                            $totalMorale = $titresFoncier->where('type_personne', 'morale')->where('annee', $year);
                        @endphp
                        <td>{{ $totalMorale->sum('superficie') }}</td>
                        <td>{{ $totalMorale->sum('nombre') }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>



</div>
