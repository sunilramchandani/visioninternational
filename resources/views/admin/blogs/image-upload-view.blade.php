@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">

            </h1>
        </div>
    </div>
</section>
@endsection {{--{{ dd($blog) }}--}} @section('content-main')
<section class="content page-opportunities">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">


            </h2>
        </div>

        <div class="col-xs-12">
            <div class="row">

            </div>
        </div>


    </div>
    </br>
    <form action="{{route('mainblogimage.save', $blog->id)}}" method="post" role="form" enctype="multipart/form-data">
        {{csrf_field()}}

        <input type="file" class="form-control" name="upload_blog_main_image" id="upload_blog_main_image">

            <button type="Submit">Submit</button>


</section>
@endsection