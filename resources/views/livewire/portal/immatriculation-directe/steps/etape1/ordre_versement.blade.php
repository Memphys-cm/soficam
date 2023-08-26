<div>
    @include('livewire.portal.immatriculation-directe.steps.navigation')
    {{ __('Ordre de versement') }}


    <x-form-items.form wire:submit="store">
        <div class="form-group mb-3 row">
            <div class='col-4 my-1'>
                <label for="code">{{ __('Versement') }}</label>
                <input wire:model="versement" type="number" class="form-control  @error('versement') is-invalid @enderror"
                    placeholder="{{ __('Entrez le Montant de Versement') }}" required="" name="versement">
                @error('versement')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button class="btn btn-success" wire:click="nextStep">
               {{__('Enregistrer')}}
            </button>
        </div>

    </x-form-items.form>
</div>
