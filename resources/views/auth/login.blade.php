<style>
.circular-image-icono {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 3px solid white;
            overflow: hidden;
        }

        .circular-image-icono img {
            margin-top: -16px;
        }
        
        .card-login {
            border-radius: 20px; /* Establecer un valor absoluto en píxeles */
        }
</style>
<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            @include('template_base')
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="vertical-center">
                    <div class="card card-login" style="padding:2%;">
                        <x-slot name="logo">
                        </x-slot>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="col-md-12">
                                    <div class="circular-image-icono mx-auto">
                                        <img src="{{ asset('storage/img/') }}/iconos/icono_principal.ico" class="img-fluid" alt="Icono">
                                    </div>
                                    <div class="col-md-12">
                                        <br><br>
                                        <label for="email" class="card-title">Correo electrónico</label>
                                    </div>
                                    <div class="col-md-12">
                                        <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />                                    
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <div class="col-md-12">
                                        <label for="'password'" class="card-title">Contraseña</label>
                                    </div>    
                                    <div class="col-md-12">
                                        <x-input id="password" class="form-control"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                                    </div>    
                                </div>

                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif

                                    <button class="btn ml-3 bg-dark text-light">
                                        {{ __('Iniciar sesión') }}
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
