
<link rel="stylesheet" href="{{ asset('css/internship-company.css') }}">

<div class = "col-lg-12 company-whole">
    <div class = "col-lg-4 picture">
        <img src="{{ URL::asset('image/photos/Internship.jpg')}}" class="img img-responsive img-rounded img-map" alt="Company Banner" height ="100">
    </div>
    <div class = "col-lg-8 company-details">
        @foreach ($workCompany_table as $company)
            <div class ="col-lg-12">
                <h1><strong>{{$company->company_name}}</strong></h1>
                <p>{{$company->description}}</p>
            </div>
            <div class = "row stip-hous">
                <div class = "col-lg-6">
                    <p><strong>Housing</strong></p>
                    <p> Type: {{$company->housing_type}}</p>
                    <p> Distance: {{$company->housing_distance}}</p>
                    <p> Address : {{$company->housing_address}}</p>
                </div>
                <div class = "col-lg-6">
                    <p><strong>Stipend</strong></p>
                    <p>${{$company->stipend}} / Month</p>
                </div>
            </div>
            <div class = "col-lg-12 opportunities">
                <hr>
                <p><strong>Opportunities</strong></p>
                 @foreach ($company->work_opportunity as $opportunities)
                    <div class = "col-lg-6">
                        @if ($opportunities->status == "Inactive" )
                        <p><i class="fa fa-circle" aria-hidden="true" style="color:#cccccc"></i> {{$opportunities->opportunity_name}}</p>
                        @else
                        <p><i class="fa fa-circle" aria-hidden="true" style="color:#80bf40"></i> {{$opportunities->opportunity_name}}</p>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class = "col-lg-12 qualifications">
                <p><strong>Do I Qualify?</strong></p>
                     @foreach ($company->work_qualifications as $qualifications)
                        @if ($qualifications->status == "Inactive" )
                            <div class = "col-lg-6">
                                <p><strike>{{$qualifications->qualification}}</strike></p>
                            </div>
                            @else
                            <div class = "col-lg-6">
                                <p>{{$qualifications->qualification}}</p>
                            </div>
                        @endif
                    @endforeach
            </div>
            <div class = "col-lg-12 legend">
                <p>Opportunity Availability:</p>
                <div class ="col-lg-5">
                    <div class ="col-lg-6">
                        <p> <i class="fa fa-circle" aria-hidden="true" style="color:#80bf40">  </i> Available </p>
                    </div>
                    <div class ="col-lg-6">
                        <p><i class="fa fa-circle" aria-hidden="true" style="color:#cccccc"> </i> Unavailable </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class = "filler row">
</div>
</form>
<script>
$('body').on('hidden.bs.modal', '.modal', function () {
  $(this).removeData('bs.modal');
});
    </script>
</form>