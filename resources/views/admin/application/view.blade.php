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

            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <span class="label">Company: </span>
                        {{ $app->country_id }}
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <span class="label">Company Website:</span>
                        {{ $app->location_id }}
                    </div>  

                    <div class="col-xs-12 col-md-3">
                        <span class="label">Company Email:</span>
                        {{ $app->first_name }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <span class="label">Location:</span>
                        {{ $app->last_name }}
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <span class="label">Duration:</span>
                        {{ $app->email }} 
                    </div>
                </div>

                <div class="col-xs-12 col-md-6">
                        <span class="label">Duration:</span>
                        {{ $app->contact_no }} 
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
                        {{ $app->university_id }} 
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                        <span class="label">Duration:</span>
                        {{ $app->degree_id }} 
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                        <span class="label">Duration:</span>
                        {{ $app->major_id }} 
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