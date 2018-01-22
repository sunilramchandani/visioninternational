<?php $__env->startSection('page-css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/internship-home.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<form action="" method="post" role="form">
 <?php echo e(csrf_field()); ?>

<div class = "col-lg-12">
    <img src="<?php echo e(URL::asset('image/photos/Internship.jpg')); ?>" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="<?php echo e(URL::asset('image/Arrow.png')); ?>" class="img img-responsive img-border" alt="Company Banner">
    <div class = "Top-header-message">
        <div class = "col-lg-12 text-center">
            <h1>Your Destination</h1>
            <br/>
            <p> Our Internship Programs prepare students for life and work outside of school.Participants  </p>
            <p> get to work in world-class facilities in the US and in other locations accross the globe</p>
        </div>
    </div>
    <div class = "body-content">
        <div class = "col-lg-12">
            <div class = "col-lg-4 picture">
                <img src="<?php echo e(URL::asset('image/photos/Internship.jpg')); ?>" class="img img-responsive img-rounded header" alt="Company Banner">
            </div>
            <div class = "col-lg-8 company-details">
                <?php $__currentLoopData = $internshipCompany_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class ="col-lg-12">
                        <p><strong><?php echo e($company->company_name); ?></strong></p>
                        <p><?php echo e($company->description); ?></p>
                    </div>
                    <div class = "col-lg-6">
                        <p><strong>Housing</strong></p>
                        <p> Type: <?php echo e($company->housing_type); ?></p>
                        <p> Distance: <?php echo e($company->housing_distance); ?></p>
                        <p> Address : <?php echo e($company->housing_address); ?></p>
                    </div>
                    <div class = "col-lg-6">
                        <p><strong>Stipend</strong></p>
                        <p>$<?php echo e($company->stipend); ?> / Month</p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<div class = "filler row">
</div>
</form>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>