@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1 class="page-header">
            Opportunities
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
                        <th>Position</th>
                        <th>Company</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($opportunities as $opportunity)
                        <tr>
                            <td>{{ $opportunity->position }}</td>
                            <td>{{ $opportunity->company }}</td>
                            <td>
                                <a
                                        href="{{ route('opportunities.view', $opportunity->id) }}"
                                        class="btn btn-info">
                                    View
                                </a>
                                <a
                                        href="{{ route('opportunities.edit', $opportunity->id) }}"
                                        class="btn btn-warning">
                                    Edit
                                </a>
                                <a
                                        href="{{ route('opportunities.delete', $opportunity->id) }}"
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
                {{ $pagination->links() }}
            </div>
        </div>
    </section>
@endsection
