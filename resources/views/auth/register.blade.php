<x-layouts.app>
    <main class="pt-5" wire:ignore>
        <section class="d-flex align-items-center mt-lg-6 mb-lg-5">
            <div class="container">
                <div class="row justify-content-center form-bg-image" data-background-lg="{{asset('img/illustrations/signin.svg')}}">

                    <div class="col-12 d-flex align-items-center justify-content-center ">
                        <div class="bg-white shadow border-0 rounded border-light p-4 px-lg-5 pt-lg-4 pb-lg-5 col-md-7 col-sm-12">
                            <!-- <div class=" text-center mb-4 mt-md-0 pt-n4">
                                <img src='/img/logo.png' class="w-50 h-auto" alt=''>
                            </div> -->
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">{{ __('S\'inscrire')}}</h1>
                            </div>
                            <x-form-items.form method="POST" action="{{ route('register') }}" class="mt-1 form-modal needs-validation" id="">
                                <div class='text-center'>
                                    <x-alert />
                                </div>
                                <div class='form-group row mb-3'>
                                    <div class=" col"><label for="first_name">{{ __('Prénom') }}</label>
                                        <input type="text" name="first_name" class="form-control  @error('first_name') is-invalid @enderror " value="{{ old('first_name') }}" placeholder="Jane" id="first_name" autofocus="" required="">
                                        @error('first_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class=" col"><label for="last_name">{{ __('Nom') }}</label>
                                        <input type="text" name="last_name" class="form-control  @error('last_name') is-invalid @enderror " value="{{ old('last_name') }}" placeholder="Doe" id="last_name" autofocus="" required="">
                                        @error('last_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class='form-group row mb-3'>
                                    <div class=" col"><label for="id_card_number">{{ __('Numéro de la carte d\'identité') }}</label>
                                        <input type="text" name="id_card_number" class="form-control  @error('id_card_number') is-invalid @enderror " value="{{ old('id_card_number') }}" placeholder="112233445566" id="id_card_number" autofocus="" required="">
                                        @error('id_card_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class=" col"><label for="date_of_birth">{{ __('Date de naissance') }}</label>
                                        <input type="date" name="date_of_birth" class="form-control  @error('date_of_birth') is-invalid @enderror " value="{{ old('date_of_birth') }}" placeholder="Edea" id="date_of_birth" autofocus="" required="">
                                        @error('date_of_birth')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3"><label for="place_of_birth">{{ __('Lieu de naissance') }}</label>
                                    <input type="text" name="place_of_birth" class="form-control  @error('place_of_birth') is-invalid @enderror " value="{{ old('place_of_birth') }}" placeholder="Edea" id="place_of_birth" autofocus="" required="">
                                    @error('place_of_birth')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class='form-group row mb-3'>
                                    <div class=" col"><label for="primary_phone_number">{{ __('Numéro de téléphone principal') }}</label>
                                        <input type="text" name="primary_phone_number" class="form-control  @error('primary_phone_number') is-invalid @enderror " value="{{ old('primary_phone_number') }}" placeholder="6xxxxxxxx" id="primary_phone_number" autofocus="" required="">
                                        @error('primary_phone_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class=" col"><label for="secondary_phone_number">{{ __('Autre numéro de téléphone') }}</label>
                                        <input type="text" name="secondary_phone_number" class="form-control  @error('secondary_phone_number') is-invalid @enderror " value="{{ old('secondary_phone_number') }}" placeholder="Doe" id="secondary_phone_number" autofocus="" required="">
                                        @error('secondary_phone_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class='form-group row mb-3'>
                                    <div class=" col"><label for="address">{{ __('Adresse') }}</label>
                                        <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror " value="{{ old('address') }}" placeholder="{{__('Carefour Eto')}}" id="address" autofocus="" required="">
                                        @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class=" col"><label for="email">{{ __('Adresse e-mail') }}</label>
                                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror " value="{{ old('email') }}" placeholder="jane.doe@app.com" id="email" autofocus="" required="">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class='form-group row mb-4'>
                                    <div class=" col"><label for="password">{{ __('Mot de passe') }}</label>
                                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror " autofocus="" required="">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class=" col"><label for="password_confirmation">{{ __('Confirmer le mot de passe') }}</label>
                                        <input type="password" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror " id="password_confirmation" autofocus="" required="">
                                        @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-end mt-3 mb-4 ">
                                    <span class="fw-normal">{{__('Vous avez déjà un compte?')}} <a href="{{route('login')}}" class="fw-bold">{{__('Sign In')}}</a></span>
                                    <button type="submit" class="btn btn-primary btn-loading px-6"> {{ __('Enregistrer') }}</button>
                                </div>
                            </x-form-items.form>
                            <div class='d-flex justify-content-start align-items-end mt-3 fw-light mb-n4'>
                                {{__('Change language')}} <br>
                                <a class="{{ \App::isLocale('fr') ? ' text-secondary' : ''}} mx-2" href="{{route('language-switcher',['locale'=>'fr'])}}">{{__('FR')}}</a> |
                                <a class="{{ \App::isLocale('en') ? ' text-secondary' : ''}} mx-2" href="{{route('language-switcher',['locale'=>'en'])}}">{{__('EN')}}</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

    </main>

</x-layouts.app>