@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/faq.css') }}">
@stop

@include('layouts.navbar')

@section('content')
<div class = "whole-page">
    <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">

    <!-- FAQ header -->
    <div class="container">
        <div class="about row">
            <div class="col-lg-4 col-lg-offset-4 text-center FAQ-font">
                <h3>Frequently Asked Questions </h3>
                <p>We understand that this is a huge step in your life. Read up answers to some of your most pressing questions and concerns</p>
            </div>
        </div>
    </div>

    <!-- VIDEO -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
				<iframe class = "video-class"
				src="https://www.youtube.com/embed/aJYjGsQM6eM" frameborder="0" allowfullscreen>
				</iframe>			
			</div>
		</div>
	</div>

	<!--Internship -->
	<div class="container">
        <div class="row">
            <div class="col-lg-8">
            	<div class = "internship">
            		<h4>Internship</h4>
	            	@foreach ($internship as $internship)
						<div class="panel-group">
						    <div class="panel panel-default bg-nav">
						        <div class="panel-heading bg-nav" >
						            <h5 class="panel-title white">
						                <a  data-toggle="collapse" href="#dash" class = "down{{$internship->faq_id}}"> 
						                   <i class="fa fa-chevron-circle-right white" aria-hidden="true"> {{$internship->question}}</i> 
						                </a>
						            </h5>
						        </div>
						        <div id="dash" class="panel-collapse collapse bg-nav navbar-content">
						            <p>{{$internship->answer}}</p>
						            <hr>
						        </div>    
						    </div>  
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>


</div>
<div class = "row">
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	  $('.down').click(function(){
        if ($(this).find('i').hasClass('fa-chevron-circle-right')){
            $('.down').find('i').removeClass('fa-chevron-circle-right');
    
            $('.down').find('i').addClass('fa-chevron-circle-down');
        }
        else{
            $('.down').find('i').removeClass('fa-chevron-circle-down');
    
            $('.down').find('i').addClass('fa-chevron-circle-right');
        }
});
</script>

