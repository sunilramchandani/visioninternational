@extends('layouts.admin') @section('content-header')
<link rel="stylesheet" href="{{ asset('css/image-preview.css') }}">
<section class="content-header">
    <div class="row">
    <h1 class="page-header">
        <div class="col-xs-10">
            {{$blog->title}}
        </div>
        <div class="col-xs-2">
            
                <a href="{{route('blog.index')}}">
                    <button class="btn">
                        <i class="fa fa-arrow-left" style="color:black;"> &nbsp; Go Back</i>
                    </button>
                </a>
            
        </div>
        </h1>
    </div>
</section>
@endsection {{--{{ dd($blog) }}--}} @section('content-main')
<section class="content page-opportunities">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif @if(Session::has('ok'))
    <div class="alert alert-success">
        {{Session::get('ok')}}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <h2> Image Preview </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @foreach ($main_upload as $image_preview)

            <a href="#" class="pop">
                <div class="img-wrap">
                    <a href="{{route ('mainblogimage.delete', $image_preview->id)}}" onclick="return ConfirmDelete();">
                        <span class="close">&times;</span>
                    </a>

                    <img height="200px" width="200px" src="{{ URL::asset('image/uploaded_main_blog_image')}}/{{$image_preview->image_name}}"
                        class="img-preview" alt="Company Banner">
                </div>
            </a>
            @endforeach
        </div>
    </div>




    <form action="{{route('mainblogimage.save', $blog->id)}}" method="post" role="form" enctype="multipart/form-data">
        {{csrf_field()}}
        <br>

        <input type="file" class="form-control-file" name="upload_blog_main_image" id="upload_blog_main_image">
        <Br>
        <button type="Submit">Upload</button>
    </form>






</section>

@endsection @section('scripts')
<script>
    function ConfirmDelete() {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            return true;
        else
            return false;
    }
</script>

<script>
$(function() {  
 $('#multiselect').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterPlaceholder: 'Search for something...'
        }); 
});
</script>

@endsection