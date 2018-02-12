@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1 class="page-header">
            Internship Company  
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
                            <th>Duration Month</th>
                            <th>Duration Price</th>
                            <th>Start Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($duration_table as $duration)
                            <tr>
                                <td>{{ $duration->duration_months }}</td>
                                <td>{{ $duration->duration_price }}</td>
                                <td>{{ $duration->duration_start_date}}</td>
                                <td>
                                    <a
                                        href="{{ route('internshipcompany.new_duration', $duration->id) }}"
                                        class="btn btn-warning">
                                    Edit
                                </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </section>
@endsection
