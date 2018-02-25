@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                About Us
            </div>
            <div class="col-xs-2">
            <a href="{{route('aboutus.trash')}}"><button class="btn"><i class="fa fa-trash" style="color:black;"> &nbsp; View Trash</i></button></a>
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
   <a href="{{route('aboutus.adminIndex')}}"> {{Session::get('ok')}}</a>
</div>
@endif

    <section class="content page-news">
        <div class="row">
            <div class="col-xs-12">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>About Department</th>
                            <th>About Name</th>
                            <th>About Position</th>
                            <th>About Description</th>
                            <th colspan="2">Action</th>
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
                                    <a
                                        href="{{ route('aboutus.adminEdit', $aboutUs->id) }}"
                                        class="btn btn-info">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    
                                    
                                    <a
                                        href="{{ route('aboutus.adminDelete', $aboutUs->id) }}"
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
                {{ $aboutUs_table->links() }}
            </div>
        </div>
    </section>
@endsection
