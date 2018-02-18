@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1 class="page-header">
            Blogs 
        </h1>   
    </section>
@endsection

@section('content-main')
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
                        @foreach($blog_table as $single_blog)
                            <tr>
                                <td>{{ $single_blog->title }}</td>
                                @foreach($single_blog->author as $single_blogs)
                                <td>{{ $single_blogs->name}}</td>
                                @endforeach
                                <td>{{Carbon\Carbon::parse($single_blog->date)->toFormattedDateString()}}</td>
                                <td>
                                    <a
                                        href="{{ route('blogmainimage.view', $single_blog->id) }}"
                                        class="btn btn-info">
                                        Main Blog Image
                                    </a>
                                    <a
                                        href="{{ route('internshipcompany.adminedit', $single_blog->id) }}"
                                        class="btn btn-warning">
                                    Edit
                                     </a>
                                    <a
                                        href="{{ route('internshipcompany.delete', $single_blog->id) }}"
                                        class="btn btn-danger">
                                        Delete
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
