<link rel="stylesheet" href="{{ asset('css/prefooter.css') }}">

<div class = "prefooter">
    <div class = "row bg-color">
        <div class = "top-prefooter-content-2 text-center">
            <p class = "banner-paragraph">Start an amazing future with us! </p> 
        </div>     
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif @if(Session::has('ok'))
        <div class="alert alert-info">
            {{Session::get('ok')}}
        </div>
        @endif


    <div class = "row bottom-prefooter-content text-center"> 
        <form action="{{route('subscribe.store')}}" method="post" role="form">
        {{csrf_field()}}
        <p class = "subscribe-paragraph">Get the latest updates and news: </p>
        <input type = "email" class = "input-email-subscribe text-center" name = "email" placeholder="Enter your email address">
        <button type="submit" class = "btn subscribe-button"><i class="fa fa-2x fa-angle-right" aria-hidden="true"></i></button>
        </form>
    </div>
</div>