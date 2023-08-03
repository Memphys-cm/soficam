<div wire:ignore.self class="modal side-layout-modal fade" id="ViewHousingEstateModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document" style="max-width:75%;">
        <div class="modal-content w-100">
            <div class="container-fluid w-100 mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="f-bold"> {{ __('LAND TITLE NUMBER') }} </th>
                            <th></th>
                            <th class="f-bold">{{ __('MAETURE') }}</th>
                            <th> {{ $housing_estate->maeture }} </th>
                        </tr>
                        <tr>
                            <th class="f-bold">{{ __('AREA OF LAND TITLE') }}</th>
                            <th> </th>
                            <th class="f-bold">{{ __('REAL ESTATE DEVELOPER') }}</th>
                            <th> {{ $housing_estate->property_developer }} </th>
                        </tr>
                        <tr>
                            <th>{{ __('PUBLIC UTILITY AREA') }}</th>
                            <th> </th>
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
                            <th> </th>
                            <th class="f-bold">{{ __('LE CABINET DE GEOMETRE') }}</th>
                            <th> {{ $housing_estate->geometric_pratice }} </th>
                        </tr>
                        <tr>
                            <th class="f-bold">{{ __('REMAINING AREA ') }}</th>
                            <th></th>
                            <th class="f-bold">{{ __('THE SURVEYOR') }}</th>
                            <th> {{ $housing_estate->geometric }} </th>
                        </tr>
                        <tr>
                            <th class="f-bold">{{ __('NUMBER OF BLOCKS') }}</th>
                            <th></th>
                            <th class="f-bold">{{ __('THE PLANNER') }}</th>
                            <th> {{ $housing_estate->urbanist }} </th>
                        </tr>
                        <tr>
                            <th class="f-bold">{{ __('NUMBER OF LOTS') }}</th>
                            <th></th>
                            <th class="f-bold">{{ __('THE CONTROLLER') }}</th>
                            <th> {{ $housing_estate->controller }} </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
                        <tr>
                            <td>1</td>
                            <td>Bloc A</td>
                            <td>10</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr> <td>  jjj</td> </tr>
                                    <tr> <td>  jjj</td> </tr>
                                    <tr> <td>  jjj</td> </tr>
                                </table>
                            </td>
                            <td>150 m²</td>
                            <td>Disponible</td>
                            <td>En Vente</td>
                            <td>Étude Notaire A</td>
                            <td>Clerc A</td>
                            <td>Cabinet Géomètre X</td>
                            <td>Géomètre Y</td>
                            <td>2023-08-05</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Bloc B</td>
                            <td>8</td>
                            <td>Lot 201</td>
                            <td>120 m²</td>
                            <td>En cours de construction</td>
                            <td>Réservé</td>
                            <td>Étude Notaire B</td>
                            <td>Clerc B</td>
                            <td>Cabinet Géomètre Z</td>
                            <td>Géomètre W</td>
                            <td>2023-08-10</td>
                        </tr>
                        <!-- Ajoutez plus de lignes ici -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
