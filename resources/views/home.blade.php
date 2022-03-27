@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron">
                <h1 class="display-4">Welcome</h1>
                <p class="lead">This is a simple Employee Management System, you can manage your company employee here.</p>
                <hr class="my-4">
                <p>Start by creating new Employee with the button below.</p>
                <a class="btn btn-primary btn-lg" href="{{route('create-employee')}}" role="button">Create Employee</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-dark mb-3" style="">
                <div class="card-header">Wallet</div>
                <div class="card-body">
                    <h5 class="card-title">250,000,000</h5>
                    <p class="card-text">This is your current wallet balance.</p>
                </div>
            </div>
            <div class="card border-secondary mb-3" style="">
                <div class="card-header">Employee Summary</div>
                <div class="card-body text-secondary">
                    <h5 class="card-title">4 Employees</h5>
                    <p class="card-text">This is the total number of active employee you currently have registered on your system.</p>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-5">
            <div class="section-title text-center">
                <h3>Employee List</h3>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Location</th>
                    <th scope="col">Title</th>
                    <th scope="col">Show Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($movies as $movie)
                        <tr>
                            <th scope="row">{{$movie->id}}</th>
                            <td>{{ucfirst($movie->cinema_location->location)}}</td>
                            <td>{{ucfirst($movie->movie_title)}}</td>
                            <td>{{date('F j, Y', strtotime($movie->show_date))}} By {{date('g:i a', strtotime($movie->show_time))}}</td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
