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
        <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-responsive img-border" alt="Company Banner">   
    @endforeach
</div>
@if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif @if(Session::has('ok'))
        <div class="alert alert-info">
            {{Session::get('ok')}}
        </div>
        @endif
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
        <div class = "col-md-5 col-md-offset-1 col-xs-12 ">
        	<div class = "row form-group">
        		<div class = "col-md-4 label-container">
        			<label for = "program" class = "labels">Program</label>
        		</div>
        		<div class = "col-md-7">
	                <select class = "form-control" name="program_id" id="duration" >
	                    <option value="" disabled selected>Select</option>
						<option value="1">Internship</option>
						<option value="2">Work & Travel</option>
						<option value="3">AuPair</option>	  
	                </select>
            	</div>
            </div>



            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "country_id" class = "labels">Country</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
	                <select class = "form-control" name="country_id" id="country" >
                    <option value="" disabled selected>Select</option>
	                </select>
	           </div>
            </div>

           

            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "location_id" class = "labels">Location</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
	                <select class = "form-control" name="location_id" id="location" >
                        <option value="" disabled selected>Select</option>
	                </select>
	            </div>
            </div>



            
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "last_name" class = "labels">Last Name</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
                	<input type = "text" class = "form-control"  name="last_name" id=""  >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "first_name" class = "labels">First Name</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
                	<input type = "text" class = "form-control"  name="first_name" id="" >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "email" class = "labels">Email</label>
        		</div>
        		<div class = "col-md-7 col-xs-12 ">
                	<input type = "email" class = "form-control"  name="email" id="" >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "contact_no" class = "labels">Contact Number</label>
        		</div>
        		<div class = "col-md-7 col-xs-12 ">
                	<input type = "tel" class = "form-control"  name="contact_no" id=""  >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "bdate" class = "labels">Birthdate</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
                	<input type = "date" class = "form-control"  name="birthdate" id="" >
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
	                <select class = "form-control" name="current_city" id="" >
                        <option value="" disabled selected>Select</option>
                       @foreach($city_table as $city)
                           <option value ="{{$city->city_id}}">{{$city->city_name}}</option>
                        @endforeach
	                </select>
	            </div>
            </div>
        </div>
        <div class = "col-md-5  col-xs-12">
            <div class = "row form-group">
        		<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "university_id" class = "labels">University/School</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
	                <input type = "text" class = "form-control" name="university_id" id="school">
            	</div>
            </div>
            <div class = "row form-group">
        		<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "degree_id" class = "labels">Degree</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
                    <input type = "text" class = "form-control" name="degree_id" id="degree">
            	</div>
            </div>
            <div class = "row form-group">
        		<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "major_id" class = "labels">Major</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
	                <select class = "form-control" name="major_id" id="major" >
	                    <option value="" disabled selected>Select</option>
	                    <option value="7">Business</option>
	                    <option value=""></option>
	                    <option value=""></option>
	                </select>
            	</div>
            </div>
            <div class = "row form-group">
            	<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "grad_date" class = "labels">Graduation Date</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
                	<input type = "date" class = "form-control"  name="grad_date" id="grad" >
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
        			<label for = "resume" class = "labels">Upload Resume</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
                	<input type = "file" class = "form-control"  name="upload_resume" id="resume"  >
                </div>
            </div>
            <div class = "row form-group">
        		<div class = "col-md-4 col-xs-12 label-container">
        			<label for = "learn" class = "labels">How did you learned about V.I.P.?</label>
        		</div>
        		<div class = "col-md-7 col-xs-12">
	                <select class = "form-control" name="about_vip" id="learn" >
	                    <option value="" disabled selected>Select</option>
	                    <option value="dada">test</option>
	                    <option value=""></option>
	                    <option value=""></option>
	                </select>
            	</div>
            </div>
            <div class = "row form-group">
                <div class = "col-md-11 col-xs-12">
                    <textarea name="message" class = "form-control textarea-input" placeholder="Message" rows="6" cols="50" name="message" id=""></textarea>
                </div>
            </div>
        </div>
        <div class = "col-md-4 col-md-offset-8 col-xs-12 button-submit text-center">
            <button class = "submit btn"><span>Submit Form</span></button>
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

    var e = document.getElementById("duration");
    var f = document.getElementById("country");
    var g = document.getElementById("location");
    var gaddress = {!! json_encode($internship_addresses->toArray()) !!};
    var haddress = {!! json_encode($work_addresses->toArray()) !!};
    var max = gaddress.length;
    var max2 = haddress.length;
    e.onchange = function() {
        
        var strUser = e.options[e.selectedIndex].value;
        if(strUser == "1"){
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
        if(strUser == "2"){
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
        if(strUser == "3"){
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
  


  $('#school').autocomplete({
    lookup: university_list,
    onSelect: function (suggestion) {
      var content =  suggestion.value;
      $('#school').html(content);
    }
  });

  var degree = {!! json_encode($degree_table->toArray()) !!};
  var degree_list = [];
   for (var i = 0; i<degree.length; i++){
        var data =  { value: degree[i].toString() };
        degree_list.push(data);
    }
  


  $('#degree').autocomplete({
    lookup: degree_list,
    onSelect: function (suggestion) {
      var content = suggestion.value;
      $('#degree').html(content);
    }
  });
</script>


@stop
