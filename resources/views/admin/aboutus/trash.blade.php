@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                About Us ( Trash )
            </div>
            <div class="col-xs-2">
            <a href="{{route('aboutus.adminIndex')}}"><button class="btn"><i class="fa fa-arrow-left" style="color:black"> &nbsp; Go Back</i></button></a>
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
                            <th>About Department</th>
                            <th>About Name</th>
                            <th>About Position</th>
                            <th>About Description</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($aboutUs_table as $aboutUs)
                            <tr>
                                <td>{{ $aboutUs->about_department }}</td>
                                <td>{{ $aboutUs->about_name }}</td>
                                <td>{{ $aboutUs->about_position }}</td>
                                <td>{{ $aboutUs->about_description }}</td>
                            
                        <td>
                            
                            <a href="{{ route('aboutus.restoretrash', $aboutUs->id) }}" class="btn btn-info">
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