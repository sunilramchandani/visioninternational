@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                Rates
            </div>
        </div>
    </h1>
</section>
@endsection

@section('content-main')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif @if(Session::has('ok'))
<div class="alert alert-success">
   <a href="{{route('rate.adminIndex')}}"> {{Session::get('ok')}}</a>
</div>
@endif

    <section class="content page-news">
        <div class="row">
            <div class="col-xs-12">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>Program</th>
                            <th>Country</th>
                            <th>Reservation</th>
                            <th>Duration</th>
                            <th colspan="2">Action</th>
                        </tr> 
                    </thead>

                    <tbody>
                        @foreach($rate_table as $rate)
                            <tr>
                                <td>{{ $rate->program }}</td>
                                <td>{{ $rate->country }}</td>
                                <td>{{ $rate->reservation }}</td>
                                <td>{{ $rate->duration }}</td>
                                <td>
                                    <a
                                        href="{{ route('rate.adminEdit', $rate->id) }}"
                                        class="btn btn-info">
                                        Edit
                                    </a>
                  
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-xs-12 text-center">
                {{ $rate_table->links() }}
            </div>
        </div>
    </section>
@endsection
