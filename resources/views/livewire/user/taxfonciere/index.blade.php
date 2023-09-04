  <div>
      @include('livewire.user.taxfonciere.paiement')
      <div class='container pt-3 pt-lg-4 pb-4 pb-lg-3 text-white'>
          <div class='d-flex flex-wrap align-items-center  justify-content-between '>
              <a href="{{route('user.dashboard')}}" sclass="">
                  <svg class="icon me-1 text-gray-700 bg-gray-300 rounded-circle p-2" style="height : 2.5rem;" fill="none" stroke="currentColor" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                  </svg>
              </a>
              <div>
                  <x-navigation.user-nav />
              </div>
          </div>
          <div class='d-flex flex-wrap justify-content-between align-items-center pt-3'>
              <div class=''>
                  <h1 class='fw-bold display-4 text-gray-600 d-inline-flex align-items-end'>
                      <svg class="icon icon-lg me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                      </svg>
                      <span>
                          {{__('Taxe foncière sur mes Titres Fonciers')}}
                      </span>
                  </h1>
                  <p class="text-gray-800">{{ __('Voir toutes les Taxes Foncières sur Titres Fonciers') }}  </p>
              </div>
              <div class=''>

              </div>
          </div>
          <div class=' mt-3'>
              <div class='row'>
                  <div class='col-md-4 col-sm-12'>
                      <div class='border-prim p-3 rounded'>
                          <a href="" class="d-flex  justify-content-between align-items-center gap-1">
                              <div class="d-flex justify-content-center align-items-center gap-2">
                                  <svg class="icon me-1 text-gray-50 bg-success shadow rounded-circle p-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                  </svg>
                                  <div class="mb-3 mb-md-0">
                                      <h5 class="text-gray-700 fw-bold mb-0">{{numberFormat($titrefonciers_count)}} {{ __(\Str::plural('Audit de Création', $titrefonciers_count)) }} </h5>
                                      <div class=" text-gray-500 ">{{__('enregistré!')}} </div>
                                  </div>
                              </div>
                          </a>
                      </div>
                  </div>
                  <div class='col-md-4 col-sm-12 mt-3 mt-md-0'>
                      <div class='border-prim p-3 rounded'>
                          <a href="" class="d-flex  justify-content-between align-items-center gap-1">
                              <div class="d-flex justify-content-center align-items-center gap-2">
                                  <svg class="icon icon-md me-1 text-gray-50 bg-warning shadow rounded-circle p-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                  </svg>
                                  <div class="mb-3 mb-md-0">
                                      <h5 class="text-gray-700 fw-bold mb-0">{{numberFormat($titrefonciers_count)}} {{ __(\Str::plural('Audit de Modification', $titrefonciers_count)) }} </h5>
                                      <div class=" text-gray-500 ">{{__('enregistré!')}} </div>
                                  </div>
                              </div>
                          </a>
                      </div>
                  </div>
                  <div class='col-md-4 col-sm-12 mt-3 mt-md-0'>
                      <div class='border-prim p-3 rounded'>
                          <a href="" class="d-flex  justify-content-between align-items-center gap-1">
                              <div class="d-flex justify-content-center align-items-center gap-2">
                                  <svg class="icon icon-md me-1 text-gray-50 bg-danger shadow rounded-circle p-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                  </svg>
                                  <div class="mb-3 mb-md-0">
                                      <h5 class="text-gray-700 fw-bold mb-0">{{numberFormat($titrefonciers_count)}} {{ __(\Str::plural('Audit Suppressions', $titrefonciers_count)) }}</h5>
                                      <div class="text-gray-500 ">{{__('enregistré!')}} </div>
                                  </div>
                              </div>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row pt-4 pb-2 text-gray-600 ">
              <div class="col-md-3 mb-2">
                  <label for="search">{{__('Recherche')}}: </label>
                  <input wire:model="query" id="search" type="text" placeholder="{{__('Recherche...')}}" class="form-control">
                  <p class="badge badge-info" wire:model="resultCount">{{$resultCount}}</p>
              </div>
              <div class="col-md-3 mb-2">
                  <label for="orderBy">{{__('Trier par')}}: </label>
                  <select wire:model="orderBy" id="orderBy" class="form-select">
                      <option value="action_type">{{__('Type d\'action')}}</option>
                      <option value="created_at">{{__('Date Création')}}</option>
                  </select>
              </div>
              <div class="col-md-3 mb-2">
                  <label for="direction">{{__('Sens de tri')}}: </label>
                  <select wire:model="orderAsc" id="direction" class="form-select">
                      <option value="asc">{{__('Ascendant ')}}</option>
                      <option value="desc">{{__('Descendant')}}</option>
                  </select>
              </div>
              <div class="col-md-3 mb-2">
                  <label for="perPage">{{__('Éléments par page')}}: </label>
                  <select wire:model="perPage" id="perPage" class="form-select">
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="15">15</option>
                      <option value="20">20</option>
                      <option value="25">25</option>
                  </select>
              </div>
          </div>
          <x-alert />

          @if(count($titrefonciers) > 0)
          <div class="card">

              <div class="table-responsive pb-3 text-gray-700">
                  <table class="table employee-table table-hover align-items-center ">
                      <thead>
                          <tr>
                              <th class="border-bottom">{{ __('Numéro du titre foncier') }}</th>
                              <th class="border-bottom">{{ __('PropriÉtaire(s)') }}</th>
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
                                  <span class="fw-normal">{{ $titrefoncier->taxFoncier_amount }} {{ __('FCFA') }}</span>
                              </td>
                              <td>
                                  <span class="fw-normal badge super-badge p-2 bg-{{ $titrefoncier->StatusTaxStyle }} round">{{ $titrefoncier->status_tax }}</span>
                              </td>
                              <td>
                                  <span class="fw-normal">{{ $titrefoncier->date_tax }}</span>
                              </td>
                              <td>

                                  @if ($titrefoncier->status_tax === 'non_payer')
                                  <button wire:click.prevent="initData({{ $titrefoncier->id }})" data-bs-toggle="modal" data-bs-target="#paiement" class="btn btn-primary btn-sm" draggable="false">
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
                              <td colspan="7" class="text-center">
                                  <div class="text-center text-gray-800 mt-2">
                                      <h4 class="fs-4 fw-bold">{{__('Liste vide')}}</h4>
                                  </div>
                              </td>
                          </tr>
                          @endforelse
                      </tbody>
                  </table>
                  <div class='d-flex justify-content-between align-items-center pt-3 px-3 '>
                      <div>
                      </div>

                  </div>
              </div>
          </div>
          @else
          <div class='border-prim rounded p-4 d-flex justify-content-center align-items-center flex-column'>
              <img src="{{asset('/img/empty.svg')}}" alt='{{__("Empty")}}' class="text-center  w-25 h-25">
              <div class="text-center text-gray-800 mt-2">
                  <h4 class="fs-4 fw-bold">{{__('Liste Vide')}}</h4>
                  <p>{{__('Aucun enregistrement trouvé..!')}}</p>
              </div>
          </div>
          @endif
      </div>
  </div>