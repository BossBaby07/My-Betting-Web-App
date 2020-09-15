@extends('welcome')

@section('title')

    welcome

@endsection



    @section('content')

    <!-- Match Section Begin -->
    <section class="match-section set-bg" data-setbg="{{ asset('/frontend/img/match/match-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ms-content">
                        <h4>Next Match</h4>
                        <div class="mc-table">
                            <table>
                                <tbody>

                                    @if ($sports->count() > 0)

                                    @foreach ($sports as $item)

                                    <tr>
                                        <td class="left-team">
                                            <img src="{{ url('frontend/img/match/red-card.jpg') }}" alt="">
                                            <h6>{{ $item->team_one }}</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">{{ $item->venue }}</div>
                                            <h4>VS</h4>
                                            <div class="mc-op">{{ $item->match_date }}</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="{{ url('frontend/img/match/yellow-card.jpg') }}" alt="">
                                            <h6>{{ $item->team_two }}</h6>
                                        </td>
                                    </tr>

                                    @endforeach

                                    @else

                                    <tr>
                                        <div class='card'>
                                            <div class='card-header text-white bg-primary'>
                                                No Match Data for public user
                                            </div>
                                        </div>
                                    </tr>

                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ms-content">
                        <h4>Recent Post For Bids</h4>
                        <div class="mc-table">
                            <table>
                                <tbody>

                                    <tr>
                                        <div class='card'>
                                            <div class='card-header text-white bg-danger'>
                                                Sorry ! No Bid Post for public user. Please, Do Sign-in
                                            </div>
                                        </div>
                                    </tr>

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
