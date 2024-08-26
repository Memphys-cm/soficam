<div class="container my-4">
    <div class="shadow-lg rounded p-4 bg-white">
        <h4 class="mb-4 fw-bold text-primary">{{ __('Odre de Versement') }}</h4>
        
        @php
            $visibility = '';
        @endphp

        @if ($immatriculations->numero_ordre_versement)
            @php
                $visibility = 'disabled';
            @endphp
        @endif

        <x-form-items.form wire:submit="ordreVersement">
            <div class="form-group mb-3 row">
                <div class='col-12 my-1'>
                    <label for="code">{{ __('Montant de L\'ordre de Versement') }} </label>
                    <input wire:model="montant_ordre_versement" type="number"
                        class="form-control {{ $visibility }}  @error('montant_ordre_versement') is-invalid @enderror"
                        placeholder="15000" required="" value="" name="montant_ordre_versement"
                        {{ $visibility }}>
                    @error('montant_ordre_versement')
                        <span class="text-danger">{{ $message }}</span>
                        {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
                    @enderror
                </div>
                {{-- <div class='col-12 my-1'>
                    <label for="code">{{ __('Superficie de L\'ordre de Versement') }}</label>
                    <input wire:model="superficie_ordre_versement" type="number"
                        class="form-control  @error('superficie_ordre_versement') is-invalid @enderror"
                        placeholder="15000" required="" value="" name="superficie_ordre_versement">
                    @error('superficie_ordre_versement')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}
            </div>

        </x-form-items.form>
    </div>

</div>
