<?php $__env->startSection('page-css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/contact-us.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('contactus.store')); ?>" method="post" role="form">
        <?php echo e(csrf_field()); ?>

        <div class = "col-lg-12 content">
        <?php $__currentLoopData = $featuredimage_contactus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <img src="<?php echo e(URL::asset('image/uploaded_featured_image')); ?>/<?php echo e($featured->main_image); ?>" class="img img-responsive img-rounded header" alt="Company Banner">
        <img src="<?php echo e(URL::asset('image/Arrow.png')); ?>" class="img img-responsive img-border" alt="Company Banner">
        <div class = "text-inside-header-picture">
            <div class = "row dynamic-text-container">
                <div class ="col-lg-6 dynamic-text-container-box">
                    <h4> <?php echo e($featured->main_image_description); ?></h4>
                </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
            <div class = "Say Hello row">
                <div class = "col-lg-12 text-center">
                    <h1>Say Hello!</h1>
                </div>
                <div class = "col-lg-4 col-lg-offset-1">
                    <div class = "row form-group">
                        <input type = "text" class = "form-control"  name="name" id="" placeholder="Full Name">
                    </div>
                    <div class = "row form-group">
                        <input type = "email" class = "form-control"  name="email" id="" placeholder="E-mail Address">
                    </div>
                    <div class = "row form-group">
                        <input type = "tel" class = "form-control"  name="contact_no" id="" placeholder="Contact Number">
                    </div>
                    <div class = "row form-group">
                        <select class = "form-control" name="country" id="">
                            <option value="" disabled selected>Countries</option>
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


        <div class = "Our Offices row">
            <div class = "col-lg-12 text-center">
                <h1>Our Offices</h1>
            </div>
            <div class = "col-lg-2 col-lg-offset-1">
                <label class = "country"> Philippines </label>
                <ul>
                    <li><a href = "">Manila</a></li>
                    <li><a href = "">Makati</a></li>
                    <li><a href = "">Quezon City</a></li>
                </ul>
            </div>
            <div class = "col-lg-4">
                <label class = "country"> United States of America </label>
                <ul>
                    <div class = "col-lg-6">
                        <li><a href = "">Alaska</a></li>
                        <li><a href = "">California</a></li>
                        <li><a href = "">Florida</a></li>
                    </div>
                    <div class = "col-lg-6">
                        <li><a href = "">Hawaii</a></li>
                        <li><a href = "">Massachusettes</a></li>
                        <li><a href = "">Texas</a></li>
                    </div>  
                </ul>
            </div>
            <div class = "col-lg-4">
                <label class = "country"> Canada </label>
                <ul>
                    <div class = "col-lg-6">
                        <li><a href = "">Alberta</a></li>
                        <li><a href = "">British Columbia</a></li>
                        <li><a href = "">Manitoba</a></li>
                    </div>
                    <div class = "col-lg-6">
                        <li><a href = "">New Brunswick</a></li>
                        <li><a href = "">New Foundland and Labrador</a></li>
                    </div>  
                </ul>
            </div>
        </div>

        <br/>
        <div class = "country-city-offices row">
            <div class = "col-lg-5 col-lg-offset-1">
                <div class = "row top-header">
                    <div class = "col-lg-2">
                        <h1 class = "city-header inline-header">City</h1>
                    </div>
                    <div class = "col-lg-1">
                        <h4 class = "country-header inline-header">Country</h4>
                    </div>
                </div>
                <div class = "office-details row">
                    <div class = "col-lg-12">
                        <h4 id = "telephone" name = "telephone"><i class="fa fa-phone" aria-hidden="true"></i> Telephone Here</h4>
                    </div>
                    <div class = "col-lg-12">
                        <h4 id = "mobilephone" name="mobilephone"><i class="fa fa-mobile" aria-hidden="true"></i> Mobilephone Here</h4>
                    </div>
                     <div class = "col-lg-12">
                        <h4 id = "address" name="address"> <i class="fa fa-map-pin" aria-hidden="true"></i> Office Address</h4> 
                    </div>
                     <div class = "col-lg-12">
                        <h4 id = "hours" name="hours"> <i class="fa fa-clock-o" aria-hidden="true"></i> Office Hours </h4>
                    </div>
                    <div class = "col-lg-12">
                        <h4 id = "hours" name="hours"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Office Email Address </h4>
                    </div>
                </div>
            </div>
            <div class = "col-lg-5 col-lg-offset-1">
                <div class = "map">
                    <img src="<?php echo e(URL::asset('image/map-placeholder.png')); ?>" class="img img-responsive" alt="Location Map">
                </div>
            </div>
        </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>