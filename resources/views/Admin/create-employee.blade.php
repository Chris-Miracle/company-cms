@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Employee') }}</div>
                <div class="card-body">
                    <form  method="post" enctype="multipart/form-data">
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