@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                Media
            </div>
            <div class="col-xs-2">
            <a href="{{route('media.trash')}}"><button class="btn"><i class="fa fa-trash" style="color:black;"> &nbsp; View Trash</i></button></a>
            </div>
        </div>
    </h1>
</section>
@endsection

@section('content-main')
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
   <a href="{{route('media.adminIndex')}}"> {{Session::get('ok')}}</a>
</div>
@endif

    <section class="content page-news">
        <div class="row">
            <div class="col-xs-12">
            @if ( Request::get('media_type')  )
            @foreach ($media_get as $media)
             <a href="/admin/media/list?media_type={{$media->media_type}}"><button class="btn btn-primary">{{$media->media_type}}</button></a>
            @endforeach
            @else 
            @foreach ($media_table as $media)
            <a href="/admin/media/list?media_type={{$media->media_type}}"><button class="btn btn-primary">{{$media->media_type}}</button></a>
            @endforeach
            @endif

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>Title</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th colspan="2">Action</th>
                        </tr> 
                    </thead>

                    <tbody>
                        @foreach($media_table as $media)
                            <tr>
                                <td>{{ $media->media_title }}</td>
                                <td>{{ $media->media_type }}</td>
                                <td>{{ $media->media_description }}</td>
                                <td>{{ $media->updated_at }}</td>
                                <td>
                                    <a
                                        href="{{ route('media.adminEdit', $media->media_id) }}"
                                        class="btn btn-info">
                                        Edit
                                    </a>
                  
                                    
                                    
                                    <a
                                        href="{{ route('media.adminDelete', $media->media_id) }}"
                                        class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-xs-12 text-center">
                {{ $media_table->links() }}
            </div>
        </div>
    </section>
@endsection
