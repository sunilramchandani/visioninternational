@extends('layouts.master') @section('page-css')
<link rel="stylesheet" href="{{ asset('css/image-preview.css') }}">
<link rel="stylesheet" href="{{ asset('css/blog.css') }}"> @stop @include('layouts.navbar') @section('content')

<div class="whole-page">

    <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
    <div class="col-lg-10 col-lg-offset-1 row">
        <a href="/news" class="back">
            <h3> Back to news </h3>
        </a>
    </div>
    <div class="col-lg-8 col-lg-offset-1">
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
            <!-- end of carousel -->
        </div>
        <div class="row">
            <div class="col-lg-12 left-main-title ">
                <strong>{{$news->title}}</strong>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 left-main-title ">
                @foreach ($news->author as $newss) {{$newss->name}} @endforeach | {{Carbon\Carbon::parse($news->date)->toFormattedDateString()}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-11 left-main-title2 ">
                <p class="event-description">{{(strip_tags($news->body))}}</p>
            </div>
        </div>

        <div class="row hr-main-title2">
            <hr>
        </div>


        <div class="row">
            <div class="col-lg-9 share-main-title2 ">
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
            </div>
            <div class="col-lg-3 Categories">
                <span>Categories: @foreach($categories as $categories_list) {{$categories_list->category_name}}, @endforeach

                </span>
            </div>
        </div>
        <br>
        <br>

        <div class="row next-previous-container">
            @if($previousnews != Null)
            <div class="col-lg- left">
                <div class="text-left arrow">
                    <a href="{{$previousnews->id}}" class="text-left">
                        < Previous</a>
                            <br>
                            <a href="{{$previousnews->id}}" class="text-left">
                                <h4>{{$previousnews->title}}</h4>
                            </a>
                </div>
            </div>
            @endif @if($nextnews != Null)
            <div class="col-lg-6">
                <div class="arrow">
                    <a href="{{$nextnews->id}}">Next ></a>
                    <br>
                    <a href="{{$nextnews->id}}">
                        <h4>{{$nextnews->title}}</h4>
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="col-lg-3">
        <table class="table table-categories table-borderless table-hover">
            <thead bgcolor="#800000">
                <tr>
                    <th class="header-table" style="padding-left: 25px">CATEGORIES</th>
                    <th class="header-table" style="padding-left: 25px"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($category_table as $category)
                <tr class='clickable-row' data-href='fb?ecat=General'>
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
            <thead bgcolor="#800000">
                <tr>
                    <th class="header-table" style="padding-left: 25px">RECENT POST</th>
                    <th class="header-table" style="padding-left: 25px"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($news_table as $news)
                <tr class='clickable-row' data-href='fb?ecat=General'>
                    <td>
                        <div id="carousel-example-generic" class="recent-carousel carousel slide" data-ride="carousel">
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
                                            <img src="{{ URL::asset('image/uploaded_main_news_image')}}/{{$mainnewsimage->image_name}}" class="single-img-reponsive img-responsive "
                                                alt="Company Banner">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- end of carousel -->
                        </div>
                        <td>
                            <!-- TODO: -->
                            @foreach ($news->newscategory as $newsz) {{$newsz->categorylist->category_name}} @endforeach
                        </td>

                        <td>
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
<div class="container">
    <div class="row">
        <div class="col-lg-2 col-lg-offset-1">
            @foreach ($news->author as $newss)
            <img src="{{ URL::asset('storage/upload_author_image')}}/{{$newss->image}}" class="img-thumbnail img-responsive " alt="No Author">
        </div>


        <p>
            <div class="col-lg-4">
                {{(strip_tags($newss->description))}}
            </div>
        </p>

        @endforeach
    </div>
</div>

<div class="row"></div>

<script>
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