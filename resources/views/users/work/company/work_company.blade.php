
<link rel="stylesheet" href="{{ asset('css/internship-company.css') }}">

<div class = "col-xs-12 company-whole">
    <div class = "col-xs-5 picture picture2">
    @foreach ($internshipCompany_table as $company)
    <img src="{{ URL::asset('image/uploaded_workcompany_image/'.$company->image)}}" class="img img-responsive img-map" alt="Company Banner" height ="100">
    @endforeach
    </div>
    <div class = "col-xs-7 company-details">
        @foreach ($internshipCompany_table as $company)
            <div class ="col-md-11 col-xs-9 col-sm-10">
                <h1><strong>{{$company->company_name}}</strong></h1>
            </div>
            <div class = "col-xs-1">
                <button class = "btn" data-dismiss="modal">x</button>
            </div>
            <div class ="col-xs-12">
                <p>{{$company->description}}</p>
            </div>
            <div class = "row stip-hous">
                <div class = "col-xs-6">
                    <p><strong>Housing</strong></p>
                    <p> Type: {{$company->housing_type}}</p>
                    <p> Distance: {{$company->housing_distance}}</p>
                    <p> Address : {{$company->housing_address}}</p>
                </div>
                <div class = "col-xs-6">
                    <p><strong>Stipend</strong></p>
                    <p>${{$company->stipend}} / Month</p>
                </div>
            </div>
            <div class = "col-xs-12 opportunities">
                <hr>
                <p><strong>Opportunities</strong></p>
                 @foreach ($company->work_opportunity as $opportunities)
                    <div class = "col-xs-6">
                        @if ($opportunities->status == "Inactive" )
                        <p><i class="fa fa-circle" aria-hidden="true" style="color:#cccccc"></i> {{$opportunities->opportunitylist->opportunity_name}}</p>
                        @else
                        <p><i class="fa fa-circle" aria-hidden="true" style="color:#80bf40"></i> {{$opportunities->opportunitylist->opportunity_name}}</p>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class = "col-xs-12 qualifications">
                <p><strong>Do I Qualify?</strong></p>
                     @foreach ($company->work_qualifications as $qualifications)
                        @if ($qualifications->status == "Inactive" )
                            <div class = "col-xs-6">
                                <p><strike>{{$qualifications->qualificationlist->qualification_name}}</strike></p>
                            </div>
                            @else
                            <div class = "col-xs-6">
                                <p>{{$qualifications->qualificationlist->qualification_name}}</p>
                            </div>
                        @endif
                    @endforeach
            </div>
            <div class = "col-xs-12 legend">
                <p>Opportunity Availability:</p>
                <div class ="col-xs-5">
                    <div class ="col-xs-6">
                        <p> <i class="fa fa-circle" aria-hidden="true" style="color:#80bf40">  </i> Available </p>
                    </div>
                    <div class ="col-xs-6">
                        <p><i class="fa fa-circle" aria-hidden="true" style="color:#cccccc"> </i> Unavailable </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class = "filler row">
</div>
<script>
$('body').on('hidden.bs.modal', '.modal', function () {
  $(this).removeData('bs.modal');
});
    </script>
</form>