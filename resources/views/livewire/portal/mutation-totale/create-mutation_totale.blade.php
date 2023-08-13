<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUpdateMutationTotaleModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{ $state ? 'Update' : 'Create' }} {{ __(' Mutation Totale') }}</h1>
                        <p class="px-1"> {{ $state ? 'Update' : 'Create' }} {{ __(' Mutation Totale') }} &#128522;</p>
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
                        <div class="col-md-4 py-2">
                            <label for="code">{{ __('Titre Foncier') }}</label>
                            <x-input.land_title-select wire:model="land_id" prettyname="land_id" :options="$land_titles" selected="('land_id')" />
                            @error('land_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 py-2">
                            <label for="code">{{ __('Certificat') }}</label>
                            <x-input.select wire:model="certificat_id" prettyname="certificat_id" :options="$certificats->pluck('certificate_proprietes_number', 'id')->toArray()" selected="('certificat_id')" />
                            @error('geometre_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="certificate_proprietes_type">{{__('Certificate Proprietes Type')}}</label>
                            <select wire:model="certificate_proprietes_type" name="certificate_proprietes_type" class="form-select  @error('certificate_proprietes_type') is-invalid @enderror" required="">
                                <option value="">{{__('-- Select --')}}</option>
                                <option value="personne_physique">{{__('Personne Physique')}}</option>
                                <option value="personne_morale">{{__('Personne Morale')}}</option>
                            </select>
                            @error('certificate_proprietes_type')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Requestor') }}</label>
                            <x-input.select wire:model="requestor_id" prettyname="requestor_id" :options="$requestors->pluck('first_name', 'id')->toArray()" selected="('requestor_id')" />
                            @error('requestor_id')
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
                            <label for="code">{{ __('numero_reference_plan') }}</label>
                            <input wire:model="mutation_totale.numero_reference_plan" type="text" class="form-control  @error('mutation_totale.numero_reference_plan') is-invalid @enderror" placeholder="Logpom" required="" value="" name="state_assignment.numero_reference_plan">
                            @error('state_assignment.numero_reference_plan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('etat Cession') }}</label>
                            <x-input.select wire:model="etat_cession_id" prettyname="etat_cession_id" :options="$etat_cessions->pluck('reference_etat_cession', 'id')->toArray()" selected="('etat_cession_id')" />
                            @error('etat_cession_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="code">{{ __('Commentaire Geometre') }}</label>
                            <textarea wire:model="state_assignment.commantaires_geometre" class="form-control  @error('state_assignment.commantaires_geometre') is-invalid @enderror" name="" id="" cols="30" rows="10">
                                    </textarea>
                            @error('state_assignment.commantaires_geometre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('numero_reference_quittance_etat_cession') }}</label>
                            <input wire:model="state_assignment.numero_reference_quittance_etat_cession" type="number" class="form-control  @error('state_assignment.numero_reference_quittance_etat_cession') is-invalid @enderror" placeholder="25000" required="" value="" name="state_assignment.numero_reference_quittance_etat_cession">
                            @error('state_assignment.numero_reference_quittance_etat_cession')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 py-2">
                            <label for="code">{{ __('Notaire') }}</label>
                            <x-input.select wire:model="notaire_id" prettyname="notaire_id" :options="$geometres->pluck('first_name', 'id')->toArray()" selected="('notaire_id')" />
                            @error('notaire_id')
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