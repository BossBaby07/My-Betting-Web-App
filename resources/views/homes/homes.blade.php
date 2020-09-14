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
                        <h4 class="st-title">Available Matches</h4>
                        <div class="st-table">
                            <table>
                                <tbody>

                                    @if ($sport->count() > 0)

                                        @foreach ($sport as $sp)

                                        <tr>
                                            <td class="left-team">
                                                <img src="{{ url('frontend/img/match/red-card.jpg') }}" alt="">
                                                <h4>{{ $sp->team_one }}</h4>
                                            </td>
                                            <td class="st-option">
                                                <div class="so-text">{{ $sp->venue }}</div>
                                                <h4>VS</h4>
                                                <div class="so-text">{{ $sp->match_date }}</div><br>
                                                <div class="so-text">
                                                    <a href={{ URL::to('sport-details/'.$sp->id) }} class="btn btn-success">View Details</a>
                                                </div>
                                            </td>
                                            <td class="right-team">
                                                <img src="{{ url('frontend/img/match/yellow-card.jpg') }}" alt="">
                                                <h4>{{ $sp->team_two }}</h4>
                                            </td>
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
                                <h5>Sports Category</h5>
                            </div>
                            <ul>
                                @if ($category->count() > 0)

                                    @foreach ($category as $item)

                                    <li><a href="{{ URL::to('/category/'.$item->id) }}">{{ $item->category_name }}</a></li>

                                    @endforeach

                                @else

                                Sorry ! No category Found !

                                @endif

                            </ul>
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

