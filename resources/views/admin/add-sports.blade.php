@extends('layouts.master')

@section('title')

    Admin Panel

@endsection



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Sports Info</h3>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="card-body">
                    <form action="{{ url('admin/save-sport') }}" method="POST">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Select a Category</label>
                            <select name="category_id" class="form-control">

                                <option selected>None</option>
                                @foreach ( $all_category as $category )

                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Team One Name</label>
                            <input type="text" name="team_one" class="form-control @error('team_one') is-invalid @enderror" required="">

                            @error('team_one')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>

                        <div class="form-group">
                            <label>Opponent Team Name</label>
                            <input type="text" name="team_two" class="form-control @error('team_two') is-invalid @enderror" required="">

                            @error('team_two')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label>Match Date & Time</label>
                            <div class='input-group date'>
                              <input type='text' name="match_date" id='datetime' class="form-control" />
                              <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                            </div>
                        </div> --}}

                        <div class="form-group">

                            <label>Match Date & Time</label>

                              <input type='text' name="match_date" id='datetime' class="form-control" />

                        </div>

                        <div class="form-group">
                            <label>Give a Minimum Betting Amount</label>
                            <input type="number" name="bet_price" class="form-control @error('bet_price') is-invalid @enderror" required="">

                            @error('bet_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Venue</label>
                            <input type="text" name="venue" class="form-control @error('venue') is-invalid @enderror" required="">

                            @error('venue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">SAVE</button>
                        <a href="{{ URL::to('admin/all-sport') }}" class="btn btn-danger">CANCEL</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection
