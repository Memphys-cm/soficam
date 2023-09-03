<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUpdateActiviteModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{$state ? 'Mettre à jour' : 'Créer'}} {{__(' Activité')}}</h1>
                        <p class="px-1"> {{$state ? 'Mettre à jour' : 'Créer'}} {{__(' Activité')}}</p>
                    </div>
                    <x-form-items.form wire:submit="store">
                        <div class="form-group row mb-3">
                            <div class='col'>
                                <label class="px-2" for="activite.category_activite_id">{{__('Catégorie Activité')}}</label>
                                <select wire:model="activite.category_activite_id" name="activite.category_activite_id" class="form-select  @error('activite.category_activite_id') is-invalid @enderror" required="">
                                    @foreach($categories as $category_activite)
                                    <option value="{{$category_activite->id}}">{{$category_activite->grand_section." -> ".$category_activite->nom_category}}</option>
                                    @endforeach
                                </select>
                                @error('activite.category_activite_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label class="px-2" for="activite.type_de_facturation">{{__('Catégorie Activité')}}</label>
                                <select wire:model="activite.type_de_facturation" name="activite.type_de_facturation" class="form-select  @error('activite.type_de_facturation') is-invalid @enderror" required="">
                                    <option value="value'">{{__('Valeur')}}</option>
                                    <option value="percentage">{{__('Pourcentage')}}</option>
                                    <option value="per_m2">{{__('Par M')}} <sup>2</sup></option>
                                </select>
                                @error('activite.type_de_facturation')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group mb-3">
                            <label class="px-2" for="nom_activite">{{__('Nom Activité')}}</label>
                            <input wire:model="activite.nom_activite" type="text" class="form-control  @error('activite.nom_activite') is-invalid @enderror" placeholder="{{__('par vente - 4 % du prix d’achat')}}" required="" value="" name="activite.nom_activite">
                            @error('activite.nom_activite')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col">
                                <label class="px-2" for="name">{{__('Valeur/Pourcentage/m²')}}</label>
                                <input wire:model="activite.value" type="text" class="form-control  @error('activite.value') is-invalid @enderror" placeholder="{{__('1')}}" required="" name="name">
                                @error('activite.value')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="px-2" for="name">{{__('Valeur minimale')}}</label>
                                <input wire:model="activite.value_minimale" type="text" class="form-control  @error('activite.value_minimale') is-invalid @enderror" placeholder="{{__('50000')}}" required="" name="name">
                                @error('activite.value_minimale')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group mb-4 px-1'>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" wire:model="activite.status" id="activite.status">
                                <label class="form-check-label mb-0" for="activite.status">{{ __('Marquer comme actif') }}</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{$state ? 'Mettre à jour' : 'Créer'}} </button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>