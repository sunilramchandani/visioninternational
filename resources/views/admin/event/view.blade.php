@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1 class="page-header">
        Event Category
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </h1>
</section>
@endsection @section('content-main')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <h2>{{ $event->event_name }}</h2>
        </div>
    </div>
    <form action="{{ route('event.update', $event->fbevent_id) }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <br>
    <div class="row">
        <div class="col-xs-4">
            <select id="event" name="event_bulk[]" multiple="multiple" class="form-control">
                @foreach($category_list as $cate)
                <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                @endforeach
            </select>
            <br>
            <br>
            <button type="submit" class ="btn btn-info">Submit</button>
        </div>
    </div>

    



    </form>

<div class="row">
                <div class="col-xs-2">
                    <label for="body">
                        Delete Category
                    </label>
                    @foreach($event->eventcategory as $eventcategory)


                    <button class="btn btn-danger btn-block delete_single_eventcategory" data-id="{{ $eventcategory->id }}" data-token="{{ csrf_token() }}">
                        Delete {{$eventcategory->categorylist->category_name}}</button>


                    @endforeach
                </div>
            </div>

</section>
@endsection @section('scripts')

<script>
    $(function () {
        $('#event').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterPlaceholder: 'Search for something...',
            buttonWidth: '100%',
        });
    });
</script>

<script>
             jQuery(document).ready(function($) {

              $(".delete_single_eventcategory").click(function(){
                var id = $(this).data("id");
                var token = $(this).data("token");

                $.ajax(
                {
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  url: "../deleteEventCategory/"+id,
                  type: 'delete',
                  dataType: 'json',
                   data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                  },
                  success: function (){
                    console.log("SUCCESSS!!!");
                    window.location.reload();
                  },
                  error: function(){
                    alert('error please contact administrator')
                  } 
                });
              });

            });
</script>


@endsection