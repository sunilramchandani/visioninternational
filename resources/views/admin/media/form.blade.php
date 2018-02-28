@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                Media
            </h1>
        </div>
    </div>
</section>
@endsection @section('content-main')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <form action="{{ $action }}" method="{{  $method }}" enctype="multipart/form-data" role="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="media_title">
                                Media Title
                            </label>
                            <input type="text" name="media_title" id="media_title" required>

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="media_type">
                                Media Type
                            </label>
                            <select class="form-control" name="media_type" id="media_type" required>
                            
                                <option value="" disabled selected>{{ isset($media->media_type) ? $media->media_type :''}}</option>
                                <option value="Video">Video</option>
                                <option value="Photo">Photo</option>
                            </select>

                        </div>
                    </div>


                    
                            
              

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="author">
                                Author
                            </label>
                            <select class="form-control" name="media_author" id="media_author" required>
                            <option value="{{isset($media->author) ? $media->author :""}}" selected>
                            @if(isset($media->media_author))
                            @foreach($media->author as $name)
                            {{ isset($media->media_author) ?
                             
    
                                $name->name
                                 
                             
                             
                             
                              :''}}@endforeach
                            @else
                            Select Author
                            @endif
                                </option>
                                @foreach($author_name as $author )
                                <option value=" {{ $author->author_id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="company_website">
                                Media Link
                            </label>
                            <textarea class="form-control" rows=5 id="media_link" name="media_link" required placeholder="Senior Programmer">{{ isset($media->media_link) ? $media->media_link : '' }} </textarea>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="company_website">
                                Media Description
                            </label>
                            <textarea class="form-control" rows=5 id="media_description" name="media_description" required placeholder="Senior Programmer">{{ isset($media->media_description) ? $media->media_description : '' }} </textarea>
                        </div>
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


        $('input[name="start_end"]').daterangepicker({
            locale: {
                format: 'MM/DD/YYYY'
            }
        });

        $('#start_end').change(function () {
            var start_end = $('#start_end').val();
            start_end = start_end.split('-');

            var start = start_end[0];
            var end = start_end[1];

            start = new Date(start);
            end = new Date(end);

            var timeDiff = Math.abs(start.getTime() - end.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

            $('#duration').val(diffDays);

        });
    });
</script>
@endsection