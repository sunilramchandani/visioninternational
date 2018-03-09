@extends('layouts.master') @section('page-css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}"> @stop @include('layouts.navbar') @section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 whole-page">

    @foreach ($featuredimage_home as $featured)

    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="header"
        alt="Company Banner">

    <img src="{{ URL::asset('image/Arrow.png')}}" class="img  img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
    <div class="text-inside-header-picture next">
        <div class="row dynamic-text-container">
            <div class="col-xs-12 col-md-6 dynamic-text-container-box">
                <h4 class="text-description"> {{$featured->main_image_description}}</h4>
            </div>
            @endforeach
        </div>
        <div class="row counters">
            <div class="col-md-6 col-md-offset-0 col-xs-11 col-xs-offset-1" style="padding:0;">
                @foreach ($counter as $counters)
                <div class="col-xs-2 counter-container">
                    <h1 class="counter">{{ $counters->country}}</h1>
                </div>
                <div class="col-xs-2 counter-container">
                    <p>
                        <h1 class="counter"> {{ $counters->state }} </h1>
                </div>
                <div class="col-xs-2 counter-container">
                    <h1 class="counter">{{$counters->company}}</h1>
                </div>
                <div class="col-xs-2 counter-container">
                    <h1 class="counter">{{$counters->applicant}}</h1>
                </div>
                <div class="col-xs-2 counter-container-infinity">
                    <img src="{{ URL::asset('image/icons/InfinitySign.png')}}" class="img  img-rounded infin" id="infin" alt="Company Banner">
                </div>
                @endforeach
            </div>
        </div>
        <div class="row counter-label">
            <div class="col-md-6 col-md-offset-0 col-xs-11 col-xs-offset-1" style="padding:0;">
                <div class="col-xs-2 counter-label-container">
                    <h4 class="labels">Countries</h4>
                </div>
                <div class="col-xs-2 counter-label-container">
                    <h4 class="labels">States</h4>
                </div>
                <div class="col-xs-2 counter-label-container">
                    <h4 class="labels">Companies</h4>
                </div>
                <div class="col-xs-2 counter-label-container">
                    <h4 class="labels">Applicants</h4>
                </div>
                <div class="col-xs-2  counter-container-infinity-label">
                    <h4 class="labels">Opportunities</h4>
                </div>
            </div>
        </div>
        <div class="row link-button">
            <div class="col-xs-3 col-sm-offset-4 col-md-offset-0">
                <a href="https://www.facebook.com/visionphil/" class="btn fblink">#onevision #vip</a>
            </div>
        </div>
    </div>
    <!------------------------- CONTENT ---------------------->
    <div class="container next">
        <div class="about row">
            <div class="col-md-4 col-md-offset-4 col-xs-12 text-center about-font">
                <h1>We believe that...</h1>
                <p>Every Filipino deserves an opportunity to showcase his or her talent to the world.</p>
            </div>
        </div>
    </div>

    <!--Picture -->
    @foreach ($featuredimage_home as $featured)
    <div class="container next">
        <div class="row picture-header">
            <div class="col-md-6 col-xs-6">
                <div class="home-pic">
                    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->sub_image1}}" class="img-rounded img-responsive sub-img"
                        alt="Photo">
                </div>
            </div>
            <div class="col-md-6 col-xs-6">
                <div class="home-pic">
                    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->sub_image2}}" class="img-rounded img-responsive sub-img"
                        alt="Photo">
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="container next">
        <div class="commit row">
            <div class="col-xs-12 text-center commitment-font">
                <h1>Our Commitments</h1>
            </div>
        </div>
    </div>

    <!--Commitments -->
     <div class="text-center">
        <div class="row" id=p-commit>
            <div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
                <div class="icon-container">
                    <img src="{{ URL::asset('image/icons/1.png') }}" alt="Content" id=icon>
                    <p>Unlimited
                        <br> Opportunities
                    </p>
                </div>
                <div class="icon-container">
                    <img src="{{ URL::asset('image/icons/2.png') }}" alt="Content" id=icon>
                    <p>Guaranteed
                        <br> Placement and Visa
                    </p>
                </div>
                <div class="icon-container">
                    <img src="{{ URL::asset('image/icons/Fast Processing-01.png') }}" alt="Content" id=icon>
                    <p>Fast
                        <br> Processing
                    </p>
                </div>
                <div class="icon-container">
                    <img src="{{ URL::asset('image/icons/4.png') }}" alt="Content" id=icon>
                    <p>Lowest Priced
                        <br> Programs
                    </p>
                </div>
                <div class="icon-container">
                    <img src="{{ URL::asset('image/icons/Highest Level-01.png') }}" alt="Content" id=icon>
                    <p>Highest Level
                        <br> of Service
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 hidden-lg hidden-md hidden-xl">
                <div class="col-sm-4 col-xs-4 ">
                    <div class="text-center">
                        <img src="{{ URL::asset('image/icons/1.png') }}" alt="Content" id=icon>
                        <p>Unlimited
                            <br> Opportunities
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <div class="text-center">
                        <img src="{{ URL::asset('image/icons/2.png') }}" alt="Content" id=icon class="text-center">
                        <p class="text-center">Guaranteed
                        <br> Placement and Visa
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <div class="text-center">
                        <img src="{{ URL::asset('image/icons/Fast Processing-01.png') }}" alt="Content" id=icon>
                        <p>FAST
                        <br> Processing
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 hidden-lg hidden-md hidden-xl">
                <div class="col-sm-4 col-xs-4 ">
                    <div class="text-center">
                        <img src="{{ URL::asset('image/icons/4.png') }}" alt="Content" id=icon>
                        <p>Lowest Priced
                        <br> Programs
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-4 ">
                    <div class="text-center">
                        <img src="{{ URL::asset('image/icons/Highest Level-01.png') }}" alt="Content" id=icon>
                        <p>Highest Level
                        <br> of Service
                        </p>
                    </div>
                </div>
                <a href = "/faq">
                    <div class="col-sm-4 col-xs-4 ">
                        <div class="text-center">
                            <img src="{{ URL::asset('image/icons/more-info.png') }}" alt="Content" id=more-info>
                            <p>MORE INFO</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- End Commitments -->

    <!-- More info button -->
    <div class="container text-center hidden-xs hidden-sm">
        <div class="row">
            <a href="/faq" class="btn btn-lg moreinfo-btn">More info</a>
        </div>
    </div>
    <!-- end -->


    <!--Start of Events -->
    <div class="container text-center">
        <div class="row event-font">
            <h1>Events</h1>
        </div>
    </div>
    <div class="container">
        <div class="row home-page-events next">
            @foreach($events_table as $events)
            <div class="col-md-3 col-xs-6 ">
                <div class = "col-xs-12 events-content">
                    <img src="{{$events->cover_source}}" alt="" class="event-img img">

                    <h4 class=" details text-center">{{$events->event_name}} </h4>
                    <p class="details text-center">
                        <strong>{{Carbon\Carbon::parse($events->start_time)->toFormattedDateString()}} | {{Carbon\Carbon::parse($events->start_time)->format('h:i')}}
                            - {{$events->place_name}}</strong>
                    </p>
                    <p class="details text-center">{{ \Illuminate\Support\Str::words($events->event_description, 14,' ... ')}}</p>

                    <a href="single_event/{{$events->fbevent_id}}" class="submit btn">
                        <span>More Info</span>
                    </a>
                </div>
            </div>
            @endforeach
            <!--BUTTON WHEN MOBILE -->
            <div class="col-xs-4 col-xs-offset-4 show-all-container">
                <a href="" class="show-all btn">
                    <span>Show All</span>
                </a>
            </div>
        </div>
    </div>

    <!--End of Events -->

    <!--featured company -->
    <div class="container text-center ">
        <div class="row promos-header">
            <div class="about-font">
                <h1>Featured Properties</h1>
            </div>
        </div>
    </div>
      <div class="row next">
        <div id ="carousel-featured" class="col-md-12 hidden-xs hidde-sm carousel slide " data-ride="carousel">
            <!-- Indicators -->
            
            <ol class="carousel-indicators">
            @foreach($internshipcompany_table as $internship)
                <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach($internshipcompany_table as $internship)
                <div class="item {{ $loop->first ? ' active' : '' }}">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container text-center promos">    
                                <div class="col-md-6 col-md-offset-1 hidden-xs hidden-sm hidden-xs promo-pic-container">
                                    <img src="{{ URL::asset('image/uploaded_company_image')}}/{{$internship->image}}" class="img img-responsive  promo-pic"
                                        alt="Company Banner">
                                </div>
                                <div class="col-md-4 hidden-sm hidden-xs  promo-desc">
                                    <div class="upper-content">
                                        <h3 class="dynamic-promo-title"> {{$internship->company_name}}</h3>
                                        <p class="dynamic-promo-text">{{$internship->description}}</p>
                                        <a href="/internshipcompany?eid={{$internship->id}}" class="submit btn featured-btn">More Info</a>
                                    </div>
                                    <div class="lower-content col-md-12">
                                        <div class="col-md-12 validity-container">
                                        <p class="validity-text">Share this property:                                                
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl(). '/internshipcompany?eid='. $internship->id ) }}" target="_blank">
                                               <i class="fa fa-facebook-f " style="font-size:14px; padding-right:1%; color:white;"></i>
                                             </a>
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl().'/internshipcompany?eid='. $internship->id )}}" target="_blank">
                                                <i class="fa fa-twitter " style="font-size:14px; padding-right:1%; color:white;"></i>
                                            </a>
                                            <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl().'/internshipcompany?eid='. $internship->id) }}" target="_blank">
                                                <i class="fa fa-google-plus " style="font-size:14px; color:white;"></i>
                                            </a>
                            
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>  
                </div>
                @endforeach
                @if ($internshipcompany_table->count() != 1)
                <!-- Controls -->
                <a class="left carousel-control hidden-xs hidden-sm" href="#carousel-featured" role="button" data-slide="prev" style="background: none !important; color:black;">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control hidden-xs hidden-sm" href="#carousel-featured" role="button" data-slide="next"style="background: none !important; color:black;">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
                @endif

            </div>
            <!-- end of carousel -->
        </div>
        <div class = "container">
             @foreach($internshipcompany_table as $internship)
            <div class="hidden-md hidden-lg col-xs-12 ">
                <div class = "col-xs-12 events-content mobile-featured">
                    <img src="{{ URL::asset('image/uploaded_company_image')}}/{{$internship->image}}" alt="" class="event-img img">

                    <h4 class=" details text-center">{{$internship->company_name}} </h4>
                    <p class="details text-center">{{$internship->description}}</p>
                    <p class="details text-center"> Share
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl(). '/internshipcompany?eid='. $internship->id ) }}" target="_blank">
                           <i class="fa fa-facebook-f " style="font-size:14px; padding-right:1%; color:black;"></i>
                         </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl().'/internshipcompany?eid='. $internship->id )}}" target="_blank">
                            <i class="fa fa-twitter " style="font-size:14px; padding-right:1%; color:black;"></i>
                        </a>
                        <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl().'/internshipcompany?eid='. $internship->id) }}" target="_blank">
                            <i class="fa fa-google-plus " style="font-size:14px; color:black;"></i>
                        </a>
                    </p>
                </div>
            </div>
             @endforeach
        </div>
    </div>
    <!-- end of Featured --> 



    @foreach ($featuredimage_home as $featured) @if ($featured->sub_image3_title != Null)
    <!-- Start of Promos -->
    <div class="container text-center">
        <div class="row promos-header">
            <div class="promo-font">
                <h1>Promos</h1>
                <p>Get one step closer to your dreams.
                    <br>Take advantage of this amazing deal on our programs!
                </p>
            </div>
        </div>
    </div>

    <!-- Promo picture -->
    <div class="text-center promos next">
        <div class="col-md-6 col-md-offset-1 hidden-sm hidden-xs promo-pic-container">
            <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->sub_image3}}" class="img img-responsive  promo-pic"
                alt="Company Banner">
        </div>
        <div class="col-md-4 hidden-sm hidden-xs  promo-desc">
            <div class="upper-content">
                <h3 class="dynamic-promo-title"> {{$featured->sub_image3_title}}</h3>
                <p class="dynamic-promo-text">{{$featured->sub_image3_description}}</p>
                @if ($featured->link == "internship")
                <a href="/internshipcompany" class="btn moreinfo">More Info </a>
                @else
                <a href="/workcompany" class="btn moreinfo">More Info </a>
                @endif
            </div>
            <div class="lower-content col-md-11">
                <div class="col-md-8 col-md-offset-4 col-xs-8 col-xs-offset-4 validity-container">
                    <p class="validity-text">Valid Until: {{$featured->sub_image3_validity}}</p>
                </div>
            </div>
        </div>
        <div class="hidden-lg hidden-md hidden-xl col-xs-12 ">
            <div class = "col-xs-12 events-content mobile-featured">
                <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->sub_image3}}" alt="" class="event-img img">

                <h4 class=" details text-center">{{$featured->sub_image3_title}} </h4>
                <p class="details text-center">{{$featured->sub_image3_description}}</p>
                <p class="validity-text">Valid Until: {{$featured->sub_image3_validity}}</p>
            </div>
        </div>
    </div>
    @endif @endforeach
    <!-- End of Promos -->

 
    <!--testimony-->
        <div class="container next">
            <div class="row testimony-header">
                <div class=" col-xs-12 col-md-8 col-md-offset-2 about-font text-center">
                     <h3>Our Community</h3>
                     <p> We are proud to have an amazing community of students and professionals who have received the VIP treatment. Listen to their stories.</p>
                </div>
            </div>
            <div class = "row testimony-content">
                <div class = "col-xs-8 testimony-description">
                    <blockquote>
                        This program is one of the challenging experiences, joyful events, and new things that ii've learned and molded me to become a better person
                        <cite>Karissa Marie Salengua</cite>
                        <cite>Work & Travel Program, California</cite>
                    </blockquote>
                </div>
                <div class = "col-xs-4">
                     <img src="{{ URL::asset('image/uploaded_featured_image')}}/joy.png" class="img img-responsive img-rounded testimony-picture" alt="Company Banner"/>
                </div>
            </div>
        </div>
</div>

<div class="row">
</div>
@section('script')

<script type="text/javascript">
$('.carousel-featured').carousel({
    interval: false
});
$(function() {
  $.scrollify({
    section : ".next",
  });
});

 
 $.scrollify({
    section : "section",
    sectionName : "section-name",
    interstitialSection : "",
    easing: "easeOutExpo",
    scrollSpeed: 1100,
    offset : 0,
    scrollbars: true,
    standardScrollElements: "",
    setHeights: true,
    overflowScroll: true,
    updateHash: true,
    touchScroll:true,
    before:function() {},
    after:function() {},
    afterResize:function() {},
    afterRender:function() {}
  });

@endsection
</script>