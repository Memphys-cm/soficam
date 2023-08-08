<div wire:ignore.self class="modal side-layout-modal fade" id="CreateUpdateStateAssignmentModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:85%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4">{{ $state ? 'Update' : 'Create' }} {{ __(' State Assignment') }}</h1>
                        <p class="px-1"> {{ $state ? 'Update' : 'Create' }} {{ __(' State Assignment') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">

                        <fieldset class="border p-3 rounded">
                            <legend class="w-auto">Informations on the ground</legend>
                            <div class='row form-group mb-3'>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Reference') }}</label>
                                    <input wire:model="state_assignment.reference_etat_cession" type="text" class="form-control  @error('state_assignment.reference_etat_cession') is-invalid @enderror" placeholder="NW" required="" value="" name="state_assignment.reference_etat_cession" disabled>
                                    @error('state_assignment.reference_etat_cession')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Type Personne') }}</label>
                                    <input wire:model="state_assignment.type_personne" type="text" class="form-control  @error('state_assignment.type_personne') is-invalid @enderror" placeholder="NW" required="" value="" name="state_assignment.type_personne" >
                                    @error('state_assignment.type_personne')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Type Personne') }}</label>
                                    <x-input.land_title-select wire:model="land_id" prettyname="land_id" :options="$land_titles" selected="('land_id')" />
                                    @error('land_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('Area sold') }}</label>
                                    <input wire:model="area_solde" type="text" class="form-control  @error('area_solde') is-invalid @enderror" placeholder="NW" required="" value="" name="area_solde" disabled>
                                    @error('area_solde')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 py-2">
                                    <label for="code">{{ __('remaning_area') }}</label>
                                    <input wire:model="remaning_area" type="text" class="form-control  @error('remaning_area') is-invalid @enderror" placeholder="NW" required="" value="" name="remaning_area" disabled>
                                    @error('remaning_area')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                       

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