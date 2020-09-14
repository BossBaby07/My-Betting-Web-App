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
                                    <tr>
                                        <td class="left-team">
                                            <img src="{{ url('frontend/img/match/red-card.jpg') }}" alt="">
                                            <h6>Cambodia</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Ucraina vs England</div>
                                            <h4>VS</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="{{ url('frontend/img/match/yellow-card.jpg') }}" alt="">
                                            <h6>Qatar</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="img/match/tf-3.jpg" alt="">
                                            <h6>Australia</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Ucraina vs England</div>
                                            <h4>VS</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="img/match/tf-4.jpg" alt="">
                                            <h6>Iraq</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="img/match/tf-5.jpg" alt="">
                                            <h6>Ucraina</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Ucraina vs England</div>
                                            <h4>VS</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="img/match/tf-6.jpg" alt="">
                                            <h6>Jordan</h6>
                                        </td>
                                    </tr>
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
                                        <td class="left-team">
                                            <img src="img/match/tf-1.jpg" alt="">
                                            <h6>Darussalam</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Ucraina vs England</div>
                                            <h4>1 : 2</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="img/match/tf-2.jpg" alt="">
                                            <h6>Ucraina</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="img/match/tf-3.jpg" alt="">
                                            <h6>Japan</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Ucraina vs England</div>
                                            <h4>1 : 2</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="img/match/tf-4.jpg" alt="">
                                            <h6>Philippines</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="img/match/tf-5.jpg" alt="">
                                            <h6>Kyrgyz</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Ucraina vs England</div>
                                            <h4>1 : 2</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="img/match/tf-6.jpg" alt="">
                                            <h6 class="mi-right">Pakistan</h6>
                                        </td>
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
                            <div class="news-item popular-item set-bg" data-setbg="{{ url('frontend/img/news/popular-b.jpg') }}">
                                <div class="ni-text">
                                    <h5><a href="#">England reach World Cup last 16 with hard-fought win over
                                            Argentina</a></h5>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                        <li><i class="fa fa-edit"></i> 3 Comment</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-item">
                                <div class="ni-pic">
                                    <img src="img/news/ln-1.jpg" alt="">
                                </div>
                                <div class="ni-text">
                                    <h5><a href="#">There’s a great history of the winner Sandia</a></h5>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                        <li><i class="fa fa-edit"></i> 3 Comment</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-item">
                                <div class="ni-pic">
                                    <img src="img/news/ln-2.jpg" alt="">
                                </div>
                                <div class="ni-text">
                                    <h5><a href="#">It’ll be a tough game and a physical game</a></h5>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                        <li><i class="fa fa-edit"></i> 3 Comment</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-item">
                                <div class="ni-pic">
                                    <img src="img/news/ln-3.jpg" alt="">
                                </div>
                                <div class="ni-text">
                                    <h5><a href="#">If we don’t score we can’t get frustrated</a></h5>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                        <li><i class="fa fa-edit"></i> 3 Comment</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="news-item popular-item set-bg" data-setbg="{{ url('frontend/img/news/popular-b.jpg') }}">
                                <div class="ni-text">
                                    <h5><a href="#">We are playing history and Argentina at the World Cup, says Phil
                                            Neville</a></h5>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                        <li><i class="fa fa-edit"></i> 3 Comment</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-item">
                                <div class="ni-pic">
                                    <img src="img/news/ln-5.jpg" alt="">
                                </div>
                                <div class="ni-text">
                                    <h5><a href="#">Le Havre does have a growing fan club</a></h5>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                        <li><i class="fa fa-edit"></i> 3 Comment</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-item">
                                <div class="ni-pic">
                                    <img src="img/news/ln-6.jpg" alt="">
                                </div>
                                <div class="ni-text">
                                    <h5><a href="#">It will be hard to break them down</a></h5>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                        <li><i class="fa fa-edit"></i> 3 Comment</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-item">
                                <div class="ni-pic">
                                    <img src="img/news/ln-7.jpg" alt="">
                                </div>
                                <div class="ni-text">
                                    <h5><a href="#">We’ve never seen them as organised </a></h5>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                        <li><i class="fa fa-edit"></i> 3 Comment</li>
                                    </ul>
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
