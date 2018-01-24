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
<div class = "col-lg-3 col-lg-offset-9 sticky">
  <div class = "col-lg-6">
    <p> Start an <strong> amazing </strong> </p>
    <p> future with us </p>
  </div>
  <div class = "col-lg-6 button-apply-sticky">
    <a href = "" class = "btn applynow-sticky">Apply Now</a>
  </div>
</div>
<div class = "col-lg-12 events">
  <div class ="row col-lg-12">
    <div class = "col-lg-9 events-header">
      <h2>Events</h2>
    </div>
    <div class="col-lg-3 search-row">
      <input class="form-control search" type="text" name="searchroleName" id='search-text-input' placeholder="Search"/>
      <div id='button-holder'>
        <i class="fa fa-search" aria-hidden="true"></i>
      </div>
    </div>
  </div>
  <div class = "row">
    <div class = "col-lg-9 events-content-container">
      @foreach($data['data'] as $events)
        <div class = "col-lg-3 events-content">
          <img src="{{$events['cover']['source']}}" alt="" class = "event-img img">
          
          <p class = "text-center">{{$events['start_time']}} - {{$events['end_time']}} </p>
          <p class = "text-center">{{$events['description']}}</p>
          <button class = "submit btn"><span>More Info</span></button>
        </div>
      @endforeach
    </div>
    <div class = "col-lg-3 categories-sidebar">
      <table class="table table-categories table-hover">
        <thead bgcolor="#800000">
          <tr>
            <th colspan="2" class = "header-table">CATEGORIES</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Creative</td>
            <td>(02)</td>
          </tr>
          <tr>
            <td>Design</td>
            <td>(01)</td>
          </tr>
          <tr>
            <td>Events</td>
            <td>(10)</td>
          </tr>
          <tr>
            <td>Food</td>
            <td>(03)</td>
          </tr>
          <tr>
            <td>Job Fair</td>
            <td>(04)</td>
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
@stop
