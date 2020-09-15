@extends('welcome')

@section('title')

    sports

@endsection



@section('content')



<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-form">
                    <h2>Contact Form</h2>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                    <form action="{{ url('/send-message') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="group-in">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="group-in">
                            <label for="email">Your Email</label>
                            <input type="text" name="email" id="email" required>
                        </div>
                        <div class="group-in">
                            <label for="email">Phone (optional)</label>
                            <input type="text" name="phone" id="phone">
                        </div>
                        <div class="group-in">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" required></textarea>
                        </div>
                        <button type="submit">Submit Now</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-info">
                    <h2>Contact Info</h2>
                    <p>Inform us what you want to know and share your valuable suggestions.</p>
                    <div class="ci-address">
                        <h5>Our Office</h5>
                        <ul>
                            <li>T8/480 Collins St, Melbourne VIC 3000, New York</li>
                            <li>1-234-567-89011</li>
                            <li>info.specer@gmail.com </li>
                        </ul>
                    </div>
                    <div class="ci-address">
                        <h5>Australia Office</h5>
                        <ul>
                            <li>Forrest Ray, 191-103 Integer Rd, Corona Australia</li>
                            <li>1-234-567-89011</li>
                            <li>info.bet@gmail.com </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->



@endsection



@section('scripts')

@endsection

