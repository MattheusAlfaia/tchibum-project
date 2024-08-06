<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('/storage/logo.webp')}}"/>


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-cTf9aImi42Xrq1zL5IU3yERgF/ZGJ8jFf0Y5SGgkPl5FtM2j4af0/TzX5lX0L/wJSsZ8trHfjW9CZGmH8ekyeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.timepicker.css') }}">


    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.14/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/multiselect-05/css/style.css') }}">


    <link rel="stylesheet" href="{{ asset('/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

 
 
        <x-slot name="logo">
          <img id="logo" src="{{asset('/storage/logo.webp')}}">
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

   <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Senha') }}</label>
                                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                            </div>

                            {{-- Remember me --}}
                            {{-- <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                            </div> --}}

                            <div class="mb-3 form-check">
                                @if (Route::has('password.request'))
                                    <a class="form-text text-sm text-decoration-none" href="{{ route('password.request') }}">{{ __('Esqueceu sua senha?') }}</a>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Entrar') }}</button>

                            <div class="mt-3">
                                <p class="form-text text-sm text-muted">Não possui login? <a href="/register" class="text-decoration-none">{{ __('Clique aqui') }}</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <style>
            #logo{
                width:150px;
                border-radius: 100px;
            }

        </style>
        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.14/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    <script src="{{ asset('multiselect-05/js/main.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    

</body>
</html>

