
<x-guest-layout >
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="col-md-12">
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
                <button class="btn ml-3 bg-dark text-light">
                    {{ __('Restaurar contraseña') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
