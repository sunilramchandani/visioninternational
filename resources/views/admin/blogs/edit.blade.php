@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                Blogs
                <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PATCH">



                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="title">
                                Blog Title
                            </label>
                            <input type="text" class="form-control" id="title" name="title" required value="{{ $blog->title }} " placeholder="Title...">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="author">
                                Author
                            </label>
                            <select class="form-control" name="author_id" id="">


                                <option value="
                                
                                @if(isset($blog->author_id)) 
                                    
        
                                    
                                    {{ isset($blog->author_id) ? $author_id :''}}
                                    



                                    @else Select Author
                                    
                                    
                                     @endif
                                     
                                     " selected>
                                    @if(isset($blog->author_id)) @foreach($blog->author as $name) {{ isset($blog->author_id) ? $name->name :''}} @endforeach
                                    @else Select Author @endif
                                </option>

                                @foreach($author_name as $author )
                                <option value="{{ $author->author_id }}">{{ $author->name }}</option>
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

                <div class="row">
                    <div class="col-xs-12">
                        <label for="body">
                            Add More Category
                        </label>
                        <select id="category" name="category_bulk[]" multiple="multiple" class="form-control">
                            @foreach($category_list as $cate)
                            <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                            @endforeach

                        </select>
                        </select>
                    </div>
                </div>




                <div class="btn-container">
                    <a href="#" class="btn btn-danger pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </form>

            <div class="row">
                <div class="col-xs-2">
                    <label for="body">
                        Delete Category
                    </label>
                    @foreach($blog->blogcategory as $blogcategory)


                    <button class="btn btn-danger btn-block delete_single_blogcategory" data-id="{{ $blogcategory->id }}" data-token="{{ csrf_token() }}">
                        Delete {{$blogcategory->categorylist->category_name}}</button>


                    @endforeach
                </div>
            </div>


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
<script>
    $(function () {
        $('#category').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterPlaceholder: 'Search for something...',
            buttonWidth: '400px',
        });
    });
</script>

<script>
    jQuery(document).ready(function ($) {

        $(".delete_single_blogcategory").click(function () {
            var id = $(this).data("id");
            var token = $(this).data("token");

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "../deleteBlogCategory/" + id,
                type: 'delete',
                dataType: 'json',
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function () {
                    console.log("SUCCESSS!!!");
                    window.location.reload();
                },
                error: function () {
                    alert('error please contact administrator')
                }
            });
        });

    });
</script>


@endsection