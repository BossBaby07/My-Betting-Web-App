@extends('layouts.master')

@section('title')

    Admin Panel

@endsection



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Add Refer Amount</h3>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="card-body">
                    <form action="{{ url('admin/save-referamount') }}" method="POST">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Referrer Comission (percentage)</label>
                            <input type="integer" name="refer_amount" value="{{ $refer->refer_amount }}" class="form-control @error('refer_amount') is-invalid @enderror" required="">

                            @error('refer_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                        <div class="form-group">
                            <label>Admin Comission (percentage)</label>
                            <input type="integer" name="author_amount" value="{{ $refer->author_amount }}" class="form-control @error('author_amount') is-invalid @enderror" required="">

                            @error('author_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                        <div class="form-group">
                            <label>Withdraw Comission (percentage)</label>
                            <input type="integer" name="request_cut" value="{{ $refer->request_cut }}" class="form-control @error('request_cut') is-invalid @enderror" required="">

                            @error('request_cut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                        <button type="submit" class="btn btn-success">SAVE</button>
                        <a href="{{ URL::to('admin') }}" class="btn btn-danger">CANCEL</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection



@section('scripts')

@endsection
