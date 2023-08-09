<div class="container-fluid w-100 mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="f-bold"> {{ __('LAND TITLE NUMBER') }} </th>
                <th> {{ __($housing_estate->land_title->numero_titre_foncier ) }} </th>
                <th class="f-bold">{{ __('MAETURE') }}</th>
                <th> {{ $housing_estate->maeture }} </th>
            </tr>
            <tr>
                <th class="f-bold">{{ __('AREA OF LAND TITLE') }}</th>
                <th> {{ __($housing_estate->land_title->superficie_du_TF_mere ?? '') }} </th>
                <th class="f-bold">{{ __('REAL ESTATE DEVELOPER') }}</th>
                <th> {{ $housing_estate->property_developer }} </th>
            </tr>
            <tr>
                <th>{{ __('PUBLIC UTILITY AREA') }}</th>
                @php
                    $superficiePublic = 0;
                    foreach ($housing_estate->blocks as $block) {
                        $superficiePublic += $block->parcels->where('type', 'public')->sum('lot_area');
                    }
                @endphp
                <th> {{ $superficiePublic }} m² </th>
                <th class="f-bold">{{ __('REAL ESTATE AGENT') }}</th>
                <th> {{ $housing_estate->estate_agent }} </th>
            </tr>
            <tr>
                <th class="f-bold">{{ __('USEFUL AREA') }}</th>
                <th> </th>
                <th class="f-bold">{{ __('LOTISSER') }}</th>
                <th> {{ $housing_estate->lotisser }} </th>
            </tr>
            <tr>
                <th class="f-bold">{{ __('AREA SOLD') }}</th>
                <th> {{ __($housing_estate->land_title->superficie_vendue_du_TF_mere ?? '0') }}
                </th>
                <th class="f-bold">{{ __('LE CABINET DE GEOMETRE') }}</th>
                <th> {{ $housing_estate->geometric_pratice }} </th>
            </tr>
            <tr>
                <th class="f-bold">{{ __('REMAINING AREA ') }}</th>
                <th> {{ __($housing_estate->land_title->superficie_restant_du_TF_mere ?? '0') }}
                </th>
                <th class="f-bold">{{ __('THE SURVEYOR') }}</th>
                <th> {{ $housing_estate->geometric }} </th>
            </tr>
            <tr>
                <th class="f-bold">{{ __('NUMBER OF BLOCKS') }}</th>
                <th> {{ __($housing_estate->blocks->count() ?? '0') }} </th>
                <th class="f-bold">{{ __('THE PLANNER') }}</th>
                <th> {{ $housing_estate->urbanist }} </th>
            </tr>
            <tr>
                <th class="f-bold">{{ __('NUMBER OF LOTS') }}</th>
                @if ($housing_estate->blocks->count() > 0)
                    @php
                        $totalParcelCount = $housing_estate->blocks->sum(function ($block) {
                            return $block->parcels->count();
                        });
                    @endphp
                    <th> {{ __($totalParcelCount ?? '0') }} </th>
                @else
                    <th> {{ 0 }} </th>
                @endif
                <th class="f-bold">{{ __('THE CONTROLLER') }}</th>
                <th> {{ $housing_estate->controller }} </th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div style="overflow-x: auto;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>BLOCK DESIGNATION</th>
                    <th>NUMBER OF LOTS PER BLOCK</th>
                    <th>LOT NO.</th>
                    <th>LOT AREA</th>
                    <th>LOT STATUS</th>
                    <th>LOT STATUS</th>
                    <th>NOTARY OFFICE STUDY</th>
                    <th>NOTARY CLERK</th>
                    <th>GEOMETER OFFICE</th>
                    <th>GEOMETER</th>
                    <th>DATE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($housing_estate->blocks as $key => $block)
                    <tr>
                        <td> {{ $key + 1 }} </td>
                        <td> {{ $block->name }} </td>
                        <td> {{ $block->parcels->count() }} </td>
                        <td>
                            <table class="table table-bordered">
                                @foreach ($block->parcels as $parcel)
                                    <tr>
                                        <td> {{ $parcel->lot_no }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>
                            <table class="table table-bordered">
                                @foreach ($block->parcels as $parcel)
                                    <tr>
                                        <td> {{ $parcel->lot_area }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>
                            <table class="table table-bordered">
                                @foreach ($block->parcels as $parcel)
                                    <tr>
                                        <td> {{ $parcel->lot_status }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>
                            <table class="table table-bordered">
                                @foreach ($block->parcels as $parcel)
                                    <tr>
                                        <td> {{ $parcel->notary_office }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>
                            <table class="table table-bordered">
                                @foreach ($block->parcels as $parcel)
                                    <tr>
                                        <td> {{ $parcel->notary_clerk }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>
                            <table class="table table-bordered">
                                @foreach ($block->parcels as $parcel)
                                    <tr>
                                        <td> {{ $parcel->geometric_pratic }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>
                            <table class="table table-bordered">
                                @foreach ($block->parcels as $parcel)
                                    <tr>
                                        <td> {{ $parcel->lot_no }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>
                            <table class="table table-bordered">
                                @foreach ($block->parcels as $parcel)
                                    <tr>
                                        <td> {{ $parcel->geometrician }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>
                            <table class="table table-bordered">
                                @foreach ($block->parcels as $parcel)
                                    <tr>
                                        <td> {{ $parcel->date }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>

                    </tr>
                @endforeach
                <!-- Ajoutez plus de lignes ici -->
            </tbody>
        </table>
    </div>
</div>
