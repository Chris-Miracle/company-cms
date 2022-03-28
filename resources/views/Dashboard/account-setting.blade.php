<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Company CMS</title>

        <!-- Scripts -->
        <script src="/js/app.js" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Company CMS') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->usertype == 'A')
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Dashboard') }}
                                    </a>
                                @endif

                                <a class="dropdown-item" href="{{ route('create-employee') }}">
                                    {{ __('Account Settings') }}
                                </a>
                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="mt-5">
            <div class="container">
                <div class="row">
                    @if(session()->has('Hey'))
                        <div class="alert alert-warning" role="alert">
                            <strong>Info!</strong> {{ session()->get('Hey') }}
                        </div>
                    @endif
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">{{ __('Personal Settings') }}</div>
                            <div class="card-body">
                                @if(session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        <strong>Success!</strong> {{ session()->get('success') }}
                                    </div>
                                @endif
                                <form action="{{route('personal-account-setting')}}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="row mb-4">
                                        <div class="form-group col-md-6 mb-1">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}">
                                            <div class="text-danger">{{$errors->first('name')}}</div>
                                        </div>
                                        <div class="form-group col-md-6 mb-1">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" readonly>
                                            <div class="text-danger">{{$errors->first('email')}}</div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-1">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">{{ __('Wallet Settings') }}</div>
                            <div class="card-body">
                                @if(session()->has('success-wallet'))
                                    <div class="alert alert-success" role="alert">
                                        <strong>Success!</strong> {{ session()->get('success-wallet') }}
                                    </div>
                                @endif
                                <form action="{{route('wallet-account-setting')}}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="row mb-4">
                                        <div class="form-group col-md-6 mb-1">
                                            <label for="withdrawalDate">Withdrawal Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{old('date')}}">
                                            <div class="text-danger">{{$errors->first('date')}}</div>
                                        </div>
                                        <div class="form-group col-md-6 mb-1">
                                            <label for="withdrawalTime">Withdrawal Time</label>
                                            <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{old('time')}}">
                                            <div class="text-danger">{{$errors->first('time')}}</div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-1">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">{{ __('Security Settings') }}</div>
                        <div class="card-body">
                            @if(session()->has('success-security'))
                                <div class="alert alert-success" role="alert">
                                    <strong>Success!</strong> {{ session()->get('success-security') }}
                                </div>
                            @endif
                            @if(session()->has('success-security-warning'))
                                <div class="alert alert-warning" role="alert">
                                    <strong>Info!</strong> {{ session()->get('success-security-warning') }}
                                </div>
                            @endif
                            <form action="{{route('security-account-setting')}}" method="post">
                                @csrf
                                @method('post')
                                <div class="row mb-4">
                                    <div class="form-group col-md-6 mb-1">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}">
                                        <div class="text-danger">{{$errors->first('password')}}</div>
                                    </div>
                                    <div class="form-group col-md-6 mb-1">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{old('password_confirmation')}}">
                                        <div class="text-danger">{{$errors->first('password_confirmation')}}</div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-1">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
