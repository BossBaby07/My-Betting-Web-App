@extends('welcome')

@section('title')

    user posts

@endsection



@section('content')


<!-- Sport Section Begin -->
<section class="schedule-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 left-blog-pad">
                <div class="schedule-text">
                    <h4 class="st-title bg-success">My Created Posts</h4>
                    <div class="st-table">
                        <table>
                            <tbody>

                                <tr>

                                    @if ($posts->count() > 0)

                                            @foreach ($posts as $post)

                                                <div class="card">
                                                    <h5 class="card-header text-white bg-primary">Primary Price: {{ $post->price }}</h5>
                                                        <div class="card-body bg-dark">
                                                            <h3 class="card-title text-primary">Match: {{ $post->team_one }} Vs {{ $post->team_two }}</h3>
                                                            <h5 class="card-title text-white">{{ $post->title }}</h5>
                                                            <p class="card-text text-white">{{ $post->description }}</p>
                                                            <p class="card-text text-success">Match Time: {{ $post->match_date }}</p>

                                                            @if ($post->status == 0)
                                                                <h5 class="card-title text-white bg-danger">This Post already Confirmed</h5>
                                                            @else
                                                                <a href="{{ URL::to('comment-bid/'.$post->id.'/') }}" class="btn btn-warning">View Details</a>
                                                            @endif

                                                        </div>
                                                </div><br>

                                            @endforeach

                                        @else

                                        Sorry ! You did not create any post yet !

                                        @endif

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>

            <div class="col-lg-6 left-blog-pad">
                <div class="schedule-text">
                    <h4 class="st-title bg-secondary">The Posts Where I Bid</h4>
                    <div class="st-table">
                        <table>
                            <tbody>

                                <tr>

                                    @if ($bidPosts == null)

                                            @foreach ($bidPosts as $item)

                                            @if ($item->post_owner_id != Auth::user()->id && $item->reply_to != Auth::user()->id)

                                            <div class="card">
                                                <h5 class="card-header text-white bg-success">Primary Price: {{ $item->price }}</h5>
                                                    <div class="card-body bg-dark">
                                                        <h3 class="card-title text-primary">Match: {{ $item->team_one }} Vs {{ $item->team_two }}</h3>
                                                        <h5 class="card-title text-white">{{ $item->title }}</h5>
                                                        <p class="card-text text-white">{{ $item->description }}</p>
                                                        <p class="card-text text-success">Match Time: {{ $item->match_date }}</p>

                                                        @if ($item->post_status == 0)
                                                            <h5 class="card-title text-white bg-danger">This Post already Confirmed</h5>
                                                        @else
                                                            <a href="{{ URL::to('comment-bid/'.$item->post_id) }}" class="btn btn-warning">View Details</a>
                                                        @endif

                                                    </div>
                                            </div><br>

                                            @endif

                                            @endforeach

                                    @else

                                        Sorry! You did not create any post yet!

                                    @endif

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        {{ $bidPosts->links() }}
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
