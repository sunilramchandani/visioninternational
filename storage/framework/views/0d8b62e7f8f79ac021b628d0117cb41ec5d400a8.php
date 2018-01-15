<?php $__env->startSection('content-header'); ?>
    <section class="content-header">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">Programs</h1>
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

                <table class="table table-bordered tabled-striped">
                    <thead>
                        <th>Title</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($program->title); ?></td>
                                <td>
                                    <a
                                        href="<?php echo e(route('programs.edit', $program->id)); ?>"
                                        class="btn btn-info">
                                        Edit
                                    </a>
                                    <a
                                        href="<?php echo e(route('programs.delete', $program->id)); ?>"
                                        class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 text-center">
                <?php echo e($pagination->links()); ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>