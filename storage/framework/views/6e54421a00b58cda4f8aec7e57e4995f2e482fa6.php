<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css" />
    <title>Vision International</title>
    <link rel="stylesheet" href="<?php echo e(asset('/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/master.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php echo $__env->yieldContent('page-css'); ?>
</head>
<body>
    <div class="container-fluid content">
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
       
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
</html>