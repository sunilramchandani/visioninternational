@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1 class="page-header">
            News
        </h1>
    </section>
@endsection
@section('content-main')
    <section class="content page-news">
        <div class="row">
            <div class="col-xs-12">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif @if(Session::has('ok'))
            <div class="alert alert-info">
                {{Session::get('ok')}}
            </div>
            @endif


                @foreach ($featuredimage_table as $featuredimage)
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Page Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    <td>{{$featuredimage->page_name}}</td>
                    <td>{{$featuredimage->image}}</td>
                    <td>{{$featuredimage->description}}</td>
                    <td><a href="{{ route('featuredimage.edit', $featuredimage->id) }}" class="btn btn-warning">
                        Hello
                    </a></td>
                </table>
                @endforeach
            </div>

        </div>
    </section>
@endsection
