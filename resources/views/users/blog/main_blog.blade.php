@extends('layouts.master') @section('page-css')
<link rel="stylesheet" href="{{ asset('css/image-preview.css') }}">
<link rel="stylesheet" href="{{ asset('css/blog.css') }}"> @stop @include('layouts.navbar') @section('content')

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

    <div class="container-fluid ">
        <div class="main-page">
            <div class="row">
                <!-- left side -->
                <div class="col-lg-8">
                    @foreach($blog_table as $blog)
                    <div class="container image-blog">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        @foreach( $blog->mainimageupload as $mainblogimage )

                                        <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                        @endforeach
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        @foreach( $blog->mainimageupload as $mainblogimage )

                                        <div class="item {{ $loop->first ? ' active' : '' }}">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="{{ URL::asset('image/uploaded_main_blog_image')}}/{{$mainblogimage->image_name}}" class="main-img-reponsive img-responsive "
                                                        alt="Company Banner">
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- end of carousel -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1 left-main-title  ">
                                <strong>{{$blog->title}}</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1 left-main-title ">
                                @foreach ($blog->author as $blogs) {{$blogs->name}} @endforeach | {{Carbon\Carbon::parse($blog->date)->toFormattedDateString()}}

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1 left-main-title ">
                                {{ \Illuminate\Support\Str::words(strip_tags($blog->body), 30,' ... ')}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1 left-main-title ">
                                <a href="/blog/{{$blog->id}}" class="submit btn">
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
                                <a href="https://www.facebook.com/sharer/sharer.php?u=#http%3A%2F%2Fvisioninternational.oo%2Fblog/{{$blog->id}}" target="_blank">
                                    <i class="fa fa-facebook-f " style="font-size:20px; padding-right:1%; color:black;"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
                                    <i class="fa fa-twitter " style="font-size:20px; padding-right:1%; color:black;"></i>
                                </a>
                                <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
                                    <i class="fa fa-google-plus " style="font-size:20px; color:black;"></i>
                                </a>
                            </div>
                            <div class="col-lg-6 share-main-title ">

                                <span>Categories: @foreach($blog->blogcategory as $category) {{$category->categorylist->category_name}},
                                    @endforeach

                                </span>

                            </div>
                        </div>

                        <!-- end of image-blog -->
                    </div>
                    <br> @endforeach
                    <!-- end of col lg-8 image-blog -->
                </div>

                <!-- right side -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 categories-sidebar">
    
                        <form action="{{route('userBlog.index') }}" method="get" class="form-inline">
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
            
                    <br>
                    <table class="table table-categories table-borderless table-hover">
                        <thead bgcolor="#800000">
                            <tr>
                                <th class="header-table text-center">CATEGORIES</th>
                                <th class="header-table text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category_table as $category)
                            <tr class='clickable-row'>
                                <td>{{$category->category_name}}</td>
                                <td>
                                    <a href="/blog?category_id={{$category->id}}">
                                        <i style="color:black;">{{$category->blogcategorytable_count}}</i>
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table table-categories table-borderless table-hover">
                        <thead bgcolor="#800000">
                            <tr>
                                <th class="header-table text-center">RECENT POST</th>
                                <th class="header-table text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blog_table as $blog)
                            <tr class='clickable-row' data-href='fb?ecat=General'>
                                <td>
                                    <div id="carousel-example-generic" class="recent-carousel carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            @foreach( $blog->mainimageupload as $mainblogimage )

                                            <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                            @endforeach
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            @foreach( $blog->mainimageupload as $mainblogimage )

                                            <div class="item {{ $loop->first ? ' active' : '' }}">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="{{ URL::asset('image/uploaded_main_blog_image')}}/{{$mainblogimage->image_name}}" class="single-img-reponsive img-responsive "
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
                                        @foreach ($blog->blogcategory as $blogz) {{$blogz->categorylist->category_name}} @endforeach
                                    </td>

                                    <td>
                                        <a href="/blog/{{$blog->id}}">
                                            <i style="color:black;">{{$blog->title}}</i>
                                        </a>
                                    </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

                <!-- end of row -->
            </div>
            <!--end of main-page-->
            {{$blog_table->appends(['s' => $s])->links()}}
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