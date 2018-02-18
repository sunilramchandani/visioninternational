@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1 class="page-header">
            Author
        </h1>
    </section>
@endsection

@section('content-main')
    <section class="content page-news">
        <div class="row">
            <div class="col-xs-12">
                @if(session('flash'))
                    @include('partials.notif', ['flash' => session('flash')])
                @endif

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($author_table as $author)
                            <tr>
                                <td>{{ $author->name }}</td>
                                <center>
                                <td><img height="150px" width"150px" src="{{URL::asset('storage/upload_author_image')}}/{{$author->image}}" alt="sadasd" /></td>
                                </center>
                                <td>{{ $author->description }}</td>
                                <td>
                                    <a
                                        href="{{ route('application.view', $author->id) }}"
                                        class="btn btn-info">
                                        View
                                    </a>
                                    <a
                                        href="{{ route('application.delete', $author->id) }}"
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
                {{ $author_table->links() }}
            </div>
        </div>
    </section>
@endsection
