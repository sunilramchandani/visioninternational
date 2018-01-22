@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/internship-home.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<form action="" method="post" role="form">
 {{csrf_field()}}
<div class = "col-lg-12">
    <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
    <div class = "Top-header-message">
        <div class = "col-lg-12 text-center">
            <h1>Your Destination</h1>
            <br/>
            <p> Our Internship Programs prepare students for life and work outside of school.Participants  </p>
            <p> get to work in world-class facilities in the US and in other locations accross the globe</p>
        </div>
    </div>
    <div class = "body-content">
        <div class = "col-lg-12">
            <div class = "col-lg-4 picture">
                <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive img-rounded header" alt="Company Banner">
            </div>
            <div class = "col-lg-8 company-details">
                @foreach ($internshipCompany_table as $company)
                    <div class ="col-lg-12">
                        <p><strong>{{$company->company_name}}</strong></p>
                        <p>{{$company->description}}</p>
                    </div>
                    <div class = "col-lg-6">
                        <p><strong>Housing</strong></p>
                        <p> Type: {{$company->housing_type}}</p>
                        <p> Distance: {{$company->housing_distance}}</p>
                        <p> Address : {{$company->housing_address}}</p>
                    </div>
                    <div class = "col-lg-6">
                        <p><strong>Stipend</strong></p>
                        <p>${{$company->stipend}} / Month</p>
                    </div>
                    <div class = "col-lg-6">
                        <p><strong>Opportunity</strong></p>
                    @foreach ($company->opportunity as $opportunities)
                        @if ($opportunities->status == "Inactive" )
                        @else
                        <p>{{$opportunities->opportunity_name}}</p>
                        @endif
                    @endforeach
                    </div>
                @endforeach

                <hr>
            </div>
        </div>
    </div>
</div>
<div class = "filler row">
</div>
</form>