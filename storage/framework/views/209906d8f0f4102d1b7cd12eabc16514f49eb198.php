<?php
$curl = curl_init();
$rss_url = "https://graph.facebook.com/v2.9/visionsrx/posts?fields=full_picture,message&access_token=EAAbDDDPZCZCFABACmIOHj1Hk81WZCpeleMY0gEkHgVgDF8C2vKMbf9ZBt2KNdhU9fZACWD9bBlt8Ny3Xa4dcmZAhRGZAiNxDjRmMTgsp2gqNH5BqXVT4NoNTb9kHOUOmOM9hmIfKcDJ42ddxm9DuLb7fZCHfUCYFef3vDG8iHfqsMQZDZD";
curl_setopt($curl, CURLOPT_URL, $rss_url);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0)');
curl_setopt($curl, CURLOPT_REFERER, '');
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_TIMEOUT, 10);
$result = curl_exec($curl); // execute the curl command
curl_close($curl);
$data = json_decode($result, true);

foreach($data['data'] as $action) {
    
    if (isset($action['full_picture']))
    {
      $full_picture = $action['full_picture'];
      $message = $action['message'];
    }
    else{
        $message = $action['message'];
    }     
  }
?>



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
          <img src="<?php echo e($picture['full_picture']); ?>" alt="" class = "event-img img">
          <p class = "text-center"><?php echo e($picture['message']); ?></p>
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