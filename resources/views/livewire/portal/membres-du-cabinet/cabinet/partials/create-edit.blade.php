<div wire:ignore.self class="modal side-layout-modal fade" id="CreatecabinetModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:50%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Cabinet') }}</h1>
                        <p class="px-1"> {{ __('Creating Cabinet') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="store">


                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="nom_cabinet">{{ __('Nom Cabinet*') }}</label>
                                <input type="text" wire:model="nom_cabinet"
                                    class="form-control  @error('nom_cabinet') is-invalid @enderror "
                                    value="{{ old('nom_cabinet') }}" id="nom_cabinet" autofocus="" required="">
                                @error('nom_cabinet')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label class="px-2" for="region_id">{{ __('Region') }}</label>
                                <select wire:model="region_id" name="region_id"
                                    class="form-select  @error('region_id') is-invalid @enderror" required="">
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                    @endforeach
                                </select>
                                @error('region_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">

                            <div class='col'>
                                <label class="px-2" for="division_id">{{ __('Division') }}</label>
                                <select wire:model="division_id" name="division_id"
                                    class="form-select @error('division_id') is-invalid @enderror" required="">
                                    <option value="">Select a Division</option>
                                    @if (!empty($divisions))
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('division_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class='col'>
                                <label class="px-2" for="sub_division_id">{{ __('Sub-Division') }}</label>
                                <select wire:model="sub_division_id" name="sub_division_id"
                                    class="form-select @error('sub_division_id') is-invalid @enderror" required="">
                                    <option value="">Select a Sub-Division</option>
                                    @if (!empty($sub_divisions))
                                        @foreach ($sub_divisions as $sub_division)
                                            <option value="{{ $sub_division->id }}">{{ $sub_division->sub_division_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('sub_division_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-3'>
                            <div class="col">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                    autofocus="" required=""></textarea>
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
                                <button type="submit" class="btn btn-primary btn-sm btn-loading">
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
<div wire:ignore.self class="modal side-layout-modal fade" id="UpdateCabinetModal" tabindex="-1"
    aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:50%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Update Notary') }}</h1>
                        <p class="px-1"> {{ __('Updating Notary Information') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="update">

                       
                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="nom_cabinet">{{ __('Nom Cabinet*') }}</label>
                                <input type="text" wire:model="nom_cabinet"
                                    class="form-control  @error('nom_cabinet') is-invalid @enderror "
                                    value="{{ old('nom_cabinet') }}" id="nom_cabinet" autofocus="" required="">
                                @error('nom_cabinet')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label class="px-2" for="region_id">{{ __('Region') }}</label>
                                <select wire:model="region_id" name="region_id"
                                    class="form-select  @error('region_id') is-invalid @enderror" required="">
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                    @endforeach
                                </select>
                                @error('region_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">

                            <div class='col'>
                                <label class="px-2" for="division_id">{{ __('Division') }}</label>
                                <select wire:model="division_id" name="division_id"
                                    class="form-select @error('division_id') is-invalid @enderror" required="">
                                    <option value="">Select a Division</option>
                                    @if (!empty($divisions))
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('division_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class='col'>
                                <label class="px-2" for="sub_division_id">{{ __('Sub-Division') }}</label>
                                <select wire:model="sub_division_id" name="sub_division_id"
                                    class="form-select @error('sub_division_id') is-invalid @enderror" required="">
                                    <option value="">Select a Sub-Division</option>
                                    @if (!empty($sub_divisions))
                                        @foreach ($sub_divisions as $sub_division)
                                            <option value="{{ $sub_division->id }}">{{ $sub_division->sub_division_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('sub_division_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='form-group row mb-3'>
                            <div class="col">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                    autofocus="" required=""></textarea>
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
