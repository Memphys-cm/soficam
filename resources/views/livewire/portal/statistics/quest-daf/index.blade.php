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
                            'SUD-OUEST' => 0
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
</div>
