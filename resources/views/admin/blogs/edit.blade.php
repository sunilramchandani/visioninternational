@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                Blogs
            </h1>
        </div>
    </div>
</section>
@endsection @section('content-main')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="title">
                                Blog Title
                            </label>
                            <input type="text" class="form-control" id="title" name="title" required value="{{ $blog->title }} "
                                placeholder="Title...">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="author">
                                Author
                            </label>
                            <select class = "form-control" name="author_id" id="">
                                @foreach($author_name as $author )
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
	                        </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label for="body">
                            Body
                        </label>
                        <textarea name="body" id="body" rows="20" required class="summernote" value="">
                        {{$blog->body}}
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
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 250
        });
    });
</script>
@endsection