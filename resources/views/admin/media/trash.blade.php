@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                Media ( Trash )
            </div>
            <div class="col-xs-2">
            <a href="{{route('media.adminIndex')}}"><button class="btn"><i class="fa fa-arrow-left" style="color:black"> &nbsp; Go Back</i></button></a>
            </div>
        </div>
    </h1>
</section>
@endsection @section('content-main')
<section class="content page-news">
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
    <div class="row">
        <div class="col-xs-12">

        <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Link</th>
                            <th>Description</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr> 
                    </thead>

                    <tbody>
                        @foreach($media_table as $media)
                            <tr>
                                <td>{{ $media->media_type }}</td>
                                <td>{{ $media->media_link }}</td>
                                <td>{{ $media->media_description }}</td>
                                <td>{{ $media->media_author }}</td>
                                <td>{{ $media->updated_at }}</td>
                            
                        <td>
                            
                            <a href="{{ route('media.restoretrash', $media->media_id) }}" class="btn btn-info">
                                Restore
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    </div>
</section>
@endsection