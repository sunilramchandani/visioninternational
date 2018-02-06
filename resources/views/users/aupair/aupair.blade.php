@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/aupair.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<form action="" method="post" role="form">
 {{csrf_field()}}
<div class = "col-lg-12 whole-page">
    <img src="{{ URL::asset('image/photos/Au-Pair.png')}}" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
    <div class = "text-inside-header-picture">
        <div class = "row dynamic-text-container">
            <div class ="col-lg-4 dynamic-text-container-box">
                <h4> UNITED STATES </h4>
                <H1> AU PAIR </H1>
                <p class ="p-dynamic"> Immerse yourself in another culture all while being of service to others</p>
            </div>   
        </div>
            </div>

    
    <div class = "row text-center what-next-text">
        <h2 id=whatsnext-title>What is Au Pair?</h2>
        <p id=about-next>The Au Pair exchange program allows carefully selected young people to live</p>
        <p id=about-next>with American families and assist with childcare.</p>
    </div>


    <!--pair icons -->

    <div class="text-center row"> 
            <div class = "row aupair">
                <div class="aupair-icon aupair-icon-left  col-lg-4 col-lg-offset-2">
                    <img src="{{URL:: asset('image/icons/10.png') }}" height = "60%" class = "logo-aupair-icon">
                    <h4 class = "aupair-icon-text"> Au pairs benefits from the enriching experience of learning about American culture during their stay with a host family.</h4>
                </div>

                <div class="aupair-icon aupair-icon-right col-lg-4">
                     <img src="{{URL:: asset('image/icons/8.png') }}" height = "60%"class = "logo-aupair-icon">
                     <h4 class = "aupair-icon-text"> Host family benefits from having consistent, reliable, in-home childcare and the opportunity to learn about the au pair and their culture.</h4>
                </div>
            </div>
    </div>

    <!--What you need -->
    <div class = "row text-center what-next-text">
        <h2 id=whatsnext-title>What you need?</h2>
        <p id=about-next>This program demands a high level of excellence and a desire to be of service.</p>
        <p id=about-next>Check if you fit what we are looking for!</p>
    </div>
    <div class="text-center row"> 
            <div class = "row aupair">
                <div class="aupair-icon2 aupair-icon-left col-lg-4 col-lg-offset-2">
                    <img src="{{URL:: asset('image/icons/9.png') }}" height = "40%" class = "logo-aupair-icon">
                    <h3 class = "icon-title">Qualifications</h3>
                    <h4 class = "aupair-icon-text"> Au pairs benefits from the enriching experience of learning about American culture during their stay with a host family.</h4>
                    <a href class="btn locate-me">View Qualifications</a>
                </div>

                <div class="aupair-icon2 aupair-icon-right col-lg-4">
                     <img src="{{URL:: asset('image/icons/6.png') }}" height = "40%" class = "logo-aupair-icon">
                     <h3 class = "icon-title">Requirements</h3>
                     <h4 class = "aupair-icon-text"> Host family benefits from having consistent, reliable, in-home childcare and the opportunity to learn about the au pair and their culture.</h4>
                     <a href class="btn locate-me">View Requirements</a>
                </div>
            </div>
    </div>
<!--whats next?-->
<div class = "container">
    <!-- number 1 -->
    <div class = "row">
        <div class = "col-lg-12 ">
            <div class = "row text-center what-next-text">
                <h2 id=whatsnext-title>What's Next?</h2>
                <p id=about-next>Our process is  smooth and easy. We can facilitate your application</p>
                <p id=about-next>and get you to your dream destination as soon as possible!</p>
            </div>


            <div class="text-center boxshadow row"> 
                <img src="{{URL:: asset('image/circle.png') }}" class = "number-icon"/>
                <div class="internship-icon col-md-6">
                    <img src="{{URL:: asset('image/icons/Reserve-icon.png') }}" class = "application-logo">
                    <h1 id=reserve-title>Reservation</h1>
                    <p id=p-icon>Fill up the application form and pay for your reservation</p>
                </div>

                <div class="intership-content col-md-6">
                    <p id=p-content>After paying your reservation,please scan or take a photo of the deposit slip and send to us. Upon receiving your receipt, we will issue you our welcome kit and assist you to complete your online au pair account.</p>
                    <a href class="btn locate-me">Download Reservation Form</a>
                </div>
             </div>


        </div>
    </div>
    <!--number 2 -->
    <div class = "row">
        <div class = "col-lg-12 ">
            <div class="text-center boxshadow row"> 
                 <img src="{{URL:: asset('image/circle2.png') }}" class = "number-icon2"/>
                 <div class="internship-icon col-md-6">
                    <img src="{{URL:: asset('image/icons/5.png') }}" class = "application-logo">
                    <h1 id=reserve-title>Application</h1>
                    <p id=p-icon>Pre-Training & Screening </p>
                 </div>

                <div class="intership-content col-md-6">
                    <p id=p-content>Deposit the first installment of $450 USD to commence and complete final assessment interviews. We will provide the training you need to ace your interviews. Your profile will go live for host families to view and select you. After matching with host family they will conduct 2 skype interviews with you before both parties can confirm a match.</p>
                    <p id=p-content-red>If you back out after receiving a job offer, the first installment will not be refundable.</p>
                </div>
             </div>
        </div>
    </div>
    <!--number 3 -->
    <div class = "row">
        <div class = "col-lg-12 ">
            <div class="text-center boxshadow row">
                <img src="{{URL:: asset('image/circle3.png') }}" class = "number-icon3"/> 
                <div class="internship-icon col-md-6">
                    <img src="{{URL:: asset('image/icons/7.png') }}" class = "application-logo">
                    <h1 id=reserve-title>Reservation</h1>
                    <p id=p-icon>Fill up the application form and pay for your reservation</p>
                </div>

                <div class="intership-content col-md-6">
                    <p id=p-content>Deposit the second installment of $1,550 USD Deposit is inclusive of VAT, DS2019 and medical insurance, Complete documentation requirements and receive training to pass your VISA interview. If you fail at the interview, we will refund the second installment. Includes round-trip airfare to the US</p>
                    <p id=p-content-red>Our proven training as helped 100% of our applicants pass. If you fail, we refund your money! Early termination of the program, for any possible reason, will result to applicant's personal purchase of return ticket</p>
                </div>
             </div>
        </div>
    </div>
    <!--reminders-->
    <div class = "row">
        <div class = "col-lg-12 ">
            <div class="text-center boxshadow row"> 
                 <div class="internship-icon col-md-6">
                    <img src="{{URL:: asset('image/icons/11.png') }}" class = "application-logo">
                    <h1 id=reserve-title>Reminders</h1>
                 </div>

                <div class="intership-content col-md-6">
                    <h4>
                        <li>Pay $160 USD for US Embassy Interview Appointment</li>
                        <li>Program Includes food, lodging and a weekly stipend of $197 USD</li>
                        <li>Refunds excludes $160 US Embassy and $180 SEVIS fees</li>
                    </h4>
                </div>
             </div>
        </div>
    </div>
    <!--mother div end -->
</div>

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
                <div class = "col-lg-12">
                    <div class = "col-lg-8 testimony-description">
                        <blockquote>
                            This program is one of the challenging experiences, joyful events, and new things that ii've learned and molded me to become a better person
                            <cite>Karissa MArie Salengua</cite>
                            <cite>Work & Travel Program, California</cite>
                        </blockquote>
                    </div>
                    <div clas = "col-lg-4">
                         <img src="{{ URL::asset('image/uploaded_featured_image')}}/joy.png" class="img img-rounded testimony-picture" alt="Company Banner">
                    </div>
                </div>
            </div>
        </div>
<!--end of testimony -->
</div>
<div class = "filler row" id = "filler">
</div>
</form>