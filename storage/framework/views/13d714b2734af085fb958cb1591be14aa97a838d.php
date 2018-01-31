<?php $__env->startSection('page-css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class = "col-lg-12 whole-page">
<?php $__currentLoopData = $featuredimage_home; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <img src="<?php echo e(URL::asset('image/uploaded_featured_image')); ?>/<?php echo e($featured->main_image); ?>" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="<?php echo e(URL::asset('image/Arrow.png')); ?>" class="img img-responsive img-border" alt="Company Banner">
    <div class = "text-inside-header-picture">
        <div class = "row dynamic-text-container">
            <div class ="col-lg-6 dynamic-text">
            
                <h4> <?php echo e($featured->main_image_description); ?></h4>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class = "row counters">
            <div class ="col-lg-6">
                <div class = "col-lg-2 counter-container">
                    <h1 class = "counter text-center">2</h1>
                </div>
                <div class = "col-lg-2 counter-container">
                     <h1 class = "counter text-center">40</h1>
                </div>
                <div class = "col-lg-2 counter-container">
                    <h1 class = "counter text-center">300</h1>
                </div>
                <div class = "col-lg-2 counter-container">
                     <h1 class = "counter text-center">560</h1>
                </div>
                <div class = "col-lg-2 counter-container-infinity">
                    <img src="<?php echo e(URL::asset('image/icons/InfinitySign.png')); ?>" class="img img-responsive img-rounded" alt="Company Banner">
                </div>
            </div>
        </div>
        <div class = "row counter-label">
            <div class ="col-lg-6">
                <div class = "col-lg-2 counter-label-container">
                    <h4 class = "labels">Countries</h4>
                </div>
                <div class = "col-lg-2 counter-label-container">
                     <h4 class = "labels">States</h4>
                </div>
                <div class = "col-lg-2 counter-label-container">
                    <h4 class = "labels">Companies</h4>
                </div> 
                <div class = "col-lg-2 counter-label-container">
                     <h4 class = "labels">Applicants</h4>
                </div>
                <div class = "col-lg-2 counter-container-infinity-label">
                    <h4 class = "labels">Opportunities</h4>
                </div>
            </div>
        </div>
        <div class = "row link-button">
            <div class = "col-lg-3">
                <a href = "www.fb.com" class = "btn fblink">#onevision #vip</a>
            </div>
        </div>
    </div>
    <!------------------------- CONTENT ---------------------->
      <div class="container">
        <div class="about row">
            <div class="col-lg-12 text-center about-font">
                <h1>We believe that...</h1>
                <p>Every Filipino deserves an opportunity to
                    <br>showcase his or her talent to the world.
                </p>
            </div>
        </div>
    </div>

    <!--Picture -->
    <div class="container-fluid">
     <div class="row">
        <div class="col-lg-12 home-pic-container">
          <div class="col-lg-6">
            <div class="home-pic">
                <img src="<?php echo e(URL::asset('image/home-left.png')); ?>" class="img-rounded img-responsive" alt="Photo" >
            </div>
         </div>
        <div class="col-lg-6">
            <div class="home-pic">
                <img src="<?php echo e(URL::asset('image/home-right.png')); ?>" class="img-rounded img-responsive" alt="Photo" >
            </div>
        </div>
        </div>
    </div>
</div>
    <div class="container">
    <div class="about row">
        <div class="col-lg-12 text-center about-font">
            <h1>Our Commitments</h1>
        </div>
    </div>
</div>

<!--Commitments -->
<div class="text-center">
    <div class="row" id=p-commit>
        <div class="col-lg-12">
            <div class="icon-container">
                <img src="<?php echo e(URL::asset('image/icons/1.png')); ?>" alt="Content" id=icon>
                <p>Unlimited
                    <br> opportunities
                </p>
            </div>
            <div class="icon-container">
                <img src="<?php echo e(URL::asset('image/icons/2.png')); ?>" alt="Content" id=icon>
                <p>Guaranteed
                    <br> placement and visa
                </p>
            </div>
            <div class="icon-container">
                <img src="<?php echo e(URL::asset('image/icons/1.png')); ?>" alt="Content" id=icon>
                <p>Fast
                    <br> procesing
                </p>
            </div>
            <div class="icon-container">
                <img src="<?php echo e(URL::asset('image/icons/4.png')); ?>" alt="Content" id=icon>
                <p>Lowest priced
                    <br> programs
                </p>
            </div>
            <div class="icon-container">
                <img src="<?php echo e(URL::asset('image/icons/1.png')); ?>" alt="Content" id=icon>
                <p>Highest level
                    <br> of service
                </p>
            </div>
        </div>
    </div>
</div>

<!-- End Commitments -->

<!-- More info button -->
<div class="container text-center">
    <div class="row">
        <a href="#" class="btn btn-lg moreinfo-btn">More info</a>
    </div>
</div>
<!-- end -->


<!--Start of Events -->
<div class="container text-center">
    <div class="row">
        <h1>Events</h1>
    </div>
</div>


<!--End of Events -->

<!-- Start of Promos -->
<div class="container text-center">
    <div class="row">
        <div class="about-font">
           <h1>Promos</h1>
           <p>Get one step closer to your dreams
            <br>Take advantage of this amazing deal on our programs!
        </p>
    </div>
</div>
</div>


<!-- Promo picture -->
<div class="container text-center">
    <div class="col-lg-12">
        <img src="<?php echo e(URL::asset('image/photos/APPLICATION.jpg')); ?>" alt="Promo Picture" class="img-responsive img-rounded" id=promo-pict>
    </div>
</div>
<!-- End of Promos -->

<div class="container">
    <div class="row">
        <div class="about-font text-center">
             <h1>Our Community</h1>
             <p>We are proud to have an amazing community of students and professionals
                <br>who have received the VIP treatment. Listen to their stories.
            </p>
        </div>
    </div>
</div>
<div class = "row">
</div>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>