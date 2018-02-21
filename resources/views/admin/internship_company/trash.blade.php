@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                Internship Company ( Trash )
            </div>
            <div class="col-xs-2">
            <a href="{{route('internshipcompany.list')}}"><button class="btn"><i class="fa fa-arrow-left" style="color:black"> &nbsp; Go Back</i></button></a>
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
                <th>Company Name</th>
                <th>Company Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>

                <tbody>
                    @foreach($company as $single_company)
                        <tr>
                                <td>{{ $single_company->company_name }}</td>
                                <td>{{ $single_company->description }}</td>
                        <td>
                            
                            <a href="{{ route('internshipcompany.restoretrash', $single_company->id) }}" class="btn btn-info">
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