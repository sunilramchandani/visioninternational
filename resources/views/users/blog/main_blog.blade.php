@extends('layouts.master') @section('page-css')
<link rel="stylesheet" href="{{ asset('css/image-preview.css') }}">
<link rel="stylesheet" href="{{ asset('css/blog.css') }}"> @stop @include('layouts.navbar') @section('content')

<div class="whole-page row">
    @foreach ($featuredimage_blog as $featured)
    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="img img-responsive img-rounded header"
        alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
    @endforeach

    <div class="container">
        <div class="main-page">
            <div class="row">
                <!-- left side -->
                <div class=" left col-xs-8 col-md-offset-1">
                    @foreach($blog_table as $blog)
                    <div class="container-fluid image-blog">
                        <div class="row">
                            <div class="col-xs-12">
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
                            <div class="col-xs-12  left-main-title  ">
                                <strong>{{$blog->title}}</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12  left-main-title ">
                                <p>@foreach ($blog->author as $blogs) {{$blogs->name}} @endforeach | {{Carbon\Carbon::parse($blog->date)->toFormattedDateString()}}</p>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-12  left-main-title ">
                                <p>{{ \Illuminate\Support\Str::words(strip_tags($blog->body), 30,' ... ')}}</p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12  left-main-title ">
                                <a href="/blog/{{$blog->id}}" class="submit btn">
                                    <span>Read More</span>
                                </a>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12 hr-main-title ">
                                <hr>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-6 share-main-title ">
                                <span>Share This Article: </span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl().$blog->id ) }}" target="_blank">
                                    <i class="fa fa-facebook-f " style="font-size:14px; padding-right:1%; color:black;"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl().$blog->id) }}" target="_blank">
                                    <i class="fa fa-twitter " style="font-size:14px; padding-right:1%; color:black;"></i>
                                </a>
                                <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl().$blog->id) }}" target="_blank">
                                    <i class="fa fa-google-plus " style="font-size:14px; color:black;"></i>
                                </a>
                            </div>
                            <div class="col-xs-6 share-main-title ">

                                <span>Categories: @foreach($blog->blogcategory as $category) {{$category->categorylist->category_name}},
                                    @endforeach

                                </span>

                            </div>
                        </div>
                        <div class="row">
                        <div class="col-xs-6 share-main-title col-lg-offset-4 ">
                        {{$blog_table->appends(['s' => $s])->links()}}
                        </div>
                        </div>

                        <!-- end of image-blog -->
                    </div>
                    <br> @endforeach
                    <!-- end of col lg-8 image-blog -->
                </div>

                <!-- right side -->
                <div class="right col-xs-4 col-md-3 ">
                    <div class="col-xs-12">

                        <form action="{{route('userBlog.index') }}" method="get" class="form-inline">
                            {{csrf_field()}}

                            <div class="form-group">
                                <input type="text" class="form-control" name="s" placeholder="Search Title" value="{{ isset($s) ? $s:''}}"> 
                                <button class="search" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>


                        </form>

                        <br>
                    </div>


                    <div class="col-xs-12">

                        <table class="table table-categories table-responsive table-borderless table-hover">
                         <div class="red-title">
                             <h1>CATEGORIES</h1>
                         </div>
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
                    </div>

                    <div class="col-xs-12">


                        <table class="table table-categories table-borderless table-hover">
                            <div class="red-title">
                                <h1>RECENT POST</h1>
                            </div>
                            <tbody>
                                @foreach($blog_table as $blog)
                                <tr class='clickable-row'>
                                    <td>
                                        <div id="carousel-example-generic" class="recent-carousel carousel slide" data-ride="carousel">


                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner" role="listbox">
                                                @foreach( $blog->mainimageupload as $mainblogimage )

                                                <div class="item {{ $loop->first ? ' active' : '' }}">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="{{ URL::asset('image/uploaded_main_blog_image')}}/{{$mainblogimage->image_name}}" class="caro-img-reponsive img-responsive "
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
                                        <p> @foreach ($blog->blogcategory as $blogz) @if ($loop->first) {{ $blogz->categorylist->category_name
                                            }} @endif @endforeach
                                        </p>
                                        <a href="/blog/{{$blog->id}}">
                                            <i style="color:black;">{{$blog->title}}</i>
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