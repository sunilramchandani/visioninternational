@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1 class="page-header">
        Event Category
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
@endsection