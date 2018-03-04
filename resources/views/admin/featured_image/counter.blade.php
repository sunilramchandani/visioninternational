@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                Counter
                @if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif @if(Session::has('ok'))
<div class="alert alert-success">
</div>
@endif  
            </h1>
        </div>
    </div>
</section>
@endsection @section('content-main')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <form action="{{ $action }}" method="{{  $method }}" enctype="multipart/form-data" role="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="company_website">
                                Country
                            </label>
                            <input type="number" min="0" class="form-control" id="country" name="country" value="{{ isset($counter) ? $counter->country : '' }}" placeholder="333"required>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="company_website">
                                State
                            </label>
                            <input type="number" min="0" class="form-control" id="state" name="state" value="{{ isset($counter) ? $counter->state : '' }}" placeholder="333"required>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="company_website">
                                Company
                            </label>
                            <input type="number" min="0" class="form-control" id="company" name="company" value="{{ isset($counter) ? $counter->company : '' }}" placeholder="333"required>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="company_website">
                                Applicant
                            </label>
                            <input type="number" min="0" class="form-control" id="applicant" name="applicant" value="{{ isset($counter) ? $counter->applicant : '' }}" placeholder="333"required>
                        </div>
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