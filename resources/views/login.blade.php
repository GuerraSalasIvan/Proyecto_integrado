@extends('layouts.login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mx-auto" style="max-width: 494px; max-height:593px; z-index: 9999; padding: 10px 30px; opacity:0.95">

                    <img src="{{ asset('assests/img/logo_mz_azul.png') }}" class="img-fluid card-img-top mx-auto" alt="Logo de la empresa 10Code" style="max-height: 180px; max-width:263px;">

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="email"><strong>{{ __('Correo electrónico') }}</strong></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="height: 39px !important;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group position-relative">
                                <label for="password"><strong>{{ __('Contraseña') }}</strong></label>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control password-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="height: 39px !important;">
                                    <div class="input-group-append">
                                        <button id="icono-toggle"class="btn btn-outline-secondary password-toggle" type="button" id="togglePassword" style="padding: 7px; height: 39px !important;">
                                            <i class="fa-regular fa-eye-slash" aria-hidden="true" style="width: 28px"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group form-check mb-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>

                                <a class="btn btn-link ml-auto" href="{{ route('password.request') }}" style="color: #3F5270; font-weight:700;">
                                    {{ __('Olvidé mi contraseña') }}
                                </a>
                            </div>

                            <div class="form-group">
                                <button id="boton_login"type="submit" class="btn btn-primary w-100" style="padding: 10px; margin: 15px 0px 30px 0px;">
                                    {{ __('Iniciar sesión') }}
                                </button>
                            </div>
                        </form>
                        <div class="text-center">
                            {{ __("No tengo cuenta.") }}
                            <a href="{{ route('register') }}">{{ __("Regístrate aquí") }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("icono-toggle").onclick = function() {
            var passwordInput = document.getElementById("password");
            var icon = document.querySelector("#icono-toggle i");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        };
    </script>


@endsection

