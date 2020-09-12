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
                    <h3>Post Info</h3>

                </div>

                <div class="card-body">
                    <h6 class="card-title">Post Owner ID Number</h6>
                    <p class="card-text">{{ $post->post_owner_id }}</p>
                </div>

                <div class="card-body">
                    <h6 class="card-title">ID Number Of Post Carried Sport</h6>
                    <p class="card-text">{{ $post->sp_id }}</p>
                </div>

                <div class="card-body">
                    <h6 class="card-title">Post Owner Supported Team</h6>
                    <p class="card-text">{{ $post->support_team }}</p>
                </div>

                <div class="card-body">
                    <h6 class="card-title">Post Title</h6>
                    <p class="card-text">{{ $post->title }}</p>
                </div>

                <div class="card-body">
                    <h6 class="card-title">Post Content</h6>
                    <p class="card-text">{{ $post->description }}</p>
                </div>

                <div class="card-body">
                    <h6 class="card-title">Post Owner Bet Amount</h6>
                    <p class="card-text">{{ $post->price }}</p>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection



@section('scripts')

@endsection
