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
                @if(session('flash'))
                    @include('partials.notif', ['flash' => session('flash')])
                @endif

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($news as $single_news)
                            <tr>
                                <td>{{ $single_news->title }}</td>
                                <td>
                                    <a
                                        href="{{ route('news.view', $single_news->id) }}"
                                        class="btn btn-info">
                                        View
                                    </a>
                                    <a
                                        href="{{ route('news.edit', $single_news->id) }}"
                                        class="btn btn-warning">
                                        Edit
                                    </a>
                                    <a
                                        href="{{ route('news.delete', $single_news->id) }}"
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
                {{ $paginator->links() }}
            </div>
        </div>
    </section>
@endsection
