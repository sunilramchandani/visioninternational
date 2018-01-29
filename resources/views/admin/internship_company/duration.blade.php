@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1>
        {{ ucwords(request()->route()->getActionMethod()) }} Internship Company
    </h1>
</section>
@endsection {{--{{ dd($company) }}--}}  @section('content-main')
<section class="content page-news">
    <div class="row">
        <div class="col-xs-12">
            <form action="{{route('internshipcompany.store_duration', $company->id)}}" method="post" role="form"  enctype="multipart/form-data"> 
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="company_name">
                        months
                    </label>
                    <input type="text"  class="form-control" id="duration_months" name="duration_months" placeholder="Some Title">
                </div>

                <div class="form-group">
                    <label for="company_name">
                        price
                    </label>
                    <input type="number" class="form-control" id="duration_months" name="duration_price" placeholder="Some Title">
                </div>
                <div class="form-group">
                    <label for="company_name">
                        start
                    </label>
                    <input type="date" class="form-control" id="duration_start_date" name="duration_start_date" placeholder="Some Title">
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