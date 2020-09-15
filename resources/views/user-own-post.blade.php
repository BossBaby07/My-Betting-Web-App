@extends('welcome')

@section('title')

    user posts

@endsection



@section('content')


<!-- Sport Section Begin -->
<section class="schedule-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 left-blog-pad">
                <div class="schedule-text">
                    <h4 class="st-title">My Created Posts</h4>
                    <div class="st-table">
                        <table>
                            <tbody>

                                <tr>

                                    @if ($posts->count() > 0)

                                            @foreach ($posts as $post)

                                                <div class="card">
                                                    <h5 class="card-header text-white bg-primary">Primary Price: {{ $post->price }}</h5>
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $post->title }}</h5>
                                                            <p class="card-text">{{ $post->description }}</p>
                                                            <a href="{{ URL::to('place-bid/'.$post->id.'/') }}" class="btn btn-success">View Details</a>
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
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sport Section End -->

@endsection



@section('scripts')

@endsection
