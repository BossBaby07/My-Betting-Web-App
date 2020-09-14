@extends('welcome')

@section('title')

    homes

@endsection



@section('content')


<!-- Sport Section Begin -->
<section class="schedule-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-blog-pad">
                <div class="schedule-text">
                    <h4 class="st-title">You Bid history For This Post</h4>
                    <div class="st-table">
                        <table>
                            <tbody>

                                <tr>

                                    @if ($post->post_owner_id == Auth::user()->id)

                                        @if ( $lastbid > 0 )

                                            <div class="card">

                                                <div class="card-body">
                                                    <h5 class="card-header text-white bg-success">Primary Price: {{ $lastbid->bid_amount }}</h5>
                                                    @if (session('c_status'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ session('c_status') }}
                                                        </div>
                                                    @endif

                                                    <h5 class="card-title">If you confirm this just press confirm bid</h5>
                                                    <form action="{{ url('confirm-bet/'.$post->id.'/'.$post->sp_id.'/'.$lastbid->bid_amount.'/'.$users->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-primary">Confirm Bid</button>
                                                    </form>
                                                </div>
                                            </div><br>

                                        @else

                                        @endif

                                    @endif

                                </tr>

                                @if ($post->count() > 0)

                                    @foreach ($bids as $bid)

                                    <tr>

                                        <div class="card">
                                            <h5 class="card-header text-white bg-primary">Primary Price: {{ $bid->bid_amount }}</h5>
                                                <div class="card-body">
                                                    @if ($bid->user_id == $users->id)

                                                        <h5 class="card-title">Placer Name: {{ $users->name }}</h5>

                                                        @else

                                                        <h5 class="card-title">Placer Name: {{ Auth::user()->name }}</h5>

                                                    @endif

                                                    <p class="card-text">{{ $bid->message }}</p>
                                                </div>
                                        </div><br>

                                    </tr>

                                    @endforeach

                                @else

                                Sorry ! No Match Found !

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="schedule-sidebar">
                    <div class="ss-widget">
                        <div class="section-title sidebar-title">
                            <h5>This Section Post Info</h5>
                        </div>

                        <div class="card">
                            <h5 class="card-header text-white bg-primary">Primary Price: {{ $post->price }}</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Post Owner Name: {{ $users->name }}</h5>
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ $post->description }}</p>
                                </div>
                        </div><br>

                        <div class="card">
                            <h5 class="card-header text-white bg-danger">Your Wallet</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Your Wallet Amount: {{ Auth::user()->wallet }}</h5>
                                    <p class="card-text">careful about your amount capacity before place bid or confirm bid. Other wise you could be punished.</p>
                                </div>
                        </div>

                    </div>
                </div>

                <div class="schedule-sidebar">
                    <div class="ss-widget">
                        <div class="section-title sidebar-title">
                            <h5>Bid Place Section</h5>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                        </div>

                        <form action="{{ url('save-bid/'.$post->id) }}" method="POST">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleFormControlTextarea3">Comments</label>
                                <textarea class="form-control" name="message" id="exampleFormControlTextarea3" rows="7" required=""></textarea>
                            </div>

                            <div class="form-group">
                                <label>Bid Amount</label>
                                <input type="integer" name="bid_amount" class="form-control @error('bid_amount') is-invalid @enderror" required="">
                            </div>

                            <button type="submit" class="btn btn-success">Place Your Bid</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Sport Section End -->

@endsection



@section('scripts')

@endsection
