@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                Application
            </div>
            <div class="col-xs-2">
            <a href="{{route('application.trash')}}"><button class="btn"><i class="fa fa-trash" style="color:black;"> &nbsp; View Trash</i></button></a>
            </div>
        </div>
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
                            <th>Application ID</th>
                            <th>Program ID</th>
                            <th>Country ID</th>
                            <th>Location ID</th>
                            <th>Lastname</th>
                            <th>Firstname</th>
                            <th>Email</th>
                            <th>Contact No</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($app as $single_app)
                            <tr>
                                <td>{{ $single_app->id }}</td>
                                <td>{{ $single_app->program_name }}</td>
                                <td>{{ $single_app->country_name }}</td>
                                <td>{{ $single_app->location_name }}</td>
                                <td>{{ $single_app->last_name }}</td>
                                <td>{{ $single_app->first_name }}</td>
                                <td>{{ $single_app->email }}</td>
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
