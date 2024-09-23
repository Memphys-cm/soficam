<div wire:ignore.self class="modal side-layout-modal fade" id="UpdateEtatCessionModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{ __('Mettre à jour') }} {{ __('Etat Cession') }}</h1>
                        <p class="px-1"> {{ __('Mettre à jour') }} {{ __('Etat Cession') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="update">

                        <div class='row form-group mb-3'>
                            {{-- <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Reference') }}</label>
                            <input wire:model="reference_etat_cession" type="text" class="form-control  @error('reference_etat_cession') is-invalid @enderror" placeholder="NW" required="" value="" name="reference_etat_cession" disabled>
                            @error('reference_etat_cession')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Titre Foncier') }}</label>
                            <x-input.land_title-select wire:model="titre_foncier_id" prettyname="titre_foncier_id" :options="$land_titles" selected="({{$titre_foncier_id}})" />
                            @error('land_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Arrondissement') }}</label>
                            <select wire:model="sub_division_id" class="form-select  @error('sub_division_id') is-invalid @enderror">
                                @foreach ($subdivisions as $subdivision)
                                <option value="{{$subdivision->id}}">{{ __($subdivision->sub_division_name_en) }} </option>
                                @endforeach
                            </select>
                            @error('sub_division_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="col-md-6 py-2">
                            <label for="code">{{ __('Status') }}</label>
                        <select wire:model="status" name="status" class="form-select  @error('status') is-invalid @enderror">
                            <option value="pending_payment">{{ __('pending_payment') }}</option>
                            <option value="pending_payment">{{ __('pending_payment') }} </option>
                            <option value="paid">{{ __('paid') }} </option>
                            <option value="cancelled">{{ __('cancelled') }} </option>
                            <option value="completed">{{ __('completed') }} </option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div> --}}
                <div class="col-md-6 py-2">
                    <label for="code">{{ __('Utilisateur') }}</label>
                    <x-input.select wire:model="user_id" prettyname="user_id" :options="$users->pluck('first_name', 'id')->toArray()" selected="('user_id')" />
                    @error('geometre_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 py-2">
                    <label for="code">{{ __('Géomètre') }}</label>
                    <x-input.select wire:model="geometre_id" prettyname="geometre_id" :options="$geometres->pluck('first_name', 'id')->toArray()" selected="('geometre_id')" />
                    @error('geometre_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 py-2">
                    <label for="code">{{ __('Type de Personne') }}</label>
                    <select wire:model="type_personne" name="type_personne" class="form-select  @error('type_personne') is-invalid @enderror">
                        <option value="">{{ __('--Sélectionner le type de personne --') }}</option>
                        <option value="morale">{{ __('moral') }} </option>
                        <option value="physique">{{ __('physique') }} </option>
                    </select>
                    @error('type_personne')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 py-2">
                    <label for="code">{{ __('Type D\'Opération') }}</label>
                    <select wire:model="type_operation" name="type_operation" class="form-select  @error('type_operation') is-invalid @enderror">
                        <option value="">{{ __('--Sélectionner le type d\'opération --') }}</option>
                        <option value="bornage">{{ __('bornage') }} </option>
                        <option value="morcellement">{{ __('morcellement') }} </option>
                        <option value="mutation_totale">{{ __('mutation_totale') }} </option>
                        <option value="retrait_indivision">{{ __('retrait_indivision') }} </option>
                        <option value="immatriculation_direct">{{ __('immatriculation_direct') }} </option>
                        <option value="concession">{{ __('concession') }} </option>
                    </select>
                    @error('type_operation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 py-2">
                    <label for="code">{{ __('Zone') }}</label>
                    <select wire:model="zone" name="zone" class="form-select  @error('zone') is-invalid @enderror">
                        <option value="">{{ __('--Select Zone --') }}</option>
                        <option value="urbain">{{ __('Terrain urbain') }} </option>
                        <option value="rurale">{{ __('Terrain rurale') }} </option>
                    </select>
                    @error('zone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 py-2">
                    <label for="code">{{ __('Lieu-dit') }}</label>
                    <input wire:model="lieu_dit" type="text" class="form-control  @error('lieu_dit') is-invalid @enderror" placeholder="Logpom" required="" value="" name="lieu_dit">
                    @error('lieu_dit')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 py-2">
                    <label for="code">{{ __('superficie en m²') }}</label>
                    <input wire:model="superficie_en_m2" type="number" class="form-control  @error('superficie_en_m2') is-invalid @enderror" placeholder="25000" required="" value="" name="superficie_en_m2">
                    @error('superficie_en_m2')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 py-2">
                    <label for="code">{{ __('Coût') }}</label>
                    <input wire:model="cout" type="number" class="form-control  @error('cout') is-invalid @enderror" placeholder="70000" required="" value="" name="cout">
                    @error('cout')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 py-2">
                    <label for="code">{{ __('Frais Supplémentaires') }}</label>
                    <input wire:model="frais_suplementaires" type="number" class="form-control  @error('frais_suplementaires') is-invalid @enderror" placeholder="15000" required="" value="" name="frais_suplementaires">
                    @error('frais_suplementaires')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 py-2">
                    <label for="code">{{ __('Coût Etat Cession') }}</label>
                    <input wire:model="cout_etat_cession" type="number" class="form-control  @error('cout_etat_cession') is-invalid @enderror" placeholder="100000" required="" value="" name="cout_etat_cession">
                    @error('cout_etat_cession')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 py-2">
                    <label for="code">{{ __('Commentaires') }}</label>
                    <textarea wire:model="commentaires" class="form-control  @error('commentaires') is-invalid @enderror" name="" id="" cols="30" rows="4">
                                    </textarea>
                    @error('commentaires')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end py-2">
                <button type="button" wire:click.prevent="clearFields" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                <button type="submit" wire:click.prevent="update" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ __('Mettre à jour') }} </button>
            </div>
            </x-form-items.form>
        </div>
    </div>
</div>
</div>
</div>