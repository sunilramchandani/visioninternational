@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/contact-us.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<form action="{{route('contactus.store')}}" method="post" role="form">
        {{csrf_field()}}
        <div class = "content">
        @foreach ($featuredimage_contactus as $featured)
        <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="img img-responsive img-rounded header" alt="Company Banner">
        <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-border" alt="Company Banner">
         <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
        @endforeach
            <div class = "SayHello col-md-10 col-md-offset-1 col-xs-12  ">
                <div class = "col-xs-12 hello text-center">
                    <h1>Say Hello!</h1>
                </div>
                <div class = "col-md-6 col-xs-12">
                    <div class = "col-xs-12">
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
                </div>
                <div class = "col-lg-6">
                    <div class = "col-xs-12">
                        <div class = "row form-group">
                            <select class = "form-control" name="general_inquiries">
                                <option value="General Inquiries" disabled selected>General Inquiries</option>
                                <option value="Career Opportunity">Career Opportunity</option>
                                <option value="Internship">Internship</option>
                                <option value="Au Pair">Au Pair</option>
                                <option value="Work & Travel">Work & Travel</option>
                                <option value="Skilled Work Visa">Skilled Work Visa</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class = "row form-group">
                            <textarea name="message" class = "form-control textarea-input" placeholder="Message" rows="8" cols="50" name="message" id=""></textarea>
                        </div>
                    </div>
                </div>
                <div class = "col-md-2 col-md-offset-10 col-xs-12  text-center">
                    <button class = "submit btn"><span>Send Message</span></button>
                </div>
            </div>  
        </div>


        <div class = "our-offices row">
            <div class = "col-xs-12 text-center">
                <h1>Our Offices</h1>
            </div>
            <div class = "col-xs-2">
                <div class =  "col-xs-5 col-xs-offset-7">
                    <label class = "country"> Philippines </label>
                    <ul>
                        <li id="loc-1" ><a>Manila</a></li>
                        <li id="loc-2" ><a>Cubao</a></></li>
                        <li id="loc-3" ><a>Baguio</a></></li>
                    </ul>
                </div>
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
            <div class = "col-xs-5 col-xs-offset-1">
                <div class =  "col-xs-12">
                    <div class = "row top-header">
                        <div class = "col-xs-12">
                            <span class = "h2">Manila <h4 class = "country-header inline-header">Philippines</h4> </span>
                           
                        </div>
                    </div>

                        {{--  MANILA OFFICE  --}}
                    <div class = "office-details-manila row" id=cont-1>
                        <div class = "col-xs-12">
                            <p id = "telephone" name = "telephone"><i class="fa fa-phone" aria-hidden="true"></i> (02) 554 1465 </p>
                        </div>
                        <div class = "col-xs-12">
                            <p id = "mobilephone" name="mobilephone"><i class="fa fa-mobile" aria-hidden="true"></i> (0917) 554 1465 | (0920) 554156 </p>
                        </div>
                         <div class = "col-xs-12">
                            <p id = "address" name="address"> <i class="fa fa-map-pin" aria-hidden="true"></i> Office 10, University Tower 1, 829 - 831 Moret Street, Sampaloc Manila ‎‎1008 </p> 
                        </div>
                         <div class = "col-xs-12">
                            <p id = "hours" name="hours"><i class="fa fa-clock-o" aria-hidden="true"></i> Office Hours (Open on Holidays)</p>
                        </div>
                        <div class="col-xs-12">
                            <p id = "hours" name="hours">Monday to Saturday | 9:00AM - 7:00PM  </p>
                        </div>
                        <div class = "col-xs-12">
                            <p id = "hours" name="hours"> <i class="fa fa-envelope-o" aria-hidden="true"></i> info@visionph.com | inquiry@visionph.com </p>
                        </div>
                        <div class="col-xs-12">
                            <span>Follow us: </span>
                            <a href="https://www.facebook.com/visionphil/"><i class="fa fa-facebook-f" style="font-size:20px; padding-right:1%;"></i></a>
                            <a href="https://twitter.com/onevisionph"><i class="fa fa-twitter" style="font-size:20px; padding-right:1%;"></i></a>
                            <i class="fa fa-instagram" style="font-size:20px; padding-right:1%;"></i>
                            <a href=""><i class="fa fa-linkedin" style="font-size:20px; padding-right:1%;"></i></a>
                        </div>
                    </div>

                    {{--  CUBAO OFFICE --}}
                    <div class = "office-details-cubao row" id=cont-2>
                        <div class = "col-xs-12">
                            <p id = "telephone" name = "telephone"><i class="fa fa-phone" aria-hidden="true"></i> (02) 554 1465 </p>
                        </div>
                        <div class = "col-xs-12">
                            <p id = "mobilephone" name="mobilephone"><i class="fa fa-mobile" aria-hidden="true"></i> (0917) 554 1465 | (0920) 554156 </p>
                        </div>
                         <div class = "col-xs-12">
                            <p id = "address" name="address"> <i class="fa fa-map-pin" aria-hidden="true"></i>Unit 320 - 321, Spark Place, P. Tuazon cor, 10th Avenue, Cubao, Quezon City, Metro Manila 1109 </p> 
                        </div>
                         <div class = "col-xs-12">
                            <p id = "hours" name="hours"> <i class="fa fa-clock-o" aria-hidden="true"></i> Office Hours (Open on Holidays)</p>
                        </div>
                        <div class="col-xs-12">
                            <p id = "hours" name="hours">Monday to Saturday | 9:00AM - 7:00PM  </p>
                        </div>
                        <div class = "col-xs-12">
                            <p id = "hours" name="hours"> <i class="fa fa-envelope-o" aria-hidden="true"></i> info@visionph.com </p>
                        </div>
                        <div class = "col-xs-12">
                            <p id = "hours" name="hours"> <i class="fa fa-envelope-o" aria-hidden="true"></i> inquiry@visionph.com </p>
                        </div>
                        <div class="col-xs-12">
                            <span>Follow us: </span>
                            <a href="https://www.facebook.com/visionphil/"><i class="fa fa-facebook-f" style="font-size:20px; padding-right:4%;"></i></a>     
                            <a href="https://twitter.com/onevisionph"><i class="fa fa-twitter" style="font-size:20px; padding-right:4%;"></i></a>
                            <i class="fa fa-instagram" style="font-size:20px; padding-right:4%;"></i>
                            <a href=""><i class="fa fa-linkedin" style="font-size:20px; padding-right:4%;"></i></a>   
                        </div>
                     </div>

                     {{--  BAGUIO OFFICE  --}}
                     <div class = "office-details-manila row" id=cont-3>
                        <div class = "col-xs-12">
                            <p id = "telephone" name = "telephone"><i class="fa fa-phone" aria-hidden="true"></i> (02) 554 1465 </p>
                        </div>
                        <div class = "col-xs-12">
                            <p id = "mobilephone" name="mobilephone"><i class="fa fa-mobile" aria-hidden="true"></i> (0917) 554 1465 | (0920) 554156 </p>
                        </div>
                         <div class = "col-xs-12">
                            <p id = "address" name="address"> <i class="fa fa-map-pin" aria-hidden="true"></i> No. 42 Claro M. Recto Street Corner Leonard Wood Road, Baguio City 2600, 42 Claro M. Recto St, Baguio, 2600 Benguet </p> 
                        </div>
                         <div class = "col-xs-12">
                            <p id = "hours" name="hours"><i class="fa fa-clock-o" aria-hidden="true"></i> Office Hours (Open on Holidays)</p>
                        </div>
                        <div class="col-xs-12">
                            <p id = "hours" name="hours">Monday to Saturday | 9:00AM - 7:00PM  </p>
                        </div>
                        <div class = "col-xs-12">
                            <p id = "hours" name="hours"> <i class="fa fa-envelope-o" aria-hidden="true"></i> info@visionph.com | inquiry@visionph.com </p>
                        </div>
                        <div class="col-lg-12">
                            <span>Follow us: </span>
                            <a href="https://www.facebook.com/visionphil/"><i class="fa fa-facebook-f" style="font-size:20px; padding-right:1%;"></i></a>
                            <a href="https://twitter.com/onevisionph"><i class="fa fa-twitter" style="font-size:20px; padding-right:1%;"></i></a>
                            <i class="fa fa-instagram" style="font-size:20px; padding-right:1%;"></i>
                            <a href=""><i class="fa fa-linkedin" style="font-size:20px; padding-right:1%;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "col-xs-5" id="map-1">
                <div class =  "col-xs-12">
                    <div class = "map">
                        <img src="{{ URL::asset('image/manila.png')}}" class="img img-responsive" alt="Location Map">
                    </div>
                </div>
            </div>
            <div class = "col-xs-5" id="map-2">
                <div class =  "col-xs-12">
                    <div class = "map">
                        <img src="{{ URL::asset('image/cubao.png')}}" class="img img-responsive" alt="Location Map">
                    </div>
                </div>
            </div>
            <div class = "col-xs-5" id="map-3">
                <div class =  "col-xs-12">
                    <div class = "map">
                        <img src="{{ URL::asset('image/baguio.png')}}" class="img img-responsive" alt="Location Map">
                    </div>
                </div>
            </div>                                                                                                                      
        </div>

    {{---------------------------------------------  MOBILE RESPONSIVE --------------------------------------}}

    <div class="our-offices-mobile hidden-lg hidden-md">
        <div class = "col-xs-12 text-center">
            <h1>Our Offices</h1>
        </div>
        <div class=col-xs-12>
            <div class="col-xs-12">
                    <div class ="row form-group">
                         <select class = "form-control" name="country" id="country-mobile">
                            <option value="PH" selected>Philippines</option>
                        </select>
                        <select class = "form-control" name="city" id="city-mobile">
                                <option value="manila" selected>Manila</option>
                                <option value="cubao">Cubao</option>
                                <option value="baguio">Baguio</option>
                        </select>
                    </div>
             </div>   
        </div>
    </div>

    

        <div class = "office-details-mobile row hidden-lg hidden-md">
            <div class = "col-xs-12">
                <p id = "telephone" name = "telephone"><i class="fa fa-phone" aria-hidden="true"></i> (02) 554 1465 </p>
            </div>
            <div class = "col-xs-12">
                <p id = "mobilephone" name="mobilephone"><i class="fa fa-mobile" aria-hidden="true"></i> (0917) 554 1465 | (0920) 554156 </p>
            </div>
             <div class = "col-xs-12">
                <p id = "address" name="address"> <i class="fa fa-map-pin" aria-hidden="true"></i> Office 10, University Tower 1, 829 - 831 Moret Street, Sampaloc Manila ‎‎1008 </p> 
            </div>
             <div class = "col-xs-12">
                <p id = "hours" name="hours"> <i class="fa fa-clock-o" aria-hidden="true"></i> Office Hours (Open on Holidays) <br> Monday to Saturday | 9:00AM - 7:00PM  </p>
            </div>
            <div class = "col-xs-12">
                <p id = "email" name="email"> <i class="fa fa-envelope-o" aria-hidden="true"></i> info@visionph.com </p>
            </div>
            <div class = "col-xs-12">
                <p id = "email" name="email"> <i class="fa fa-envelope-o" aria-hidden="true"></i> inquiry@visionph.com </p>
            </div>
            <div class="col-xs-12">
                <span>Follow us: </span>
                <a href="https://www.facebook.com/visionphil/"><i class="fa fa-facebook-f" style="font-size:20px; padding-right:4%;"></i></a>     
                <a href="https://twitter.com/onevisionph"><i class="fa fa-twitter" style="font-size:20px; padding-right:4%;"></i></a>
                <i class="fa fa-instagram" style="font-size:20px; padding-right:4%;"></i>
                <a href=""><i class="fa fa-linkedin" style="font-size:20px; padding-right:4%;"></i></a>   
            </div>
            <div class = "col-xs-12" id="map-mobile-1">
                <div class = "map">
                    <img src="{{ URL::asset('image/manila.png')}}" class="img img-responsive" alt="Location Map">
                </div>
            </div>
            <div class = "col-xs-12" id="map-mobile-2">
                <div class = "map">
                    <img src="{{ URL::asset('image/cubao.png')}}" class="img img-responsive" alt="Location Map">
                </div>
            </div>
            <div class = "col-xs-12" id="map-mobile-3">
                <div class = "map">
                    <img src="{{ URL::asset('image/baguio.png')}}" class="img img-responsive" alt="Location Map">
                </div>
            </div>
         </div>
</form>

<!---------------------------------------------SCRIPT JS ---------------------------------------------------------------->
<script>
    var e = document.getElementById("city-mobile");
    var themap1 = document.getElementById("map-mobile-1");
    var themap2 = document.getElementById("map-mobile-2");
    var themap3 = document.getElementById("map-mobile-3");

    e.onchange = function() {
        var strUser = e.options[e.selectedIndex].value;
        if(strUser == "manila"){
            document.getElementById('address').innerHTML = "Office 10, University Tower 1, 829 - 831 Moret Street, Sampaloc Manila ‎‎1008";
            document.getElementById('hours').innerHTML = "Office Hours (Open on Holidays) <br> Monday to Saturday | 9:00AM - 7:00PM  ";
            themap1.style.display = "block";
            themap2.style.display = "none";
            themap3.style.display = "none";
        }
        if(strUser == "cubao"){
            document.getElementById('address').innerHTML = "Unit 320 - 321, Spark Place, P. Tuazon cor, 10th Avenue, Cubao, Quezon City,  Metro Manila 1109";
            document.getElementById('hours').innerHTML = "Office Hours (Open on Holidays) <br> Monday to Saturday | 9:00AM - 7:00PM  ";
            themap2.style.display = "block";
            themap1.style.display = "none";
            themap3.style.display = "none";
        }   
        if(strUser == "baguio"){
            document.getElementById('address').innerHTML = " No. 42 Claro M. Recto Street Corner Leonard Wood Road, Baguio City 2600, 42 Claro M. Recto St, Baguio, 2600 Benguet";
            document.getElementById('hours').innerHTML = "Monday to Saturday | 9:00AM - 7:00PM";
            themap2.style.display = "none";
            themap1.style.display = "none";
            themap3.style.display = 'block';
        }   
    }



    var theloc1 = document.getElementById("loc-1");
    var theloc2 = document.getElementById("loc-2");
    var theloc3 = document.getElementById("loc-3");
    

    
    var thecon1 = document.getElementById("cont-1");
    var thecon2 = document.getElementById("cont-2");
    var thecon3 = document.getElementById("cont-3");


    var themap1 = document.getElementById("map-1");
    var themap2 = document.getElementById("map-2");
    var themap3 = document.getElementById("map-3");



    theloc1.onclick = function() {
        //cont
        thecon1.style.display = "block";
        thecon2.style.display = "none";
        thecon3.style.display = "none";
        //map
        themap1.style.display = "block";
        themap2.style.display = "none";
        themap3.style.display = "none";
    }
    theloc2.onclick = function() {
        //cont
        thecon1.style.display = "none";
        thecon2.style.display = "block";
        thecon3.style.display = "none";
        //map
        themap2.style.display = "block";
        themap1.style.display = "none";
        themap3.style.display = "none";
    }
    theloc3.onclick = function(){
         //cont
         thecon1.style.display = "none";
         thecon2.style.display = "none";
         thecon3.style.display = "block";
         //map
         themap2.style.display = "none";
         themap1.style.display = "none";
         themap3.style.display = 'block';
    }

</script>


</form>
@stop
