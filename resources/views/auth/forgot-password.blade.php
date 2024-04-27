
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
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('¿Olvidaste tu contraseña? No hay problema. Solo háznos saber tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña por correo electrónico, el cual te permitirá elegir una nueva.') }}
                        </div>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.email') }}">
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
                                        <label for="email" class="card-title">Correo electrónico</label>
                                    </div>
                                    <div class="col-md-12">
                                        <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />                                    
                                    </div>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <button class="btn ml-3 bg-dark text-light">
                                        {{ __('Restablecer contraseña por email') }}
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
