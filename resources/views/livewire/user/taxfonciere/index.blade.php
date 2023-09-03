<div>
    @include('livewire.user.taxfonciere.paiement')

    <x-alert />
    <x-delete-modal />
    <div class='p-0'>
        <div class="d-flex justify-content-between w-100 flex-wrap align-items-center">
            <div class="mb-lg-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="/">{{ __('Tableau de bord') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Titres fonciers') }}</li>
                    </ol>
                </nav>
                <h1 class="h4 mt-n2 d-flex justify-content-start align-items-end">
                    <svg class="icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('Tax foncier sur mes titres fonciers') }}
                </h1>
                <p class="mt-n1 mx-2">{{ __('Voir tous les Tax Foncier sur titres fonciers') }} &#x23F0; </p>
            </div>
        </div>
    </div>
    <div class="card pb-3">
        <div class="table-responsive  text-gray-700">
            <table class="table employee-table table-bordered table-hover align-items-center ">
                <thead>
                    <tr>
                        <th class="border-bottom">{{ __('Numéro du titre foncier') }}</th>
                        <th class="border-bottom">{{ __('Proprietaire') }}</th>
                        <th class="border-bottom">{{ __('Localisation') }}</th>
                        <th class="border-bottom">{{ __('Montant de la Taxe') }}</th>
                        <th class="border-bottom">{{ __('Statut de la Taxe') }}</th>
                        <th class="border-bottom">{{ __('Date de Paiement') }}</th>
                        <th class="border-bottom">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($titrefonciers as $titrefoncier)
                        <tr>

                            <td>
                                <span class="fw-normal">{{ $titrefoncier->numero_titre_foncier }}</span>
                            </td>

                            <td>
                                @foreach ($titrefoncier->users as $user)
                                    <li>{{ $user->name }}</li>
                                @endforeach
                            </td>

                            <td>
                                <div class="d-flex align-items-centerpy-1">
                                    {{ __('Region') }} : <span class="fw-bolder mx-2">
                                        {{ $titrefoncier->region->region_name }} </span>
                                </div>
                                <div class="d-flex align-items-centerpy-1">
                                    {{ __('Division') }} : <span class="fw-bolder mx-2">
                                        {{ $titrefoncier->division->division_name }} </span>
                                </div>
                                <div class="d-flex align-items-centerpy-1">
                                    {{ __('Sub Divi') }} : <span class="fw-bolder mx-2">
                                        {{ $titrefoncier->subDivision->sub_division_name }} </span>
                                </div>
                                <div class="d-flex align-items-centerpy-1">
                                    {{ __('Lieu Dit') }} : <span class="fw-bolder mx-2">
                                        {{ $titrefoncier->lieu_dit }} </span>
                                </div>
                            </td>

                            <td>
                                <span class="fw-normal">{{ $titrefoncier->taxFoncier_amount }} {{ __('XAF') }}</span>
                            </td>
                            <td>
                                <span
                                    class="fw-normal badge super-badge p-2 bg-{{ $titrefoncier->StatusTaxStyle }} round">{{ $titrefoncier->status_tax }}</span>
                            </td>
                            <td>
                                <span class="fw-normal">{{ $titrefoncier->date_tax }}</span>
                            </td>
                            <td>
                              
                                @if ($titrefoncier->status_tax === 'non_payer')
                                    <button wire:click.prevent="initData({{ $titrefoncier->id }})"
                                        data-bs-toggle="modal" data-bs-target="#paiement" class="btn btn-primary btn-sm"
                                        draggable="false">
                                        Paiement
                                    </button>
                                @else
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 30 30" stroke="green">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                      </svg>
                                      
                                </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">
                                <div class="text-center text-gray-800 mt-2">
                                    <h4 class="fs-4 fw-bold">{{ __('Liste vide') }}</h4>
                                    <p>{{ __('Aucun enregistrement trouvé..!') }}</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
