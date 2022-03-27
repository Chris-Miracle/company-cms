@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron">
                <h1 class="display-4">Welcome</h1>
                <p class="lead">Hello {{ Auth::user()->name }}, This is a simple Employee Management System, you can manage your company employee here.</p>
                <hr class="my-4">
                <p>Start by creating new Employee with the button below.</p>
                <a class="btn btn-primary btn-lg" href="{{route('create-employee')}}" role="button">Create Employee</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-dark mb-3" style="">
                <div class="card-header">Wallet</div>
                <div class="card-body">
                    <h5 class="card-title">{{ number_format(Auth::user()->wallet->balance) }}</h5>
                    <p class="card-text">This is your current wallet balance.</p>
                </div>
            </div>
            <div class="card border-secondary mb-3" style="">
                <div class="card-header">Employee Summary</div>
                <div class="card-body text-secondary">
                    <h5 class="card-title">{{$employee_count}} Employees</h5>
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
                    <th scope="col">Name</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0 ?>
                    @foreach ($employees as $employee)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{ucfirst($employee->user->name)}}</td>
                            <td>{{ucfirst($employee->job_title)}}</td>
                            <td>{{number_format($employee->salary)}}</td>
                            <td>{{date('F j, Y', strtotime($employee->due_date))}}</td>
                            {{-- <td>{{date('F j, Y', strtotime($movie->show_date))}} By {{date('g:i a', strtotime($movie->show_time))}}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
