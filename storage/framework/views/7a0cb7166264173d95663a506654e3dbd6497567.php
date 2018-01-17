<?php $__env->startSection('page-css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/application-form.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>
<form action="" method="post" role="form">
 <?php echo e(csrf_field()); ?>

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
        <div class = "col-lg-4 col-lg-offset-1">
        	<div class = "row form-group">
                <select class = "form-control" name="program" id="">
                    <option value="" disabled selected>Select</option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
            <div class = "row form-group">
                <select class = "form-control" name="country" id="">
                    <option value="" disabled selected>Select</option>
                    <option value="PS">Palestinian Territory, Occupied</option>
                    <option value="PA">Panama</option>
                    <option value="PG">Papua New Guinea</option>
                    <option value="PY">Paraguay</option>
                    <option value="PE">Peru</option>
                    <option value="PH">Philippines</option>
                    <option value="PN">Pitcairn</option>
                    <option value="PL">Poland</option>
                    <option value="PT">Portugal</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="QA">Qatar</option>
                </select>
            </div>
            <div class = "row form-group">
                <select class = "form-control" name="location" id="">
                    <option value="" disabled selected>Select</option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
            <div class = "row form-group">
                <input type = "text" class = "form-control"  name="last_name" id="">
            </div>
            <div class = "row form-group">
                <input type = "text" class = "form-control"  name="first_name" id="">
            </div>
            <div class = "row form-group">
                <input type = "email" class = "form-control"  name="email" id="">
            </div>
            <div class = "row form-group">
                <input type = "tel" class = "form-control"  name="contact_no" id="" >
            </div>
            <div class = "row form-group">
                <input type = "date" class = "form-control"  name="bdate" id="" >
            </div>
            <div class = "row form-group">
                <select class = "form-control" name="gender" id="">
                    <option value="" disabled selected>Select</option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
            <div class = "row form-group">
                <select class = "form-control" name="current_city" id="">
                    <option value="" disabled selected>Select</option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class = "col-lg-5 col-lg-offset-1">
            <div class = "row form-group">
                <select class = "form-control" name="general_inquiries">
                    <option value="" disabled selected>General Inquiries</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class = "row form-group">
                <textarea name="message" class = "form-control textarea-input" placeholder="Message" rows="8" cols="50" name="message" id=""></textarea>
            </div>
        </div>
        <div class = "col-lg-3 col-lg-offset-9 text-center">
            <button class = "submit btn"><span>Send Message</span></button>
        </div>
    </div>  
</div>
<div class = "filler row">
</div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>