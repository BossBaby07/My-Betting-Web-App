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
                    <h3>User Info</h3>

                </div>

                <div class="card-body">
                    <h6 class="card-title">Full Name</h6>
                    <p class="card-text">{{ $user->name }}</p>
                </div>

                <div class="card-body">
                    <h6 class="card-title">User Name</h6>
                    <p class="card-text">{{ $user->user_name }}</p>
                </div>

                <div class="card-body">
                    <h6 class="card-title">Referrer Name</h6>
                    <p class="card-text">{{ $user->referrer_name }}</p>
                </div>

                <div class="card-body">
                    <h6 class="card-title">User Email</h6>
                    <p class="card-text">{{ $user->email }}</p>
                </div>

                <div class="card-body">
                    <h6 class="card-title">Wallet</h6>
                    <p class="card-text">{{ $user->wallet }}</p>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection



@section('scripts')

@endsection
