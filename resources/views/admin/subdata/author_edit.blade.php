@extends('layouts.admin') @section('content-header')
<link rel="stylesheet" href="{{ asset('css/image-preview.css') }}">
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                Blogs
            </h1>
        </div>
    </div>
</section>
@endsection @section('content-main') @if (count($errors) > 0)
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
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <form action="{{ route('author.update', $author->author_id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="name">
                                Author Name
                            </label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Name..." value="{{$author->name}}">
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="author">
                                Author Image
                            </label>
                            <input type="file" class="form-control-file" name="upload_author_image" id="upload_author_image" value="{{$author->image}}">
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="author">
                                Current Image
                            </label>
                            <img src="{{URL::asset('storage/upload_author_image')}}/{{$author->image}}" class="img-responsive img-thumbnail">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">

                        <label for="description">
                            Body
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                    <textarea name="description" id="description" rows="20" required class="summernote">{{$author->description}}</textarea>
                    </div>
                </div>
                <div class="btn-container">
                    <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <a href="{{route('author.list')}}" class="btn btn-danger pull-right">Cancel</a>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
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

    $(document).ready(function () {
        $('.summernote').summernote({
            height: 250
        });
    });
</script>

@endsection