<div wire:ignore.self class="modal side-layout-modal fade" id="CreatenotaryofficeModal" tabindex="-1" aria-labelledby="modal-form"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:70%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Notary Office') }}</h1>
                        <p class="px-1"> {{ __('Creating Notary Office') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">


                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="office_name">{{ __('Office Name*') }}</label>
                                <input type="text" wire:model="office_name"
                                    class="form-control  @error('office_name') is-invalid @enderror "
                                    value="{{ old('office_name') }}" id="office_name" autofocus="" required="" >
                                @error('office_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class=" col"><label for="region_id">{{ __('Region*') }}</label>
                                <x-input.select wire:model="region_id" prettyname="region" :options="$regions->pluck('region_name_en', 'id')->toArray()"
                                    selected="('region_id')" />
                                @error('region_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class='form-group row mb-3'>
                            <div class="col">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" autofocus="" required=""></textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <br>


                        <div class="d-flex justify-content-between align-items-end">
                            <div class="mb-4 mt-md-0">
                                <button type="button" class="btn btn-sm btn-light text-gray-800 ms-auto "
                                    data-bs-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                    <span wire:click="clearFields()"
                                        class="d-none d-sm-inline-block ms-1">{{ __('Close') }}</span>
                                </button>
                                <button type="submit"
                                    class="btn btn-primary btn-sm btn-loading">
                                    <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span class="d-none d-sm-inline-block ms-1">{{ __('Save') }}</span>
                                </button>
                            </div>

                        </div>
                    </x-form-items.form>

                </div>
            </div>
        </div>
    </div>
</div>


{{-- update modal --}}
<div wire:ignore.self class="modal side-layout-modal fade" id="Editnotaryofficedal" tabindex="-1" aria-labelledby="modal-form"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:70%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                     <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Update Notary') }}</h1>
                        <p class="px-1"> {{ __('Updating Notary Information') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="update">


                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="office_name">{{ __('Office Name') }}</label>
                                <input type="text" wire:model="office_name"
                                    class="form-control  @error('office_name') is-invalid @enderror "
                                    value="{{ old('office_name') }}" id="office_name" autofocus="" required="" >
                                @error('office_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class=" col"><label for="region_id">{{ __('Region*') }}</label>
                                <x-input.select wire:model="region_id" prettyname="region" :options="$regions->pluck('region_name_en', 'id')->toArray()"
                                    selected="('region_id')" />
                                @error('region_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="description">{{ __('Description') }}</label>
                                <input type="text" wire:model="description"
                                    class="form-control  @error('description') is-invalid @enderror "
                                    value="{{ old('description') }}" id="description" autofocus="" required="" >
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <br>


                        <div class="d-flex justify-content-between align-items-end">
                            <div class="mb-4 mt-md-0">
                                <button type="button" class="btn btn-sm btn-light text-gray-800 ms-auto "
                                    data-bs-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                    <span wire:click="clearFields()"
                                        class="d-none d-sm-inline-block ms-1">{{ __('Close') }}</span>
                                </button>
                                <button type="submit" wire:click.prevent="update"
                                    class="btn btn-primary btn-sm btn-loading">
                                    
                                    <span class="d-none d-sm-inline-block ms-1">{{ __('Update') }}</span>
                                </button>
                            </div>

                        </div>
                    </x-form-items.form>

                </div>
            </div>
        </div>
    </div>
</div>

