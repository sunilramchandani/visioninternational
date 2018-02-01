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
                    <span class="label">Description: </span>
                    {{ $company->description }}
                </div>

                <div class="col-xs-12 col-md-3">
                    <span class="label">Housing Type:</span>
                    {{ $company->housing_type }}
                </div>

                <div class="col-xs-12 col-md-3">
                    <span class="label">Housing Distance:</span>
                    {{ $company->housing_distance }}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <span class="label">Housing Address:</span>
                    {{ $company->housing_address }}
                </div>

                <div class="col-xs-12 col-md-3">
                    <span class="label">Full Address:</span>
                    {{ $company->full_address }}
                </div>

                <div class="col-xs-12 col-md-3">
                    <span class="label">Stipend:</span>
                    {{ $company->stipend }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <span class="label">State:</span>
                    {{ $company->state }}
                </div>
            
            <div class="col-xs-12 col-md-3">
                <span class="label">Image:</span>
                {{ $company->image }}
            </div>
            </div>
        </div>


    </div>
    </br>
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