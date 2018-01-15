<?php $__env->startSection('content-header'); ?>
    <section class="content-header">
        <h1 class="page-header">
            News
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
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single_news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($single_news->title); ?></td>
                                <td>
                                    <a
                                        href="<?php echo e(route('news.view', $single_news->id)); ?>"
                                        class="btn btn-info">
                                        View
                                    </a>
                                    <a
                                        href="<?php echo e(route('news.edit', $single_news->id)); ?>"
                                        class="btn btn-warning">
                                        Edit
                                    </a>
                                    <a
                                        href="<?php echo e(route('news.delete', $single_news->id)); ?>"
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
                <?php echo e($paginator->links()); ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>