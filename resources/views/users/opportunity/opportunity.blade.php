@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/opportunity.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<form action="" method="post" role="form">
 {{csrf_field()}}
<div class = "col-xs-12 whole-page">
    <div class = "col-xs-12 text-center text-titles">
        <h3>United States of America</h3>
        <div class = "col-xs-12 col-md-4 col-md-offset-4 text-titles-description">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
        </div>
    </div>
    <div class = "col-xs-10 col-xs-offset-1 internship" id = "internship">
        <a href = "/internshipcompany?country=United States">
            <div class = "col-xs-4">
                <div class = "col-xs-10 col-xs-offset-1 box">
                    @foreach ($featuredimage_internship as $featured)
                    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class = "img company-image" alt="Company Banner">
                    @endforeach
                    <div class = "col-xs-10 col-xs-offset-1 text-center">
                        <h4><STRONG> INTERNSHIP </STRONG> </h4>
                        <p class ="p-dynamic"> Get ahead in your careers with an internship experience abroad</p>
                    </div>
                </div>
            </div>
        </a>
        <a href = "/workcompany">
            <div class = "col-xs-4">
                <div class = "col-xs-10 col-xs-offset-1 box">
                    @foreach ($featuredimage_work as $featured)
                    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class = "img company-image" alt="Company Banner">
                    @endforeach
                    <div class = "col-xs-10 col-xs-offset-1 text-center">
                        <h4><STRONG> WORK & TRAVEL </STRONG> </h4>
                        <p class ="p-dynamic"> We provide travel opportunities for students, graduates, and those with industry experience</p>
                    </div>
                </div>
            </div>
        </a>
        <a href = "/aupair">
            <div class = "col-xs-4">
                <div class = "col-xs-10 col-xs-offset-1 box">
                    @foreach ($featuredimage_aupair as $featured)
                    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class = "img company-image" alt="Company Banner">
                    @endforeach
                    <div class = "col-xs-10 col-xs-offset-1 text-center">
                        <h4><STRONG> AU PAIR </STRONG> </h4>
                        <p class ="p-dynamic"> Immerse yourself in another culture all while being of service to others</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class = "col-xs-12 text-center text-titles">
        <h3>Australia</h3>
        <div class = "col-xs-12 col-md-4 col-md-offset-4 text-titles-description">
            <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. </p>
        </div>
    </div>
        <div class = "col-xs-10 col-xs-offset-1 internship" id = "internship">
        <a href = "/internshipcompany?country=Australia">
            <div class = "col-xs-4">
                <div class = "col-xs-10 col-xs-offset-1 box">
                    @foreach ($featuredimage_internship as $featured)
                    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class = "img company-image" alt="Company Banner">
                    @endforeach
                    <div class = "col-xs-10 col-xs-offset-1 text-center">
                        <h4><STRONG> INTERNSHIP </STRONG> </h4>
                        <p class ="p-dynamic"> Get ahead in your careers with an internship experience abroad</p>
                    </div>
                </div>
            </div>
        </a>
        <a href = "/workvisa">
            <div class = "col-xs-4">
                <div class = "col-xs-10 col-xs-offset-1 box">
                    @foreach ($featuredimage_work as $featured)
                    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class = "img company-image" alt="Company Banner">
                    @endforeach
                    <div class = "col-xs-10 col-xs-offset-1 text-center">
                        <h4><STRONG> SKILLED WORK VISA </STRONG> </h4>
                        <p class ="p-dynamic"> Get ahead in your careers with experience abroad</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
</form>
<div class = "row" style = "padding-bottom: 5%;"></div>

    