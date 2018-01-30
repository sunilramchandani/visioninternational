<?php $__env->startSection('page-css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/application-form.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>
<div class = "col-lg-12">
    <img src="<?php echo e(URL::asset('image/photos/Internship.jpg')); ?>" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="<?php echo e(URL::asset('image/Arrow.png')); ?>" class="img img-responsive img-border" alt="Company Banner">
    <div class = "Say Hello row">
        <div class = "col-lg-12 text-center">
            <h1>Your Assesment Form</h1>
            <br/>
            <p> Fill in the assesment form below and a VIP representative will reach out to you</p>
            <p> ASAP about the program you are interested in. We recommend you check carefully all</p>
            <p> the information you provide in order to have a smoother application process. Thank you!</p>
        </div>

		<form action="<?php echo e(route('application.store')); ?>" method="post" role="form"  enctype="multipart/form-data"> 
		<?php echo e(csrf_field()); ?>

        <div class = "col-lg-4 col-lg-offset-1">
        	<div class = "row form-group">
        		<div class = "col-lg-4">
        			<label for = "program" class = "labels">Program</label>
        		</div>
        		<div class = "col-lg-8">
	                <select class = "form-control" name="program_id" id="">
	                    <option value="" disabled selected>Select</option>
						<option value="1">test</option>
						<?php $__currentLoopData = $program_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($program->program_id); ?>"><?php echo e($program->title); ?></option>
					  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  
	                </select>
            	</div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4">
        			<label for = "country" class = "labels">Country</label>
        		</div>
        		<div class = "col-lg-8">
	                <select class = "form-control" name="country_id" id="">
	                    <option value="" disabled selected>Select</option>
	                    <?php $__currentLoopData = $country_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($country->country_id); ?>"><?php echo e($country->country_name); ?></option>
					  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                </select>
	           </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4">
        			<label for = "location" class = "labels">Location</label>
        		</div>
        		<div class = "col-lg-8">
	                <select class = "form-control" name="location_id" id="">
	                    <option value="" disabled selected>Select</option>
	                    <option value="1">test</option>
	                    <option value=""></option>
	                    <option value=""></option>
	                </select>
	            </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4">
        			<label for = "last_name" class = "labels">Last Name</label>
        		</div>
        		<div class = "col-lg-8">
                	<input type = "text" class = "form-control"  name="last_name" id="">
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4">
        			<label for = "first_name" class = "labels">First Name</label>
        		</div>
        		<div class = "col-lg-8">
                	<input type = "text" class = "form-control"  name="first_name" id="">
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4">
        			<label for = "email" class = "labels">Email</label>
        		</div>
        		<div class = "col-lg-8">
                	<input type = "email" class = "form-control"  name="email" id="">
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4">
        			<label for = "contact_no" class = "labels">Contact Number</label>
        		</div>
        		<div class = "col-lg-8">
                	<input type = "tel" class = "form-control"  name="contact_no" id="" >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4">
        			<label for = "bdate" class = "labels">Birthdate</label>
        		</div>
        		<div class = "col-lg-8">
                	<input type = "date" class = "form-control"  name="birthdate" id="" >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4">
        			<label for = "gender" class = "labels">Gender</label>
        		</div>
        		<div class = "col-lg-8">
	                <select class = "form-control" name="gender" id="">
	                    <option value="" disabled selected>Select</option>
	                    <option value="m">test</option>
	                    <option value=""></option>
	                    <option value=""></option>
	                </select>
	            </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-4">
        			<label for = "current_city" class = "labels">Current City</label>
        		</div>
        		<div class = "col-lg-8">
	                <select class = "form-control" name="current_city" id="">
	                    <option value="" disabled selected>Select</option>
	                    <option value="test">test</option>
	                    <option value=""></option>
	                    <option value=""></option>
	                </select>
	            </div>
            </div>
        </div>
        <div class = "col-lg-4 col-lg-offset-1">
            <div class = "row form-group">
        		<div class = "col-lg-5">
        			<label for = "school" class = "labels">University/School</label>
        		</div>
        		<div class = "col-lg-7">
	                <select class = "form-control" name="university_id" id="school">
	                    <option value="" disabled selected>Select</option>
	                    <option value="5">test</option>
	                    <option value=""></option>
	                    <option value=""></option>
	                </select>
            	</div>
            </div>
            <div class = "row form-group">
        		<div class = "col-lg-5">
        			<label for = "degree" class = "labels">Degree</label>
        		</div>
        		<div class = "col-lg-7">
	                <select class = "form-control" name="degree_id" id="degree">
	                    <option value="" disabled selected>Select</option>
	                    <option value="6">test</option>
	                    <option value=""></option>
	                    <option value=""></option>
	                </select>
            	</div>
            </div>
            <div class = "row form-group">
        		<div class = "col-lg-5">
        			<label for = "major" class = "labels">Major</label>
        		</div>
        		<div class = "col-lg-7">
	                <select class = "form-control" name="major_id" id="major">
	                    <option value="" disabled selected>Select</option>
	                    <option value="7">test</option>
	                    <option value=""></option>
	                    <option value=""></option>
	                </select>
            	</div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-5">
        			<label for = "grad" class = "labels">Graduation Date</label>
        		</div>
        		<div class = "col-lg-7">
                	<input type = "date" class = "form-control"  name="grad_date" id="grad" >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-5">
        			<label for = "start" class = "labels">Preferred Start Date</label>
        		</div>
        		<div class = "col-lg-7">
                	<input type = "date" class = "form-control"  name="start_date" id="start" >
                </div>
            </div>
            <div class = "row form-group">
            	<div class = "col-lg-5">
        			<label for = "resume" class = "labels">Upload Resume</label>
        		</div>
        		<div class = "col-lg-7">
                	<input type = "file" class = "form-control"  name="upload_resume" id="resume"  >
                </div>
            </div>
            <div class = "row form-group">
        		<div class = "col-lg-5">
        			<label for = "learn" class = "labels">How did you learned about V.I.P.?</label>
        		</div>
        		<div class = "col-lg-7">
	                <select class = "form-control" name="about_vip" id="learn">
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
        <div class = "col-lg-3 col-lg-offset-8 text-center">
            <button class = "submit btn"><span>Submit Form</span></button>
        </div>
    </div>  
</div>
</form>
<div class = "filler row">
</div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>