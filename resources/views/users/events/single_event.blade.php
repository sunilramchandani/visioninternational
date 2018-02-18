@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/events-single.css') }}">
@stop

@include('layouts.navbar')

@section('content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=1942247329344681&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class = "whole-page">

    <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
    <div class = "col-lg-10 col-lg-offset-1 row">
    	<a href = "/fb"> Back to Events </a>
    </div>
    <div class = "col-lg-7 col-lg-offset-1">
    	<img src="{{$events->cover_source}}" alt="" class = "event-img img">
    	<h4>{{$events->event_name}}</h4>
    	<p>{{Carbon\Carbon::parse($events->start_time)->toFormattedDateString()}} | {{Carbon\Carbon::parse($events->start_time)->format('h:i')}} - {{$events->place_name}}</p>
    	<p>{{$events->event_description}}</p>
    	<hr>
    	<div class = "col-lg-6">
    		 <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
    	</div>
    </div>
	
</div>
<div class = "row filler"></div>
