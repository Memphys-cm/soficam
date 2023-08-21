<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUpdateStateAssignmentModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{ $state ? 'Mettre à jour' : 'Creer' }} {{ __(' Etat Cession') }}</h1>
                        <p class="px-1"> {{ $state ? 'Mettre à jour' : 'Creer' }} {{ __(' Etat Cession') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">

                        <div class='row form-group mb-3'>
                            {{-- <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Reference') }}</label>
                            <input wire:model="state_assignment.reference_etat_cession" type="text" class="form-control  @error('state_assignment.reference_etat_cession') is-invalid @enderror" placeholder="NW" required="" value="" name="state_assignment.reference_etat_cession" disabled>
                            @error('state_assignment.reference_etat_cession')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Titre Foncier') }}</label>
                            <x-input.land_title-select wire:model="land_id" prettyname="land_id" :options="$land_titles" selected="('land_id')" />
                            @error('land_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Arrondissement') }}</label>
                            <select wire:model="subdivision_id" name="subdivision_id" class="form-select  @error('subdivision_id') is-invalid @enderror">
                                @foreach ($subdivisions as $subdivision)
                                <option value="{{$subdivision->id}}">{{ __($subdivision->sub_division_name_en) }} </option>

                                @endforeach
                            </select>
                            @error('subdivision_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="col-md-6 py-2">
                            <label for="code">{{ __('Status') }}</label>
                            <select wire:model="state_assignment.status" name="state_assignment.status" class="form-select  @error('state_assignment.status') is-invalid @enderror">
                                <option value="pending_payment">{{ __('pending_payment') }}</option> 
                                 <option value="pending_payment">{{ __('pending_payment') }} </option>
                                <option value="paid">{{ __('paid') }} </option>
                                <option value="cancelled">{{ __('cancelled') }} </option>
                                <option value="completed">{{ __('completed') }} </option>
                            </select>
                            @error('state_assignment.status')
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
                            <label for="code">{{ __('Geometre') }}</label>
                            <x-input.select wire:model="geometre_id" prettyname="geometre_id" :options="$geometres->pluck('first_name', 'id')->toArray()" selected="('geometre_id')" />
                            @error('geometre_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Type de Personne') }}</label>
                            <select wire:model="state_assignment.type_personne" name="state_assignment.type_personne" class="form-select  @error('state_assignment.type_personne') is-invalid @enderror">
                                <option value="">{{ __('--Sélectionner le type de personne --') }}</option>
                                <option value="morale">{{ __('moral') }} </option>
                                <option value="physique">{{ __('physique') }} </option>
                            </select>
                            @error('state_assignment.type_personne')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Type D\'Operation') }}</label>
                            <select wire:model="state_assignment.type_operation" name="state_assignment.type_operation" class="form-select  @error('state_assignment.type_operation') is-invalid @enderror">
                                <option value="">{{ __('--Select Type Operation --') }}</option>
                                <option value="bornage">{{ __('bornage') }} </option>
                                <option value="morcellement">{{ __('morcellement') }} </option>
                                <option value="mutation_totale">{{ __('mutation_totale') }} </option>
                                <option value="retrait_indivision">{{ __('retrait_indivision') }} </option>
                                <option value="immatriculation_direct">{{ __('immatriculation_direct') }} </option>
                                <option value="concession">{{ __('concession') }} </option>
                            </select>
                            @error('state_assignment.type_operation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Zone') }}</label>
                            <select wire:model="state_assignment.zone" name="state_assignment.zone" class="form-select  @error('state_assignment.zone') is-invalid @enderror">
                                <option value="">{{ __('--Select Zone --') }}</option>
                                <option value="terrain_urbain">{{ __('terrain_urbain') }} </option>
                                <option value="terrain_rurale">{{ __('terrain_rurale') }} </option>
                            </select>
                            @error('state_assignment.zone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Lieu_dit') }}</label>
                            <input wire:model="state_assignment.lieu_dit" type="text" class="form-control  @error('state_assignment.lieu_dit') is-invalid @enderror" placeholder="Logpom" required="" value="" name="state_assignment.lieu_dit">
                            @error('state_assignment.lieu_dit')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('superficie_en_m2') }}</label>
                            <input wire:model="state_assignment.superficie_en_m2" type="number" class="form-control  @error('state_assignment.superficie_en_m2') is-invalid @enderror" placeholder="25000" required="" value="" name="state_assignment.superficie_en_m2">
                            @error('state_assignment.superficie_en_m2')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Cout') }}</label>
                            <input wire:model="state_assignment.cout" type="number" class="form-control  @error('state_assignment.cout') is-invalid @enderror" placeholder="70000" required="" value="" name="state_assignment.cout">
                            @error('state_assignment.cout')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Frais Supplemetaires') }}</label>
                            <input wire:model="state_assignment.frais_suplementaires" type="number" class="form-control  @error('state_assignment.frais_suplementaires') is-invalid @enderror" placeholder="15000" required="" value="" name="state_assignment.frais_suplementaires">
                            @error('state_assignment.frais_suplementaires')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Cout_etat_cession') }}</label>
                            <input wire:model="state_assignment.cout_etat_cession" type="number" class="form-control  @error('state_assignment.cout_etat_cession') is-invalid @enderror" placeholder="100000" required="" value="" name="state_assignment.cout_etat_cession">
                            @error('state_assignment.cout_etat_cession')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="code">{{ __('Commentaires') }}</label>
                            <textarea wire:model="state_assignment.commentaires" class="form-control  @error('state_assignment.commentaires') is-invalid @enderror" name="" id="" cols="30" rows="10">
                                    </textarea>
                            @error('state_assignment.commentaires')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                </div>

                <div class="d-flex justify-content-end py-2">
                    <button type="button" wire:click.prevent="clearFields" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading" wire:loading.attr="disabled">{{ $state ? 'Update' : 'Create' }} </button>
                </div>
                </x-form-items.form>
            </div>
        </div>
    </div>
</div>
</div>