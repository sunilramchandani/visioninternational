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



    @foreach($company->work_opportunity as $opportunity)
    {{$opportunity->opportunitylist->opportunity_name}}
    @endforeach


    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                {{ $company->company_name }}
            </h2>
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
                    <label>Qualifications:</label>
                    @foreach($company->qualifications as $qualification)
                        <ul>{{$qualification->qualificationlist->qualification_name}}</ul>
                    @endforeach
                </div>
                 <div class="col-xs-12 col-md-3">
                     <label>Opportunities:</label>
                    @foreach($company->opportunity as $opportunity)
                        <ul>{{$opportunity->opportunitylist->opportunity_name}}</ul>
                    @endforeach
                </div>
                <div class="col-xs-12 col-md-3">
                     <label>Note:</label>
                    @foreach($company->opportunity as $opportunity)
                        <p>{{$opportunity->remark}}</p>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
    </br>
    <a href="{{ route('workcompany.new_opportunity', $company->id) }}" class="btn btn-warning">
        Opportunity
    </a>
    <a href="{{ route('workcompany.new_qualification', $company->id) }}" class="btn btn-warning">
        Qualification
    </a>
    <a href="{{ route('workcompany.new_duration', $company->id) }}" class="btn btn-warning">
        Duration
    </a>
    </div>
    </div>
    </div>

</section>
@endsection