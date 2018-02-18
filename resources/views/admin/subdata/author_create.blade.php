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
            <form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="name">
                                Author Name
                            </label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Name...">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="author">
                                Author
                            </label>
                            <input type="file" class="form-control-file" name="upload_author_image" id="upload_author_image">
                        </div>
                    </div>
                 </div>
                    <div class="row">

                        <div class="col-xs-12">

                            <label for="description">
                                Body
                            </label>

                            <textarea name="description" id="description" rows="20" required class="summernote">
                            </textarea>
                        </div>
                    </div>

                    <div class="btn-container">
                        <a href="#" class="btn btn-danger pull-right">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
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