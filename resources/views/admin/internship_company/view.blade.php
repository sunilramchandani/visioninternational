@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                Opportunity
                <meta name="csrf-token" content="{{ csrf_token() }}">
            </h1>
        </div>
    </div>
</section>
@endsection {{--{{ dd($company) }}--}}  @section('content-main')
<section class="content page-opportunities">

    <div class="row">
        <div class="col-xs-12">
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
                    <img src="{{ URL::asset('image/uploaded_company_image')}}/{{ $company->image }}" class="img img-responsive img-rounded header" alt="Company Banner">
                </div>
                <div class="col-xs-12 col-md-3">
                    <label>Qualifications:</label>
                    @foreach($company->qualifications as $qualification)
                        <ul>{{$qualification->qualificationlist->qualification_name}}</ul>

                        <button  class="btn btn-danger btn-block delete_single_qualification" data-id="{{ $qualification->id }}" data-token="{{ csrf_token() }}">
                        Delete</button>


                    @endforeach
                </div>
                 <div class="col-xs-12 col-md-3">
                     <label>Opportunities:</label>
                    @foreach($company->opportunity as $opportunity)
                        <ul>{{$opportunity->opportunitylist->opportunity_name}}</ul>
                        <button  class="btn btn-danger btn-block delete_single_opportunity" data-id="{{ $opportunity->id }}" data-token="{{ csrf_token() }}">
                        Delete</button>
                    @endforeach
                </div>
                <div class="col-xs-12 col-md-3">
                     <label>Note:</label>
                        <p>{{$company->remark}}</p>
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


@section('scripts')
<script>
             jQuery(document).ready(function($) {

              $(".delete_single_qualification").click(function(){
                var id = $(this).data("id");
                var token = $(this).data("token");

                $.ajax(
                {
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  url: "deleteQualification/"+id,
                  type: 'delete',
                  dataType: 'json',
                   data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                  },
                  success: function (){
                    console.log("SUCCESSS!!!");
                    window.location.reload();
                  },
                  error: function(){
                    alert('error please contact administrator')
                  } 
                });
              });

            });
</script>
<script>
             jQuery(document).ready(function($) {

              $(".delete_single_opportunity").click(function(){
                var id = $(this).data("id");
                var token = $(this).data("token");

                $.ajax(
                {
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  url: "deleteOpportunity/"+id,
                  type: 'delete',
                  dataType: 'json',
                   data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                  },
                  success: function (){
                    console.log("SUCCESSS!!!");
                    window.location.reload();
                  },
                  error: function(){
                    alert('error please contact administrator')
                  } 
                });
              });

            });
</script>
    @endsection