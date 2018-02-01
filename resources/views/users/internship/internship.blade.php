@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/internship-company.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<form action="" method="post" role="form">
 {{csrf_field()}}
<div class = "col-lg-12 whole-page">
@foreach ($featuredimage_internship as $featured)
    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
    <div class = "text-inside-header-picture">
        <div class = "row dynamic-text-container">
            <div class ="col-lg-6 dynamic-text-container-box">
                <h4> {{$featured->main_image_description}}</h4>
            </div>
        
@endforeach
        </div>
            </div>

    
    <div class = " row">
        <div class = "col-lg-12 Top-header-message" "text-center">
            <h1>Your Destination</h1>
            <br/>
            <p> Our Internship Programs prepare students for life and work outside of school.Participants  </p>
            <p> get to work in world-class facilities in the US and in other locations accross the globe</p>
        </div>
    </div>
    <div class = "body-content" id= "body-content">
        <div class = "row filter-top">
            <div class = "col-lg-9 col-lg-offset-1 filter-main">
                <div class="dropdown">
                  <a class="dropbtn-filter">State</a>
                  <div class="dropdown-content-filler">
                    @if ( Request::get('state')  )
                        @foreach ($internship_filter as $filter)
                            <a href="/internshipcompany?state={{$filter->state}}">{{$filter->state}}</a>
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
                @for ($i = 0; $i < count($internshipCompany_table)+1; $i++)
                    @if ($i == count($internshipCompany_table))
                        <p>Total Results: <strong> {{ $i }} </strong></p>
                    @endif
                @endfor
            </div>
        </div>







<!--------------------HIDDEN DIV ---------------------------->
        <div class = "col-lg-12 company-whole" id = "y">
            <div class = "col-lg-4 picture">
                <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive img-rounded img-map" alt="Company Banner" height ="100">
            </div>
            <div class = "col-lg-8 company-details" id = "company-details">
                @foreach ($internshipCompany_table as $company)
                    @if($company->id == app('request')->input('id'))
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
                                @if($opportunities->company_id == app('request')->input('id'))
                                    <div class = "col-lg-6">
                                        @if ($opportunities->status == "Inactive" )
                                        <p><i class="fa fa-circle" aria-hidden="true" style="color:#cccccc"></i> {{$opportunities->opportunity_name}}</p>
                                        @else
                                        <p><i class="fa fa-circle" aria-hidden="true" style="color:#80bf40"></i> {{$opportunities->opportunity_name}}</p>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class = "col-lg-12 qualifications">
                            <p><strong>Do I Qualify?</strong></p>
                                 @foreach ($company->qualifications as $qualifications)
                                  @if($qualifications->company_id == app('request')->input('id'))
                                        @if ($qualifications->status == "Inactive" )
                                            <div class = "col-lg-6">
                                                <p><strike>{{$qualifications->qualification}}</strike></p>
                                            </div>
                                            @else
                                            <div class = "col-lg-6">
                                                <p>{{$qualifications->qualification}}</p>
                                            </div>
                                        @endif
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
                    @endif
                @endforeach
            </div>
        </div>
<!----------------------------------------END OF HIDDEN DIV -------------------------------------->
        <div class = "col-lg-12 company-whole" id = "x">
            <div class = "col-lg-5 picture" id = "map">  
            </div>
            <div class = "col-lg-7 side-content">
                @foreach ($internshipCompany_table as $company)
                    <div class = "col-lg-5 col-lg-offset-1 info-container">
                        <div class = "row company-picture">
                            <img src="{{ URL::asset('image/uploads/'.$company->image)}}" class="img img-responsive company-head" alt="Company Banner">
                        </div>
                        <div class = "row info">
                            <h4>{{$company->full_address}}</h4>
                            <h2>{{$company->company_name}}</h2>
                            <p>{{ \Illuminate\Support\Str::words($company->description, 15,' .... ')}}</p>
                            <a href = "javascript:google.maps.event.trigger(gmarkers[{{$loop->index}}],'click');" class = "btn locate-me"> Locate Me </a>
                        </div>
                    </div> 
                @endforeach
            </div>
        </div>
</div>
<div class = "filler row" id = "filler">
</div>
</form>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  var gmarkers = [];
  var gaddress = {!! json_encode($internship_addresses->toArray()) !!};
  var gname = {!! json_encode($internship_name->toArray()) !!};
  var gdesc = {!! json_encode($internship_desc->toArray()) !!};
  var gid = {!! json_encode($internship_id->toArray()) !!};
  var image = {!! json_encode($internship_image->toArray()) !!};
  var counter = 0 ;
function initMap() {
    var map;
    var elevator;


    var myOptions = {
        zoom: 1,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: 'terrain'
    };

    //map settings
    map = new google.maps.Map($('#map')[0], myOptions);
    var bounds = new google.maps.LatLngBounds();
    map.setCenter(bounds.getCenter());
    map.setZoom(map.getZoom()-1); 
    if(map.getZoom()> 15){
      map.setZoom(15);
    }

    //controller addresses
    var addresses = {!! json_encode($internship_addresses->toArray()) !!};

    for (var x = 0; x < addresses.length; x++) {
        $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
            var p = data.results[0].geometry.location
            var latlng = new google.maps.LatLng(p.lat, p.lng);     
            addMarker(map,bounds,latlng);
           
        });
    }
} 
    function addMarker(map,bounds, latlng){
        var markers = new google.maps.Marker({
                position: latlng,
                map: map
        });
        gmarkers.push(markers);
        bounds.extend(markers.getPosition());
        map.fitBounds(bounds);
        addInfoWindow(markers);
    }
    function addInfoWindow(markers){
        var secretMessage = '<div id="container infowindow">'+
                                '<div class = "col-lg-6" id="siteNotice">'+
                                    '<img src="image/uploads/' + image[counter] + '" class="img map-img img-responsive" alt="Company Banner">' +
                                '</div>'+
                                '<div class = "col-lg-6" id="siteNotice">'+
                                '<h1 id="firstHeading" class="firstHeading">' + gname[counter] +  '</h1>'+
                                '<div id="bodyContent">'+
                                    gdesc[counter] +
                                    '<a class = "btn locate-me" id = "refresh" onclick = "myFunction(\''+gid[counter]+'\')"> Learn More </a>' +
                                '</div>'+
                            '</div>';
        var infowindow = new google.maps.InfoWindow({
          content: secretMessage
        });
        markers.addListener('click', function() {
          infowindow.open(markers.get('map'), markers);
        });
        counter++;
    }
    function myFunction(id){
        window.history.replaceState(null, null, "/internshipcompany?id="+id);
        var x = document.getElementById('x');
        var y = document.getElementById('y');
        
        if (!x.style.display || x.style.display == "block") {
            x.style.display = "none";
            y.style.display = "block";
            
        }
        else {
            x.style.display = "block";
            y.style.display = "none";
        }
    }
</script>

<script async defer src="http://maps.google.com/maps/api/js?key=AIzaSyAzQQYFrug-yB5tVMh7KL6av4U1SegZcec&callback=initMap">
 </script> 

