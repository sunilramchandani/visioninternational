@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                Blog ( Trash )
            </div>
            <div class="col-xs-2">
            <a href="{{route('blog.index')}}"><button class="btn"><i class="fa fa-arrow-left" style="color:black"> &nbsp; Go Back</i></button></a>
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
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($blog_trash as $single_blog)
                    <tr>
                        <td>{{ $single_blog->title }}</td>
                        @foreach($single_blog->author as $single_blogs)
                        <td>{{ $single_blogs->name}}</td>
                        @endforeach
                        <td>{{Carbon\Carbon::parse($single_blog->date)->toFormattedDateString()}}</td>
                        <td>
                            
                            <a href="{{ route('blog.restoretrash', $single_blog->id) }}" class="btn btn-info">
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