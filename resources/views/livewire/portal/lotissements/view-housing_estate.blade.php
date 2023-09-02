<div wire:ignore.self class="modal side-layout-modal fade" id="ViewHousingEstateModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document" style="max-width:87%;">
        <div class="modal-content w-100">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="container-fluid w-100 mt-5">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="f-bold"> {{ __('Numero titre foncier') }} </th>
                                    <th> {{ __($housing_estate->land_title->numero_titre_foncier ?? '') }} </th>
                                    <th class="f-bold">{{ __('MAETURE') }}</th>
                                    <th> {{ $housing_estate->maeture }} </th>
                                </tr>
                                <tr>
                                    <th class="f-bold">{{ __('Surface du titre foncier') }}</th>
                                    <th> {{ __($housing_estate->land_title->superficie_du_TF_mere ?? '') }} </th>
                                    <th class="f-bold">{{ __('PROMOTEUR IMMOBILIER') }}</th>
                                    <th> {{ $housing_estate->property_developer }} </th>
                                </tr>
                                <tr>
                                    <th>{{ __('ZONE D\'UTILITÉ PUBLIQUE') }}</th>
                                    @php
                                        $superficiePublic = 0;
                                        foreach ($housing_estate->blocks as $block) {
                                            $superficiePublic += $block->parcels->where('type', 'public')->sum('lot_area');
                                        }
                                    @endphp
                                    <th> {{ $superficiePublic }} m² </th>
                                    <th class="f-bold">{{ __('AGENT IMMOBILIER') }}</th>
                                    <th> {{ $housing_estate->estate_agent }} </th>
                                </tr>
                                <tr>
                                    <th class="f-bold">{{ __('ZONE UTILE') }}</th>
                                    <th> </th>
                                    <th class="f-bold">{{ __('LOTISSEUR') }}</th>
                                    <th> {{ $housing_estate->lotisser }} </th>
                                </tr>
                                <tr>
                                    <th class="f-bold">{{ __('SURFACE VENDUE') }}</th>
                                    <th> {{ __($housing_estate->land_title->superficie_vendue_du_TF_mere ?? '0') }}
                                    </th>
                                    <th class="f-bold">{{ __('CABINET DE GEOMETRE') }}</th>
                                    <th> {{ $housing_estate->geometric_pratice }} </th>
                                </tr>
                                <tr>
                                    <th class="f-bold">{{ __('SURFACE RESTANTE ') }}</th>
                                    <th> {{ __($housing_estate->land_title->superficie_restant_du_TF_mere ?? '0') }}
                                    </th>
                                    <th class="f-bold">{{ __('L\'ENQUÊTEUR') }}</th>
                                    <th> {{ $housing_estate->geometric }} </th>
                                </tr>
                                <tr>
                                    <th class="f-bold">{{ __('NOMBRE DE BLOC') }}</th>
                                    <th> {{ __($housing_estate->blocks->count() ?? '0') }} </th>
                                    <th class="f-bold">{{ __('LE PLANIFICATEUR') }}</th>
                                    <th> {{ $housing_estate->urbanist }} </th>
                                </tr>
                                <tr>
                                    <th class="f-bold">{{ __('NOMBRE LE LOTS') }}</th>
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
                                    <th class="f-bold">{{ __('LE CONTRÔLEUR') }}</th>
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
                                        <th>DÉSIGNATION DU BLOC</th>
                                        <th>NOMBRE DE LOTS PAR BLOC</th>
                                        <th>LOT NO.</th>
                                        <th>SURFACE DU LOT</th>
                                        <th>STATUT DU LOT</th>
                                        <th>STATUT DU LOT</th>
                                        <th>ÉTUDE DE BUREAU DE NOTAIRE</th>
                                        <th>CLERK NOTAIRE</th>
                                        <th>SERVICE DU NOTAIRE</th>
                                        <th>GEOMETRE</th>
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
                    <div class="d-flex justify-content-end py-2">
                        <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                            data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                        <button type="submit" wire:click.prevent="printPdf" class="btn btn-primary btn-loading"
                            wire:loading.attr="disabled">{{ __('Imprimer') }} </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
