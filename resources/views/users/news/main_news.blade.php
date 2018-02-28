@extends('layouts.master') @section('page-css')
<link rel="stylesheet" href="{{ asset('css/image-preview.css') }}">
<link rel="stylesheet" href="{{ asset('css/blog.css') }}"> @stop @include('layouts.navbar') @section('content')

<div class="col-lg-12 whole-page row">
    @foreach ($featuredimage_news as $featured)
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

    <div class="container-fluid ">
        <div class="main-page">
            <div class="row">
                <!-- left side -->
                <div class=" left col-lg-8 col-lg-offset-1">
                    @foreach($news_table as $news)
                    <div class="container-fluid image-blog">
                        <div class="row">
                            <div class="col-lg-12">
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
                                                <br>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- end of carousel -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12  left-main-title  ">
                                <strong>{{$news->title}}</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12  left-main-title ">
                                <p>@foreach ($news->author as $newss) {{$newss->name}} @endforeach | {{Carbon\Carbon::parse($news->date)->toFormattedDateString()}}</p>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-12  left-main-title ">
                               <p class = "description-news">{{ \Illuminate\Support\Str::words(strip_tags($news->body), 30,' ... ')}}</p> 
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12  left-main-title ">
                                <a href="/news/{{$news->id}}" class="submit btn">
                                    <span>Read More</span>
                                </a>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 hr-main-title ">
                                <hr>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6 share-main-title ">
                                <span>Share This Article: </span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl().$news->id ) }}" target="_blank">
                                    <i class="fa fa-facebook-f " style="font-size:20px; padding-right:1%; color:black;"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl().$news->id) }}" target="_blank">
                                    <i class="fa fa-twitter " style="font-size:20px; padding-right:1%; color:black;"></i>
                                </a>
                                <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl().$news->id) }}" target="_blank">
                                    <i class="fa fa-google-plus " style="font-size:20px; color:black;"></i>
                                </a>
                            </div>
                            <div class="col-lg-6 share-main-title ">

                                <span>Categories: @foreach($news->newscategory as $category) {{$category->categorylist->category_name}},
                                    @endforeach

                                </span>

                            </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-6 share-main-title col-lg-offset-4 ">
                        {{$news_table->appends(['s' => $s])->links()}}
                        </div>
                        </div>

                        <!-- end of image-news -->
                    </div>
                    <br> @endforeach
                    <!-- end of col lg-8 image-news -->
                </div>

                <!-- right side -->
                <div class="right col-lg-3 ">
                    <div class="row">

                        <form action="{{route('userNews.index') }}" method="get" class="form-inline">
                            {{csrf_field()}}

                            <div class="form-group">
                                <input type="text" class="form-control" name="s" placeholder="Search Title" value="{{ isset($s) ? $s:''}}">
                            </div>

                            <div class="form-group">
                                <button class="btn" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>


                        </form>
                    </div>


                    <div class="row">

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
                    </div>

                    <div class="row">


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

                <!-- end of row -->
            </div>
            <!--end of main-page-->
            
        </div>
        <!-- end of container -->
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
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script>

  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });
</script>

