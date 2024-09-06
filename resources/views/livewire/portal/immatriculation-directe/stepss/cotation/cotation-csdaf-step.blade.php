@can('imma_directe.cotation')
    <div class="container my-3 {{ $imma_directe->statut !== 'Dossier Ouvert' ? 'disabled-page' : '' }}">
        <div class="shadow-lg rounded p-4 bg-white">
            <h4 class="mb-4 fw-bold text-primary">{{ __('Cotation du Dossier au CSDAF') }}</h4>

            <x-form-items.form wire:submit.prevent="cotation_first_step">
                <div class="form-group mb-4 row">
                    <div class="col-12 my-2">
                        <label for="service_id" class="form-label">{{ __('Services') }}</label>
                        <x-input.select wire:model="service_id" prettyname="service_id" :options="$services->pluck('service_name_fr', 'id')->toArray()"
                            placeholder="{{ __('Sélectionner un service') }}"
                            class="form-select @error('service_id')
is-invalid
@enderror" />
                        @error('service_id')
                            <span class="text-danger">{{ $message }}</span>
                            {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
                        @enderror
                    </div>

                    <div class="col-12 my-2">
                        <label for="user_id" class="form-label">{{ __('CSDAF') }}</label>
                        <x-input.select wire:model="user_id" prettyname="user_id" :options="$users->pluck('first_name', 'id')->toArray()"
                            placeholder="{{ __('Sélectionner un CSDAF') }}"
                            class="form-select @error('user_id')
is-invalid
@enderror" />
                        @error('user_id')
                            <span class="text-danger">{{ $message }}</span>
                            {{-- <div class="invalid-feedback text-danger"> {{ $message }} </div> --}}
                        @enderror
                    </div>

                    <div class="col-12 my-2">
                        <label for="observation" class="form-label">{{ __('Observation') }}</label>
                        <textarea wire:model="observation" class="form-control @error('observation') is-invalid @enderror" id="observation"
                            rows="4" placeholder="{{ __('Ajouter vos observations ici...') }}"></textarea>
                        @error('observation')
                            <span class="text-danger">{{ $message }}</span>
                            {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
                        @enderror
                    </div>
                </div>

            </x-form-items.form>

            <div class="rounded shadow">
            
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-secondary" wire:click.prevent="prevStep"> {{ __('<< Précedent') }} </button>
                <button class="btn btn-primary mx-2" wire:click.prevent="cotationFirstStep"> {{ __('Enregistrer') }}
                </button>
                <button class="btn btn-info" wire:click.prevent="cotation_first_step"> {{ __('Suivant >>') }} </button>
            </div>
        </div>

    </div>
@endcan
