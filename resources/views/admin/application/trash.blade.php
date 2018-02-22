@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                Application ( Trash )
            </div>
            <div class="col-xs-2">
            <a href="{{route('application.list')}}"><button class="btn"><i class="fa fa-arrow-left" style="color:black"> &nbsp; Go Back</i></button></a>
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
                <th>Application ID</th>
                <th>Program ID</th>
                <th>Country ID</th>
                <th>Location ID</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Email</th>
                <th>Contact No</th>
            </tr>
        </thead>

        <tbody>
            @foreach($app as $single_app)
                <tr>
                    <td>{{ $single_app->id }}</td>
                    <td>{{ $single_app->program_name }}</td>
                    <td>{{ $single_app->country_name }}</td>
                    <td>{{ $single_app->location_name }}</td>
                    <td>{{ $single_app->last_name }}</td>
                    <td>{{ $single_app->first_name }}</td>
                    <td>{{ $single_app->email }}</td>
                    <td>
                        <a href="{{ route('application.restoretrash', $single_app->id) }}" class="btn btn-info">
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