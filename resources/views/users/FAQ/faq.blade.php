@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/faq.css') }}">
@stop

@include('layouts.navbar')

@section('content')
<div class = "whole-page">
    <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">

    <!-- FAQ header -->
    <div class="container">
        <div class="about row">
            <div class="col-xs-12 col-md-offset-4 col-md-4 text-center FAQ-font">
                <h3>Frequently Asked Questions </h3>
                <p>We understand that this is a huge step in your life. Read up answers to some of your most pressing questions and concerns</p>
            </div>
        </div>
    </div>

   

	
	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
            	<!-- VIDEO -->
        	    <div class="row">
		            <div class="video-div">
						<iframe class = "video-class"
						src="https://www.youtube.com/embed/aJYjGsQM6eM" frameborder="0" allowfullscreen>
						</iframe>			
					</div>
				</div>
            	<!--Internship -->
            	<div class = "internship">
            		<h4 class = "faq-header">Internship</h4>
	            	@foreach ($internship as $internship)
						<div class="panel-group">
						    <div class="panel panel-default bg-nav">
						        <div class="panel-heading bg-nav" >
						            <h5 class="panel-title white">
						                <a  data-toggle="collapse" href="#dash{{$internship->faq_id}}" class = "down{{$internship->faq_id}}"> 
						                   <p><i class="fa fa-angle-right red" aria-hidden="true"></i> {!!$internship->question!!}</p>
						                </a>
						            </h5>
						        </div>
						        <div id="dash{{$internship->faq_id}}" class="panel-collapse collapse bg-nav navbar-content">
						            <p>{!!$internship->answer!!}</p>
						        </div>    
						    </div>  
						</div>
					@endforeach
				</div>
				<!--Spring -->
				<div class = "spring">
            		<h4 class = "faq-header">Spring Work & Travel</h4>
	            	@foreach ($spring as $spring)
						<div class="panel-group">
						    <div class="panel panel-default bg-nav">
						        <div class="panel-heading bg-nav" >
						            <h5 class="panel-title white">
						                <a  data-toggle="collapse" href="#dash{{$spring->faq_id}}" class = "down{{$spring->faq_id}}"> 
						                   <p><i class="fa fa-angle-right red" aria-hidden="true"></i> {!!$spring->question!!}</p>
						                </a>
						            </h5>
						        </div>
						        <div id="dash{{$spring->faq_id}}" class="panel-collapse collapse bg-nav navbar-content">
						            <p>{!!$spring->answer!!}</p>
						        </div>    
						    </div>  
						</div>
					@endforeach
				</div>
				<!--Summer -->
				<div class = "summer">
            		<h4 class = "faq-header">Summer Work & Travel</h4>
	            	@foreach ($summer as $summer)
						<div class="panel-group">
						    <div class="panel panel-default bg-nav">
						        <div class="panel-heading bg-nav" >
						            <h5 class="panel-title white">
						                <a  data-toggle="collapse" href="#dash{{$summer->faq_id}}" class = "down{{$summer->faq_id}}"> 
						                   <p><i class="fa fa-angle-right red" aria-hidden="true"></i>  {{$summer->question}}</p>
						                </a>
						            </h5>
						        </div>
						        <div id="dash{{$summer->faq_id}}" class="panel-collapse collapse bg-nav navbar-content">
						            <p>{!!$summer->answer!!}</p>
						        </div>    
						    </div>  
						</div>
					@endforeach
				</div>
				<!--aupair -->
				<div class = "aupair">
            		<h4 class = "faq-header">Au Pair</h4>
	            	@foreach ($aupair as $aupair)
						<div class="panel-group">
						    <div class="panel panel-default bg-nav">
						        <div class="panel-heading bg-nav" >
						            <h5 class="panel-title white">
						                <a  data-toggle="collapse" href="#dash{{$aupair->faq_id}}" class = "down{{$aupair->faq_id}}"> 
						                    <p><i class="fa fa-angle-right red" aria-hidden="true"></i> {{$aupair->question}}</p>
						                </a>
						            </h5>
						        </div>
						        <div id="dash{{$aupair->faq_id}}" class="panel-collapse collapse bg-nav navbar-content">
						            <p>{!!$aupair->answer!!}</p>
						        </div>    
						    </div>  
						</div>
					@endforeach
				</div>
			</div>
			<!--FILTER -->
		    <div class = "hidden-xs hidden-sm col-md-4 categories-sidebar">
		    	<div class = "col-xs-12">
		        <table class="table table-categories table-borderless table-hover">
		          <thead bgcolor="#800000">
		            <tr>
		              <th class = "header-table text-center">CATEGORIES</th>
		              <th class = "header-table text-center"></th>
		            </tr>
		          </thead>
		          <tbody>
		          	@foreach ($faq_types as $faq_type)
		            <tr class='clickable-row' data-href='fb?ecat=General'>
		              <td>{{$faq_type}}</td>
		              @if ($faq_type == "Internship")
		              	<td>(16)</td>
		              @endif
		              @if ($faq_type == "Summer Work & Travel")
		              	<td>(9)</td>
		              @endif
		              @if ($faq_type == "Spring Work & Travel")
		              	<td>(9)</td>
		              @endif
		              @if ($faq_type == "Au Pair")
		              	<td>(14)</td>
		              @endif
		            </tr>
		            @endforeach
		          </tbody>
		        </table>    
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

