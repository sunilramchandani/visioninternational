<?php $__env->startSection('content-header'); ?>
    <section class="content-header">
        <h1 class="page-header">
            Opportunities
        </h1>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-main'); ?>
    <section class="content page-news">
        <div class="row">
            <div class="col-xs-12">
                <?php if(session('flash')): ?>
                    <?php echo $__env->make('partials.notif', ['flash' => session('flash')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Position</th>
                        <th>Company</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $__currentLoopData = $opportunities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opportunity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($opportunity->position); ?></td>
                            <td><?php echo e($opportunity->company); ?></td>
                            <td>
                                <a
                                        href="<?php echo e(route('opportunities.view', $opportunity->id)); ?>"
                                        class="btn btn-info">
                                    View
                                </a>
                                <a
                                        href="<?php echo e(route('opportunities.edit', $opportunity->id)); ?>"
                                        class="btn btn-warning">
                                    Edit
                                </a>
                                <a
                                        href="<?php echo e(route('opportunities.delete', $opportunity->id)); ?>"
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