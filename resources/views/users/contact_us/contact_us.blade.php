@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/contact-us.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<form action="{{route('contactus.store')}}" method="post" role="form">
        {{csrf_field()}}
        <div class = "col-lg-12 content">
        @foreach ($featuredimage_contactus as $featured)
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
            <div class = "SayHello">
                <div class = "col-lg-12 text-center">
                    <h1>Say Hello!</h1>
                </div>
                <div class = "col-lg-4 col-lg-offset-1">
                    <div class = "row form-group">
                        <input type = "text" class = "form-control"  name="name" id="" placeholder="Full Name">
                    </div>
                    <div class = "row form-group">
                        <input type = "email" class = "form-control"  name="email" id="" placeholder="E-mail Address">
                    </div>
                    <div class = "row form-group">
                        <input type = "tel" class = "form-control"  name="contact_no" id="" placeholder="Contact Number">
                    </div>
                    <div class = "row form-group">
                        <select class = "form-control" name="country" id="">
                            <option value="" disabled selected>Country</option>
                            @foreach($country as $country)
                                <option value="{{$country}}">{{$country}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class = "col-lg-5 col-lg-offset-1">
                    <div class = "row form-group">
                        <select class = "form-control" name="general_inquiries">
                            <option value="" disabled selected>General Inquiries</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class = "row form-group">
                        <textarea name="message" class = "form-control textarea-input" placeholder="Message" rows="8" cols="50" name="message" id=""></textarea>
                    </div>
                </div>
                <div class = "col-lg-3 col-lg-offset-9 text-center">
                    <button class = "submit btn"><span>Send Message</span></button>
                </div>
            </div>  
        </div>


        <div class = "our-offices row">
            <div class = "col-lg-12 text-center">
                <h1>Our Offices</h1>
            </div>
            <div class = "col-lg-2 col-lg-offset-1">
                <label class = "country"> Philippines </label>
                <ul>
                    <li id="loc-1" ><a>Manila</a></li>
                    <li id="loc-2" ><a>Cubao</a></></li>
                </ul>
            </div>
            {{--  <div class = "col-lg-4">
                <label class = "country"> United States of America </label>
                <ul>
                    <div class = "col-lg-6">
                        <li><a href = "">Alaska</a></li>
                        <li><a href = "">California</a></li>
                        <li><a href = "">Florida</a></li>
                    </div>
                    <div class = "col-lg-6">
                        <li><a href = "">Hawaii</a></li>
                        <li><a href = "">Massachusettes</a></li>
                        <li><a href = "">Texas</a></li>
                    </div>  
                </ul>
            </div>
            <div class = "col-lg-4">
                <label class = "country"> Canada </label>
                <ul>
                    <div class = "col-lg-6">
                        <li><a href = "">Alberta</a></li>
                        <li><a href = "">British Columbia</a></li>
                        <li><a href = "">Manitoba</a></li>
                    </div>
                    <div class = "col-lg-6">
                        <li><a href = "">New Brunswick</a></li>
                        <li><a href = "">New Foundland and Labrador</a></li>
                    </div>  
                </ul>
            </div>  --}}
        </div>

        <div class = "country-city-offices row">
            <div class = "col-lg-5 col-lg-offset-1">
                <div class = "row top-header">
                    <div class = "col-lg-2">
                        <h1 class = "city-header inline-header">Manila</h1>
                    </div>
                    <div class = "col-lg-1">
                        <h4 class = "country-header inline-header">Philippines</h4>
                    </div>
                </div>
                <div class = "office-details-makati row" id=cont-1>
                    <div class = "col-lg-12">
                        <h4 id = "telephone" name = "telephone"><i class="fa fa-phone" aria-hidden="true"></i> (02) 554 1465 </h4>
                    </div>
                    <div class = "col-lg-12">
                        <h4 id = "mobilephone" name="mobilephone"><i class="fa fa-mobile" aria-hidden="true"></i> (0917) 554 1465 | (0920) 554156 </h4>
                    </div>
                     <div class = "col-lg-12">
                        <h4 id = "address" name="address"> <i class="fa fa-map-pin" aria-hidden="true"></i> Office 10, University Tower 1, 829 - 831 Moret Street, Sampaloc Manila ‎‎1008 </h4> 
                    </div>
                     <div class = "col-lg-12">
                        <h4 id = "hours" name="hours"><i class="fa fa-clock-o" aria-hidden="true"></i> Office Hours (Open on Holidays)</h4>
                    </div>
                    <div class="col-lg-12">
                        <h4 id = "hours" name="hours">Monday to Saturday | 9:00AM - 7:00PM  </h4>
                    </div>
                    <div class = "col-lg-12">
                        <h4 id = "hours" name="hours"> <i class="fa fa-envelope-o" aria-hidden="true"></i> info@visionph.com | inquiry@visionph.com </h4>
                    </div>
                    <div class="col-lg-12">
                        <span>Follow us: </span>
                        <a href="https://www.facebook.com/visionphil/"><i class="fa fa-facebook-f" style="font-size:20px; padding-right:1%;"></i></a>
                        <a href="https://twitter.com/onevisionph"><i class="fa fa-twitter" style="font-size:20px; padding-right:1%;"></i></a>
                        <i class="fa fa-instagram" style="font-size:20px; padding-right:1%;"></i>
                        <a href=""><i class="fa fa-linkedin" style="font-size:20px; padding-right:1%;"></i></a>
                    </div>
                </div>

                <div class = "office-details-cubao row" id=cont-2>
                    <div class = "col-lg-12">
                        <h4 id = "telephone" name = "telephone"><i class="fa fa-phone" aria-hidden="true"></i> (02) 554 1465 </h4>
                    </div>
                    <div class = "col-lg-12">
                        <h4 id = "mobilephone" name="mobilephone"><i class="fa fa-mobile" aria-hidden="true"></i> (0917) 554 1465 | (0920) 554156 </h4>
                    </div>
                     <div class = "col-lg-12">
                        <h4 id = "address" name="address"> <i class="fa fa-map-pin" aria-hidden="true"></i>Unit 320 - 321, Spark Place, P. Tuazon cor, 10th Avenue, Cubao, Quezon City, Metro Manila 1109 </h4> 
                    </div>
                     <div class = "col-lg-12">
                        <h4 id = "hours" name="hours"> <i class="fa fa-clock-o" aria-hidden="true"></i> Office Hours (Open on Holidays) <br> Monday to Saturday | 9:00AM - 7:00PM  </h4>
                    </div>
                    <div class = "col-lg-12">
                        <h4 id = "hours" name="hours"> <i class="fa fa-envelope-o" aria-hidden="true"></i> info@visionph.com </h4>
                    </div>
                    <div class = "col-lg-12">
                        <h4 id = "hours" name="hours"> <i class="fa fa-envelope-o" aria-hidden="true"></i> inquiry@visionph.com </h4>
                    </div>
                    <div class="col-lg-12">
                        <span>Follow us: </span>
                        <a href="https://www.facebook.com/visionphil/"><i class="fa fa-facebook-f" style="font-size:20px; padding-right:4%;"></i></a>     
                        <a href="https://twitter.com/onevisionph"><i class="fa fa-twitter" style="font-size:20px; padding-right:4%;"></i></a>
                        <i class="fa fa-instagram" style="font-size:20px; padding-right:4%;"></i>
                        <a href=""><i class="fa fa-linkedin" style="font-size:20px; padding-right:4%;"></i></a>   
                    </div>
                 </div>
            </div>
            <div class = "col-lg-5 col-lg-offset-1" id="map-1">
                <div class = "map">
                    <img src="{{ URL::asset('image/manila.png')}}" class="img img-responsive" alt="Location Map">
                </div>
            </div>
            <div class = "col-lg-5 col-lg-offset-1" id="map-2">
                <div class = "map">
                    <img src="{{ URL::asset('image/cubao.png')}}" class="img img-responsive" alt="Location Map">
                </div>
            </div>

        </div>






    {{---------------------------------------------  MOBILE RESPONSIVE  -----------------------------------------------------}}

    <div class="our-offices-mobile hidden-lg hidden-md">
        <div class = "col-lg-12 text-center">
            <h1>Our Offices</h1>
        </div>
        <div class=col-lg-12>
                <div class="col-lg-4 col-lg-offset-1">
                        <div class ="row form-group">
                             <select class = "form-control" name="country" id="">
                                <option value="" disabled selected>Philippines</option>
                                <option value="PH">Philippines</option>
                            </select>
                            <select class = "form-control" name="city" id="thecity">
                                    <option value="" disabled selected>Manila</option>
                                    <option value="PS">Manila</option>
                                    <option value="PA">Cubao</option>
                            </select>
                        </div>
                 </div>  
        </div>
    </div>

        <div class = "office-details-mobile row hidden-lg hidden-md col-lg-12">
            <div class = "col-lg-12">
                <h4 id = "telephone" name = "telephone"><i class="fa fa-phone" aria-hidden="true"></i> (02) 554 1465 </h4>
            </div>
            <div class = "col-lg-12">
                <h4 id = "mobilephone" name="mobilephone"><i class="fa fa-mobile" aria-hidden="true"></i> (0917) 554 1465 | (0920) 554156 </h4>
            </div>
             <div class = "col-lg-12">
                <h4 id = "address" name="address"> <i class="fa fa-map-pin" aria-hidden="true"></i> Office 10, University Tower 1, 829 - 831 Moret Street, Sampaloc Manila ‎‎1008 </h4> 
            </div>
             <div class = "col-lg-12">
                <h4 id = "hours" name="hours"> <i class="fa fa-clock-o" aria-hidden="true"></i> Office Hours (Open on Holidays) <br> Monday to Saturday | 9:00AM - 7:00PM  </h4>
            </div>
            <div class = "col-lg-12">
                <h4 id = "hours" name="hours"> <i class="fa fa-envelope-o" aria-hidden="true"></i> info@visionph.com </h4>
            </div>
            <div class = "col-lg-12">
                <h4 id = "hours" name="hours"> <i class="fa fa-envelope-o" aria-hidden="true"></i> inquiry@visionph.com </h4>
            </div>
            <div class="col-lg-12">
                <span>Follow us: </span>
                <a href="https://www.facebook.com/visionphil/"><i class="fa fa-facebook-f" style="font-size:20px; padding-right:4%;"></i></a>     
                <a href="https://twitter.com/onevisionph"><i class="fa fa-twitter" style="font-size:20px; padding-right:4%;"></i></a>
                <i class="fa fa-instagram" style="font-size:20px; padding-right:4%;"></i>
                <a href=""><i class="fa fa-linkedin" style="font-size:20px; padding-right:4%;"></i></a>   
            </div>
         </div>


<!--SCRIPT JS -->
<script>
    
    var theloc1 = document.getElementById("loc-1");
    var theloc2 = document.getElementById("loc-2");
    
    var thecon1 = document.getElementById("cont-1");
    var thecon2 = document.getElementById("cont-2");

    var themap1 = document.getElementById("map-1");
    var themap2 = document.getElementById("map-2");

    theloc1.onclick = function() {
        //cont
        thecon1.style.display = "block";
        thecon2.style.display = "none";
        //map
        themap1.style.display = "block";
        themap2.style.display = "none";
    }
    theloc2.onclick = function() {
        //cont
        thecon1.style.display = "none";
        thecon2.style.display = "block";
        //map
        themap2.style.display = "block";
        themap1.style.display = "none";
    }

    jQuery(function(){

        jQuery('#thecity').change(function(){
            var selectValue = jQuery(this).val();

            if(selectValue === "Manila"){

            } else if(selectValue === "Cubao"){
                alert('22222222');
            }
        });
    });
</script>


</form>
@stop
