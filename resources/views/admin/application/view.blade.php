@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">
                    Opportunity
                </h1>
            </div>
        </div>
    </section>
@endsection
{{--{{ dd($app) }}--}}
@section('content-main')
    <section class="content page-opportunities">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    {{ $app->upload_resume }}
                </h2>
                <form action="{{route('application.show', $app)}}">
                <button type="submit"> Download </button>
                </form>
            </div>

            <form action="{{route('application.pdf', $app)}}">
                <button type="submit"> Download as PDF </button>
                </form>
            </div>

            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <span class="label">Program ID: </span>
                        {{ $app->program_name }}
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <span class="label">Country ID: </span>
                        {{ $app->country_name }}
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <span class="label">Location ID:</span>
                        {{ $app->location_name }}
                    </div>  
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <span class="label">Lastname:</span>
                        {{ $app->last_name }}
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <span class="label">Firstname:</span>
                        {{ $app->first_name }} 
                    </div>


                    <div class="col-xs-12 col-md-3">
                        <span class="label">Email:</span>
                        {{ $app->email }} 
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <span class="label">Contact Number:</span>
                        {{ $app->contact_no }}
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <span class="label">Birthdate:</span>
                        {{ $app->birthdate }} 
                    </div>


                    <div class="col-xs-12 col-md-3">
                        <span class="label">Gender:</span>
                        {{ $app->gender }} 
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                        <span class="label">Duration:</span>
                        {{ $app->birthdate }} 
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                        <span class="label">Duration:</span>
                        {{ $app->gender }} 
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                        <span class="label">Duration:</span>
                        {{ $app->current_city }} 
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                        <span class="label">Duration:</span>
                        {{ $app->university_name }} 
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                        <span class="label">Duration:</span>
                        {{ $app->degree_name }} 
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                        <span class="label">Duration:</span>
                        {{ $app->major_name }} 
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                        <span class="label">Duration:</span>
                        {{ $app->grad_date }} 
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <span class="label">Start:</span>
                        {{ $app->start_date }}
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <span class="label">Interview Date:</span>
                        {{ $app->about_vip }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <span class="label">Description: </span>
                        <div class="description-container">
                            {!! $app->message !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection