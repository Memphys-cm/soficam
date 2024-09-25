<div class="card my-2 p-2">
    <h2>Recettes Générées</h2>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="startYear">Année de début:</label>
            <select wire:model="startYear" id="startYear" class="form-control">
                @for ($year = 2019; $year <= date('Y'); $year++)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>
        <div class="col-md-6">
            <label for="endYear">Année de fin:</label>
            <select wire:model="endYear" id="endYear" class="form-control">
                @for ($year = 2019; $year <= date('Y'); $year++)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Année</th>
                @foreach ($years as $year)
                    <th>{{ $year }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Recettes générées</td>
                @foreach ($years as $year)
                    <td>{{ number_format($totalSalesByYear[$year] ?? 0, 2) }} FCFA</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
