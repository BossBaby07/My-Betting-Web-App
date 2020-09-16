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
                    <form action={{ url("admin/redeem/".$user->id) }} method="POST">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Coin Amount</label>
                            <input type="number" name="wallet" value="" class="form-control @error('match_result') is-invalid @enderror" required="">

                            @error('wallet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-success">SAVE</button>
                        <a href="{{ URL::to('admin/all-user') }}" class="btn btn-danger">CANCEL</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('scripts')

@endsection
