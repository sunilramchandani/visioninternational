@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<div class = "col-lg-12 whole-page">
@foreach ($featuredimage_home as $featured)
    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->header}}" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
    <div class = "text-inside-header-picture">
        <div class = "row dynamic-text-container">
            <div class ="col-lg-6 dynamic-text-container-box">
            
                <h4 class = "dynamic-text"> {{$featured->description}}</h4>
            </div>
            @endforeach
        </div>
        <div class = "row counters">
            <div class ="col-lg-6">
                <div class = "col-lg-2 counter-container">
                    <h1 class = "counter text-center">2</h1>
                </div>
                <div class = "col-lg-2 counter-container">
                     <p><h1 class = "counter text-center"> {{ $state_count }} </h1>  
                </div>
                <div class = "col-lg-2 counter-container">
                    <h1 class = "counter text-center">{{$company_count}}</h1>
                </div>
                <div class = "col-lg-2 counter-container">
                     <h1 class = "counter text-center">{{$applicant_count}}</h1>
                </div>
                <div class = "col-lg-2 counter-container-infinity">
                    <img src="{{ URL::asset('image/icons/InfinitySign.png')}}" class="img img-responsive img-rounded" alt="Company Banner">
                </div>
            </div>
        </div>
        <div class = "row counter-label">
            <div class ="col-lg-6">
                <div class = "col-lg-2 counter-label-container">
                    <h4 class = "labels">Countries</h4>
                </div>
                <div class = "col-lg-2 counter-label-container">
                     <h4 class = "labels">States</h4>
                </div>
                <div class = "col-lg-2 counter-label-container">
                    <h4 class = "labels">Companies</h4>
                </div> 
                <div class = "col-lg-2 counter-label-container">
                     <h4 class = "labels">Applicants</h4>
                </div>
                <div class = "col-lg-2 counter-container-infinity-label">
                    <h4 class = "labels">Opportunities</h4>
                </div>
            </div>
        </div>
        <div class = "row link-button">
            <div class = "col-lg-3">
                <a href = "www.fb.com" class = "btn fblink">#onevision #vip</a>
            </div>
        </div>
    </div>
    <!------------------------- CONTENT ---------------------->
      <div class="container">
        <div class="about row">
            <div class="col-lg-12 text-center about-font">
                <h1>We believe that...</h1>
                <p>Every Filipino deserves an opportunity to
                    <br>showcase his or her talent to the world.
                </p>
            </div>
        </div>
    </div>

    <!--Picture -->
    <div class="container-fluid">
     <div class="row">
        <div class="col-lg-12 home-pic-container">
          <div class="col-lg-6">
            <div class="home-pic">
                <img src="{{URL::asset('image/home-left.png') }}" class="img-rounded img-responsive" alt="Photo" >
            </div>
         </div>
        <div class="col-lg-6">
            <div class="home-pic">
                <img src="{{URL::asset('image/home-right.png') }}" class="img-rounded img-responsive" alt="Photo" >
            </div>
        </div>
        </div>
    </div>
</div>
    <div class="container">
    <div class="about row">
        <div class="col-lg-12 text-center about-font">
            <h1>Our Commitments</h1>
        </div>
    </div>
</div>

<!--Commitments -->
<div class="text-center">
    <div class="row" id=p-commit>
        <div class="col-lg-12">
            <div class="icon-container">
                <img src="{{ URL::asset('image/icons/1.png') }}" alt="Content" id=icon>
                <p>Unlimited
                    <br> opportunities
                </p>
            </div>
            <div class="icon-container">
                <img src="{{ URL::asset('image/icons/2.png') }}" alt="Content" id=icon>
                <p>Guaranteed
                    <br> placement and visa
                </p>
            </div>
            <div class="icon-container">
                <img src="{{ URL::asset('image/icons/1.png') }}" alt="Content" id=icon>
                <p>Fast
                    <br> procesing
                </p>
            </div>
            <div class="icon-container">
                <img src="{{ URL::asset('image/icons/4.png') }}" alt="Content" id=icon>
                <p>Lowest priced
                    <br> programs
                </p>
            </div>
            <div class="icon-container">
                <img src="{{ URL::asset('image/icons/1.png') }}" alt="Content" id=icon>
                <p>Highest level
                    <br> of service
                </p>
            </div>
        </div>
    </div>
</div>

<!-- End Commitments -->

<!-- More info button -->
<div class="container text-center">
    <div class="row">
        <a href="#" class="btn btn-lg moreinfo-btn">More info</a>
    </div>
</div>
<!-- end -->


<!--Start of Events -->
<div class="container text-center">
    <div class="row">
        <h1>Events</h1>
    </div>
</div>


<!--End of Events -->

<!-- Start of Promos -->
<div class="container text-center">
    <div class="row">
        <div class="about-font">
           <h1>Promos</h1>
           <p>Get one step closer to your dreams
            <br>Take advantage of this amazing deal on our programs!
        </p>
    </div>
</div>
</div>


<!-- Promo picture -->
<div class="container text-center">
    <div class="col-lg-12">
        <img src="{{ URL::asset('image/photos/APPLICATION.jpg') }}" alt="Promo Picture" class="img-responsive img-rounded" id=promo-pict>
    </div>
</div>
<!-- End of Promos -->

<div class="container">
    <div class="row">
        <div class="about-font text-center">
             <h1>Our Community</h1>
             <p>We are proud to have an amazing community of students and professionals
                <br>who have received the VIP treatment. Listen to their stories.
            </p>
        </div>
    </div>
</div>
<div class = "row">
</div>

