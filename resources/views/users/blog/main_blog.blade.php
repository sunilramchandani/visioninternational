@extends('layouts.master') @section('page-css')
<link rel="stylesheet" href="{{ asset('css/blog.css') }}"> @stop @include('layouts.navbar') @section('content')
<form action="" method="post" role="form">
    {{csrf_field()}}
    <div class="col-lg-12 whole-page">
        @foreach ($featuredimage_blog as $featured)
        <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="img img-responsive img-rounded header"
            alt="Company Banner">
        <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
        <div class="text-inside-header-picture">
            <div class="row dynamic-text-container">
                <div class="col-lg-4 dynamic-text-container-box">
                    <h4> UNITED STATES </h4>
                    <H1> INTERNSHIP </H1>
                    <p class="p-dynamic"> Get ahead in your careers with an internship experience abroad</p>
                </div>

                @endforeach
            </div>
        </div>

        <div>
            <div class="container-fluid " >
                <div class="main-page">
                    <div class="row">
                        <!-- left side -->
                        <div class="col-lg-8">
                            @foreach($blog_table as $blog)
                            <div class="image-blog">
                                <div class="row">
                                    <div class="col-lg-12  ">
                                        <img src="{{ URL::asset('image/blog/carousel-blog1.jpg')}}" class="main-img-reponsive img-responsive " alt="Company Banner">
                                    </div>
                                   
                                </div>


                                <div class="row">
                                    <div class="col-lg-12 left-main-title ">
                                        <strong>Blog Title</strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 left-main-title ">
                                        Author: Yanni Pranini | October
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-11 left-main-title ">
                                        {{ \Illuminate\Support\Str::words(strip_tags($blog->body), 30,' ... ')}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 left-main-title ">
                                        <a href="#" class="submit btn">
                                            <span>Read More</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 hr-main-title ">
                                            <hr>
                                    </div>
                                </div>
                            <!-- end of image-blog -->
                            </div>
                            <br>
                            @endforeach
                        <!-- end of col lg-8 image-blog -->
                        </div>

                        <!-- right side -->
                        <div class="col-lg-4 " style="background-color:lavender;">Search Bar
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <strong>Blog Title</strong>
                                </div>
                            </div>
                        </div>

                    <!-- end of row -->
                    </div>
                 <!--end of main-page-->
                </div>
            <!-- end of container -->
            </div>