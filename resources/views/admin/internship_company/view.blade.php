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
        <div class="col-xs-12 col-md-8">
            <h1 class="page-header">
                {{ $company->company_name }}
            </h1>
        </div>
        <div class="col-xs-12 col-md-3">
            <a href="{{ route('internshipcompany.new_opportunity', $company->id) }}" class="btn btn-warning">
        Opportunity
            </a>
            <a href="{{ route('internshipcompany.new_qualification', $company->id) }}" class="btn btn-warning">
                Qualification
            </a>
        </div>
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-md-6">
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
            <br>
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
                <div class="col-xs-12 col-md-3">
                    <span class="label">State:</span>
                    {{ $company->state }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <span class="label">Image:</span>
                    {{ $company->image }}
                    <img src="{{ URL::asset('image/uploads')}}/{{ $company->image }}" class="img img-responsive img-rounded header" alt="Company Banner">
                </div>
                <div class="col-xs-12 col-md-3">
                    
                </div>
            </div>
        </div>


    </div>
    </br>

    </div>
    </div>
    </div>

</section>
@endsection