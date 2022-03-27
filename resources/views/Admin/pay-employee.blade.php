@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pay Employee Bulk') }}</div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>Success!</strong> {{ session()->get('success') }}
                        </div>
                    @endif
                    <form action="{{route('pay-bulk-employees-salary')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="row mb-4">
                            <div class="form-group col-md-12 mb-1">
                                <label for="due_date">Pay Employees Due for this Date</label>
                                <input type="date" class="form-control @error('due_date') is-invalid @enderror" name="due_date" value="{{old('due_date')}}">
                                <div class="text-danger">{{$errors->first('due_date')}}</div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-1">Pay</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4 nb-2">
            <div class="card">
                <div class="card-header">{{ __('Pay Employee Single') }}</div>
                <div class="card-body">
                    @if(session()->has('success-single'))
                        <div class="alert alert-success" role="alert">
                            <strong>Success!</strong> {{ session()->get('success-single') }}
                        </div>
                    @endif
                    <form action="{{route('pay-single-employees-salary')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="row mb-4">
                            <div class="form-group col-md-12 mb-1">
                                <label for="email">Pay Single Employee By Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Eg: chris@pay.com" value="{{old('email')}}">
                                <div class="text-danger">{{$errors->first('email')}}</div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-1">Pay</button>
                    </form>
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
                    <th scope="col">Email</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach ($employees as $employee)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{ucfirst($employee->user->name)}}</td>
                            <td>{{$employee->user->email}}</td>
                            <td>{{ucfirst($employee->job_title)}}</td>
                            <td>NGN{{number_format($employee->salary)}}</td>
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