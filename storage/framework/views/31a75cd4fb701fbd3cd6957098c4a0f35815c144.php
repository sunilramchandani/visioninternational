<?php $__env->startSection('page-css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/events.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

<form action="" method="post" role="form">
 <?php echo e(csrf_field()); ?>

<img src="<?php echo e(URL::asset('image/photos/Internship.jpg')); ?>" class="img img-responsive header" alt="Company Banner">
<img src="<?php echo e(URL::asset('image/Arrow.png')); ?>" class="img img-responsive img-border" alt="Company Banner">
<div class = "col-lg-3 col-lg-offset-9 sticky">
  <div class = "col-lg-6">
    <p> Start an <strong> amazing </strong> </p>
    <p> future with us </p>
  </div>
  <div class = "col-lg-6 button-apply-sticky">
    <a href = "" class = "btn applynow-sticky">Apply Now</a>
  </div>
</div>
<div class = "col-lg-12 events">
  <div class ="row col-lg-12">
    <div class = "col-lg-9 events-header">
      <h2>Events</h2>
    </div>
    <div class="col-lg-3 search-row">
      <input class="form-control search" type="text" name="searchroleName" id='search-text-input' placeholder="Search"/>
      <div id='button-holder'>
        <i class="fa fa-search" aria-hidden="true"></i>
      </div>
    </div>
  </div>
  <div class = "row">
    <div class = "col-lg-9 events-content-container">
      <?php $__currentLoopData = $data['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $picture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class = "col-lg-3 events-content">
          <img src="<?php echo e($picture['cover']['source']); ?>" alt="" class = "event-img img">
          <p class = "text-center"><?php echo e($picture['description']); ?></p>
          <button class = "submit btn"><span>More Info</span></button>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class = "col-lg-3 categories-sidebar">
      <table class="table table-categories table-hover">
        <thead bgcolor="#800000">
          <tr>
            <th colspan="2" class = "header-table">CATEGORIES</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Creative</td>
            <td>(02)</td>
          </tr>
          <tr>
            <td>Design</td>
            <td>(01)</td>
          </tr>
          <tr>
            <td>Events</td>
            <td>(10)</td>
          </tr>
          <tr>
            <td>Food</td>
            <td>(03)</td>
          </tr>
          <tr>
            <td>Job Fair</td>
            <td>(04)</td>
          </tr>
        </tbody>
      </table>    
    </div>
  </div>
</div> 
<div class = "row filler"></div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>