<div wire:ignore.self class="modal side-layout-modal fade" id="UpdateCertificateProprieteModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:45%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-4 p-lg-5">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Mise à jour du Certificat de Propriété') }}</h1>
                        <p class="px-1"> {{ __('Certificat de Propriété') }}</p>
                    </div>
                    <x-form-items.form wire:submit="update">
                        <div class='form-group mb-3 row'>

                            <div class=" col"><label
                                    for="titre_foncier_id">{{ __('Numéro du Titre Foncier') }}</label>
                                <input wire:model="titre_foncier_id" prettyname="titre_foncier" type="text"
                                    class="form-control @error('titre_foncier_id') is-invalid @enderror" disabled />
                                @error('titre_foncier_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label
                                    for="certificate_proprietes_number">{{ __('Numéro du Certificat de Propriété') }}</label>
                                <input wire:model="certificate_proprietes_number" type="text"
                                    class="form-control  @error('certificate_proprietes_number') is-invalid @enderror"
                                    placeholder="{{ __('') }}" required="">
                                @error('certificate_proprietes_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group mb-3 row">
                            <div class='col'>
                                <label class="px-2" for="requestor_id">{{ __('Requérant') }}</label>
                                <select wire:model="requestor_id" name="requestor_id"
                                    class="form-select  @error('certificate_proprietes_type') is-invalid @enderror"
                                    required="">
                                    <option value="">{{ __('-- Sélectionner --') }}</option>
                                    @foreach ($titre_fonciers as $titre_foncier)
                                        @foreach ($titre_foncier->users as $r)
                                            <option value="{{ $r->id }}">{{ $r->first_name }}
                                                {{ $r->last_name }}</option>
                                        @endforeach
                                    @endforeach

                                </select>
                                @error('user_ids')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="certificate_proprietes_type">{{ __('Type de personne') }}</label>
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
                        </div>
                        <div class='form-group mb-3 row'>
                            <div class="col">
                                <label for="price">{{ __('Prix (FCFA)') }}</label>
                                <input wire:model="price" type="number"
                                    class="form-control  @error('prix') is-invalid @enderror"
                                    placeholder="{{ __('') }}" required="">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="status">{{ __('Statut du CP') }}</label>
                                <select wire:model="status" name="status"
                                    class="form-select  @error('statut') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Selectionner --') }}</option>
                                    <option value="expired">{{ __('expiré') }}</option>
                                    <option value="active">{{ __('actif') }}</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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
                            <button type="submit" wire:click.prevent="update" class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled">{{ __('Mettre à Jour') }}</button>
                        </div>
                    </x-form-items.form>
                </div>
            </div>
        </div>
    </div>
</div>
