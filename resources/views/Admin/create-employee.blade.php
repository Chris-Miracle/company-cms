@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Movies') }}</div>
                <div class="card-body">
                    <form  method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="row mb-4">
                            <div class="form-group col-md-6 mb-1">
                                <label for="cinemaLocation">Cinema Location</label>
                                <select class="form-control @error('cinema_location') is-invalid @enderror" name="cinema_location">
                                    <option value=""> Select Cinema Location</option>
                                    {{-- @foreach ($locations as $cinema )
                                        <option value="{{$cinema->id}}">{{ $cinema->location }}</option>
                                    @endforeach --}}
                                </select>
                                <div class="text-danger">{{$errors->first('cinema_location')}}</div>
                            </div>

                            <div class="form-group col-md-6 mb-1">
                                <label for="movieTitle">Title</label>
                                <input type="text" class="form-control @error('movie_title') is-invalid @enderror" placeholder="Eg: Spider Man far from home" name="movie_title" value="{{old('movie_title')}}">
                                <div class="text-danger">{{$errors->first('movie_title')}}</div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="form-group col-md-6 mb-1">
                                <label for="showDate">Show Date</label>
                                <input type="date" class="form-control @error('show_date') is-invalid @enderror" name="show_date" value="{{old('show_date')}}">
                                <div class="text-danger">{{$errors->first('show_date')}}</div>
                            </div>

                            <div class="form-group col-md-6 mb-1">
                                <label for="showTime">Show Time</label>
                                <input type="time" class="form-control @error('show_time') is-invalid @enderror" name="show_time" value="{{old('show_time')}}">
                                <div class="text-danger">{{$errors->first('show_time')}}</div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-1">Upload Movie</button>
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