 @extends('layouts.master') 
 @section('page-css')
    <link rel="stylesheet" href="{{ asset('css/about-us.css') }}">
@stop 

@include('layouts.navbar') 
@section('content')

<div class="whole-page">
@foreach($featuredimage_aboutUs as $featured)
	<img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="img img-responsive img-rounded header">
@endforeach
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img  img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">


    <!-- Text header on top -->
    <div class = "container">
    	<div class = "text-center">
    		<h4> We believe that. . . </h4>
    		<div class = "col-xs-12 col-md-6 col-md-offset-3">
    			<p>We are a dynamic, energetic, and driven team committed to delivering unlimited opportunities to deserving students and prefessionals.</p>
    		</div>
    	</div>
    </div>

    <!--Boxes-->
    <div class = "container box-container">
    		<!--First Box -->
		<div class = "col-xs-12 col-md-4 text-center biggest-box">
			<div class = "col-xs-12 box">
    			 <div class = "col-md-12 col-xs-4 icon-container">
    			 	<img src="{{ URL::asset('image/icons/VIP-Icons-01.png')}}" class="img img-responsive icon center-block" alt="Company Banner">
    			 </div>
                 <div class = "col-md-12 col-xs-8">
        			 <p class="box-title"><strong>Most Trusted Partner</strong></p>
        			 <div class = "col-md-10 col-md-offset-1 col-xs-12 boxes">
        			 	<p>We have a portfolio of prestigious companies, schools and organizations who have chosen to work with us. </p>
        			 </div>
                </div>
    		</div>
		</div>
		<!--Second Box -->
		<div class = "col-xs-12 col-md-4  text-center biggest-box">
			<div class = "col-xs-12 box">
				<div class = "col-md-12 col-xs-4 icon-container">
					<img src="{{ URL::asset('image/icons/VIP-Icons-02.png')}}" class="img img-responsive icon center-block" alt="Company Banner">
				</div>
                <div class = "col-md-12 col-xs-8">
    				 <p class="box-title"><strong>Highest Care and Support</strong></p>
        			 <div class = "col-md-10 col-md-offset-1 col-xs-12 boxes">
        			 	<p>Our service to each participants is world-class. We are committed to providing the support you need every step of the way </p>
        			 </div>
                </div>
			</div>
		</div>
		<!--Third Box -->
		<div class = "col-xs-12 col-md-4  text-center biggest-box">
			<div class = "col-xs-12 box">
				<div class = "col-md-12 col-xs-4 icon-container">
					<img src="{{ URL::asset('image/icons/8.png')}}" class="img img-responsive icon center-block" alt="Company Banner">
				 </div>
                 <div class = "col-md-12 col-xs-8">
    				 <p class="box-title"><strong>Committed and Passionate</strong></p>
        			 <div class = "col-md-10 col-md-offset-1 col-xs-12 boxes">
        			 	<p>Our team is comprised of professionals who have years of experience in their respective industries. Our collective wisdom and background ensure that you will be in good hands. </p>
        			 </div>
                </div>
			</div>
		</div>
    </div>
    <!--end of boxes -->
    <!-- Management -->
     <div class = "container employee-container">
        <!--MANAGEMENT -->
        <div class = "management pads">
            <div class = "col-xs-12">
                <p><strong>Management</strong></p>
            </div>
            <div class = "row">
                <div class = "col-xs-12 whole-employee">
                @foreach($management as $about)
                    <div class = "col-xs-6 col-md-3 show-side"> 
                        <div class = "col-xs-12">
                            <img src="{{ URL::asset('image/uploaded_aboutus_image')}}/{{$about->about_image}}" class="img img-responsive employee" alt="Company Banner"/>
                            <div class = "hidden-md hidden-lg hidden-xl">
                                <h4>{{$about->about_name}}</h4>
                                <p class = "position-hidden">{{$about->about_position}}</p>
                                <p class = "position-hidden"> <i class="fa fa-twitter-square"></i> {{$about->about_twitter}} | <i class="fa fa-linkedin-square" aria-hidden="true"></i> {{$about->about_linkedin}} </p>
                            </div>
                            <div class = "col-md-12 hidden-xs hidden-sm hidden-side text-center">
                                <h4>{{$about->about_name}}</h4>
                                <p class = "position-hidden">{{$about->about_position}}</p>
                                <p class = "position-hidden"> <i class="fa fa-twitter-square"></i> {{$about->about_twitter}} | <i class="fa fa-linkedin-square" aria-hidden="true"></i> {{$about->about_linkedin}} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
        </div>
        <!--OPERATIONS-->
        <div class = "operations pads">
            <div class = "col-xs-12">
                <p><strong>Operations</strong></p>
            </div>
            <div class = "row">
                <div class = "col-xs-12 whole-employee">
                @foreach($operations as $about)
                    <div class = "col-xs-6 col-md-3 show-side"> 
                        <div class = "col-xs-12">
                            <img src="{{ URL::asset('image/uploaded_aboutus_image')}}/{{$about->about_image}}" class="img img-responsive employee" alt="Company Banner"/>
                            <div class = "hidden-md hidden-lg hidden-xl">
                                <h4>{{$about->about_name}}</h4>
                                <p class = "position-hidden">{{$about->about_position}}</p>
                                <p class = "position-hidden"> <i class="fa fa-twitter-square"></i> {{$about->about_twitter}} | <i class="fa fa-linkedin-square" aria-hidden="true"></i> {{$about->about_linkedin}} </p>
                            </div>
                            <div class = "col-md-12 hidden-xs hidden-sm hidden-side text-center">
                                <h4>{{$about->about_name}}</h4>
                                <p class = "position-hidden">{{$about->about_position}}</p>
                                <p class = "position-hidden"> <i class="fa fa-twitter-square"></i> {{$about->about_twitter}} | <i class="fa fa-linkedin-square" aria-hidden="true"></i> {{$about->about_linkedin}} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <!--Marketting-->
        <div class = "operations pads">
            <div class = "col-xs-12">
                <p><strong>Marketting</strong></p>
            </div>
            <div class = "row">
                <div class = "col-xs-12 whole-employee">
                @foreach($marketting as $about)
                    <div class = "col-xs-6 col-md-3 show-side"> 
                        <div class = "col-xs-12">
                            <img src="{{ URL::asset('image/uploaded_aboutus_image')}}/{{$about->about_image}}" class="img img-responsive employee" alt="Company Banner"/>
                           <div class = "hidden-md hidden-lg hidden-xl">
                                <h4>{{$about->about_name}}</h4>
                                <p class = "position-hidden">{{$about->about_position}}</p>
                                <p class = "position-hidden"> <i class="fa fa-twitter-square"></i> {{$about->about_twitter}} | <i class="fa fa-linkedin-square" aria-hidden="true"></i> {{$about->about_linkedin}} </p>
                            </div>
                            <div class = "col-md-12 hidden-xs hidden-sm hidden-side text-center">
                                <h4>{{$about->about_name}}</h4>
                                <p class = "position-hidden">{{$about->about_position}}</p>
                                <p class = "position-hidden"> <i class="fa fa-twitter-square"></i> {{$about->about_twitter}} | <i class="fa fa-linkedin-square" aria-hidden="true"></i> {{$about->about_linkedin}} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <!--end of marketting -->
    </div>
    <!--End of Employees -->
</div>
<div class = "row"></div> 
@section('script')

@endsection
