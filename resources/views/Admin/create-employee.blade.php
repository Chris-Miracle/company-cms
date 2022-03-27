@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Employee') }}</div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>Success!</strong> {{ session()->get('success') }}
                        </div>
                    @endif
                    <form action="{{route('store-employee-details')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="row mb-4">
                            <div class="form-group col-md-6 mb-1">
                                <label for="employeeName">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Eg: Sandra John" name="name" value="{{old('name')}}">
                                <div class="text-danger">{{$errors->first('name')}}</div>
                            </div>

                            <div class="form-group col-md-6 mb-1">
                                <label for="employeeTitle">Job Title</label>
                                <input type="text" class="form-control @error('job_title') is-invalid @enderror" placeholder="Eg: Sales Manager" name="job_title" value="{{old('job_title')}}">
                                <div class="text-danger">{{$errors->first('job_title')}}</div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="form-group col-md-6 mb-1">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                                <div class="text-danger">{{$errors->first('email')}}</div>
                            </div>

                            <div class="form-group col-md-6 mb-1">
                                <label for="salary">Salary</label>
                                <input type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{old('salary')}}">
                                <div class="text-danger">{{$errors->first('salary')}}</div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="form-group col-md-6 mb-1">
                                <label for="passsword">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}">
                                <div class="text-danger">{{$errors->first('password')}}</div>
                            </div>

                            <div class="form-group col-md-6 mb-1">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{old('password_confirmation')}}">
                                <div class="text-danger">{{$errors->first('password_confirmation')}}</div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="job_desc">Job Description</label>
                            <textarea name="job_desc" class="form-control" cols="10" rows="10">{{old('job_desc')}}</textarea>
                            <div class="text-danger">{{$errors->first('job_desc')}}</div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-1">Create</button>
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