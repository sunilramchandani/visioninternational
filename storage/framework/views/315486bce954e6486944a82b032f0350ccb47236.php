<link rel="stylesheet" href="<?php echo e(asset('css/prefooter.css')); ?>">

<div class = "prefooter">
    <div class = "row bg-color">
        <div class = "top-prefooter-content text-center">
            <p class = "banner-paragraph">Start an amazing future with us! </p> 
            <a class = "btn applynow-button" href = "application"> Apply Now</a>
        </div>
    </div>

    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?> <?php if(Session::has('ok')): ?>
        <div class="alert alert-info">
            <?php echo e(Session::get('ok')); ?>

        </div>
        <?php endif; ?>


    <div class = "row bottom-prefooter-content text-center"> 
        <form action="<?php echo e(route('subscribe.store')); ?>" method="post" role="form">
        <?php echo e(csrf_field()); ?>

        <p class = "subscribe-paragraph">Get the latest updates and news: </p>
        <input type = "email" class = "input-email-subscribe text-center" name = "email" placeholder="Enter your email address">
        <button type="submit" class = "btn subscribe-button"><i class="fa fa-2x fa-angle-right" aria-hidden="true"></i></button>
        </form>
    </div>
</div>