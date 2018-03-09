@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/opportunity.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<form action="" method="post" role="form">
 {{csrf_field()}}
<div class = "col-xs-12 whole-page">
@foreach ($featuredimage_internship as $featured)
    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">      
@endforeach
    <div class = "col-xs-12 text-center text-titles">
        <h3>Internship</h3>
    </div>
    <div class = "col-xs-10 col-xs-offset-1 internship" id = "internship">
        @foreach($internshipCompany_table as $internship)
        <a href = "internshipcompany?eid={{$internship->id}}">
            <div class = "col-xs-4 company-content">
                <div class = "col-xs-12 company-box">
                    <div class = "image-container">
                        <img src="{{ URL::asset('image/uploaded_company_image')}}/{{$internship->image}}" class = "img img-responsive company-image" alt="Company Image">
                    </div>
                    <div class = "col-xs-12 details-container">
                        <h4>{{$internship->company_name}}</h4>
                        <p>{{ \Illuminate\Support\Str::words($internship->description, 5,' .... ')}}</p>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class = "col-xs-12 text-center text-titles">
        <h3>Work & Travel</h3>
    </div>
    <div class = "col-xs-10 col-xs-offset-1 work" id = "work">
        @foreach($workCompany_table as $work)
        <a href = "workcompany?eid={{$internship->id}}">
            <div class = "col-xs-4 company-content">
                <div class = "col-xs-12 company-box">
                    <div class = "image-container">
                        <img src="{{ URL::asset('image/uploaded_workcompany_image')}}/{{$work->image}}" class = "img img-responsive company-image" alt="Company Image">
                    </div>
                    <div class = "col-xs-12 details-container">
                        <h4>{{$work->company_name}}</h4>
                        <p>{{ \Illuminate\Support\Str::words($work->description, 8,' .... ')}}</p>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div> 
<div class = "row" style = "padding-bottom: 5%;"></div>

    