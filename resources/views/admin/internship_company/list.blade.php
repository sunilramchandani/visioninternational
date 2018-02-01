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
                            <th>Company Name</th>
                            <th>Company Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($company as $single_company)
                            <tr>
                                <td>{{ $single_company->company_name }}</td>
                                <td>{{ $single_company->description }}</td>
                                <td>
                                    <a
                                        href="{{ route('internshipcompany.view', $single_company->id) }}"
                                        class="btn btn-info">
                                        View
                                    </a>
                                    <a
                                        href="{{ route('internshipcompany.delete', $single_company->id) }}"
                                        class="btn btn-danger">
                                        Delete
                                    </a>
                                    <a
                                        href="{{ route('internshipcompany.adminedit', $single_company->id) }}"
                                        class="btn btn-warning">
                                    Edit
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
