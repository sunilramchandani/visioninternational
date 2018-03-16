@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
            About Us
            </h1>
        </div>
    </div>
</section>
@endsection @section('content-main')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <form action="{{ $action }}" method="{{  $method }}" enctype="multipart/form-data"  role="form" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                        <div class="col-xs-6">
                        <div class="form-group">
                        <label for="position">
                            Department
                        </label>
                        <select class ="form-control"name="about_department" id="about_department">
                            <option value="Management">Management</option>
                            <option value="Operations">Operations</option>
                            <option value="Marketting">Marketting</option>


                        </select>
                        
                    </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="company_website">
                                    Position
                                </label>
                                <input type="text" class="form-control" id="about_position" name="about_position" required value="{{ isset($aboutUs->about_position) ? $aboutUs->about_position:""}} "
                                    placeholder="Senior Programmer">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                        <div class="form-group">
                        <label for="position">
                            Twitter
                        </label>
                        <input type="text" class="form-control" id="about_twitter" name="about_twitter" required value="{{ isset($aboutUs->about_twitter) ? $aboutUs->about_twitter:""}} "
                                    placeholder="@sam">
                        
                    </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="company_website">
                                    Linkedin
                                </label>
                                <input type="text" class="form-control" id="about_linkedin" name="about_linkedin" required value="{{ isset($aboutUs->about_linkedin) ? $aboutUs->about_linkedin:"" }} "
                                    placeholder="sammy-su">
                            </div>
                        </div>
                    </div>


                
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="company">
                                    Name
                                </label>
                                <input type="text" class="form-control" id="about_name" name="about_name" required value="{{ isset($aboutUs->about_name) ? $aboutUs->about_name : '' }} "
                                    placeholder="Nikko Raj">
                            </div>
                            <div class="form-group">
                            <label for="company_email">
                                Image
                            </label>
                            <input type="file" class="form-control" id="upload_aboutUs_image" name="upload_aboutUs_image" >
        
                        </div>
                        </div>
                    </div>

                @if ($action == route('aboutus.adminStore'))

                
                @else
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="location">
                                Image Preview
                            </label>
                            <img height="200px" width "200px" src="{{URL::asset('image/uploaded_aboutUs_image')}}/{{$aboutUs->about_image}} "
                                    alt="No Image" />
                        </div>
                    </div>
                </div>
                
                @endif

                <div class="row">
                    <div class="col-xs-12">
                        <label for="bio">
                            Bio
                        </label>
                        <textarea name="bio" id="bio" rows="20" required class="summernote">
                        </textarea>
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
@endsection @section('scripts')
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 250
        });


        $('input[name="start_end"]').daterangepicker({
            locale: {
                format: 'MM/DD/YYYY'
            }
        });

        $('#start_end').change(function () {
            var start_end = $('#start_end').val();
            start_end = start_end.split('-');

            var start = start_end[0];
            var end = start_end[1];

            start = new Date(start);
            end = new Date(end);

            var timeDiff = Math.abs(start.getTime() - end.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

            $('#duration').val(diffDays);

        });
    });
</script>
@endsection