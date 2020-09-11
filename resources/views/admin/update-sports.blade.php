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
                    <h3>Update Sport Result</h3>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="card-body">
                    <form action={{ url("admin/update-sport/".$sport->id) }} method="POST">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Match Result</label>
                            <input type="text" name="match_result" value="{{ $sport->match_result }}" class="form-control @error('match_result') is-invalid @enderror" required="">

                            @error('match_result')
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
