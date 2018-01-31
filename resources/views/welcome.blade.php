@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<div class = "col-lg-12 whole-page">
@foreach ($featuredimage_home as $featured)
    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->image}}" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
    <div class = "text-inside-header-picture">
        <div class = "row dynamic-text-container">
            <div class ="col-lg-6 dynamic-text">
            
                <h4> {{$featured->description}}</h4>
            </div>
            @endforeach
        </div>
        <div class = "row counters">
            <div class ="col-lg-6">
                <div class = "col-lg-2 counter-container">
                    <h1 class = "counter text-center">2</h1>
                </div>
                <div class = "col-lg-2 counter-container">
                     <h1 class = "counter text-center">40</h1>
                </div>
                <div class = "col-lg-2 counter-container">
                    <h1 class = "counter text-center">300</h1>
                </div>
                <div class = "col-lg-2 counter-container">
                     <h1 class = "counter text-center">560</h1>
                </div>
                <div class = "col-lg-2 counter-container-infinity">
                    <img src="{{ URL::asset('image/icons/InfinitySign.png')}}" class="img img-responsive img-rounded" alt="Company Banner">
                </div>
            </div>
        </div>
        <div class = "row counter-label">
            <div class ="col-lg-6">
                <div class = "col-lg-2 counter-label-container">
                    <h4 class = "labels">Countries</h4>
                </div>
                <div class = "col-lg-2 counter-label-container">
                     <h4 class = "labels">States</h4>
                </div>
                <div class = "col-lg-2 counter-label-container">
                    <h4 class = "labels">Companies</h4>
                </div> 
                <div class = "col-lg-2 counter-label-container">
                     <h4 class = "labels">Applicants</h4>
                </div>
                <div class = "col-lg-2 counter-container-infinity-label">
                    <h4 class = "labels">Opportunities</h4>
                </div>
            </div>
        </div>
        <div class = "row link-button">
            <div class = "col-lg-3">
                <a href = "www.fb.com" class = "btn fblink">#onevision #vip</a>
            </div>
        </div>
    </div>
    <!------------------------- CONTENT ---------------------->
    <div class = "col-lg-12 text-center Top-header-message">
        <h3>We believe that...</h3>
        <br/>
        <p> Every Filipino deserves an opportunity to </p>
        <p> showcase his or her talent to the world.</p>
    </div>
    <div class = "row images-dual">
        <div class = "col-lg-6">
            <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive img-rounded header" alt="Company Banner">
        </div>
        <div class = "col-lg-6">
            <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive img-rounded header" alt="Company Banner">
        </div>
    </div>
</div>
<div class = "row">
</div>