@extends('welcome')

@section('title')

    profile

@endsection



@section('content')


<!-- Club Section Begin -->
<section class="club-section spad">
    <div class="container">
        <div class="club-content">
            <div class="row">
                <div class="col-lg-5">
                    <div class="cc-pic">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cc-text">
                        <div class="ct-title">
                            <h3>About Me</h3>

                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <p> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="club-tab-list">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">My Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">My Wallet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Win History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Withdraw History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab">Transfer History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Withdraw Request</a>
                        </li>
                    </ul><!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="club-tab-content">
                                <div class="ct-item">
                                    <div class="ci-text">
                                        <h5>Full Name</h5>
                                    </div>
                                    <div class="ci-name">{{ Auth::user()->name }}</div>
                                </div>
                                <div class="ct-item">
                                    <div class="ci-text">
                                        <h5>Email</h5>
                                    </div>
                                    <div class="ci-name">{{ Auth::user()->email }}</div>
                                </div>
                                <div class="ct-item">
                                    <div class="ci-text">
                                        <h5>Phone</h5>
                                    </div>
                                    <div class="ci-name"></div>
                                </div>
                                <div class="ct-item">
                                    <div class="ci-text">
                                        <h5>My User Name</h5>
                                    </div>
                                    <div class="ci-name">{{ Auth::user()->user_name }}</div>
                                </div>
                                <div class="ct-item">
                                    <div class="ci-text">
                                        <h5>My Refer Code/Name</h5>
                                    </div>
                                    <div class="ci-name">{{ Auth::user()->user_name }}</div>
                                </div>
                                <div class="ct-item">
                                    <div class="ci-text">
                                        <h5>My Referrer</h5>
                                    </div>
                                    <div class="ci-name">{{ Auth::user()->referrer_name }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="club-tab-content">
                                <div class="ct-item">
                                    <div class="ci-text">
                                        <h5>My Wallet Amount</h5>
                                    </div>
                                    <div class="ci-name">{{ Auth::user()->wallet }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="club-tab-content">

                                @if ($wins->count() > 0)

                                @foreach ($wins as $win)

                                <div class="ct-item">
                                    <div class="card">
                                        <div class="card-body">
                                          {{ $win->history }}
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                                @else

                                <div class="card">
                                    <div class="card-body">
                                      No History Record
                                    </div>
                                </div>

                                @endif

                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-4" role="tabpanel">
                            <div class="club-tab-content">
                                <div class="ct-item">

                                    @if ($withdraws->count() > 0)

                                    @foreach ($withdraws as $withdraw)

                                    <div class="ct-item">
                                        <div class="card">
                                            <div class="card-body">
                                            {{ $withdraw->history }}
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach

                                    @else

                                    <div class="card">
                                        <div class="card-body">
                                        No History Record
                                        </div>
                                    </div>

                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-5" role="tabpanel">
                            <div class="club-tab-content">
                                <div class="ct-item">
                                    <div class="card">
                                        <div class="card-body">
                                          No History Record
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-6" role="tabpanel">
                            <div class="club-tab-content">

                                <div class="card">
                                    <div class="card-body">
                                        @if ($refer->count() <= 0)

                                        Withdraw fine: 0%

                                        @else

                                        Withdraw fine: {{ $refer->request_cut }}

                                        @endif
                                    </div>
                                </div><br>

                                <form action="{{ url('/withdraw-request/'.$refer->request_cut) }}" method="POST">

                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label>Coin Amount</label>
                                        <input type="number" name="wallet" class="form-control @error('wallet') is-invalid @enderror" required="">

                                        @error('wallet')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label>Your Bikash Number</label>
                                        <input type="number" name="bikash_number" class="form-control @error('bikash_number') is-invalid @enderror" required="">

                                        @error('bikash_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success">Request</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Club Section End -->


@endsection



@section('scripts')

@endsection
