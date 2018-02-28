@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                News
            </h1>
        </div>
    </div>
</section>
@endsection @section('content-main')
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

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{ method_field('PATCH') }}



                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="title">
                                News Title
                            </label>
                            <input type="text" class="form-control" id="title" name="title" required value="{{ $news->title }} "
                                placeholder="Title...">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="author">
                                Author
                            </label>
                            
                            <select class = "form-control" name="author_id" id="">

                            <option value="
                                
                                @if(isset($news->author_id)) 
                                    
        
                                    
                                    {{ isset($news->author_id) ? $author_id :''}}
                                    



                                    @else Select Author
                                    
                                    
                                     @endif
                                     
                                     " selected>
                                    @if(isset($news->author_id)) 
                                    
                                    @foreach($news->author as $name) 
                                    
                                    
                                    {{  isset($news->author_id) ? $name->name :''}}
                                    
                                    
                                    @endforeach



                                    @else Select Author
                                    
                                    
                                     @endif
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
                        {{$news->body}}
                        </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <label for="body">
                            category
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
$(function() {  
 $('#category').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterPlaceholder: 'Search for something...',
            buttonWidth: '400px',
        }); 
});
</script>
@endsection