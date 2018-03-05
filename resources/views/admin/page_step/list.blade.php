@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                Page Step
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
   <a href="{{route('page_step.adminIndex')}}"> {{Session::get('ok')}}</a>
</div>
@endif

    <section class="content page-news">
        <div class="row">
            <div class="col-xs-12">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                             <th>Page Name</th>
                            <th>Step Number</th>
                            <th>Image Title</th>
                            <th>Description</th>
                            <th colspan="2">Action</th>
                        </tr> 
                    </thead>

                    <tbody>
                        @foreach($page_step_table as $page_step)
                            <tr>
                                <td>{{ $page_step->page_name }}</td>
                                <td>{{ $page_step->step_number }}</td>
                                <td>{{ $page_step->image_title }}</td>
                                <td>{{ $page_step->description }}</td>
                                <td>
                                    <a
                                        href="{{ route('page_step.adminEdit', $page_step->id) }}"
                                        class="btn btn-info">
                                        Edit
                                    </a>
                  
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-xs-12 text-center">
                {{ $page_step_table->links() }}
            </div>
        </div>
    </section>
@endsection
