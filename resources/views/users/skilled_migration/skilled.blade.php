@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/internship-company.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<form action="" method="post" role="form">
 {{csrf_field()}}
<div class = "col-xs-12 whole-page">

    <img src="{{ URL::asset('image/photos/Au-Pair.png')}}" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
    <div class = "text-inside-header-picture">
        <div class = "row dynamic-text-container">
            <div class ="col-lg-4 col-md-4 col-sm-6 col-xs-12 dynamic-text-container-box">
                <h4> AUSTRALIA </h4>
                <H1> SKILLED WORK VISA </H1>
                <p class ="p-dynamic"> Get ahead in your careers with experience abroad</p>
            </div>

        </div>
    </div>


<div class = "container">
    <!-- number 1 -->
    <div class = "row">
        <div class = "col-xs-12">
            <div class = "row text-center what-next-text">
                <h2 id=whatsnext-title>What are the process?</h2>
                <p id=about-next>Our process is  smooth and easy. We can facilitate your application</p>
                <p id=about-next>and get you to your dream destination as soon as possible!</p>
            </div>
            <div class="text-center boxshadow row"> 
                <img src="{{URL:: asset('image/circle.png') }}" class = "number-icon"/>
                <div class="internship-icon col-xs-6">
                    <img src="{{URL:: asset('image/icons/Reserve-icon.png') }}">
                    <div class = "col-xs-8 col-xs-offset-2">
                        <h1 id=reserve-title>Reservation & Application</h1>
                        <p id=p-icon>Fill up the application form and pay for your reservation</p>
                    </div>
                </div>

                <div class="intership-content left-side col-xs-6">
                    <div class = "col-xs-10 col-xs-offset-1">
                        <p id=p-content>  Applicant will then be matched to a host company, this process can take up to 12 weeks, but also has the ability to move much quicker if an applicant is highly qualified and flexible about their interest in multiple locations. </p>
                        <div class="button">
                            <a href = "/faq" class="btn locate-me">How do i make a deposit?</a>
                            <br><br>
                            <a href = "/faq" class="btn locate-me">What documents are required?</a>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
    <!--number 2 -->
    <div class = "row">
        <div class = "col-xs-12">
            <div class="text-center boxshadow row"> 
                 <img src="{{URL:: asset('image/circle2.png') }}" class = "number-icon2"/>
                <div class="internship-icon col-xs-6">
                    {{--  <div class=circle-number>1</div>  --}}
                    <img src="{{URL:: asset('image/icons/Interviews.png') }}">
                    <h1 id=reserve-title>Visa Application</h1>
                    <p id=p-icon>Prepare interviews with the program</p>
                    <p id=p-icon>sponsors and the US embassy</p>
                </div>
                <div class="intership-content col-xs-6">
                    <div class = "col-xs-10 col-xs-offset-1">
                            <p id=p-content>Documents are filed with the Australian Department of Immigration. Participant is approved for the Sponsorship Visa </p>
                            <div class="button">
                                <a href= "/faq" class="btn locate-me">What documents are required?</a>
                            </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
    <!--number 3 -->
    <div class = "row">
        <div class = "col-xs-12">
            <div class="text-center boxshadow row">
                <img src="{{URL:: asset('image/circle3.png') }}" class = "number-icon3"/> 
                <div class="internship-icon col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    {{--  <div class=circle-number>1</div>  --}}
                    <img src="{{URL:: asset('image/icons/flyout.png') }}">
                    <h1 id=reserve-title>Flyout</h1>
                    <p id=p-icon>Book your tickets to the US</p>
                    <p id=p-icon>and enjoy the program!</p>
                </div>

                <div class="intership-content col-xs-6">
                    <div class = "col-xs-10 col-xs-offset-1">
                        <p id=p-content>To ensure your participant is ready to have a successful program applicants will have an orientation prior to their departure to Australia. </p>
                        <div class="button">
                            <a href= "/faq" class="btn locate-me">What topics are included?</a>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
        <!--Rate -->
        <div class = "container">
            <div class = "row">
                <div class = "col-xs-12 rate-container">
                        <div class = "col-xs-6">
                            <div class = "text-left-side col-xs-offset-1">
                                <h2 class = "gradient"> What's the rate? </h2>
                                <h3 class = "gradient1"> There is plenty to experience! </h3>
                            </div>
                            <div class = "row row-price">
                                 <div class = "col-xs-3 col-xs-offset-1">
                                    <strong><p id = "reservation">USD 600</p></strong>
                                </div>
                                <div class = "col-xs-4">
                                    <p>First Installment *</p>
                                </div>
                            </div>
                            <div class = "row row-price">
                                <div class = " col-xs-3 col-xs-offset-1 last-row last-row1">
                                    <strong><p id = "2nd-Installment">USD 3000</p></strong>
                                </div>
                               <div class = "col-md-5 col-sm-4 col-xs-4 last-row">
                                    <p>Second Installment *</p>
                                </div>
                            </div>
                            <div class = "row row-price">
                                 <div class = "col-xs-3 col-xs-offset-1">
                                    <strong><p id = "3rd-Installment">USD 3600</p></strong>
                                </div>
                                <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <p>Total Program Payment</p>
                                </div>
                            </div>
                            <div clas = "row row-price">
                                <div class = "col-xs-6 col-xs-offset-3">
                                    <a class = "btn locate-me" href = "/application?c=SAU"> Apply Now </a>
                                </div>
                            </div>
                            <br>
                            <div class = "row row-price-legend">
                                <div class = "col-xs-offset-1">
                                    <p> The Remaining Program fee of $500AUD + gst/month for <br>the first 12-months is settled via a direct pay roll deduction </p>
                                    <strong><p class = "add-fees">Additional Fees:</p></strong>
                                    <p><strong>Partner or Spouse </strong> = $2500USD </p>
                                    <p><strong>Partner/Spouse + 1 Child</strong> = $3575USD </p>
                                    <p><strong>Each additional child</strong> = $750USD</p>
                                </div>
                            </div>
                        </div>
                        <div class = "col-xs-6 rate-image2">
                             <img src="{{ URL::asset('image/photos/Price.jpg')}}" class="img img-price" alt="Company Banner">
                        </div>
                    </div>
                </div>
            </div>
       

 <!--testimony-->
        <div class="container">
            <div class="row testimony-header">
                <div class=" col-xs-8 col-xs-offset-2 about-font text-center">
                     <h3>Our Community</h3>
                     <p>We are proud to have an amazing community of students and professionals who have received the VIP treatment. Listen to their stories</p>
                </div>
            </div>
            <div class = "row testimony-content">
                <div class = "col-xs-8 testimony-description">
                    <blockquote>
                        This program is one of the challenging experiences, joyful events, and new things that ii've learned and molded me to become a better person
                        <cite>Karissa MArie Salengua</cite>
                        <cite>Work & Travel Program, California</cite>
                    </blockquote>
                </div>
                <div class = "col-xs-4">
                     <img src="{{ URL::asset('image/uploaded_featured_image')}}/joy.png" class="img img-responsive img-rounded testimony-picture" alt="Company Banner"/>
                </div>
            </div>
        </div>
<!--end of testimony -->
</div>
</form>
<div class = "filler row" id = "filler">
</div>
