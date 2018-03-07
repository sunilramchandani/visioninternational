@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                News 
            </div>
            <div class="col-xs-2">
            <a href="{{route('news.trash')}}"><button class="btn"><i class="fa fa-trash" style="color:black;"> &nbsp; View Trash</i></button></a>
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
   <a href="{{route('news.trash')}}"> {{Session::get('ok')}}</a>
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
                    @foreach($news_table as $news)
                    <tr>
                        <td>{{ $news->title }}</td>
                        @foreach($news->author as $newss)
                        <td>{{ $newss->name}}</td>
                        @endforeach
                        <td>{{Carbon\Carbon::parse($news->date)->toFormattedDateString()}}</td>
                        <td>
                            <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning">
                                Edit
                            </a>

                            <a href="{{ route('mainnewsimage.view', $news->id) }}" class="btn btn-info">
                                Main News Image
                            </a>
                            
                            <a href="{{ route('news.destroy', $news->id) }}" class="btn btn-danger">
                                Delete
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 text-center">
            {{$news_table->links()}}
        </div>
    </div>
    </div>
</section>
@endsection