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

                                <a class="dropdown-item" href="{{ route('account-settings') }}">
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
                    <div class="col-md-8">
                        <div class="jumbotron">
                            @if (Auth::user()->employee != null)
                                <h5>{{ ucfirst(Auth::user()->employee->job_title) }}.</h5>
                            @else
                                <h5>Admin</h5>
                            @endif
                            <h1 class="display-4">Welcome, </h1>
                            <p class="lead">Hello {{ ucfirst(Auth::user()->name) }}, welcome to the team we are glad to have you onbaord.</p>
                            <hr class="my-4">
                            <h4>Job Description</h4>
                            @if (Auth::user()->employee != null)
                                <p>{{ucfirst(Auth::user()->employee->job_desc)}}.</p>
                                <a class="btn btn-primary btn-lg mb-2" href="{{route('account-settings')}}" role="button">Set-up Account</a>
                            @else
                                <p>Kindly head to the Admin Dashboard, click the button below</p>
                                <a class="btn btn-primary btn-lg mb-2" href="{{route('home')}}" role="button">Dashboard</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-dark mb-3" style="">
                            <div class="card-header">Wallet</div>
                            <div class="card-body">
                                <h5 class="card-title">NGN{{ number_format(Auth::user()->wallet->balance) }}</h5>
                                <p class="card-text">This is your current wallet balance, your salary will be paid into your wallet.</p>
                            </div>
                            @if (Auth::user()->wallet->default_withdrawal_date != null)
                                <div class="card-footer">
                                    <p class="card-text">Next Withdrawal: {{date('F j, Y', strtotime(Auth::user()->wallet->default_withdrawal_date))}} By {{date('g:i a', strtotime(Auth::user()->wallet->default_withdrawal_time))}}</p>
                                </div>
                            @endif
                        </div>
                        <div class="card border-secondary mb-3" style="">
                            <div class="card-header">Account Set-up</div>
                            <div class="card-body text-secondary">
                                <h5 class="card-title">Get Started</h5>
                                <p class="card-text">Verify your email.</p>
                                <p class="card-text">Change password to preferred password.</p>
                                <p class="card-text">Set a default wallet withdrawal date.</p>
                                <p class="card-text">Rock & Roll🚀.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <section class="mt-3">
                    <div class="section-title text-center">
                        <h3>On the Job, 1st Week.</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Task</th>
                            <th scope="col">Task Manager</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Get to Know your Team</td>
                                <td>Mr. Ajibade</td>
                                <td>Medium</td>
                                <td>20th April , 2022</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Understand your Job Description</td>
                                <td>Mr. Asake</td>
                                <td>High</td>
                                <td>10th April , 2022</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Meeting with CEO & COO</td>
                                <td>Mr. Collins</td>
                                <td>High</td>
                                <td>4th April , 2022</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Set-up Work Space</td>
                                <td>Mr. James</td>
                                <td>High</td>
                                <td>11th April , 2022</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
