@extends('layouts.master') @section('page-css')
<link rel="stylesheet" href="{{ asset('css/image-preview.css') }}">
<link rel="stylesheet" href="{{ asset('css/blog.css') }}"> @stop @include('layouts.navbar') @section('content')

<div class="whole-page">

    <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
    <div class="col-lg-10 col-lg-offset-1 row back-to-blog">
        <a href="/news" class="back">
            <h3> Back to News </h3>
        </a>
    </div>

    {{-- News CONTENT --}}
    <div class="col-lg-8 col-lg-offset-1 blog-content">
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
            <div class="row">
                <div class="col-lg-12 left-main-title2 " style="margin-left:10px">
                    <p>
                        <strong>{{$news->title}}</strong>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 left-main-title2 " style="margin-left:10px" >
                    <p> @foreach ($news->author as $newss) {{$newss->name}} @endforeach | {{Carbon\Carbon::parse($news->date)->toFormattedDateString()}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 left-main-title2 " style="margin-left:10px">
                    <p class="event-description">{!! $news->body!!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 hr-main-title-blog ">
                    <hr>
                </div>
            </div>

            {{-- SOCIAL MEDIA SHARE --}}
            <div class="row">
                <div class="col-lg-7 share-title " style="margin-left:10px">
                    <p>
                        <span>Share This Article: </span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank">
                            <i class="fa fa-facebook-f " style="font-size:20px; padding-right:1%; color:black;"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
                            <i class="fa fa-twitter " style="font-size:20px; padding-right:1%; color:black;"></i>
                        </a>
                        <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
                            <i class="fa fa-google-plus " style="font-size:20px; color:black;"></i>
                        </a>
                    </p>
                </div>
                <div class="col-lg-4" style="margin-left:10px">
                    <p>
                        <span>Categories: @foreach($categories as $categories_list) {{$categories_list->category_name}}, @endforeach

                        </span>
                    </p>
                </div>
            </div>
            {{-- END OF SOCIAL MEDIA --}}
        </div>

        <br>
        <br> {{-- AUTHOR MOBILE --}}

        <div class="container col-lg-8 about-author-mobile">
            <div class="row author-content">
<<<<<<< HEAD
                <div class="col-xs-4">
=======
                <div class="col-lg-2 col-sm-2 col-lg-offset-2">
                    @foreach ($news->author as $newss)
>>>>>>> f40b29142024c6a41b013b6cad2c31271f340fb5
                    <img src="{{ URL::asset('storage/upload_author_image')}}/{{$newss->image}}" class="img-thumbnail img-responsive " alt="No Author">
                </div>


                <p>
                    <div class="col-lg-4 col-sm-4" style="padding:0;">
                        {{(strip_tags($newss->description))}}
                    </div>
                </p>

                @endforeach
            </div>
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
    <div class="col-lg-3 col-sm-3 categories-content">
        <table class="table table-categories table-borderless table-hover">
            <div class="red-title">
                <h1>CATEGORIES</h1>
            </div>
            <tbody>
                @foreach ($category_table as $category)
                <tr class='clickable-row'>
                    <td>{{$category->category_name}}</td>
                    <td>
                        <a href="/news?category_id={{$category->id}}">
                            <i style="color:black;">{{$category->newscategorytable_count}}</i>
                        </a>
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
    {{-- END --}}



</div>
</div>

{{-- ABOUT AUTHOR --}}
<div class="container col-lg-12  about-author" style="margin-top: 20px">
    <div class="row author-content">
        <div class="col-lg-2 col-sm-2 col-lg-offset-2">
            @foreach ($news->author as $newss)
            <img src="{{ URL::asset('storage/upload_author_image')}}/{{$newss->image}}" class="img-thumbnail img-responsive " alt="No Author">
        </div>

        <p>
            <div class="col-lg-4 col-sm-4">
                {{(strip_tags($newss->description))}}
            </div>
        </p>

        @endforeach
    </div>
</div>
{{-- END --}}

<div class="row"></div>









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