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
{{--{{ dd($opportunity) }}--}}
@section('content-main')
    <section class="content page-opportunities">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    {{ $opportunity->position }}
                </h2>
            </div>

            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <span class="label">Company: </span>
                        {{ $opportunity->company }}
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <span class="label">Company Website:</span>
                        {{ $opportunity->company_website }}
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <span class="label">Company Email:</span>
                        {{ $opportunity->company_email }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <span class="label">Location:</span>
                        {{ $opportunity->location }}
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <span class="label">Duration:</span>
                        {{ $opportunity->duration }} days
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <span class="label">Start - End:</span>
                        {{ sprintf('%s - %s', $opportunity->start_date, $opportunity->end_date) }}
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <span class="label">Interview Date:</span>
                        {{ $opportunity->interview_date }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <span class="label">Stipend:</span>
                        {{ sprintf('%s %s', $opportunity->stipend, $opportunity->stipend_currency) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <span class="label">Housing</span>
                        {{ $opportunity->housing_information }}
                    </div>

                    <div class="col-xs-12">
                        <span class="label">Local Transport</span>
                        {{ $opportunity->local_transport }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <span class="label">Description: </span>
                        <div class="description-container">
                            {!! $opportunity->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection