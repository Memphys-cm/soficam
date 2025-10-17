<div wire:ignore.self class="modal side-layout-modal fade" id="CreatecabinetModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:50%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Cabinet') }}</h1>
                        <p class="px-1"> {{ __('Créer Cabinet') }}</p>
                    </div>
                    <x-form-items.form wire:submit="store">


                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="nom_cabinet">{{ __('Nom Cabinet*') }}</label>
                                <input type="text" wire:model="nom_cabinet" class="form-control  @error('nom_cabinet') is-invalid @enderror " value="{{ old('nom_cabinet') }}" id="nom_cabinet" autofocus="" required="">
                                @error('nom_cabinet')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label class="px-2" for="region_id">{{ __('Région') }}</label>
                                <select wire:model="region_id" name="region_id" class="form-select  @error('region_id') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Selectionner une Region --')}}</option>
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
                                <label class="px-2" for="division_id">{{ __('Département') }}</label>
                                <select wire:model="division_id" name="division_id" class="form-select @error('division_id') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Selectionner une Division --')}}</option>
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
                                <label class="px-2" for="sub_division_id">{{ __('Arrondissement') }}</label>
                                <select wire:model="sub_division_id" name="sub_division_id" class="form-select @error('sub_division_id') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Selectionner un arrondissement--')}}</option>
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
                                <label for="type_cabinet">{{__('Type Cabinet')}}</label>
                                <select wire:model="type_cabinet" name="type_cabinet" class="form-select  @error('type_cabinet') is-invalid @enderror" required="">
                                    <option value="">{{__('-- Sélectionner --')}}</option>
                                    <option value="geometre">{{__('Géomètre')}}</option>
                                    <option value="lotisseur">{{__('Lotisseur')}}</option>
                                    <option value="maeture">{{__('Maeture')}}</option>
                                    <option value="promoteur_immobiliere">{{__('Promoteur Immobilier')}}</option>
                                    <option value="agent_immobiliere">{{__('Agent Immobilier')}}</option>
                                    <option value="urbaniste">{{__('Urbaniste')}}</option>
                                    <option value="controlleur">{{__('Contrôleur')}}</option>
                                    <option value="notaire">{{__('Notaire')}}</option>
                                </select>
                                @error('type_cabinet')
                                <div class="invalid-feedback">{{$message}}</div>
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
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Fermer')}}</button>
                            <button type="submit" class="btn btn-primary btn-loading">{{ __('Créer')}}</button>
                        </div>
                    </x-form-items.form>

                </div>
            </div>
        </div>
    </div>
</div>



<div wire:ignore.self class="modal side-layout-modal fade" id="UpdateCabinetModal" tabindex="-1" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document" style="max-width:50%;">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-3 p-lg-4">
                    <div class="mb-4 mt-md-0">
                        <h1 class="mb-0 h4"> {{ __('Mise à jour du notaire') }}</h1>
                        <p class="px-1"> {{ __('Mise à jour du notaire') }} &#128522;</p>
                    </div>
                    <x-form-items.form wire:submit="update">


                        <div class='form-group row mb-3'>
                            <div class=" col"><label for="nom_cabinet">{{ __('Nom Cabinet*') }}</label>
                                <input type="text" wire:model="nom_cabinet" class="form-control  @error('nom_cabinet') is-invalid @enderror " value="{{ old('nom_cabinet') }}" id="nom_cabinet" autofocus="" required="">
                                @error('nom_cabinet')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class='col'>
                                <label class="px-2" for="region_id">{{ __('Region') }}</label>
                                <select wire:model="region_id" name="region_id" class="form-select  @error('region_id') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Select a Region --')}}</option>
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
                                <label class="px-2" for="division_id">{{ __('Sous Region') }}</label>
                                <select wire:model="division_id" name="division_id" class="form-select @error('division_id') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Sélectionnez une Sous Region --')}}</option>
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
                                <select wire:model="sub_division_id" name="sub_division_id" class="form-select @error('sub_division_id') is-invalid @enderror" required="">
                                    <option value="">{{ __('-- Select a Sub-Division --')}}</option>
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
                                <label for="type_cabinet">{{__('Type Cabinet')}}</label>
                                <select wire:model="type_cabinet" name="type_cabinet" class="form-select  @error('type_cabinet') is-invalid @enderror" required="">
                                    <option value="">{{__('-- Selectionner --')}}</option>
                                    <option value="geomtre">{{__('Geomtre')}}</option>
                                    <option value="lotisseur">{{__('Lotisseur')}}</option>
                                    <option value="maeture">{{__('Maeture')}}</option>
                                    <option value="promoteur_immobiliere">{{__('Promoteur Immobiliere')}}</option>
                                    <option value="agent_immobiliere">{{__('Agent Immobiliere')}}</option>
                                    <option value="urbaniste">{{__('Urbaniste')}}</option>
                                    <option value="controlleur">{{__('Controlleur')}}</option>
                                    <option value="notaire">{{__('Notaire')}}</option>
                                </select>
                                @error('type_cabinet')
                                <div class="invalid-feedback">{{$message}}</div>
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


                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gray-200 text-gray-600 ms-auto mx-3" data-bs-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" class="btn btn-primary btn-loading">{{ __('Mise à jour')}}</button>
                        </div>
                    </x-form-items.form>

                </div>
            </div>
        </div>
    </div>
</div>