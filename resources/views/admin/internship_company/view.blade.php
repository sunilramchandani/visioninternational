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
        <div class="col-xs-12 col-md-12">
            <h1 class="page-header">
                {{ $company->company_name }}
            </h1>
        </div>
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <p><label>Description: </label>
                    {{ $company->description }}</p>
                </div>

                <div class="col-xs-12 col-md-3">
                    <p><label>Housing Type:</label>
                    {{ $company->housing_type }}</p>
                </div>
                 <div class="col-xs-12 col-md-3">
                    <p><label>Company Address:</label>
                    {{ $company->full_address }}</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <p><label>Housing Address:</label>
                    {{ $company->housing_address }}</p>
                </div>
                <div class="col-xs-12 col-md-3">
                    <p><label>Housing Distance:</label>
                    {{ $company->housing_distance }}</p>
                </div>
                <div class="col-xs-12 col-md-3">
                    <p><label>Stipend:</label>
                    {{ $company->stipend }}</p>
                </div>
                <div class="col-xs-12 col-md-3">
                    <p><label>State:</label>
                    {{ $company->state }}</p>
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