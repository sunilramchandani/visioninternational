<link rel="stylesheet" href="{{ asset('css/prefooter.css') }}">

<div class = "prefooter">
    <div class = "row bg-color">
        <div class = "top-prefooter-content text-center">
            <p class = "banner-paragraph">Start an amazing future with us! </p> 
            <a class = "btn applynow-button" href = "#"> Apply Now</a>
        </div>
    </div>
    <div class = "row bottom-prefooter-content text-center">
        <p class = "subscribe-paragraph">Get the latest updates and news: </p>
        <form action="{{route('subscribe.store')}}" method="post" role="form">
        {{csrf_field()}}
        <input type = "email" class = "input-email-subscribe text-center" name = "subscribe-email" placeholder="Enter your email address">
        <button type="submit" class = "btn subscribe-button"><i class="fa fa-2x fa-angle-right" aria-hidden="true"></i></button>
        </form>
    </div>
</div>