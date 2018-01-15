@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">Programs</h1>
            </div>
        </div>
    </section>
@endsection

@section('content-main')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @if(session('flash'))
                    @include('partials.notif', ['flash' => session('flash')])
                @endif

                <table class="table table-bordered tabled-striped">
                    <thead>
                        <th>Title</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach($programs as $program)
                            <tr>
                                <td>{{ $program->title }}</td>
                                <td>
                                    <a
                                        href="{{ route('programs.edit', $program->id) }}"
                                        class="btn btn-info">
                                        Edit
                                    </a>
                                    <a
                                        href="{{ route('programs.delete', $program->id) }}"
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

        <div class="row">
            <div class="col-xs-12 text-center">
                {{ $pagination->links() }}
            </div>
        </div>
    </section>
@endsection