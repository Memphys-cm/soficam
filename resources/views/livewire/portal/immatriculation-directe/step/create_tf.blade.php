<div class="text-center p-3 my-5 shadow">
    <x-form-items.form wire:submit="dossier_technique">
        <div class="col-md-12 my-2">
            <label for="volume">{{ __('Volume') }}</label>
            <input wire:model="volume" type="number"
                class="form-control  @error('volume') is-invalid @enderror" placeholder="{{ __('') }}"
                required="" name="volume">
            @error('volume')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-12 my-2">
            <label for="volume">{{ __('Folio') }}</label>
            <input wire:model="folio" type="number"
                class="form-control  @error('folio') is-invalid @enderror" placeholder="{{ __('') }}"
                required="" name="folio">
            @error('folio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-12 my-2">
            <label for="volume">{{ __('Numero du Cp') }}</label>
            <input wire:model="numero_cp" type="number"
                class="form-control  @error('numero_cp') is-invalid @enderror" placeholder="{{ __('') }}"
                required="" name="volume">
            @error('numero_cp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-12 my-2">
            <label for="volume">{{ __('Numero du Conservation') }}</label>
            <input wire:model="numero_conservation" type="number"
                class="form-control  @error('numero_conservation') is-invalid @enderror" placeholder="{{ __('') }}"
                required="" name="numero_conservation">
            @error('numero_conservation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button wire:click="create_tf" class="btn btn-soft-lg px-5 py-3 shadow" type="button">
            <i class="fas fa-file-alt me-2"></i> Créer le Titre Foncier
        </button>
    </x-form-items.form>
</div>

<style>
    .btn-soft-lg {
        background-color: #eef2f7;
        border: none;
        color: #4a4a4a;
        font-size: 1.25rem;
        padding: 15px 40px;
        border-radius: 40px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-soft-lg:hover {
        background-color: #e1e8ef;
        color: #333;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-soft-lg:focus {
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .btn-soft-lg i {
        font-size: 20px;
    }
</style>
