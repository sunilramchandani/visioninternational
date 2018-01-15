<?php $__env->startSection('content-header'); ?>
    <section class="content-header">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">Testimonials</h1>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-main'); ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php if(session('flash')): ?>
                    <?php echo $__env->make('partials.notif', ['flash' => session('flash')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Organization</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e(sprintf('%s %s', $testimonial->first_name, $testimonial->last_name)); ?>

                            </td>
                            <td>
                                <?php echo e($testimonial->organization); ?>

                            </td>
                            <td>
                                <a
                                        href="<?php echo e(route('testimonials.view', $testimonial->id)); ?>"
                                        class="btn btn-info">
                                    View
                                </a>
                                <a
                                        href="<?php echo e(route('testimonials.edit', $testimonial->id)); ?>"
                                        class="btn btn-warning">
                                    Edit
                                </a>
                                <a
                                        href="<?php echo e(route('testimonials.delete', $testimonial->id)); ?>"
                                        class="btn btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="col-xs-12 text-center">
                <?php echo e($pagination->links()); ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>