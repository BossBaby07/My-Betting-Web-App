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
                    <h3>Add Sports Category</h3>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="card-body">
                    <form action="{{ url('admin/save-category') }}" method="POST">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" required="">

                            @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                        <button type="submit" class="btn btn-success">SAVE</button>
                        <a href="{{ URL::to('admin/all-category') }}" class="btn btn-danger">CANCEL</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('scripts')

@endsection
