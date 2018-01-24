@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/internship-company.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<form action="" method="post" role="form">
 {{csrf_field()}}
<div class = "col-lg-12 whole-page">
    <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
    <div class = " row Top-header-message">
        <div class = "col-lg-12 text-center">
            <h1>Your Destination</h1>
            <br/>
            <p> Our Internship Programs prepare students for life and work outside of school.Participants  </p>
            <p> get to work in world-class facilities in the US and in other locations accross the globe</p>
        </div>
    </div>
    <div class = "body-content">
        <div class = "row filter-top">
            <div class = "col-lg-9 col-lg-offset-1 filter-main">
                <div class="dropdown">
                  <a class="dropbtn-filter">State</a>
                  <div class="dropdown-content-filler">
                    @if ( Request::get('state')  )
                        @foreach ($lolo as $lolos)
                            <a href="/internshipcompany?state={{$lolos->state}}">{{$lolos->state}}</a>
                        @endforeach
                    @else
                        @foreach ($internshipCompany_table as $company)
                            <a href="/internshipcompany?state={{$company->state}}">{{$company->state}}</a>
                        @endforeach
                    @endif
                  </div>
                </div>
                <div class="dropdown">
                  <a class="dropbtn-filter">Industry</a>
                  <div class="dropdown-content-filler">
                    @foreach ($internshipCompany_table as $company)
                        @foreach ($company->internship_industry as $industry)
                            <a href="#">{{$industry->industry_name}}</a>
                        @endforeach
                    @endforeach
                  </div>
                </div>
                <div class="dropdown">
                  <a class="dropbtn-filter">Start Dates</a>
                  <div class="dropdown-content-filler">
                    @foreach ($internshipCompany_table as $company)
                         @foreach ($company->internship_duration as $duration)
                            <a href="#">{{$duration->duration_start_date}}</a>
                        @endforeach
                    @endforeach
                  </div>
                </div>
            </div>
            <div class = "col-lg-2 filter-result">
                @foreach ($internshipCompany_table as $company)
                    <p>Total Results: <strong> {{ $loop->count }} </strong></p> 
                @endforeach
            </div>
        </div>
        <div class = "col-lg-12 company-whole">
            <div class = "col-lg-4 picture" id = "map">
                
            </div>
            <div class = "col-lg-8 company-details">
                @foreach ($internshipCompany_table as $company)
                    <div class ="col-lg-12">
                        <h1><strong>{{$company->company_name}}</strong></h1>
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
                    <div class = "col-lg-12 opportunities">
                        <hr>
                        <p><strong>Opportunities</strong></p>
                         @foreach ($company->opportunity as $opportunities)
                            <div class = "col-lg-6">
                                @if ($opportunities->status == "Inactive" )
                                <p><i class="fa fa-circle" aria-hidden="true" style="color:#cccccc"></i> {{$opportunities->opportunity_name}}</p>
                                @else
                                <p><i class="fa fa-circle" aria-hidden="true" style="color:#80bf40"></i> {{$opportunities->opportunity_name}}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class = "col-lg-12 qualifications">
                        <p><strong>Do I Qualify?</strong></p>
                             @foreach ($company->qualifications as $qualifications)
                                @if ($qualifications->status == "Inactive" )
                                    <div class = "col-lg-6">
                                        <p><strike>{{$qualifications->qualification}}</strike></p>
                                    </div>
                                    @else
                                    <div class = "col-lg-6">
                                        <p>{{$qualifications->qualification}}</p>
                                    </div>
                                @endif
                            @endforeach
                    </div>
                    <div class = "col-lg-12 legend">
                        <p>Opportunity Availability:</p>
                        <div class ="col-lg-5">
                            <div class ="col-lg-6">
                                <p> <i class="fa fa-circle" aria-hidden="true" style="color:#80bf40">  </i> Available </p>
                            </div>
                            <div class ="col-lg-6">
                                <p><i class="fa fa-circle" aria-hidden="true" style="color:#cccccc"> </i> Unavailable </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class = "filler row">
</div>
</form>
<script type="text/javascript">
  
  function initMap() {
    var map;
    var elevator;
    var myOptions = {
        zoom: 1,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: 'terrain'
    };
    map = new google.maps.Map($('#map')[0], myOptions);

    var addresses = {!! json_encode($internship_addresses->toArray()) !!};
    
    for (var x = 0; x < addresses.length; x++) {
        $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
            var p = data.results[0].geometry.location
            var latlng = new google.maps.LatLng(p.lat, p.lng);
            new google.maps.Marker({
                position: latlng,
                map: map
            });
            
        });
    }
} 

</script>
<script async defer src="http://maps.google.com/maps/api/js?key=AIzaSyAzQQYFrug-yB5tVMh7KL6av4U1SegZcec&callback=initMap">
 </script> 
