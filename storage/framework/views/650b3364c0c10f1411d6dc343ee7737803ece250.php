<?php $__env->startSection('page-css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/internship-company.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<form action="" method="post" role="form">
 <?php echo e(csrf_field()); ?>

<div class = "col-lg-12 whole-page">
<?php $__currentLoopData = $featuredimage_internship; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
    <div class = " row Top-header-message">
        <div class = "col-lg-12 text-center">
            <h1>Your Destination</h1>
            <br/>
            <p> Our Internship Programs prepare students for life and work outside of school.Participants  </p>
            <p> get to work in world-class facilities in the US and in other locations accross the globe</p>
        </div>
    </div>
    <div class = "body-content">
        <div class = "row filter-top">
            <div class = "col-lg-9 col-lg-offset-1 filter-main">
                <div class="dropdown">
                  <a class="dropbtn-filter">State</a>
                  <div class="dropdown-content-filler">

                    <?php $__currentLoopData = $internshipCompany_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/internshipcompany?state=<?php echo e($company->state); ?>"><?php echo e($company->state); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </div>
                </div>
                <div class="dropdown">
                  <a class="dropbtn-filter">Industry</a>
                  <div class="dropdown-content-filler">
                    <?php $__currentLoopData = $internshipCompany_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $company->internship_industry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#"><?php echo e($industry->industry_name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
                <div class="dropdown">
                  <a class="dropbtn-filter">Start Dates</a>
                  <div class="dropdown-content-filler">
                    <?php $__currentLoopData = $internshipCompany_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php $__currentLoopData = $company->internship_duration; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $duration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#"><?php echo e($duration->duration_start_date); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
            </div>
            <div class = "col-lg-2 filter-result">
                <?php $__currentLoopData = $internshipCompany_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p>Total Results: <strong> <?php echo e($loop->count); ?> </strong></p> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class = "col-lg-12 company-whole">
            <div class = "col-lg-4 picture">
                <img src="<?php echo e(URL::asset('image/photos/Internship.jpg')); ?>" class="img img-responsive img-rounded img-map" alt="Company Banner" height ="100">
            </div>
            <div class = "col-lg-8 company-details">
                <?php $__currentLoopData = $internshipCompany_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class ="col-lg-12">
                        <h1><strong><?php echo e($company->company_name); ?></strong></h1>
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
                    <div class = "col-lg-12 opportunities">
                        <hr>
                        <p><strong>Opportunities</strong></p>
                         <?php $__currentLoopData = $company->opportunity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opportunities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class = "col-lg-6">
                                <?php if($opportunities->status == "Inactive" ): ?>
                                <p><i class="fa fa-circle" aria-hidden="true" style="color:#cccccc"></i> <?php echo e($opportunities->opportunity_name); ?></p>
                                <?php else: ?>
                                <p><i class="fa fa-circle" aria-hidden="true" style="color:#80bf40"></i> <?php echo e($opportunities->opportunity_name); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class = "col-lg-12 qualifications">
                        <p><strong>Do I Qualify?</strong></p>
                             <?php $__currentLoopData = $company->qualifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualifications): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($qualifications->status == "Inactive" ): ?>
                                    <div class = "col-lg-6">
                                        <p><strike><?php echo e($qualifications->qualification); ?></strike></p>
                                    </div>
                                    <?php else: ?>
                                    <div class = "col-lg-6">
                                        <p><?php echo e($qualifications->qualification); ?></p>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<div class = "filler row">
</div>
</form>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>