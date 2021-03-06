<div id='pageLoad'>

@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/internship-company.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<form action="" method="post" role="form">
 {{csrf_field()}}
<div class = "col-xs-12 whole-page">
@foreach ($featuredimage_internship as $featured)
    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
    <div class = "text-inside-header-picture">
        <div class = "row dynamic-text-container">
            <div class ="col-lg-4 col-md-4 col-sm-6 col-xs-12 dynamic-text-container-box">
                @if ( Request::get('country') == "United States"  )
                <h4> UNITED STATES </h4>
                @else
                <h4> Australia </h4>
                @endif
                <div class = "col-xs-12">
                    <H1> WORK & TRAVEL </H1>
                </div>
                <div class = "col-xs-12">
                    <p class ="p-dynamic">We provide travel opportunities for students, graduates, and those with industry experience</p>
                </div>
            </div>
        
@endforeach

        </div>
    </div>

    
    <div class = " row">
        <div class = "col-md-12 col-xs-12 Top-header-message text-center">
            <h1>Your Destination</h1>
            <div class = "col-xs-12 col-md-4 col-md-offset-4">
                <p> Your journey begins with Vision International and its wide network of reputable partners across the country, enabling you to travel and work in your location of choice. </p>
            </div>
        </div>
    </div>
    <div class = "body-content" id= "body-content">
        <div class = "row hidden-xs hidden-sm filter-top">
            <div class = "hidden-xs hidden-sm col-md-10 filter-main">
                <div class = "col-xs-12">
                    <div class="dropdown">
                        <a class="dropbtn-filter">Country</a>
                        <div class="dropdown-content-filler">
                          <div id="links">
                              <a href="/workcompany">All</a>
                              <a href="/workcompany?country=United States">United States</a>
                              <a href="/workcompany?country=Australia">Australia</a>
                          </div>
                        </div>
                    </div>
                    <div class="dropdown">
                    <a class="dropbtn-filter">State</a>
                        <div class="dropdown-content-filler">
                          <div id="links">
                          <a href="/workcompany">All</a>
                            @if ( Request::get('state')  )
                                @foreach ($internship_filter as $filter)
                                    <a href="/workcompany?state={{$filter->state}}">{{$filter->state}}</a>
                                @endforeach
                            @else
                                @foreach ($internshipCompany_table as $company)
                                    <a href="/workcompany?state={{$company->state}}">{{$company->state}}</a>
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="dropdown">
                      <a class="dropbtn-filter">Industry</a>
                      <div class="dropdown-content-filler">
                      <div id="links">
                        @if ( Request::get('state')  )
                            @foreach ($internship_filter as $filter)
                                @foreach ($filter->work_industry as $industry)
                                    <a href="/workcompany?industry={{$industry->industry_name}}">{{$industry->industry_name}}</a>
                                @endforeach
                            @endforeach
                        @else
                            @foreach ($internshipCompany_table as $company)
                                @foreach ($company->work_industry as $industry)
                                    <a href="/workcompany?industry={{$industry->industry_name}}">{{$industry->industry_name}}</a>
                                @endforeach
                            @endforeach
                        @endif
                        </div>
                      </div>
                    </div>
                    <div class="dropdown">
                      <a class="dropbtn-filter">Start Dates</a>
                      <div class="dropdown-content-filler">
                      <div id="links">
                         @if ( Request::get('state')  )
                            @foreach ($internship_filter as $filter)
                                @foreach ($filter->work_duration as $duration)
                                    <a href="/workcompany?duration={{$duration->duration_start_date}}">{{$duration->duration_start_date}}</a>
                                @endforeach
                            @endforeach
                        @else
                            @foreach ($internshipCompany_table as $company)
                                 @foreach ($company->work_duration as $duration)
                                    <a href="/workcompany?duration={{$duration->duration_start_date}}">{{$duration->duration_start_date}}</a>
                                @endforeach
                            @endforeach
                        @endif
                        </div>
                      </div>
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

<!--mobile filter -->
<div class = "col-xs-12 hidden-md hidden-lg hidden-xl">
    <div class = "row ">
        <div class = "col-xs-6 form-group">
            <select class = "form-control" name="current_city" id="dynamic_select">
            <option value="" disabled selected>Select</option>
               @if ( Request::get('state')  )
                    @foreach ($internship_filter as $filter)
                       <option value ="workcompany?state={{$filter->state}}">{{$filter->state}}</option>
                    @endforeach
                @else
                    @foreach ($internshipCompany_table as $company)
                        <option value ="workcompany?state={{$company->state}}">{{$company->state}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class = "col-xs-6 form-group">
            <select class = "form-control" name="internship_industry" id="">
                <option value="" disabled selected>Select</option>
                @if ( Request::get('state')  )
                     @foreach ($internship_filter as $filter)
                        @foreach ($filter->work_industry as $duration)
                        <option value ="workcompany?state={$industry->industry_name}}">{{$industry->industry_name}}</option>
                        @endforeach
                    @endforeach
                @else
                    @foreach ($internshipCompany_table as $company)
                        @foreach ($company->work_industry as $industry)
                             <option value ="workcompany?state={{$industry->industry_name}}">{{$industry->industry_name}}</option>
                        @endforeach
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>
<div class = "col-xs-12 hidden-md hidden-lg hidden-xl last-filter">
    <div class = "row">
        <div class = "col-xs-12">
            <select class = "form-control" name="internship_duration" id="">
                <option value="" disabled selected>Select</option>
                @if ( Request::get('state')  )
                    @foreach ($internship_filter as $filter)
                        @foreach ($filter->work_duration as $duration)
                            <option value ="workcompany?state={{$duration->duration_start_date}}">{{$duration->duration_start_date}}</option>
                        @endforeach
                    @endforeach
                @else
                 
                     @foreach ($internshipCompany_table as $company)
                        @foreach ($company->work_duration as $duration)
                            <option value ="workcompany?state={{$duration->duration_start_date}}">{{$duration->duration_start_date}}</option>
                        @endforeach
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>

<!--End of filter mobile -->



<div class = "col-xs-12 company-whole" id = "x">
    <div class = "col-md-6 col-xs-12 picture" id = "map">  
    </div>
    <div class = "col-md-6 col-xs-12 side-content">
        @foreach ($internshipCompany_table as $company)
            <div class = "col-xs-6 ">
                <div class = "col-xs-12 info-container">
                    <div class = "row company-picture">
                        <img src="{{ URL::asset('image\uploaded_workcompany_image')}}/{{$company->image}}" class="img img-responsive company-head" alt="Company Banner">
                    </div>
                    <div class = "row info">
                        <h4>{{ \Illuminate\Support\Str::words($company->full_address, 5,' .... ')}}</h4>
                        <h3>{{$company->company_name}}</h3>
                        <p class = "desc">{{ \Illuminate\Support\Str::words($company->description, 10,' .... ')}}</p>
                        <a href = "javascript:google.maps.event.trigger(gmarkers[{{$loop->index}}],'click');"  class = "btn locate-me1"> Locate Me </a>
                    </div>
                </div>
            </div> 
        @endforeach
    </div>
</div>
<!--whats next?-->
    <div class = "container">
        <div class = "col-xs-12">
            <div class = "row text-center what-next-text">
                <h2 id=whatsnext-title>What's Next?</h2>
                <div class = "col-xs-12 col-md-4 col-md-offset-4">
                    <p>Our process is  smooth and easy. We can facilitate your application and get you to your dream destination as soon as possible!</p>
                </div>
            </div>
        </div>
          <!-- number 1 -->
        <div class = "col-xs-12">
            <div class = "col-xs-12 number-box">
                <div class="text-center boxshadow row"> 
                    <img src="{{URL:: asset('image/circle.png') }}" class = "number-icon"/>
                    <div class="internship-icon col-md-6 col-xs-12">
                        <img src="{{URL:: asset('image/icons/Reserve-icon.png') }}">
                        <h1 id=reserve-title>Reservation</h1>
                        <h1 id=reserve-title>& Application</h1>
                        <p id=p-icon>Fill up the application form</p>
                        <p id=p-icon>and pay for your reservation</p>
                    </div>

                    <div class="intership-content left-side col-md-6 col-xs-12">
                        <p id=p-content>Upon receiving your proof of payment,</p>
                        <p id=p-content>you will be assigned a dedicated program</p>
                        <p id=p-content>specialist who will handle your application </p>
                        <p id=p-content>until the end.</p>
                        <div class="button">
                            <a href = "/faq" class="btn locate-me">How do I make a deposit?</a>
                            <br><br>
                            <a href = "/faq" class="btn locate-me">What documents are required?</a>
                        </div>
                    </div>
                 </div>
            </div>

        <!--number 2 -->
            <div class = "col-xs-12 number-box">
                <div class="text-center boxshadow row"> 
                    <img src="{{URL:: asset('image/circle2.png') }}" class = "number-icon2"/>
                    <div class="internship-icon  col-md-6 col-xs-12">
                        <img src="{{URL:: asset('image/icons/Interviews.png') }}">
                        <h1 id=reserve-title>Interviews</h1>
                        <p id=p-icon>Prepare interviews with the program</p>
                        <p id=p-icon>sponsors and the US embassy</p>
                    </div>

                    <div class="intership-content  col-md-6 col-xs-12">
                        <p id=p-content>Your assigned program specialist will help</p>
                        <p id=p-content>you create a video resume that will be submitted.</p>
                        <p id=p-content>Make sure you have a Skype account registered. </p>
                        <p id=p-content>We will practice you for your interviews</p>
                        <p id=p-content>and make sure you're ready!</p>
                        <div class="button">
                            <a href= "/faq" class="btn locate-me">Webinar: How do I Prepare for My Interview?</a>
                        </div>
                    </div>
                 </div>
            </div>
        <!--number 3 -->
            <div class = "col-xs-12 number-box">
                <div class="text-center boxshadow row">
                    <img src="{{URL:: asset('image/circle3.png') }}" class = "number-icon3"/> 
                    <div class="internship-icon col-md-6 col-xs-12">
                        {{--  <div class=circle-number>1</div>  --}}
                        <img src="{{URL:: asset('image/icons/flyout.png') }}">
                        <h1 id=reserve-title>Fly Out</h1>
                        <p id=p-icon>Book your tickets to the US</p>
                        <p id=p-icon>and enjoy the program!</p>
                    </div>

                    <div class="intership-content col-md-6 col-xs-12">
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
            <div class = "col-xs-12">
                <div class = "row rate-container">
                        <div class = "col-xs-12 col-md-6 left-rate">
                            <div class = "text-left-side ">
                                <h2 class = "gradient"> What's the rate? </h2>
                                <h3 class = "gradient1"> There is plenty to experience! </h3>
                                <br>
                                <h4>Choose your season</h4>
                                <br>
                            </div>
                            <div class = "row row-price">
                                <!--Spring -->
                                <div class = "col-xs-6 spring">
                                    <div class = "col-xs-3 spring-bg">
                                    </div>
                                    <div class = "col-xs-9 ">
                                        <p class = "spring-text"><strong>Spring</strong><br>March - June</p>
                                    </div>
                                </div>
                                <!--Summer -->
                               <div class = "col-xs-6 summer">
                                    <div class = "col-xs-3 summer-bg">
                                    </div>
                                    <div class = "col-xs-9 ">
                                        <p class = "summer-text"><strong>Summer</strong><br>June - September</p>
                                    </div>
                                </div>
                            </div>
                            <div class = "row row-price pads">
                                 <div class = "col-xs-5 col-md-4">
                                    <strong><p id = "reservation">PHP 1000</p></strong>
                                </div>
                                <div class = " col-xs-7 col-md-6">
                                    <p>Reservation</p>
                                </div>
                            </div>
                            <div class = "row row-price">
                                 <div class = "col-xs-5 col-md-4">
                                    <strong><p id = "1st-Installment">USD 450</p></strong>
                                </div>
                                <div class = "col-xs-7 col-md-7">
                                    <p>First Installment *</p>
                                </div>
                            </div>
                            <div class = "row row-price">
                                <div class = "col-xs-5 col-md-4 last-row last-row1">
                                    <strong><p id = "2nd-Installment">USD 3100</p></strong>
                                </div>
                               <div class = "col-xs-7 col-md-6 last-row">
                                    <p>Second Installment *</p>
                                </div>
                            </div>
                            <div class = "hidden-md hidden-lg hidden-xl">
                                <hr>
                            </div>
                            <div class = "row row-price">
                                 <div class = "col-xs-5 col-md-4">
                                    <strong><p id = "3rd-Installment">USD 3550</p></strong>
                                </div>
                                <div class = "col-xs-7 col-md-6">
                                    <p>Total Program Payment**</p>
                                </div>
                            </div>

                            <div clas = "row row-price">
                                <div class = "col-md-9 col-md-offset-2 col-xs-12">
                                    <a class = "btn locate-me" href = "/application?c=WUS"> Apply Now </a>
                                </div>
                            </div>
                            <br>
                            <div class = "row row-price-legend">
                                <p> * Money Back Guarantee **   Airfare NOT included</p>
                                <strong><p class = "add-fees">Additional Fees:</p></strong>
                                <p>USD 35 SEVIS Fee</p>
                                <p>USD 160 US embassy interview booking fee</p>
                            </div>
                        </div>
                        <div class = "col-md-6 hidden-xs hidden-sm rate-image">
                             <img src="{{ URL::asset('image/photos/Price.jpg')}}" class="img img-responsive img-price" alt="Company Banner">
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>

            $(".spring").hover(function(){
                $(".spring-bg").css("background-image", 'url("/image/icons/Spring-H.png")');
                $(".summer-bg").css("background-image", 'url("/image/icons/Summer.png")');
                $(".spring-text").css("color", '#f4645f');
                $(".summer-text").css("color", 'black');
                document.getElementById('1st-Installment').innerHTML = "Php 4,000";
                document.getElementById('2nd-Installment').innerHTML = "Php 55,000";
                document.getElementById('3rd-Installment').innerHTML = "Php 60,000";
                }, function(){
            });

           $(".summer").hover(function(){
                $(".summer-bg").css("background-image", 'url("/image/icons/Summer-H.png")');
                $(".spring-bg").css("background-image", 'url("/image/icons/Spring.png")');
                $(".summer-text").css("color", '#f4645f');
                $(".spring-text").css("color", 'black');
                document.getElementById('1st-Installment').innerHTML = "USD 150";
                document.getElementById('2nd-Installment').innerHTML = "USD 1,350";
                document.getElementById('3rd-Installment').innerHTML = "USD 1,500";
            }, function(){
            });
        </script>
        <!--Testimony-->

        <div class="container">
            <div class="row testimony-header">
                <div class=" col-md-8 col-md-offset-2 col-xs-12 about-font text-center">
                     <h3>Our Community</h3>
                     <p>We are proud to have an amazing community of students and professionals who have received the VIP treatment. Listen to their stories.</p>
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
    $(function(){
      // bind change event to select
      $('#dynamic_select').on('change', function (e) {
          
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
          
                e.preventDefault(); //so the browser doesn't follow the link

                $("#pageLoad").load(url, function() {
                    //execute here after load completed
                });
          }
          return false;
      });
    });
</script>

<script type="text/javascript">

  var deletePostUri = "{{ route('workcompany.index')}}";
  var gmarkers = [];
  var gaddress = {!! json_encode($internship_addresses->toArray()) !!};
  var gname = {!! json_encode($internship_name->toArray()) !!};
  var gdesc = {!! json_encode($internship_desc->toArray()) !!};
  var gid = {!! json_encode($internship_id->toArray()) !!};
  var image = {!! json_encode($internship_image->toArray()) !!};
  var featured = {!! json_encode($internship_featured->toArray()) !!};
  var lat = {!! json_encode($internship_latitude->toArray()) !!};
  var long = {!! json_encode($internship_longtitude->toArray()) !!};
  var $_GET = <?php echo json_encode($_GET); ?>;
  var eid = $_GET['eid'];
  var counter = 0 ;
  var infowindow ; 
  var map;
function initMap() {
    if(gaddress.length == 0)
    {
         var myOptions = {
            zoom: 4,
            maxZoom: 10,
            minZoom: 5,
            center: {lat:-21.85827, lng:134.986323},
            mapTypeId: 'terrain'
        };

        //map settings
            map = new google.maps.Map($('#map')[0], myOptions);  
    }
    else{
      var elevator;
        var myOptions = {
            zoom: 4,
            minZoom: 4,
            maxZoom: 16,
            center: new google.maps.LatLng(0, 0),
            mapTypeId: 'terrain'
        };

        //map settings
        map = new google.maps.Map($('#map')[0], myOptions);    

        var bounds = new google.maps.LatLngBounds();
        map.setCenter(bounds.getCenter());

       for (var x = 0; x < gaddress.length; x++) {
            var latlng = new google.maps.LatLng(lat[x], long[x]);     
            addMarker(map,bounds,latlng,featured[counter]);    
        } map.fitBounds(bounds);
    } 
}
    function addMarker(map,bounds, latlng,featured){
        if(featured == 'Yes'){
            var markers = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: "/image/icons/vip_map-01-Featured.png"
            });
        }
        else{
            var markers = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: "/image/icons/vip_map.png"
            });
        }
        gmarkers.push(markers);
        bounds.extend(markers.getPosition());
        
        addInfoWindow(markers);
    }
    function addInfoWindow(markers){
        var secretMessage = '<div id="container " class = "infowindow">'+
                                '<div class = "col-xs-4 image-container" >'+
                                    '<img src="image/uploaded_workcompany_image/' + image[counter] + '" class="img map-img img-responsive" alt="Company Banner">' +
                                '</div>'+
                                '<div class = "col-xs-8" id="siteNotice">'+
                                    '<h1 id="firstHeading" class="firstHeading">' + gname[counter] +  '</h1>'+
                                    '<div id="bodyContent">'+
                                       '<p class = "map-description">'  + gdesc[counter].slice(0, 150) + '</p><br><br>'+
                                        '<a data-toggle="modal" data-target="#myModal" class = "btn locate-me2" href = "/work?cid=' +  gid[counter] + '"> Learn More </a>' +
                                    '</div>'+
                                '</div>'+
                            '</div>';
        var infowindow = new google.maps.InfoWindow({
          content: secretMessage
        });
        google.maps.event.addListener(markers,'click',function() {
          map.setZoom(16);
          map.setCenter(markers.getPosition());
          infowindow.open(markers.get('map'), markers);
        });
        if(eid !== undefined){
            if(gid[counter] == eid)
            {
                map.setCenter(gmarkers[counter].getPosition());
                infowindow.open(map, gmarkers[counter]);
            }
        }
        counter++;
    }  
    
    

</script>

<script async defer src="http://maps.google.com/maps/api/js?key=AIzaSyAzQQYFrug-yB5tVMh7KL6av4U1SegZcec&callback=initMap">
 </script>


