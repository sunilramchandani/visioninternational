@extends('layouts.master') @section('page-css')
<link rel="stylesheet" href="{{ asset('css/image-preview.css') }}">
<link rel="stylesheet" href="{{ asset('css/blog.css') }}"> @stop @include('layouts.navbar') @section('content')

<div class="whole-page">

    @foreach ($featuredimage_news as $featured)
    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="img img-responsive img-rounded header"
        alt="Company Banner">

    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
    @endforeach

    <div class="col-lg-10 col-lg-offset-1 row back-to-blog">
        <a href="/news" class="back">
            <h3> Back to News </h3>
        </a>
    </div>
  <div class="container">
        <div class="main-page">
            <div class="row">
    {{-- News CONTENT --}}
    <div class="col-xs-12 col-sm-8 blog-content">
        <div class="container-fluid image-blog">
            <div class="row">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @foreach( $news->mainimageupload as $mainnewsimage )

                        <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        @foreach( $news->mainimageupload as $mainnewsimage )

                        <div class="item {{ $loop->first ? ' active' : '' }}">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ URL::asset('image/uploaded_main_news_image')}}/{{$mainnewsimage->image_name}}" class="main-img-reponsive img-responsive "
                                        alt="Company Banner">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- end of carousel -->
        </div>
        <div class="row">
            <div class="col-xs-12 left-main-title2 ">
                <p>
                    <strong>{{$news->title}}</strong>
                </p>
            </div>
            <div class="col-xs-12 left-main-title2 ">
                <p> @foreach ($news->author as $newss) {{$newss->name}} @endforeach | {{Carbon\Carbon::parse($news->date)->toFormattedDateString()}}</p>
            </div>
            <div class="col-xs-12 left-main-title2 ">
                <p class="event-description">{!! $news->body!!}</p>
            </div>
            <div class="col-xs-12 hr-main-title-blog ">
                <hr>
            </div>
        </div>

            {{-- SOCIAL MEDIA SHARE --}}
            <div class="row">
                <div class="col-xs-6 share-title ">
                    <p>
                        <span>Share This Article: </span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank">
                            <i class="fa fa-facebook-f " style="font-size:14px; padding-right:1%; color:black;"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
                            <i class="fa fa-twitter " style="font-size:14px; padding-right:1%; color:black;"></i>
                        </a>
                        <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
                            <i class="fa fa-google-plus " style="font-size:14px; color:black;"></i>
                        </a>
                    </p>
                </div>
                <div class="col-xs-6">
                    <span>Categories: 
                        @foreach($categories as $categories_list)
                            @if($loop->last)
                            {{$categories_list->category_name}}
                            @else
                            {{$categories_list->category_name}},
                            @endif
                        @endforeach
                    </span>
                </div>
            </div>
            {{-- END OF SOCIAL MEDIA --}}

        <br>
        <br> {{-- ABOUT AUTHOR --}}
        <div class="container col-xs-12  about-author" style="margin-top: 20px">
            @foreach ($news->author as $newss)
            <div class="row author-content">
                <div class="col-xs-4">
                    <img src="{{ URL::asset('storage/upload_author_image')}}/{{$newss->image}}" class="img-thumbnail img-responsive " alt="No Author">
                </div>
                <div class="col-xs-8">
                     <p>{{(strip_tags($newss->description))}}</p>
                </div>
            </div>
            @endforeach
        </div>
{{-- END --}} {{-- NEXT & PREVIOUS SLIDER --}}
        <div class="row">
            <div class="container col-xs-12 next-previous-container">
                <div class="col-xs-6 left">
                    <div class="text-left arrow">
                        @if($previousnews != Null)
                        <a href="{{$previousnews->id}}" class="text-left">
                            < Previous</a>
                                <br>
                                <a href="{{$previousnews->id}}" class="text-left">
                                    <h4>{{$previousnews->title}}</h4>
                                </a>
                                @endif
                    </div>
                </div>
                <div class="col-xs-6 right">
                    <div class="text-right arrow">
                        @if($nextnews != Null)
                        <a href="{{$nextnews->id}}" class="text-right">Next ></a>
                        <br>
                        <a href="{{$nextnews->id}}" class="text-right">
                            <h4>{{$nextnews->title}}</h4>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- END 0F SLIDER --}}

    </div>
    {{-- END OF news CONTENT --}} {{-- CATEGORIES AND RECENT POSTS --}}
    <div class="hidden-xs col-sm-4 categories-content">
        <div class="col-xs-12 col-md-11 col-md-offset-1">
            <table class="table table-categories table-borderless table-hover">
                <div class="red-title">
                    <h1>CATEGORIES</h1>
                </div>
                <tbody>
                    
                @foreach ($category_table as $category)
                <tr class='clickable-row' data-href='/news?category_id={{$category->id}}'>
                    <td>{{$category->category_name}}</td>
                    <td>

                            <i style="color:black;">{{$category->newscategorytable_count}}</i>
               
                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>
            <table class="table table-categories table-borderless table-hover">
                <div class="red-title">
                    <h1>RECENT POST</h1>
                </div>
                <tbody>
                    @foreach($news_table as $news)
                    <tr class='clickable-row'>
                        <td>
                            <div id="carousel-example-generic" class="recent-carousel carousel slide" data-ride="carousel">


                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    @foreach( $news->mainimageupload as $mainnewsimage )

                                    <div class="item {{ $loop->first ? ' active' : '' }}">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{ URL::asset('image/uploaded_main_news_image')}}/{{$mainnewsimage->image_name}}" class="caro-img-reponsive img-responsive "
                                                    alt="Company Banner">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- end of carousel -->
                            </div>
                        </td>

                        <td>
                            <p> @foreach ($news->newscategory as $newsz) @if ($loop->first) {{ $newsz->categorylist->category_name
                                }} @endif @endforeach
                            </p>
                            <a href="/news/{{$news->id}}">
                                <i style="color:black;">{{$news->title}}</i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- END --}}



</div>
</div>
</div>


<div class="row" style = "padding-bottom: 5%;"></div>









{{----------------------------------------------------SCRIPTS----------------------------------------------------- --}}
<script type="text/javascript" charset="utf8" src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script type="text/javascript">
    var popupMeta = {
        width: 400,
        height: 400
    }
    $(document).on('click', '.social-share', function (event) {
        event.preventDefault();

        var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
            hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

        var url = $(this).attr('href');
        var popup = window.open(url, 'Social Share',
            'width=' + popupMeta.width + ',height=' + popupMeta.height +
            ',left=' + vpPsition + ',top=' + hPosition +
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            return false;
        }
    });
</script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script>

  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });
</script>
