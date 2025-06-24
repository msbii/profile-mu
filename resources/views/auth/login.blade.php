<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <title>{{ config('app.name', 'Muhammadiyah Panggungharjo') }}</title> --}}
    <title>'Muhammadiyah Panggungharjo</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
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
@if (Auth::check())
    <script>
        window.location.href = '/home'; //using a named route
    </script>
@endif

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
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    {{-- @include('sweetalert::alert') --}}
    <div class="login-box">
        <div class="login-logo">
            {{-- <b>{{ config('app.name', 'Muhammadiyah Panggungharjo') }}</b> --}}
            <img src="{{ asset('img/Logo3.jpg') }}" width="350" height="200" alt="">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">

                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session()->has('registerSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('registerSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <p class="login-box-msg">Halaman Login</p>
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email" type="email" placeholder="E-Mail"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password" placeholder="Password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>

                    </div>
                    {{-- <div class="flex items-center justify-center mt-4">
                        <a href="{{ url('auth/google') }}" class="btn btn-block btn-primary">
                            Login dengan SSO
                        </a>
                        <br>
                        <a href="{{ route('publik.aktivasi') }}" class="btn btn-block btn-default">
                            Aktivasi Akun Mahasiswa
                        </a>

                    </div> --}}
                    <br>

                </form>

                <small class="text-center">Not Registered? <a href="/register"> Register</a></small>
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

