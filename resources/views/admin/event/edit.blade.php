@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                Event
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
            <form action="{{ route('event.adminUpdate', $event->fbevent_id) }}" method="POST" enctype="multipart/form-data" role="form">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 



                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="title">
                                Event Name
                            </label>
                            <input type="text" class="form-control" id="event_name" name="event_name" required value="{{ $event->event_name }}" placeholder="Title...">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <label for="cover_source">
                            Cover Source
                        </label>
                        <input type="text" class="form-control" id="cover_source" name="cover_source" required value="{{ $event->cover_source }}" placeholder="Title...">
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label for="event_description">
                            Event Description
                        </label>
                        <textarea id="event_description" name="event_description" rows="20" required class="summernote">
                            {{$event->event_description}}
                        </textarea>
                    </div>



                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="title">
                                Start Time
                            </label>
                            <input type="text" class="form-control" id="start_time" name="start_time"  value="{{ $event->start_time }}" placeholder="Title...">
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="title">
                                End Time
                            </label>
                            <input type="text" class="form-control" id="end_time" name="end_time"  value="{{ $event->end_time }}" placeholder="Title...">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="title">
                                Place Name
                            </label>
                            <input type="text" class="form-control" id="place_name" name="place_name" required value="{{ $event->place_name }}" placeholder="Title...">
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="title">
                                City
                            </label>
                            <input type="text" class="form-control" id="location_city" name="location_city" required value="{{ $event->location_city }}" placeholder="Title...">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="title">
                                Country
                            </label>
                            <input type="text" class="form-control" id="location_country" name="location_country" required value="{{ $event->location_country }}" placeholder="Title...">
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="title">
                                Street
                            </label>
                            <input type="text" class="form-control" id="location_street" name="location_street" required value="{{ $event->location_street }}" placeholder="Title...">
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
    });
</script>

@endsection