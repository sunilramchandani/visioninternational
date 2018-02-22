
<div id='pageLoad'>

@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/internship-company.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<form action="" method="post" role="form">
 {{csrf_field()}}
<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12 whole-page">
@foreach ($featuredimage_internship as $featured)
    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
    <div class = "text-inside-header-picture">
        <div class = "row dynamic-text-container">
            <div class ="col-lg-4 col-md-4 col-sm-6 col-xs-12 dynamic-text-container-box">
                <h4> UNITED STATES </h4>
                <H1> INTERNSHIP </H1>
                <p class ="p-dynamic"> Get ahead in your careers with an internship experience abroad</p>
            </div>
        
@endforeach

        </div>
            </div>

    
    <div class = " row">
        <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12 Top-header-message text-center">
            <h1>Your Destination</h1>
            <br/>
            <p> Our Internship Programs prepare students for life and work outside of school.Participants  </p>
            <p> get to work in world-class facilities in the US and in other locations accross the globe</p>
        </div>
    </div>
    <div class = "body-content" id= "body-content">
        <div class = "row filter-top">
            <div class = "col-lg-9 col-lg-offset-1 col-md-9 col-md-offset-1 col-sm-9 col-sm-offset-1 col-xs-7 col-xs-offset-1 filter-main">
                <div class="dropdown">
                  <a class="dropbtn-filter">State</a>
                  <div class="dropdown-content-filler">
                  <div id="links">
                  <a href="/internshipcompany">All</a>
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
            <div class = "col-lg-2 col-md-2 col-sm-2 col-xs-4 filter-result">
                @for ($i = 0; $i < count($internshipCompany_table)+1; $i++)
                    @if ($i == count($internshipCompany_table))
                        <p>Total Results: <strong> {{ $i }} </strong></p>
                    @endif
                @endfor
            </div>
        </div>



<!--------------------HIDDEN DIV ---------------------------->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        
    </div>
  </div>





<!----------------------------------------END OF HIDDEN DIV -------------------------------------->


<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12 company-whole" id = "x">
    <div class = "col-lg-5 col-md-5 col-sm-5 col-xs-5 picture" id = "map">  
    </div>
    <div class = "col-lg-7 col-md-7 col-sm-7 col-xs-7 side-content">
    
        @foreach ($internshipCompany_table as $company)
            <div class = "col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 info-container">
                <div class = "row company-picture">
                    <img src="{{ URL::asset('image\uploaded_company_image')}}/{{$company->image}}" class="img img-responsive company-head" alt="Company Banner">
                </div>
                <div class = "row info">
                    <h4>{{$company->full_address}}</h4>
                    <h3>{{$company->company_name}}</h3>
                    <p class = "desc">{{ \Illuminate\Support\Str::words($company->description, 15,' .... ')}}</p>
                    <a href = "javascript:google.maps.event.trigger(gmarkers[{{$loop->index}}],'click');"  class = "btn locate-me1"> Locate Me </a>
                </div>
            </div> 
        
        @endforeach
       
         
    
</div>
</div>
<!--whats next?-->
<div class = "container">
    <!-- number 1 -->
    <div class = "row">
        <div class = "col-lg-12 col-lg-offset-0 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
            <div class = "row text-center what-next-text">
                <h2 id=whatsnext-title>What's Next?</h2>
                <p id=about-next>Our process is  smooth and easy. We can facilitate your application</p>
                <p id=about-next>and get you to your dream destination as soon as possible!</p>
            </div>
            <div class="text-center boxshadow row"> 
                <img src="{{URL:: asset('image/circle.png') }}" class = "number-icon"/>
                <div class="internship-icon col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <img src="{{URL:: asset('image/icons/Reserve-icon.png') }}">
                    <h1 id=reserve-title>Reservation</h1>
                    <h1 id=reserve-title>& Application</h1>
                    <p id=p-icon>Fill up the application form</p>
                    <p id=p-icon>and pay for your reservation</p>
                </div>

                <div class="intership-content left-side col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p id=p-content>Upon receiving you proof of payment,</p>
                    <p id=p-content>you will be assigned a dedicated program</p>
                    <p id=p-content>specialist who will handle your application </p>
                    <p id=p-content>until the end.</p>
                    <div class="button">
                        <a href = "/faq" class="btn locate-me">How do i make a deposit?</a>
                        <br><br>
                        <a href = "/faq" class="btn locate-me">What documents are required?</a>
                    </div>
                </div>
             </div>
        </div>
    </div>
    <!--number 2 -->
    <div class = "row">
        <div class = "col-lg-12 col-lg-offset-0 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
            <div class="text-center boxshadow row"> 
                 <img src="{{URL:: asset('image/circle2.png') }}" class = "number-icon2"/>
                <div class="internship-icon col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    {{--  <div class=circle-number>1</div>  --}}
                    <img src="{{URL:: asset('image/icons/Interviews.png') }}">
                    <h1 id=reserve-title>Interviews</h1>
                    <p id=p-icon>Prepare interviews with the program</p>
                    <p id=p-icon>sponsors and the US embassy</p>
                </div>

                <div class="intership-content col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p id=p-content>Your assigned progam speacialist will help</p>
                    <p id=p-content>you create a video resume that will be submitted.</p>
                    <p id=p-content>Make sure you have a Skype account registered. </p>
                    <p id=p-content>We will practive you for your interviews</p>
                    <p id=p-content>and make sure you're reader!.</p>
                    <div class="button">
                        <a href= "/faq" class="btn locate-me">Webinar: How do i Prepare for My Interview?</a>
                    </div>
                </div>
             </div>
        </div>
    </div>
    <!--number 3 -->
    <div class = "row">
        <div class = "col-lg-12 col-lg-offset-0 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
            <div class="text-center boxshadow row">
                <img src="{{URL:: asset('image/circle3.png') }}" class = "number-icon3"/> 
                <div class="internship-icon col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    {{--  <div class=circle-number>1</div>  --}}
                    <img src="{{URL:: asset('image/icons/flyout.png') }}">
                    <h1 id=reserve-title>Flyout</h1>
                    <p id=p-icon>Book your tickets to the US</p>
                    <p id=p-icon>and enjoy the program!</p>
                </div>

                <div class="intership-content col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p id=p-content>We can connect you with past and</p>
                    <p id=p-content>current participants so that you can</p>
                    <p id=p-content>transition properly to the US. </p>
                    <p id=p-content>Have fun!</p>
                    <div class="button">
                        <a href= "/faq" class="btn locate-me">Learn more about our Fly Now, <br> Pay Later Program</a>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
        <!--Rate -->
        <div class = "container">
            <div class = "row">
                <div class = "col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-xs-12 rate-container">
                        <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class = "text-left-side col-lg-offset-1">
                                <h2 class = "gradient"> What's the rate? </h2>
                                <h3 class = "gradient1"> There is plenty to experience! </h3>
                            </div>
                            <div class = "row row-price">
                                <div class = "col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1">
                                    <h4>Duration</h4>
                                </div>
                               <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <select class = "form-control" name="duration" id="duration">
                                        <option value="6">6 Months</option>
                                        <option value="7">7 Months</option>
                                        <option value="8">8 Months</option>
                                        <option value="9">9 Months</option>
                                        <option value="10">10 Months</option>  
                                        <option value="11">11 Months</option>  
                                        <option value="12">12 Months</option>  
                                        <option value="18">18 Months</option>       
                                    </select>
                                </div>
                            </div>
                            <div class = "row row-price">
                                 <div class = "col-lg-3 col-md-3 col-sm-3 col-xs-3 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                    <strong><p id = "reservation">PHP 3000</p></strong>
                                </div>
                                <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <p>Reservation</p>
                                </div>
                            </div>
                            <div class = "row row-price">
                                 <div class = "col-lg-3 col-md-3 col-sm-3 col-xs-3 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                    <strong><p id = "1st-Installment">USD 450</p></strong>
                                </div>
                                <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <p>First Installment *</p>
                                </div>
                            </div>
                            <div class = "row row-price">
                                <div class = "col-lg-3 col-md-3 col-sm-3 col-xs-3 last-row last-row1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                    <strong><p id = "2nd-Installment">USD 3100</p></strong>
                                </div>
                               <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4 last-row">
                                    <p>Second Installment **</p>
                                </div>
                            </div>
                            <div class = "row row-price">
                                 <div class = "col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1">
                                    <strong><p id = "3rd-Installment">USD 3550</p></strong>
                                </div>
                                <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <p>Total Program Payment</p>
                                </div>
                            </div>
                            <div clas = "row row-price">
                                <div class = "col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-9">
                                    <a class = "btn locate-me" href = "/application"> Apply Now </a>
                                </div>
                            </div>
                            <br>
                            <div class = "row row-price-legend">
                                <div class = "col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                    <p> * Money Back Guarantee </p>
                                    <p> ** Money Back Guarantee + includes medical insurance </p>
                                    <strong><p class = "add-fees">Additional Fees:</p></strong>
                                    <p>USD 180 SEVIS Fee and</p>
                                    <p>USD 160 US embassy interview booking fee</p>
                                </div>
                            </div>
                        </div>
                        <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-6 rate-image">
                             <img src="{{ URL::asset('image/photos/Price.jpg')}}" class="img img-responsive img-price" alt="Company Banner">
                        </div>
                    </div>
                </div>
            </div>
        <script>
            var e = document.getElementById("duration");
            e.onchange = function() {
                var strUser = e.options[e.selectedIndex].value;
                if(strUser == "6"){
                    document.getElementById('1st-Installment').innerHTML = "USD 450";
                    document.getElementById('2nd-Installment').innerHTML = "USD 3100";
                    document.getElementById('3rd-Installment').innerHTML = "USD 3550";
                }
                if(strUser == "7"){
                    document.getElementById('1st-Installment').innerHTML = "USD 450";
                    document.getElementById('2nd-Installment').innerHTML = "USD 3150";
                    document.getElementById('3rd-Installment').innerHTML = "USD 3600";
                }   
                if(strUser == "8"){
                    document.getElementById('1st-Installment').innerHTML = "USD 450";
                    document.getElementById('2nd-Installment').innerHTML = "USD 3350";
                    document.getElementById('3rd-Installment').innerHTML = "USD 3800";
                }   
                if(strUser == "9"){
                    document.getElementById('1st-Installment').innerHTML = "USD 450";
                    document.getElementById('2nd-Installment').innerHTML = "USD 3650";
                    document.getElementById('3rd-Installment').innerHTML = "USD 4100";
                }  
                if(strUser == "10"){
                    document.getElementById('1st-Installment').innerHTML = "USD 450";
                    document.getElementById('2nd-Installment').innerHTML = "USD 3850";
                    document.getElementById('3rd-Installment').innerHTML = "USD 4300";
                }   
                if(strUser == "11"){
                    document.getElementById('1st-Installment').innerHTML = "USD 450";
                    document.getElementById('2nd-Installment').innerHTML = "USD 4050";
                    document.getElementById('3rd-Installment').innerHTML = "USD 4500";
                }  
                if(strUser == "12"){
                    document.getElementById('1st-Installment').innerHTML = "USD 450";
                    document.getElementById('2nd-Installment').innerHTML = "USD 4100";
                    document.getElementById('3rd-Installment').innerHTML = "USD 4550";
                }
                if(strUser == "18"){
                    document.getElementById('1st-Installment').innerHTML = "USD 450";
                    document.getElementById('2nd-Installment').innerHTML = "USD 6050";
                    document.getElementById('3rd-Installment').innerHTML = "USD 6500";
                }                     
            }
        </script>
        <!--Testimony-->

        <div class="container">
            <div class="row testimony-header">
                <div class="about-font text-center">
                     <h3>Our Community</h3>
                     <p>Get inspiration from those who have come before you 
                        <br>Here are some of our students who have experienced work life abroad
                    </p>
                </div>
            </div>
            <div class = "row testimony-content">
                <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-8 testimony-description">
                        <blockquote>
                            This program is one of the challenging experiences, joyful events, and new things that ii've learned and molded me to become a better person
                            <cite>Karissa MArie Salengua</cite>
                            <cite>Work & Travel Program, California</cite>
                        </blockquote>
                    </div>
                    <div clas = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         <img src="{{ URL::asset('image/uploaded_featured_image')}}/joy.png" class="img img-rounded testimony-picture" alt="Company Banner">
                    </div>
                </div>
            </div>
        </div>
<!--end of testimony -->
</div>
</div>
<div class = "filler row" id = "filler">
</div>
</form>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
    $("#links > a").click(function(e) {
        e.preventDefault(); //so the browser doesn't follow the link

        $("#pageLoad").load(this.href, function() {
            //execute here after load completed
        });
    });
});



</script>

<script type="text/javascript">

  var deletePostUri = "{{ route('internshipcompany.index')}}";
  var gmarkers = [];
  var gaddress = {!! json_encode($internship_addresses->toArray()) !!};
  var gname = {!! json_encode($internship_name->toArray()) !!};
  var gdesc = {!! json_encode($internship_desc->toArray()) !!};
  var gid = {!! json_encode($internship_id->toArray()) !!};
  var image = {!! json_encode($internship_image->toArray()) !!};
  var featured = {!! json_encode($internship_featured->toArray()) !!};
  var $_GET = <?php echo json_encode($_GET); ?>;
  var eid = $_GET['eid'];
  var counter = 0 ;
  var infowindow ; 
  var map;
function initMap() {
    
    var elevator;
    var myOptions = {
        zoom: 4,
        maxZoom: 10,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: 'terrain'
    };

    //map settings
    map = new google.maps.Map($('#map')[0], myOptions);    

    var bounds = new google.maps.LatLngBounds();
    map.setCenter(bounds.getCenter());




    //controller addresses
    var addresses = {!! json_encode($internship_addresses->toArray()) !!};

    for (var x = 0; x < addresses.length; x++) {
        $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
            var p = data.results[0].geometry.location
            var latlng = new google.maps.LatLng(p.lat, p.lng);     
            addMarker(map,bounds,latlng,featured[counter]);

        });
            
    }
        map.fitBounds(bounds);

} 
    function addMarker(map,bounds, latlng,featured){
        if(featured == 'Yes'){
            var markers = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png"
            });
        }
        else{
            var markers = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
            });
        }
        gmarkers.push(markers);
        bounds.extend(markers.getPosition());
        
        addInfoWindow(markers);
    }
    function addInfoWindow(markers){
        var secretMessage = '<div id="container " class = "infowindow">'+
                                '<div class = "col-lg-4 image-container" >'+
                                    '<img src="image/uploaded_company_image/' + image[counter] + '" class="img map-img img-responsive" alt="Company Banner">' +
                                '</div>'+
                                '<div class = "col-lg-8" id="siteNotice">'+
                                    '<h1 id="firstHeading" class="firstHeading">' + gname[counter] +  '</h1>'+
                                    '<div id="bodyContent">'+
                                       '<p class = "map-description">'  + gdesc[counter].slice(0, 150) + '</p><br><br>'+
                                        '<a data-toggle="modal" data-target="#myModal" class = "btn locate-me2" href = "/internship?cid=' +  gid[counter] + '"> Learn More </a>' +
                                    '</div>'+
                                '</div>'+
                            '</div>';
        var infowindow = new google.maps.InfoWindow({
          content: secretMessage
        });
        google.maps.event.addListener(markers,'click',function() {
          map.setZoom(10);
          map.setCenter(markers.getPosition());
          infowindow.open(markers.get('map'), markers);
        });
        if(eid !== undefined){
            if(gid[counter] == eid)
            {
                infowindow.open(map, gmarkers[counter]);
            }
        }
        counter++;
    }
    

</script>

<script async defer src="http://maps.google.com/maps/api/js?key=AIzaSyAzQQYFrug-yB5tVMh7KL6av4U1SegZcec&callback=initMap">
 </script>
