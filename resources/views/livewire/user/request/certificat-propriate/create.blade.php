<div wire:ignore.self class="modal side-layout-modal fade" id="CreatecertificateproprieteModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Créer') }}{{ __(' un Certificat de Propriété') }}</h1>
                        <p class="px-1"> {{ __('Certificat de Propriété') }} </p>
                    </div>
                    <x-form-items.form wire:submit="store">
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="titre_foncier_id">{{ __('Numéro du Titre Foncier') }}</label>
                                <x-input.select wire:model="titre_foncier_id" prettyname="titre_foncier"
                                    :options="$titre_fonciers->pluck('numero_titre_foncier', 'id')->toArray()" selected="('titre_foncier_id')" />
                                @error('titre_foncier_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="col">
                                <label for="price">{{ __('Numéro du Titre Foncier') }}</label>
                                <input wire:model="numero_titre_foncier" type="text"
                                    class="form-control  @error('numero_titre_foncier') is-invalid @enderror"
                                    placeholder="{{ __('') }}" required="">
                                @error('numero_titre_foncier')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="certificate_proprietes_type">{{ __('Type Personne') }}</label>
                                <select wire:model="certificate_proprietes_type" name="certificate_proprietes_type"
                                    class="form-select  @error('certificate_proprietes_type') is-invalid @enderror"
                                    required="">
                                    <option value="">{{ __('-- Sélectionner --') }}</option>
                                    <option value="personne_physique">{{ __('Personne Physique') }}</option>
                                    <option value="personne_morale">{{ __('Personne Morale') }}</option>
                                </select>
                                @error('certificate_proprietes_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="request_type" class="form-label">Type de Demande</label>
                                <select id="request_type" class="form-select" wire:model="request_type">
                                    <option value="">{{ __('-- Sélectionner --') }}</option>
                                    <option value="standard">Demande Standard</option>
                                    <option value="express">Demande Express</option>
                                </select>
                                @error('request_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="payment_method">{{ __('Mode de paiement') }}</label>
                                <select wire:model="payment_method" class="form-select @error('payment_method') is-invalid @enderror" id="payment_method" required="">
                                    <option value="">{{ __('--Selectionner--') }}</option>
                                    <option value="ORANGE">{{ __('Orange Money') }}</option>
                                    <option value="MTN">{{ __('MTN Mobile Money') }}</option>
                                </select>
                                @error('payment_method')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col my-2">
                                <label for="price">{{ __('Numéro de Télephone') }}</label>
                                <input wire:model="phone_number" type="number"
                                    class="form-control  @error('phone_number') is-invalid @enderror"
                                    placeholder="{{ __('') }}" required="">
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col my-2">
                                <label for="price">{{ __('Montant') }}</label>
                                <input wire:model="price" type="number"
                                    class="form-control  @error('prix') is-invalid @enderror"
                                    placeholder="{{ __('') }}" required="" disabled>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="identity_card" class="form-label">{{ __('Carte Nationale d\'Identité') }}</label>
                            <input type="file" id="identity_card" wire:model="identity_card" class="form-control @error('identity_card') is-invalid @enderror" required>
                            @error('identity_card')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label
                                    for="certificate_propriete_reason">{{ __('Raison du Certificat Propriété') }}</label>
                                <textarea rows="6" wire:model="certificate_propriete_reason"
                                    class="form-control @error('certificate_propriete_reason') is-invalid @enderror" id="certificate_propriete_reason"
                                    autofocus="" required=""></textarea>
                                @error('certificate_propriete_reason')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3"
                                data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                            <button type="submit" wire:click.prevent="store" class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ __('Créer') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
