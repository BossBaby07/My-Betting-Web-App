@extends('welcome')

@section('title')

    sport detils

@endsection

@section('content')


<!-- Sport Details Section Begin -->
<section class="schedule-section spad">
    <div class="container">

        <div class="card text-center text-white bg-success">
            <div class="card-header">
                {{ $confirms->count() }} Posts Already Confirmed For This Section
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-6 left-blog-pad">
                <div class="schedule-text">
                    <div class="section-title">
                        <h3>Section For <span>{{ $sport->team_one }}</span></h3>
                    </div>
                    <div class="follow-links">
                        <a href="{{ URL::to('post-form/'.$sport->id.'/'.$sport->team_one) }}">
                            <ul>
                                <li class="google">
                                        <div class="fl-name">Create a Bid Post For {{ $sport->team_one }} >></div>
                                </li>
                            </ul>
                        </a>
                    </div>
                    <div class="section-title">
                        <h3>All Bid Posts for <span>{{ $sport->team_one }}</span></h3>
                    </div>
                    <div class="st-table">
                        <table>
                            <tbody>
                                    <tr>

                                        @if ($post_one->count() > 0)

                                            @foreach ($post_one as $p1)

                                                <div class="card">
                                                    <h5 class="card-header text-white bg-primary">Primary Price: {{ $p1->price }}</h5>
                                                        <div class="card-body bg-secondary">
                                                            <h5 class="card-title text-white">{{ $p1->title }}</h5>
                                                            <p class="card-text text-white">{{ $p1->description }}</p>

                                                            @if ($p1->post_status == 0)
                                                            <h5 class="card-title text-danger">This Post is already Confirmed</h5>
                                                            @else
                                                            <a href="{{ URL::to('comment-bid/'.$p1->id) }}" class="btn btn-warning">Place Bid</a>
                                                            @endif

                                                        </div>
                                                </div><br>

                                            @endforeach

                                        @else

                                        Sorry ! No Bid-Post Posted Yet !

                                        @endif

                                    </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        {{ $post_one->links() }}
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="schedule-text">
                    <div class="section-title">
                        <h3>Section For <span>{{ $sport->team_two }}</span></h3>
                    </div>
                    <div class="follow-links">
                        <a href="{{ URL::to('post-form/'.$sport->id.'/'.$sport->team_two) }}">
                            <ul>
                                <li class="facebook">
                                        <div class="fl-name">Create a Bid Post For {{ $sport->team_two }} >></div>
                                </li>
                            </ul>
                        </a>
                    </div>
                    <div class="section-title">
                        <h3>All Bid Posts for <span>{{ $sport->team_two }}</span></h3>
                    </div>
                    <div class="st-table">
                        <table>
                            <tbody>
                                    <tr>

                                        @if ($post_two->count() > 0)

                                            @foreach ($post_two as $p2)

                                                <div class="card">
                                                    <h5 class="card-header text-white bg-success">Primary Price: {{ $p2->price }}</h5>
                                                        <div class="card-body bg-secondary">
                                                            <h5 class="card-title text-white">{{ $p2->title }}</h5>
                                                            <p class="card-text text-white">{{ $p2->description }}</p>

                                                            @if ($p2->post_status == 0)
                                                            <h5 class="card-title text-danger">This Post is already Confirmed</h5>
                                                            @else
                                                            <a href="{{ URL::to('comment-bid/'.$p2->id) }}" class="btn btn-warning">Place Bid</a>
                                                            @endif

                                                        </div>
                                                </div><br>

                                            @endforeach

                                        @else

                                        Sorry ! No Bid-Post Posted Yet !

                                        @endif

                                    </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        {{ $post_two->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sport Details Section End -->


@endsection



@section('scripts')

@endsection
