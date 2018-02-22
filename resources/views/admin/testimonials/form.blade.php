@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                {{ ucwords(request()->route()->getActionMethod()) }} Testimonials
            </h1>
        </div>
    </div>
</section>
@endsection @section('content-main')
<section class="content">
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="first_name">
                        First Name
                    </label>
                    <input type="text" name="first_name" id="first_name" placeholder="Michael" value="{{ (isset($testimonial)) ? $testimonial->first_name : '' }}"
                        required class="form-control">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="last_name">
                        Last Name
                    </label>
                    <input type="text" name="last_name" id="last_name" placeholder="Kemp" required value="{{ (isset($testimonial)) ? $testimonial->last_name : '' }}"
                        class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="organization">
                Organization
            </label>

            <input type="text" name="organization" id="organization" placeholder="ABC University" required value="{{ (isset($testimonial)) ? $testimonial->organization : '' }}"
                class="form-control">
        </div>


        <div class="form-group">
            <label for="organization">
                Image Upload
            </label>

            <input type = "file" class = "form-control"  name="upload_testimony_image" id="upload_testimony_image" value="{{ isset($company) ? $company->image : '' }}" >

        </div>


        

        <div class="form-group">
            <label for="testimony">
                Testimony
            </label>

            <textarea name="testimony" id="testimony" class="form-control" required rows="10">{{ (isset($testimonial)) ? $testimonial->testimony : '' }}
            </textarea>
        </div>

        

        <div class="row">
            <div class="col-xs-12 btn-container">
                <a href="{{ route('testimonials.list') }}" class="btn btn-danger pull-right">Cancel</a>
                <button type="submit" class="btn btn-primary pull-right">Save</button>
            </div>
        </div>
    </form>
</section>
@endsection