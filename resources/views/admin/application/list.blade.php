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
                            <th>Program ID</th>
                            <th>Country ID</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($app as $single_app)
                            <tr>
                                <td>{{ $single_app->last_name }}</td>
                                <td>
                                    <a
                                        href="{{ route('application.view', $single_app->id) }}"
                                        class="btn btn-info">
                                        View
                                    </a>
                                    <a
                                        href="{{ route('application.delete', $single_app->id) }}"
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
