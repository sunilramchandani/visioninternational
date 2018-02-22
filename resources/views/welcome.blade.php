@extends('layouts.master') @section('page-css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}"> @stop @include('layouts.navbar') @section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 whole-page">
    @foreach ($featuredimage_home as $featured)

    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="img img-responsive img-rounded header"
        alt="Company Banner">

    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
    <div class="text-inside-header-picture">
        <div class="row dynamic-text-container">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 dynamic-text-container-box">
                <h4 class="text-description"> {{$featured->main_image_description}}</h4>
            </div>
            @endforeach
        </div>
        <div class="row counters">
            <div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 counter-container">
                    <h1 class="counter">2</h1>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 counter-container">
                    <p>
                        <h1 class="counter"> {{ $state_count }} </h1>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 counter-container">
                    <h1 class="counter">{{$company_count}}</h1>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 counter-container">
                    <h1 class="counter">{{$applicant_count}}</h1>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 counter-container-infinity">
                    <img src="{{ URL::asset('image/icons/InfinitySign.png')}}" class="img img-responsive img-rounded infin" id="infin" alt="Company Banner">
                </div>
            </div>
        </div>
        <div class="row counter-label">
            <div class="col-lg-6 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 counter-label-container">
                    <h4 class="labels">Countries</h4>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 counter-label-container">
                    <h4 class="labels">States</h4>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 counter-label-container">
                    <h4 class="labels">Companies</h4>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 counter-label-container">
                    <h4 class="labels">Applicants</h4>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2  counter-container-infinity-label">
                    <h4 class="labels">Opportunities</h4>
                </div>
            </div>
        </div>
        <div class="row link-button">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <a href="www.fb.com" class="btn fblink">#onevision #vip</a>
            </div>
        </div>
    </div>
    <!------------------------- CONTENT ---------------------->
    <div class="container">
        <div class="about row">
            <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 text-center about-font">
                <h1>We believe that...</h1>
                <p>Every Filipino deserves an opportunity to
                    <br>showcase his or her talent to the world.
                </p>
            </div>
        </div>
    </div>

    <!--Picture -->
    @foreach ($featuredimage_home as $featured)
    <div class="container-fluid">
        <div class="row picture-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-pic-container">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="home-pic">
                        <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->sub_image1}}" class="img-rounded img-responsive"
                            alt="Photo">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="home-pic">
                        <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->sub_image2}}" class="img-rounded img-responsive"
                            alt="Photo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="container">
        <div class="commit row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center about-font">
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
                    <img src="{{ URL::asset('image/icons/fastproc.png') }}" alt="Content" id=icon>
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
                    <img src="{{ URL::asset('image/icons/highest.png') }}" alt="Content" id=icon>
                    <p>Highest level
                        <br> of service
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 hidden-lg hidden-md hidden-xl">
                <div class="col-sm-4 col-xs-4 ">
                    <div class="text-center">
                        <img src="{{ URL::asset('image/icons/1.png') }}" alt="Content" id=icon>
                        <p>Unlimited
                            <br> opportunities
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <div class="text-center">
                        <img src="{{ URL::asset('image/icons/2.png') }}" alt="Content" id=icon class="text-center">
                        <p class="text-center">Guaranteed
                            <br> placement and visa
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <div class="text-center">
                        <img src="{{ URL::asset('image/icons/fastproc.png') }}" alt="Content" id=icon>
                        <p>Fast
                            <br> procesing
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 hidden-lg hidden-md hidden-xl">
                <div class="col-sm-4 col-xs-4 ">
                    <div class="text-center">
                        <img src="{{ URL::asset('image/icons/4.png') }}" alt="Content" id=icon>
                        <p>Lowest priced
                            <br> programs
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-4 ">
                    <div class="text-center">
                        <img src="{{ URL::asset('image/icons/highest.png') }}" alt="Content" id=icon>
                        <p>Highest level
                            <br> of service
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-4 ">
                    <div class="text-center">
                        <img src="{{ URL::asset('image/icons/highest.png') }}" alt="Content" id=icon>
                        <p>More Info</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Commitments -->

    <!-- More info button -->
    <div class="container text-center hidden-xs hidden-sm">
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
    <div class="container">
        <div class="container row home-page-events">
            @foreach($events_table as $events)
            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5 events-content">
                <img src="{{$events->cover_source}}" alt="" class="event-img img">

                <h4 class=" details text-center">{{$events->event_name}} </h4>
                <p class="details text-center">
                    <strong>{{Carbon\Carbon::parse($events->start_time)->toFormattedDateString()}} | {{Carbon\Carbon::parse($events->start_time)->format('h:i')}}
                        - {{$events->place_name}}</strong>
                </p>
                <p class="details text-center">{{ \Illuminate\Support\Str::words($events->event_description, 14,' ... ')}}</p>

                <a href="event/{{$events->fbevent_id}}" class="submit btn">
                    <span>More Info</span>
                </a>
            </div>
            @endforeach
            <!--BUTTON WHEN MOBILE -->
            <div class="col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4 show-all-container">
                <a href="" class="show-all btn">
                    <span>Show All</span>
                </a>
            </div>
        </div>
    </div>

    <!--End of Events -->
    @foreach ($featuredimage_home as $featured) @if ($featured->sub_image3_title != Null)
    <!-- Start of Promos -->
    <div class="container text-center">
        <div class="row promos-header">
            <div class="about-font">
                <h1>Promos</h1>
                <p>Get one step closer to your dreams
                    <br>Take advantage of this amazing deal on our programs!
                </p>
            </div>
        </div>
    </div>


    <!-- Promo picture -->

    <div class="container text-center promos">
        <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 hidden-sm hidden-xs promo-pic-container">
            <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->sub_image3}}" class="img img-responsive  promo-pic"
                alt="Company Banner">
        </div>
        <div class="col-lg-4 col-md-4 hidden-sm hidden-xs  promo-desc">
            <div class="upper-content">
                <h4 class="dynamic-promo-title"> {{$featured->sub_image3_title}}</h4>
                <h4 class="dynamic-promo-text">{{$featured->sub_image3_description}}</h4>
                @if ($featured->link == "internship")
                <a href="/internshipcompany" class="btn moreinfo">More Info </a>
                @else
                <a href="/workcompany" class="btn moreinfo">More Info </a>
                @endif
            </div>
            <div class="lower-content">
                <div class="col-lg-8 col-lg-offset-4 col-md-8 col-md-offset-4 col-sm-8 col-sm-offset-4 col-xs-8 col-xs-offset-4 validity-container">
                    <p class="validity-text">Valid Until: {{$featured->sub_image3_validity}}</p>
                </div>
            </div>
        </div>
        <div class="hidden-lg hidden-md hidden-xl col-sm-5 col-xs-5 events-content">
            <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->sub_image3}}" alt="" class="event-img img">

            <h4 class=" details text-center">{{$featured->sub_image3_title}} </h4>
            <p class="details text-center">{{ \Illuminate\Support\Str::words($featured->sub_image3_description, 14,' .... ')}}</p>
            <p class="validity-text">Valid Until: {{$featured->sub_image3_validity}}</p>
        </div>
    </div>
    @endif @endforeach
    <!-- End of Promos -->
    <!-- Start of featured company-->
    <div class="container text-center">
        <div class="row">
            <h1>Featured Companies</h1>
        </div>
    </div>
    <div class="container">
        <div class="container row home-page-events">
            @foreach($internshipcompany_table as $internship)
            <div class="col-md-3 col-xs-5 events-content">
                <img src="{{ URL::asset('image\uploaded_company_image')}}/{{$internship->image}}" alt="" class="event-img img">

                <h4 class=" details text-center">{{$internship->company_name}} </h4>
                <p class="details text-center">{{ \Illuminate\Support\Str::words($internship->description, 17,' ... ')}}</p>
                <a href="/internshipcompany?eid={{$internship->id}}" class="submit btn">
                    <span>More Info</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>






    
    
    <div class="container">
        <div class="row testimony-header">
            <div class="about-font text-center">
                <h1>Our Community</h1>
                <p>We are proud to have an amazing community of students and professionals
                    <br>who have received the VIP treatment. Listen to their stories.
                </p>
            </div>
        </div>
        <div class="row testimony-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id ="carousel-testimony" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 carousel slide " data-ride="carousel">
                    <!-- Indicators -->
                    
                    <ol class="carousel-indicators">
                    @foreach ($testimonials as $testimonial)
                        <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                    @foreach ($testimonials as $testimonial)
                    
                        <div class="item {{ $loop->first ? ' active' : '' }}">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <blockquote>{{$testimonial->dsecription}}
                                <cite>{{$testimonial->last_name}}, {{$testimonial->first_name}}</cite>
                                <cite>{{$testimonial->organization}}</cite>
                                 </blockquote>

                                    <img src="{{ URL::asset('image/uploaded_testimony_image')}}/{{$testimonial->image_testimony}}" class="main-img-reponsive img-responsive "
                                        alt="Company Banner">
                                </div>
                            </div>
                            
                        </div>
                        @endforeach
                        <!-- Controls -->
                <a class="left carousel-control" href="#carousel-testimony" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-testimony" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

                    </div>
                    <!-- end of carousel -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
</div>
@section('script')
<script type="text/javascript">
$('.carousel-testimony').carousel({
    interval: false
});
@endsection
</script>