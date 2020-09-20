@extends('welcome')

@section('title')

    welcome

@endsection



    @section('content')

    <!-- Match Section Begin -->
    <section class="match-section set-bg" data-setbg="{{ asset('/frontend/img/match/match-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="ms-content">
                        <h4>Next Matches</h4>

                        @if ($sport->count() > 0)

                        @foreach ($sport as $sp)

                        <div class="mc-table">
                            <table>
                                <tbody>

                                    <tr>
                                        <td class="left-team">
                                            <img src="{{ url('frontend/img/match/red-card.jpg') }}" alt="">
                                            <h6>{{ $sp->team_one }}</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">{{ $sp->venue }}</div>
                                            <h4>VS</h4>
                                            <div class="mc-op">{{ $sp->match_date }}</div><br>
                                            <div class="mc-op">
                                                <a href={{ URL::to('sport-details/'.$sp->id) }} class="btn btn-success">View Details</a>
                                            </div>
                                        </td>
                                        <td class="right-team">
                                            <img src="{{ url('frontend/img/match/yellow-card.jpg') }}" alt="">
                                            <h6>{{ $sp->team_two }}</h6>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        @endforeach

                        @else

                        <tr>
                            <div class='card'>
                                <div class='card-header text-white bg-primary'>
                                    Sorry ! No Match Found !
                                </div>
                            </div>
                        </tr>

                        @endif

                        <div>
                            {{ $sport->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-1">
                </div>

                <div class="col-lg-4">
                    <div class="ms-content">
                        <h4>Sports Category</h4>
                        <div class="mc-table">
                            <table>
                                <tbody>

                                    @if ($category->count() > 0)

                                        @foreach ($category as $item)

                                            <tr>
                                                <div class='card'>
                                                    <a href="{{ URL::to('/category/'.$item->id) }}">
                                                        <div class='card-header text-dark bg-light'>
                                                            {{ $item->category_name }}
                                                        </div>
                                                    </a>
                                                </div>
                                            </tr>

                                        @endforeach

                                    @else

                                    Sorry ! No category Found !

                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Match Section End -->

    <!-- Recents Blog News Section Begin -->
    <div class="trending-news-section">
        <div class="container">
            <div class="tn-title"><i class="fa fa-caret-right"></i> Recents Blogs</div>
            <div class="news-slider owl-carousel">
                <div class="nt-item">Read sports blogs and news</div>
                <div class="nt-item">Write blogs and express your sports knowledges</div>
            </div>
        </div>
    </div>
    <!-- Trending News Section End -->

    <!-- Popular Blogs Section Begin -->
    <section class="popular-section">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h3>Our Sports <span>Blog</span></h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class='card'>
                                <div class='card-header text-white bg-danger'>
                                    Sorry ! Not available now!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="section-title">
                        <h3>Follow <span>Us</span></h3>
                    </div>
                    <div class="follow-links">
                        <ul>
                            <li class="facebook">
                                <i class="fa fa-facebook"></i>
                                <div class="fl-name">Facebook</div>
                            </li>
                            <li class="twitter">
                                <i class="fa fa-twitter"></i>
                                <div class="fl-name">Twitter</div>

                            </li>
                            <li class="google">
                                <i class="fa fa-google"></i>
                                <div class="fl-name">Google</div>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular News Section End -->

    @endsection




@section('scripts')

@endsection
