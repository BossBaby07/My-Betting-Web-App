@extends('welcome')

@section('title')

    place bid

@endsection



@section('content')



<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-form">
                    <h2>Bid Place Form</h2>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                    <form action="{{ url('save-bid/'.$id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="group-in">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" required></textarea>
                        </div>
                        <div class="group-in">
                            <label for="email">Bid Amount</label>
                            <input type="number" name="bid_amount" id="email" required>
                        </div>
                        <div class="group-in">
                            <label for="email">Phone (optional)</label>
                            <input type="text" name="phone" id="phone">
                        </div>
                        <button type="submit">Place Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->



@endsection



@section('scripts')

@endsection

