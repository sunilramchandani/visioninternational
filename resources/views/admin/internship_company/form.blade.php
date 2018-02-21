@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1>
        Internship Company
    </h1>
</section>
@endsection @section('content-main')
<section class="content page-news">
    <div class="row">
        <div class="col-xs-12">
            @if($error == true) @include('partials.notif', ['type' => 'danger', 'message' => 'Something went wrong.']); @endif
            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class = "col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="company_name">
                            Company Name
                        </label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ isset($company) ? $company->company_name : '' }}" placeholder="Company Name">
                    </div>
                </div>
                <div class = "col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="description">
                            Description
                        </label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ isset($company) ? $company->description : '' }}" placeholder="Description">
                    </div>
                </div>
                <div class = "col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="housing_type">
                            Housing type
                        </label>
                        <input type="text" class="form-control" id="housing_type" name="housing_type" value="{{ isset($company) ? $company->housing_type : '' }}" placeholder="Housing Type">
                    </div>
                </div>
                <div class = "col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="housing_distance">
                            Housing Distance
                        </label>
                        <input type="text" class="form-control" id="housing_distance" name="housing_distance" value="{{ isset($company) ? $company->housing_distance : '' }}" placeholder="Some Title">
                    </div>
                </div>
                <div class = "col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="housing_address">
                            Housing Address
                        </label>
                        <input type="text" class="form-control" id="housing_address" name="housing_address" value="{{ isset($company) ? $company->housing_address : '' }}" placeholder="Some Title">
                    </div>
                </div>
                <div class = "col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="full_address">
                            Full Address
                        </label>
                        <input type="text" class="form-control" id="full_address" name="full_address" value="{{ isset($company) ? $company->full_address : '' }}" placeholder="Some Title">
                    </div>
                </div>
                <div class = "col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="stipend">
                            Stipend
                        </label>
                        <input type="text" class="form-control" id="stipend" name="stipend" value="{{ isset($company) ? $company->stipend : '' }}" placeholder="Some Title">
                    </div>
                </div>
                <div class = "col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="state">
                            State
                        </label>
                        <input type="text" class="form-control" id="state" name="state" value="{{ isset($company) ? $company->state : '' }}" placeholder="Some Title">
                    </div>
                </div>
                <div class = "col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="image">
                            image
                        </label>
                        <input type = "file" class = "form-control"  name="image" id="image" value="{{ isset($company) ? $company->image : '' }}"  >
                    </div>
                </div>
                <div class="btn-container">
                    <a href="#" class="btn btn-danger pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection