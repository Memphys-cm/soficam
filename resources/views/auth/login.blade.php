<x-layouts.app>
    <main class="pt-5" wire:ignore>
        <section class="d-flex align-items-center my-5 py-5 mt-lg-6 mb-lg-5">
            <div class="container">
                <div class="row justify-content-center form-bg-image" data-background-lg="">

                    <div class="col-12 d-flex align-items-center justify-content-center ">
                        <div class="shadow-lg border-0 rounded border-light py-5 p-4 px-lg-5 pt-lg-4 pb-lg-5 w-100 fmxw-500" style="background-color: rgba(255,255,255,.7)">
                            <!-- <div class=" text-center mb-4 mt-md-0 pt-n4">
                                <img src='/img/logo.png' class="w-50 h-auto" alt=''>
                            </div> -->
                            <div class="text-center text-md-center mb-4 pt-2 mt-md-0">
                                <h1 class="mb-0 h3">{{ __('SOFICAM Soft revolution v2.0.0')}}</h1>
                            </div>
                            <x-form-items.form method="POST" action="{{ route('login') }}" class="mt-1 form-modal needs-validation" id="">
                                <div class='text-center'>
                                    <x-alert />
                                </div>
                                <div class="form-group mb-4"><label for="email">{{ __('Adresse e-mail') }}</label>
                                    <input type="email" name="email" class="form-control  " value="{{ old('email') }}" placeholder="jane.doe@app.com" id="email" autofocus="" required="">
                                    <!-- @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror -->
                                </div>
                                <div class="form-group">
                                    <div class="form-group mb-4">
                                        <label for="password">{{ __('Mot de passe') }}</label>
                                        <input type="password" name="password" placeholder="Password" class="form-control " id="password" required="">
                                        <!-- @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror -->
                                    </div>
                                    <div class="d-flex justify-content-between align-items-top mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label mb-0" for="remember">{{ __('Se souvenir de moi') }}</label>
                                        </div>
                                        <div>
                                            @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="small text-right">
                                                {{ __('Mot de passe oublié?') }}
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-loading px-6"> {{ __('Connexion') }}</button>
                                </div>
                                <div class="d-flex justify-content-center align-items-center mt-4">
                                    <a href="{{route('register')}}" class="btn btn-success px-4 text-white">{{__('Creer un nouveau compt?')}}</a>
                                </div>
                            </x-form-items.form>
                            <div class='d-flex justify-content-center mt-3 fw-light mb-n2'>
                                {{__('Changer de langue')}} <br>
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