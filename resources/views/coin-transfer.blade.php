@extends('welcome')

@section('title')

    coin transfer

@endsection



@section('content')


<!-- Sport Section Begin -->
<section class="schedule-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-blog-pad">
                <div class="schedule-text">
                    <h4 class="st-title">Money Transfer Posts</h4>
                    <div class="st-table">
                        <table>
                            <tbody>


                                    @if ($coins->count() < 0)

                                        @foreach ($coins as $coin)

                                        <tr>

                                        <div class="card text-center">
                                            <div class="card-header text-white bg-primary">
                                              Sell Amount {{ $coin->t_amount }}
                                            </div>
                                            <div class="card-body">
                                              <h5 class="card-title">Seller Name : {{ $coin->name }}</h5>
                                              <p class="card-text">
                                                  Seller User Name: {{ $coin->user_name }} <br>
                                                  Seller Email: {{ $coin->email }}
                                                </p>
                                            </div>
                                            <div class="card-footer text-muted">
                                              Seller Phone Number: {{ $coin->phone }}
                                            </div>
                                        </div>

                                        </tr>

                                        @endforeach

                                    @else

                                    Sorry ! No Sell Post Posted Yet !

                                    @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 btn-outline-success">

                <div class="schedule-sidebar">
                    <div class="ss-widget">
                        <div class="section-title sidebar-title">
                            <h5>Money Transfer Box</h5>
                        </div>

                        @if (session('c_status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('c_status') }}
                                </div>
                        @endif

                        <form action="{{ url('/money-transfer') }}" method="POST">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label> Money Receiver User Name</label>
                                <input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" required="">
                            </div>

                            <div class="form-group">
                                <label>Amount of Money</label>
                                <input type="number" name="wallet" class="form-control @error('wallet') is-invalid @enderror" required="">

                                    @error('wallet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>

                            <button type="submit" class="btn btn-warning">Send Money</button>

                        </form>

                    </div>
                </div>

                <div class="schedule-sidebar">
                    <div class="ss-widget">
                        <div class="section-title sidebar-title">
                            <h5>Money Sell Post Form</h5>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                        </div>

                        <form action="{{ url('/coin-post') }}" method="POST">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleFormControlTextarea3">Comments</label>
                                <textarea class="form-control" name="message" id="exampleFormControlTextarea3" rows="7" required=""></textarea>
                            </div>

                            <div class="form-group">
                                <label>Amount of Money</label>
                                <input type="number" name="t_amount" class="form-control @error('t_amount') is-invalid @enderror" required="">

                                    @error('t_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>

                            <div class="form-group">
                                <label>Your Phone Number</label>
                                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" required="">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>

                            <button type="submit" class="btn btn-dark">Make Sell Post</button>

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
