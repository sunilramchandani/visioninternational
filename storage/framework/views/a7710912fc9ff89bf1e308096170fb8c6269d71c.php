<?php $__env->startSection('content-header'); ?>
    <section class="content-header">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">
                    <?php echo e(ucwords(request()->route()->getActionMethod())); ?> Program
                </h1>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content-main'); ?>
    <section class="content">
        <form action="<?php echo e($action); ?>" method="POST">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="row">
                <div class="col-xs-12">
                    <?php if($error): ?>
                        <?php echo $__env->make('partials.notif', ['flash' => $error], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="title">
                            Title
                        </label>

                        <input
                                type="text"
                                name="title"
                                id="title"
                                value="<?php echo e((isset($program['title'])) ? $program['title'] : ''); ?>"
                                class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">
                            Description
                        </label>

                        <textarea
                                name="description"
                                id="description"
                                class="form-control"
                                rows="10"><?php echo e((isset($program['description'])) ? $program['description'] : ''); ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 btn-container">
                    <a href="<?php echo e(route('programs.list')); ?>" class="btn btn-danger pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
            </div>
        </form>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>