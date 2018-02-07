
<link rel="stylesheet" href="<?php echo e(asset('css/internship-company.css')); ?>">

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
            <div class = "row stip-hous">
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

<div class = "filler row">
</div>
</form>