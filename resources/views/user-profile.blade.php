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

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link text-dark active" id="home-tab" data-toggle="tab" href="#my-info" role="tab" aria-controls="home" aria-selected="true">My Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" id="profile-tab" data-toggle="tab" href="#my-wallet" role="tab" aria-controls="profile" aria-selected="false">My Wallet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" id="messages-tab" data-toggle="tab" href="#win-history" role="tab" aria-controls="messages" aria-selected="false">Win History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" id="settings-tab" data-toggle="tab" href="#withdraw" role="tab" aria-controls="settings" aria-selected="false">Withdraw History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" id="settings-tab" data-toggle="tab" href="#request" role="tab" aria-controls="settings" aria-selected="false">Withdraw Request</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">

            <!------ My Information ------------>
            <div class="tab-pane active" id="my-info" role="tabpanel" aria-labelledby="home-tab">

                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                      <h5 class="card-title text-primary">Full Name</h5>
                      <p class="card-text">{{ Auth::user()->name }}</p>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title text-primary">Email</h5>
                        <p class="card-text">{{ Auth::user()->email }}</p>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title text-primary">User Name</h5>
                        <p class="card-text">{{ Auth::user()->user_name }}</p>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title text-primary">My Refer Code/Name</h5>
                        <p class="card-text">{{ Auth::user()->user_name }}</p>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title text-primary">Phone</h5>
                        <p class="card-text">Not given</p>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title text-primary">My Referrer User Name</h5>
                        <p class="card-text">{{ Auth::user()->referrer_name }}</p>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title text-primary">Full Name</h5>
                        <p class="card-text">{{ Auth::user()->name }}</p>
                    </div>

                  </div>

            </div>

            <!------ My Information ------------>
            <div class="tab-pane" id="my-wallet" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <h5 class="card-title text-primary">My Wallet Amount</h5>
                            <p class="card-text">{{ Auth::user()->wallet }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!------ My Win History ------------>
            <div class="tab-pane" id="win-history" role="tabpanel" aria-labelledby="messages-tab">

                <div class="card">
                    <div class="card-head">
                    </div>
                </div>

                <table class="table">

                    @if ($wins->count() > 0)

                        @foreach ($wins as $win)

                            <tbody>
                                <tr>
                                <td>
                                    <p class="card-text">{{ $win->history }}</p>
                                </td>
                                <th scope="row">date: {{ $win->created_at }}</th>
                                </tr>
                            </tbody>

                        @endforeach

                    @else

                        <div class="card">
                            <div class="card-body">
                            No History Record
                            </div>
                        </div>

                    @endif

                </table>

            </div>

            <!------ My Withdraw History ------------>
            <div class="tab-pane" id="withdraw" role="tabpanel" aria-labelledby="settings-tab">

                <div class="card">
                    <div class="card-head">
                    </div>
                </div>

                <table class="table">

                    @if ($withdraws->count() > 0)

                        @foreach ($withdraws as $withdraw)

                            <tbody>
                                <tr>
                                <td>
                                    <p class="card-text">{{ $withdraw->history }}</p>
                                </td>
                                <th scope="row">date: {{ $withdraw->created_at }}</th>
                                </tr>
                            </tbody>

                        @endforeach

                    @else

                        <div class="card">
                            <div class="card-body">
                            No History Record
                            </div>
                        </div>

                    @endif

                </table>

            </div>

            <!------ My Withdraw Request ------------>
            <div class="tab-pane" id="request" role="tabpanel" aria-labelledby="settings-tab">

                <div class="card">
                    <div class="card-head">

                    </div>
                </div>

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
                        <label>Money Amount</label>
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
</section>
<!-- Club Section End -->


@endsection



@section('scripts')

@endsection
