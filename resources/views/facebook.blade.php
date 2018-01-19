<?php
$curl = curl_init();
$rss_url = "https://graph.facebook.com/v2.9/visionsrx/posts?fields=full_picture,message&access_token=EAAbDDDPZCZCFABACmIOHj1Hk81WZCpeleMY0gEkHgVgDF8C2vKMbf9ZBt2KNdhU9fZACWD9bBlt8Ny3Xa4dcmZAhRGZAiNxDjRmMTgsp2gqNH5BqXVT4NoNTb9kHOUOmOM9hmIfKcDJ42ddxm9DuLb7fZCHfUCYFef3vDG8iHfqsMQZDZD";
curl_setopt($curl, CURLOPT_URL, $rss_url);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0)');
curl_setopt($curl, CURLOPT_REFERER, '');
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_TIMEOUT, 10);
$result = curl_exec($curl); // execute the curl command
curl_close($curl);
$data = json_decode($result, true);

foreach($data['data'] as $action) {
    
    if (isset($action['full_picture']))
    {
      $full_picture = $action['full_picture'];
      $message = $action['message'];
    }
    else{
        $message = $action['message'];
    }     
  }
?>

@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/events.css') }}">
@stop

@include('layouts.navbar')
@section('content')

<form action="" method="post" role="form">
 {{csrf_field()}}
<div class = "col-lg-12 events">
  <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive img-rounded header" alt="Company Banner">
  <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
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
      @foreach($data['data'] as $picture)
        <div class = "col-lg-3 events-content">
          <img src="{{$picture['full_picture']}}" alt="" class = "event-img img">
          <p class = "text-center">{{$picture['message']}}</p>
          <button class = "submit btn"><span>More Info</span></button>
        </div>
      @endforeach
    </div>
    <div class = "col-lg-3 categories-sidebar">
      <table class="table table-categories">
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
@stop
