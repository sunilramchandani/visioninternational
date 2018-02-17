@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/events.css') }}">
@stop

@include('layouts.navbar')
@section('content')

<form action="" method="post" role="form">
 {{csrf_field()}}
<img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive header" alt="Company Banner">
<img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
<img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
<div class = "col-lg-3 col-lg-offset-9 col-md-3 col-md-offset-8 col-sm-3 col-sm-offset-8 col-xs-3 col-xs-offset-8 sticky">
  <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <p> Start an <strong> amazing </strong> </p>
    <p> future with us </p>
  </div>
  <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-6 button-apply-sticky">
    <a href = "/application" class = "btn applynow-sticky">Apply Now</a>
  </div>
</div>
<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12 events">
  <div class ="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class = "col-lg-9 col-md-9 col-sm-9 col-xs-9 events-header">
      <h2>Events</h2>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3  search-row">
      <input class="form-control search" type="text" name="searchroleName" id='search-text-input' placeholder="Search"/>
      <div id='button-holder'>
        <i class="fa fa-search" aria-hidden="true"></i>
      </div>
    </div>
  </div>
  <div class = "row">
    <div class = "col-lg-10 col-md-10 col-sm-10 col-xs-10 events-content-container">
      @foreach($events_table as $events)
        <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4 events-content">
          <img src="{{$events->cover_source}}" alt="" class = "event-img img">
          
          <h4 class = " details text-center">{{$events->event_name}} </h4> 
          <p class = "details text-center"><strong>{{Carbon\Carbon::parse($events->start_time)->toFormattedDateString()}} | {{Carbon\Carbon::parse($events->start_time)->format('h:i')}} - {{$events->place_name}}</strong> </p>
          <p class = "details text-center">{{ \Illuminate\Support\Str::words($events->event_description, 15,' .... ')}}</p>
         
          <button class = "submit btn"><span>More Info</span></button>
        </div>
      @endforeach
    </div>
    <div class = "col-lg-2 col-md-2 col-sm-2 col-xs-2 categories-sidebar">
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
</div> 
<div class = "row filler"></div>
</form>
<div id="map"></div>
    <script>
      function initMap() {
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzQQYFrug-yB5tVMh7KL6av4U1SegZcec&callback=initMap"
    async defer></script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script>

  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });

</script>
@stop
