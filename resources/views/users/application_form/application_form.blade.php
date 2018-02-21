@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/application-form.css') }}">

@stop

@include('layouts.navbar')

@section('content')
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#school" ).autocomplete({
      source: availableTags
    });
  } );
</script>
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
            <h2>Your Assesment Form</h2>
            <p>Fill in the assessment form below and a VIP representative will reach out to you</p>
            <p>ASAP about the program you are intereseted in. We recommend you check carefully all </p>
            <p>the information you provide in order to have a smoother a application process. Thank you!</p>
        </div>
        <div class = "col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1 left-side">
        	<div class = "row form-group">
        		<div class = "col-lg-4  col-md-4 ">
        			<label for = "program" class = "labels">Program</label>
        		</div>
        		<div class = "col-lg-8 col-md-8">
	                <select class = "form-control" name="program_id" id="duration" >
	                    <option value="" disabled selected>Select</option>
						<option value="1">Internship</option>
						<option value="2">Work & Travel</option>
						<option value="3">AuPair</option>	  
	                </select>
            	</div>
            </div>



            <div class = "row form-group">
            	<div class = "col-lg-4  col-md-4">
        			<label for = "country_id" class = "labels">Country</label>
        		</div>
        		<div class = "col-lg-8 col-md-8">
	                <select class = "form-control" name="country_id" id="country" >
                    <option value="" disabled selected>Select</option>
                        <option value="1">Australia</option>
						<option value="2">United States</option>
	                </select>
	           </div>
            </div>

           

            <div class = "row form-group">
            	<div class = "col-lg-4  col-md-4">
        			<label for = "location_id" class = "labels">Location</label>
        		</div>
        		<div class = "col-lg-8 col-md-8">
	                <select class = "form-control" name="location_id" id="location" >
	                    <option value="" disabled selected>Select</option>
                        <option value="1">Washington</option>
	                </select>
	            </div>
            </div>



            
            <div class = "row form-group">
            	<div class = "col-lg-4  col-md-4">
        			<label for = "last_name" class = "labels">Last Name</label>
        		</div>
        		<div class = "col-lg-8 col-md-8">
                	<input type = "text" class = "form-control"  name="last_name" id=""  >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4  col-md-4">
        			<label for = "first_name" class = "labels">First Name</label>
        		</div>
        		<div class = "col-lg-8 col-md-8">
                	<input type = "text" class = "form-control"  name="first_name" id="" >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4  col-md-4">
        			<label for = "email" class = "labels">Email</label>
        		</div>
        		<div class = "col-lg-8 col-md-8">
                	<input type = "email" class = "form-control"  name="email" id="" >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4  col-md-4">
        			<label for = "contact_no" class = "labels">Contact Number</label>
        		</div>
        		<div class = "col-lg-8 col-md-8">
                	<input type = "tel" class = "form-control"  name="contact_no" id=""  >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4  col-md-4">
        			<label for = "bdate" class = "labels">Birthdate</label>
        		</div>
        		<div class = "col-lg-8 col-md-8">
                	<input type = "date" class = "form-control"  name="birthdate" id="" >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4  col-md-4 ">
        			<label for = "gender" class = "labels">Gender</label>
        		</div>
        		<div class = "col-lg-8 col-md-8">
	                <select class = "form-control" name="gender" id="">
	                    <option value="" disabled selected>Select</option>
	                    <option value="m">test</option>
	                    <option value=""></option>
	                    <option value=""></option>
	                </select>
	            </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4  col-md-4  ">
        			<label for = "current_city" class = "labels">Current City</label>
        		</div>
        		<div class = "col-lg-8 col-md-8">
	                <select class = "form-control" name="current_city" id="" >
	                    <option value="" disabled selected>Select</option>
	                    <option value="test">test</option>
	                    <option value=""></option>
	                    <option value=""></option>
	                </select>
	            </div>
            </div>
        </div>
        <div class = "col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
            <div class = "row form-group">
        		<div class = "col-lg-5 col-md-5">
        			<label for = "university_id" class = "labels">University/School</label>
        		</div>
        		<div class = "col-lg-7 col-md-7">
	                <input type = "text" class = "form-control" name="university_id" id="school">
            	</div>
            </div>
            <div class = "row form-group">
        		<div class = "col-lg-5 col-md-5">
        			<label for = "degree_id" class = "labels">Degree</label>
        		</div>
        		<div class = "col-lg-7 col-md-7">
	                <select class = "form-control" name="degree_id" id="degree" >
	                    <option value="" disabled selected>Select</option>
	                   @foreach($degree_table as $degree)
                           <option value ="{{$degree->id}}" >{{$degree->degree_name}}</option>
                        @endforeach
	                </select>
            	</div>
            </div>
            <div class = "row form-group">
        		<div class = "col-lg-5 col-md-5">
        			<label for = "major_id" class = "labels">Major</label>
        		</div>
        		<div class = "col-lg-7 col-md-7">
	                <select class = "form-control" name="major_id" id="major" >
	                    <option value="" disabled selected>Select</option>
	                    <option value="7">Business</option>
	                    <option value=""></option>
	                    <option value=""></option>
	                </select>
            	</div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-5 col-md-5">
        			<label for = "grad_date" class = "labels">Graduation Date</label>
        		</div>
        		<div class = "col-lg-7 col-md-7">
                	<input type = "date" class = "form-control"  name="grad_date" id="grad" >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-5 col-md-5">
        			<label for = "start_date" class = "labels">Preferred Start Date</label>
        		</div>
        		<div class = "col-lg-7 col-md-7">
                	<input type = "date" class = "form-control"  name="start_date" id="start" >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-5 col-md-5">
        			<label for = "resume" class = "labels">Upload Resume</label>
        		</div>
        		<div class = "col-lg-7 col-md-7 col-xs-7 col-sm-7">
                	<input type = "file" class = "form-control"  name="upload_resume" id="resume"  >
                </div>
            </div>
            <div class = "row form-group">
        		<div class = "col-lg-5 col-md-5">
        			<label for = "learn" class = "labels">How did you learned about V.I.P.?</label>
        		</div>
        		<div class = "col-lg-7 col-md-7 col-xs-7 col-sm-7">
	                <select class = "form-control" name="about_vip" id="learn" >
	                    <option value="" disabled selected>Select</option>
	                    <option value="dada">test</option>
	                    <option value=""></option>
	                    <option value=""></option>
	                </select>
            	</div>
            </div>
            <div class = "row form-group">
                <textarea name="message" class = "form-control textarea-input" placeholder="Message" rows="5" cols="50" name="message" id=""></textarea>
            </div>
        </div>
        <div class = "col-lg-3 col-lg-offset-9 col-md-3 col-md-offset-9 col-sm-3 col-sm-offset-9 col-xs-3 col-xs-offset-4 button-submit text-center">
            <button class = "submit btn"><span>Submit Form</span></button>
        </div>
    </div>  
</div>
</form>
<div class = "filler row">
</div>
</form>
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
            option3.text = "SELECT";
            f.add(option3);
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
            option3.text = "SELECT";
            f.add(option3);
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
            option3.text = "SELECT";
            f.add(option3);
            var option = document.createElement("option");
            option.text = "United States";
            f.add(option);
            var option2 = document.createElement("option");
            option2.text = "Not Applicable";
            g.add(option2);
        }                  
    }
</script>


@stop
