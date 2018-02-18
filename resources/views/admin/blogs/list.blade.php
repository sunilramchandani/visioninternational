@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                Blogs 
            </div>
            <div class="col-xs-2">
            <a href="{{route('blog.trash')}}"><button class="btn"><i class="fa fa-trash" style="color:black;"> &nbsp; View Trash</i></button></a>
            </div>
        </div>
    </h1>
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
   <a href="{{route('blog.trash')}}"> {{Session::get('ok')}}</a>
</div>
@endif
<section class="content page-news">
    <div class="row">
        <div class="col-xs-12">

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($blog_table as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        @foreach($blog->author as $blogs)
                        <td>{{ $blogs->name}}</td>
                        @endforeach
                        <td>{{Carbon\Carbon::parse($blog->date)->toFormattedDateString()}}</td>
                        <td>
                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning">
                                Edit
                            </a>

                            <a href="{{ route('mainblogimage.view', $blog->id) }}" class="btn btn-info">
                                Main Blog Image
                            </a>
                            
                            <a href="{{ route('blog.destroy', $blog->id) }}" class="btn btn-danger">
                                Delete
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 text-center">
            {{$blog_table->links()}}
        </div>
    </div>
    </div>
</section>
@endsection