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
            </div>  
        </div>

            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <span class="label">Program: </span>
                        {{ $app->program_name }}
                    </div>

                    <div class="col-xs-12 col-md-4">
                        <span class="label">Country: </span>
                        {{ $app->country_name }}
                    </div>

                    <div class="col-xs-12 col-md-4">
                        <span class="label">Location:</span>
                        {{ $app->location_name }}
                    </div>  
                </div>

                <div class="row">
                    
                    <div class="col-xs-12 col-md-4">
                        <span class="label">Firstname:</span>
                        {{ $app->first_name }} 
                    </div>


                    <div class="col-xs-12 col-md-4">
                        <span class="label">Email:</span>
                        {{ $app->email }} 
                    </div>
                     <div class="col-xs-12 col-md-4">
                        <span class="label">Contact Number:</span>
                        {{ $app->contact_no }}
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <span class="label">Birthdate:</span>
                        {{ $app->birthdate }} 
                    </div>


                    <div class="col-xs-12 col-md-4">
                        <span class="label">Gender:</span>
                        {{ $app->gender }} 
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <span class="label">City:</span>
                        {{ $app->current_city }} 
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <span class="label">University:</span>
                        {{ $app->university_name }} 
                    </div>
                    <div class="col-xs-12 col-md-4">
                            <span class="label">Degree:</span>
                            {{ $app->degree_name }} 
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <span class="label">Major:</span>
                        {{ $app->major_name }} 
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <span class="label">Graduating:</span>
                        {{ $app->grad_date }} 
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <span class="label">Preferred Start:</span>
                        {{ $app->start_date }} 
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <span class="label">Message:</span>
                        {{ $app->message }} 
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-md-4 col-xs-12">
                        <form action="{{route('application.show', $app)}}">
                            <button type="submit" class = "btn btn-default"><i class="fa fa-download"></i> Download Resume</button>
                        </form>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-md-4 col-xs-12">
                        <form action="{{route('application.pdf', $app)}}">
                            <button type="submit" class = "btn btn-default"><i class="fa fa-download"></i> Download Online Application </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection