@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/events-single.css') }}">
@stop

@include('layouts.navbar')

@section('content')

<div class = "whole-page">

    <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
    <div class = "col-lg-10 col-lg-offset-1 row">
    	<a href = "/fb" class = "back"><h3> Back to Events </h3></a>
    </div>
    <div class = "col-lg-8 col-lg-offset-1">
    	<img src="{{$events->cover_source}}" alt="" class = "event-img img">
    	<h4>{{$events->event_name}}</h4>
    	<p>{{Carbon\Carbon::parse($events->start_time)->toFormattedDateString()}} | {{Carbon\Carbon::parse($events->start_time)->format('h:i')}} - {{$events->place_name}}</p>
    	<p class = "event-description">{{$events->event_description}}</p>
    	<hr>
    	<div class = "row">
			<div class="col-lg-9 share-main-title ">
	        <span>Share This Article: </span>
	            <a  href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank">
	            <i class="fa fa-facebook-f " style="font-size:20px; padding-right:1%; color:black;"></i>
	            </a>
	            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
	            <i class="fa fa-twitter " style="font-size:20px; padding-right:1%; color:black;"></i>
	            </a>
	            <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
	            <i class="fa fa-google-plus " style="font-size:20px; color:black;"></i>
	            </a>
	        </div>
	        <div class="col-lg-3 Categories">
	        	<span>Categories: {{$events->category}}</span>
	        </div>
	    </div>
        <div class = "row next-previous-container">
	        @if($previousevents != Null)
	        <div class = "col-lg-6 left">
	        	<div class = "text-left arrow">
	        		<a href = "{{$previousevents->fbevent_id}}" class="text-left">< Previous</a>
		        	<br>
		        	<a href = "{{$previousevents->fbevent_id}}" class="text-left"><h4>{{$previousevents->event_name}}</h4></a>
		        </div>
	        </div>
	        @endif
	        @if($nextevents != Null)
	        <div class = "col-lg-6">
	        	<div class = "arrow">
		        	<a href = "{{$nextevents->fbevent_id}}">Next ></a>
		        	<br>
		        	<a href = "{{$nextevents->fbevent_id}}"><h4>{{$nextevents->event_name}}</h4></a>
		        </div>
	        </div>
	        @endif
	    </div>
    </div>
	<div class = "col-lg-3">
        <table class="table table-categories table-borderless table-hover">
          <thead bgcolor="#800000">
            <tr>
              <th class = "header-table text-center">CATEGORIES</th>
              <th class = "header-table text-center"></th>
            </tr>
          </thead>
          <tbody>
            <tr class='clickable-row' data-href='fb?ecat=General'>
              <td>General</td>
              <td>({{$category_events_general}})</td>
            </tr>
            <tr class='clickable-row' data-href='fb?ecat=Design'>
              <td>Design</td>
              <td>({{$category_events_design}})</td>
            </tr>
            <tr class='clickable-row' data-href='fb?ecat=Events'>
              <td>Events</td>
              <td>({{$category_events_events}})</td>
            </tr>
            <tr class='clickable-row' data-href='fb?ecat=Food'>
              <td>Food</td>
              <td>({{$category_events_food}})</td>
            </tr>
            <tr class='clickable-row' data-href='fb?ecat=JobFair'>
              <td>Job Fair</td>
              <td>({{$category_events_jobfair}})</td>
            </tr>
          </tbody>
       </table>    
	</div>
</div>
<div class = "row filler"></div>
<script>
var popupMeta = {
    width: 400,
    height: 400
}
$(document).on('click', '.social-share', function(event){
    event.preventDefault();

    var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
        hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

    var url = $(this).attr('href');
    var popup = window.open(url, 'Social Share',
        'width='+popupMeta.width+',height='+popupMeta.height+
        ',left='+vpPsition+',top='+hPosition+
        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

    if (popup) {
        popup.focus();
        return false;
    }
});
</script>