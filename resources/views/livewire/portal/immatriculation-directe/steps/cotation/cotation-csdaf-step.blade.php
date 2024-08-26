<div class="container my-5">
    @include('livewire.portal.immatriculation-directe.navigation')
    <x-alert />

    <div class="shadow-lg rounded p-4 bg-white">
        <h4 class="mb-4 fw-bold text-primary">{{ __('Cotation du Dossier au CSDAF') }}</h4>

        <x-form-items.form wire:submit.prevent="submit">
            <div class="form-group mb-4 row">
                <div class="col-12 my-2">
                    <label for="service_id" class="form-label">{{ __('Services') }}</label>
                    <x-input.select wire:model="service_id" prettyname="service_id" :options="$services->pluck('service_name_fr', 'id')->toArray()"
                        placeholder="{{ __('Sélectionner un service') }}"
                        class="form-select @error('service_id') is-invalid @enderror" />
                    @error('service_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 my-2">
                    <label for="user_id" class="form-label">{{ __('CSDAF') }}</label>
                    <x-input.select wire:model="user_id" prettyname="user_id" :options="$users->pluck('first_name', 'id')->toArray()"
                        placeholder="{{ __('Sélectionner un CSDAF') }}"
                        class="form-select @error('user_id') is-invalid @enderror" />
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 my-2">
                    <label for="observation" class="form-label">{{ __('Observation') }}</label>
                    <textarea wire:model="observation" class="form-control @error('observation') is-invalid @enderror" id="observation"
                        rows="4" placeholder="{{ __('Ajouter vos observations ici...') }}"></textarea>
                    @error('observation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            @include('livewire.portal.immatriculation-directe.control-navigation')

        </x-form-items.form>
    </div>

    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">{{ __('Erreur de Validation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('show-error-modal', (data) => {
            let errorList = document.querySelector('#errorModal .modal-body ul');
            errorList.innerHTML = '';

            if (data.errors && data.errors.length > 0) {
                data.errors.forEach(error => {
                    let li = document.createElement('li');
                    li.textContent = error;
                    errorList.appendChild(li);
                });

                new bootstrap.Modal(document.getElementById('errorModal')).show();
            }
        });
    });
</script>
@endpush
