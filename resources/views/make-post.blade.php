@extends('welcome')

@section('title')

    homes

@endsection



@section('content')


<!-- Make Post Section Begin -->
<section class="schedule-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-blog-pad">
                <div class="schedule-sidebar">
                    <div class="ss-widget">
                        <div class="section-title sidebar-title">
                            <h5>Post Making Section</h5>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                        </div>

                        <form action="{{ url('save-post/'.$id.'/'.$team) }}" method="POST">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea3">Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea3" rows="7" required=""></textarea>
                            </div>

                            <div class="form-group">
                                <label>Bid Amount</label>
                                <input type="integer" name="price" class="form-control @error('price') is-invalid @enderror" required="">
                            </div>

                            <button type="submit" class="btn btn-success">Place a Bid Post</button>

                        </form>

                    </div>
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
