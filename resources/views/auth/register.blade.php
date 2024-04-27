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
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="col-md-12">
                                    <div class="circular-image-icono mx-auto">
                                        <img src="{{ asset('storage/img/') }}/iconos/icono_principal.ico" class="img-fluid" alt="Icono">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <br><br>
                                        <label for="name" class="card-title">Nombre</label>
                                    </div>
                                    <div class="col-md-12">
                                        <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <br>
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
                                <div class="col-md-12">
                                    <br>
                                    <div class="col-md-12">
                                        <label for="'password'" class="card-title">Confirmar contraseña</label>
                                    </div>    
                                    <div class="col-md-12">
                                    <x-input id="password_confirmation" class="form-control"
                                        type="password"
                                        name="password_confirmation" required />
                                    </div>    
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                        {{ __('¿Ya estás registrado?') }}
                                    </a>

                                    <button class="btn ml-3 bg-dark text-light">
                                        {{ __('Registrarme') }}
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
