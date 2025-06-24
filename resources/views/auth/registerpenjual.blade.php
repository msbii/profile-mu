<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('tema/dist/img/jenderalicon.png') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('tema/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('tema/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('tema/dist/css/adminlte.min.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
</head>
{{-- @if (Auth::check())
    <script>
        window.location.href = '/home'; //using a named route
    </script>
@endif --}}

<style>
    .toggle {
        background: none;
        border: none;
        color: #337ab7;
        /*display: none;*/
        /*font-size: .9em;*/
        right: .45em;
        top: 2.25em;
    }
</style>

<body class="hold-transition login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register Seller') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/regispenjual">
                            @csrf

                            <div class="form-group row">
                                <label for="store_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Store Name') }}</label>

                                <div class="col-md-6">
                                    <input id="store_name" type="text"
                                        class="form-control @error('store_name') is-invalid @enderror" name="store_name"
                                        value="{{ old('store_name') }}" required autocomplete="store_name" autofocus>

                                    @error('store_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="store_description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Store Description') }}</label>

                                <div class="col-md-6">
                                    <input id="store_description" type="text"
                                        class="form-control @error('store_description') is-invalid @enderror"
                                        name="store_description" value="{{ old('store_description') }}" required
                                        autocomplete="store_description" autofocus>

                                    @error('store_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="store_address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Store Address') }}</label>

                                <div class="col-md-6">
                                    <input id="store_address" type="text"
                                        class="form-control @error('store_address') is-invalid @enderror"
                                        name="store_address" required>

                                    @error('store_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="store_phone_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Store Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="store_phone_number" type="text"
                                        class="form-control @error('store_phone_number') is-invalid @enderror"
                                        name="store_phone_number" required>

                                    @error('store_phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register Seller') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- jQuery -->
<script src="{{ asset('tema/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('tema/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('tema/dist/js/adminlte.min.js') }}"></script>

</html>
<script>
    let passwordInput = document.getElementById('txtPassword'),
        toggle = document.getElementById('btnToggle'),
        icon = document.getElementById('eyeIcon');

    function togglePassword() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.add("fa-eye-slash");
            //toggle.innerHTML = 'hide';
        } else {
            passwordInput.type = 'password';
            icon.classList.remove("fa-eye-slash");
            //toggle.innerHTML = 'show';
        }
    }

    function checkInput() {
        //if (passwordInput.value === '') {
        //toggle.style.display = 'none';
        //toggle.innerHTML = 'show';
        //  passwordInput.type = 'password';
        //} else {
        //  toggle.style.display = 'block';
        //}
    }

    // toggle.addEventListener('click', togglePassword, false);
    // passwordInput.addEventListener('keyup', checkInput, false);
</script>
