@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/application-form.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@stop

@include('layouts.navbar')

@section('content')

<div class = "row">
    @foreach ($featuredimage_application as $featured)
        <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="img img-responsive img-rounded header" alt="Company Banner">
        <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
        <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-border" alt="Company Banner">   
    @endforeach
</div>
		<form action="{{route('application.store')}}" method="post" role="form"  enctype="multipart/form-data"> 
		{{csrf_field()}}
        <div class = "row text-title text-center">
            <div class = "col-md-6 col-md-offset-3 col-xs-12">
                <h2>Your Assesment Form</h2>
                <p>Fill in the assessment form below and a VIP representative will reach out to you
                ASAP about the program you are intereseted in. We recommend you check carefully all
                the information you provide in order to have a smoother a application process. Thank you!</p>
            </div>
        </div>

        
        <div class="row">
            <div class = "col-md-12 text-center col-xs-12 ">
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
                {{Session::get('ok')}}
            </div>
            @endif

            </div>
        </div>
        <div class = "col-md-5 col-md-offset-1 col-xs-12 ">
        	<div class = "row form-group">
        		<div class = "col-md-4 label-container">
        			<label for = "program" class = "labels">Program *</label>
        		</div>
        		<div class = "col-md-7">
	                <select class = "form-control" name="program_name" id="program_name" required>
	                    <option value="" disabled selected>Select Program</option>
						<option value="Internship">Internship</option>
						<option value="Work & Travel">Work & Travel</option>
						<option value="AuPair">AuPair</option>
                        <option value="Skilled Work Visa">Skilled Work Visa</option>   	  
	                </select>
            	</div>
            </div>



            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "country_id" class = "labels">Country</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
	                <select class = "form-control" name="country_name" id="country_name">
                    <option value="" disabled selected>Select Country</option>
                    <option value="United States">United States</option>
                    <option value="Australia" >Australia</option>
	                </select>
	           </div>
            </div>

           

            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "location_id" class = "labels">Location</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
	                <select class = "form-control" name="location_name" id="location_name">
                        <option value="" disabled selected>Select</option>
	                </select>
	            </div>
            </div>



            
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "last_name" class = "labels">Last Name *</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
                	<input type = "text" class = "form-control"  name="last_name" id=""  required>
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "first_name" class = "labels">First Name *</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
                	<input type = "text" class = "form-control"  name="first_name" id="" required>
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "email" class = "labels">Email *</label>
        		</div>
        		<div class = "col-md-7 col-xs-12 ">
                	<input type = "email" class = "form-control"  name="email" id=""required >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "contact_no" class = "labels">Contact Number *</label>
        		</div>
        		<div class = "col-md-7 col-xs-12 ">
                	<input type = "tel" class = "form-control"  name="contact_no" id="" required >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "bdate" class = "labels">Birthdate *</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
                	<input type = "date" class = "form-control"  name="birthdate" id="">
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "gender" class = "labels">Gender</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
	                <select class = "form-control" name="gender" id="">
	                    <option value="" disabled selected>Select</option>
	                    <option value="Male">Male</option>
	                    <option value="Female">Female</option>
	                </select>
	            </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "current_city" class = "labels">Current City</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
	                <select class = "form-control" name="current_city" id="">
                        <option value="" disabled selected>Select</option>
                       @foreach($city_table as $city)
                           <option value ="{{$city->city_name}}">{{$city->city_name}}</option>
                        @endforeach
	                </select>
	            </div>
            </div>
            <div class = "row form-group">
                <div class = "col-md-4 col-xs-12 label-container">
                    <label for = "resume" class = "labels">Upload Resume</label>
                </div>
                <div class = "col-md-7 col-xs-12">
                    <input type = "file" class = "form-control"  name="upload_resume" id="resume" >
                </div>
            </div>
        </div>
        <div class = "col-md-5  col-xs-12">
            <div class = "row form-group">
        		<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "university_name" class = "labels">University/School</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
	                <input type = "text" class = "form-control" name="university_name" id="university_name">
            	</div>
            </div>
            <div class = "row form-group">
        		<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "degree_name" class = "labels">Degree</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
                    <input type = "text" class = "form-control" name="degree_name" id="degree_name">
            	</div>
            </div>
            <div class = "row form-group">
        		<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "major_name" class = "labels">Major</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
	                <select class = "form-control" name="major_name" id="major_name">
	                    <option value="" disabled selected>Select</option>
	                    <option value="7">Business</option>
	                    <option value=""></option>
	                    <option value=""></option>
	                </select>
            	</div>
            </div>
            <div class = "row form-group">
                <div class = "col-md-4 col-xs-12 label-container">
                    <label for = "studies" class = "labels">Highest Level of Education *</label>
                </div>
                <div class = "col-md-7 col-xs-12">
                    <select class = "form-control" name="studies_name" id="studies_name">
                        <option value="Secondary/High School" selected>Secondary/High School</option>
                        <option value="Technical/vocational education">Technical/vocational education</option>
                        <option value="Technical/vocational education">Undergraduate degree</option>
                        <option value="Post-graduate education">Post-graduate education</option>
                    </select>
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "grad_date" class = "labels">Graduation Date *</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
                	<input type = "date" class = "form-control"  name="grad_date" id="grad" required >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "start_date" class = "labels">Preferred Start Date</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
                	<input type = "date" class = "form-control"  name="start_date" id="start" >
                </div>
            </div>
            <div class = "row form-group">
        		<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "learn" class = "labels">How did you learn about V.I.P.?</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
	                <select class = "form-control" name="about_vip" id="learn" >
	                    <option value="" disabled selected>Select</option>
	                    <option value="event">Event (at school/college)</option>
	                    <option value="newspaper">Local News Paper</option>
	                    <option value="fb/twitter">Facebook/Twitter</option>
                        <option value="google">Google Search</option>
                        <option value="someone">Family/Friend</option>
                        <option value="otherWeb">Other Websites</option>
                        <option value="other">Other</option>
	                </select>
            	</div>
            </div>
            <div class = "row form-group">
                <div class = "col-md-11 col-xs-12">
                    <textarea name="message" class = "form-control textarea-input" placeholder="Message" rows="9" cols="10" name="message" id="" required ></textarea>
                </div>
            </div>
        </div>
        <div id="submitButton">
            <div class = "col-md-4 col-md-offset-8 col-xs-12 button-submit text-center">
                <button class = "submit btn"><span>Submit Form</span></button>
            </div>
        </div>
    </div>  
</div>
</form>
<div class = "filler row">
</div>
</form>
<script src="//code.jquery.com/jquery.min.js"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.2.26/jquery.autocomplete.min.js'></script>
<script>

    var e = document.getElementById("program_name");
    var f = document.getElementById("country_name");
    var g = document.getElementById("location_name");
    var gaddress = {!! json_encode($internship_addresses->toArray()) !!};
    var haddress = {!! json_encode($work_addresses->toArray()) !!};
    var max = gaddress.length;
    var max2 = haddress.length;
    e.onchange = function() {
        var strUser = e.options[e.selectedIndex].value;
        if(strUser == "Internship"){
          f.innerText = null;
          g.innerText = null;
            var option13 = document.createElement("option");
            option13.text = "Select";
            f.add(option13);

            var option21 = document.createElement("option");
            option21.text = "Select";
            g.add(option21);

            var option = document.createElement("option");
            option.text = "United States";
            f.add(option);

            var option2 = document.createElement("option");
            option2.text = "Australia";
            f.add(option2);

            for (var i = 0; i<max; i++){
                var opt = document.createElement('option');
                opt.value = gaddress[i];
                opt.innerHTML = gaddress[i];
                g.add(opt);
            }
        }
        if(strUser == "Work & Travel"){
            f.innerText = null;
            g.innerText = null;
            var option13 = document.createElement("option");
            option13.text = "Select";
            f.add(option13);
            var option21 = document.createElement("option");
            option21.text = "Select";
            g.add(option21);
            var option = document.createElement("option");
            option.text = "United States";
            f.add(option);
            for (var i = 0; i<max2; i++){
                var opt = document.createElement('option');
                opt.value = haddress[i];
                opt.innerHTML = haddress[i];
                g.add(opt);
            }
        }   
        if(strUser == "AuPair"){
            f.innerText = null;
            g.innerText = null;
            var option13 = document.createElement("option");
            option13.text = "Select";
            f.add(option13);
            var option = document.createElement("option");
            option.text = "United States";
            f.add(option);
            var option2 = document.createElement("option");
            option2.text = "Not Applicable";
            g.add(option2);
        }                  
    }
  var university = {!! json_encode($university_table->toArray()) !!};
  
  var university_list = [];
   for (var i = 0; i<university.length; i++){
        var data =  { value: university[i].toString() };
        university_list.push(data);
    }
  


  $('#university_name').autocomplete({
    lookup: university_list,
    onSelect: function (suggestion) {
      var content =  suggestion.value;
      $('#university_name').html(content);
    }
  });

  var degree = {!! json_encode($degree_table->toArray()) !!};
  var degree_list = [];
   for (var i = 0; i<degree.length; i++){
        var data =  { value: degree[i].toString() };
        degree_list.push(data);
    }
  


  $('#degree_name').autocomplete({
    lookup: degree_list,
    onSelect: function (suggestion) {
      var content = suggestion.value;
      $('#degree_name').html(content);
    }
  });
</script>
<script>
    var e = document.getElementById("program_name");
    var f = document.getElementById("country_name");
    var $_GET = <?php echo json_encode($_GET); ?>;
    var eid = $_GET['c'];

    if(eid == 'IUS'){
        e.value = 'Internship';
        f.value = 'United States';
    }
    else if(eid == 'IAU'){
        e.value = 'Internship';
        f.value = 'Australia';
    }
    else if(eid == 'WUS'){
        e.value = 'Work & Travel';
        f.value = 'United States';
    }
    else if(eid == 'SAU'){
        e.value = 'Skilled Work Visa';
        f.value = 'Australia';
    }
</script>

@stop
