@extends('welcome')

@section('title')

    sports

@endsection



@section('content')


<!-- Sport Section Begin -->
<section class="schedule-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 left-blog-pad">
                <div class="schedule-text">
                    <h4 class="st-title">You Bid history For This Post</h4>
                    <div class="st-table">
                        <table>
                            <tbody>

                                <tr>

                                    <tr>
                                        <div class='card'>
                                            <div class='card-header text-white bg-danger'>
                                                Sorry ! Not available now!
                                            </div>
                                        </div>
                                    </tr>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="schedule-sidebar">
                    <div class="ss-widget">
                        <div class="section-title sidebar-title">
                            <h5>This Section Post Blogs</h5>
                        </div>

                        <div class="card">
                            <h5 class="card-header text-white bg-danger">This Section is not available at this moment</h5>
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text"></p>
                                </div>
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
