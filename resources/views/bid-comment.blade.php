@extends('welcome')

@section('title')

    confirm bid

@endsection



@section('content')


<!-- Sport Section Begin -->
<section class="schedule-section spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 left-blog-pad">
                <div class="schedule-text">
                    <h4 class="st-title bg-success">Bid Conversations</h4>

                    <div class="col-lg-8">
                        <div class="contact-form">
                            <h2>Comment</h2>

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                            <form action="{{ url('/save-comment/'.$post_id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <div class="group-in">
                                    <label for="comment">Comment</label>
                                    <textarea name="comment" id="message" required></textarea>
                                </div>

                                <button type="submit">Message</button>
                            </form>
                        </div>
                    </div><br>

                    <div class="st-table">
                        <table>
                            <tbody>

                                    @if ($comments->count() > 0)

                                    @foreach ($comments as $comment)

                                    @if ($comment->reply_from == Auth::user()->id || $comment->reply_to == Auth::user()->id)

                                    <tr>
                                        <div class="card">

                                            @if ($comment->reply_from == Auth::user()->id)

                                            <h5 class="card-header text-white bg-success">You </h5>

                                            @else

                                            <h5 class="card-header text-white bg-warning">Post Owner</h5>

                                            @endif

                                                <div class="card-body bg-dark">
                                                    <p class="card-text text-white">{{ $comment->comment }}</p>
                                                </div>
                                        </div><br>
                                    </tr>

                                    @endif

                                    @endforeach

                                    @else

                                    @endif

                            </tbody>
                        </table>
                    </div>

                    <div>
                        {{ $comments->links() }}
                    </div>

                </div>
            </div>

            <div class="col-lg-4">

                <div class="section-title">
                    <h3>Place Bid <span>For Confirmation Request</span></h3>

                            @if (session('r_status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('r_status') }}
                                </div>
                            @endif
                </div>

                @if ($post->post_owner_id != Auth::user()->id)

                <form action="{{ url('/save-bid/'.$post_id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="form-group">
                        <label for="message">Comment</label>
                        <textarea class="form-control" name="message" id="message" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message">Bid Amount</label>
                        <input class="form-control" type="number" name="bid_amount" id="bid_amount" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Request</button>
                </form>

                @else

                <div class="card text-center bg-warning">
                    You can not make a Request because you are owner. This section only for Bidder.
                </div>

                @endif

                <br>

                <div class="schedule-text">
                    <h4 class="st-title bg-alert">Bid Confirmation Request</h4>
                    <div class="st-table">
                        <table>
                            <tbody>

                                @if ($bids->count() > 0 && $post->post_owner_id == Auth::user()->id)

                                @foreach ($bids as $item)

                                <tr>

                                    <div class="card">
                                        <h5 class="card-header text-white bg-success">Bid Price: {{ $item->bid_amount }}</h5>
                                            <div class="card-body bg-dark">
                                                <h5 class="card-title text-primary">Request From: {{ $item->name }}</h5>
                                                <p class="card-text text-white">Message: {{ $item->message }}</p>

                                                <form action="{{ url('/confirm-bet/'.$item->post_id.'/'.$item->bid_amount.'/'.$item->user_id) }}" method="POST">

                                                    {{ csrf_field() }}

                                                    <button type="submit" class="btn btn-danger btn-sm">Confirm</button>

                                                </form>

                                            </div>
                                    </div>

                                </tr>

                                @endforeach

                                @else

                                    <div class="card bg-secondary">
                                        <div class="card-body text-white">
                                            No Request Submit Yet!
                                        </div>
                                    </div>

                                @endif

                            </tbody>
                        </table>
                    </div>

                    <div>
                        {{ $bids->links() }}
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
