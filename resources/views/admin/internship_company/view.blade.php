@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                Opportunity
            </h1>
        </div>
    </div>
</section>
@endsection {{--{{ dd($company) }}--}} @section('content-main')
<section class="content page-opportunities">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                {{ $company->company_name }}
            </h2>
        </div>

        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <span class="label">Company: </span>
                    {{ $company->description }}
                </div>

                <div class="col-xs-12 col-md-3">
                    <span class="label">Company Website:</span>
                    {{ $company->housing_type }}
                </div>

                <div class="col-xs-12 col-md-3">
                    <span class="label">Company Email:</span>
                    {{ $company->housing_distance }}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <span class="label">Location:</span>
                    {{ $company->housing_address }}
                </div>

                <div class="col-xs-12 col-md-6">
                    <span class="label">Duration:</span>
                    {{ $company->full_address }}
                </div>
            </div>

            <div class="col-xs-12 col-md-6">
                <span class="label">Duration:</span>
                {{ $company->stipend }}
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <span class="label">Duration:</span>
            {{ $company->state }}
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <span class="label">Duration:</span>
        {{ $company->image }}
    </div>
    <a href="{{ route('internshipcompany.new_opportunity', $company->id) }}" class="btn btn-warning">
        Opportunity
    </a>
    <a href="{{ route('internshipcompany.new_qualification', $company->id) }}" class="btn btn-warning">
        Hello
    </a>
    <a href="{{ route('internshipcompany.new_duration', $company->id) }}" class="btn btn-warning">
        Duration
    </a>
    </div>

    </div>
    </div>
    
</section>
@endsection