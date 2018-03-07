@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                Work & Travel Company 
            </div>
            <div class="col-xs-2">
            <a href="{{route('workcompany.trash')}}"><button class="btn"><i class="fa fa-trash" style="color:black;"> &nbsp; View Trash</i></button></a>
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
                            <th>Company Name</th>
                            <th>Company Description</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($company as $single_company)
                            <tr>
                                <td>{{ $single_company->company_name }}</td>
                                <td>{{ $single_company->description }}</td>
                                <td>
                                    <a
                                        href="{{ route('workcompany.view', $single_company->id) }}"
                                        class="btn btn-info">
                                        <i class="fa fa-eye"><br>View</i>
                                    </a>
                                </td>
                                <td>
                                    <a
                                        href="{{ route('workcompany.adminedit', $single_company->id) }}"
                                        class="btn btn-warning">
                                        <i class="fa fa-edit"><br>Edit</i>
                                    </a>
                                </td>
                                <td>
                                    <a
                                        href="{{ route('workcompany.delete', $single_company->id) }}"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash"><br>Delete</i>
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
