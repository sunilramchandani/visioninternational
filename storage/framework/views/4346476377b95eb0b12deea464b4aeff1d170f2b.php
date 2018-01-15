<?php $__env->startSection('content-header'); ?>
    <section class="content-header">
        <h1>
            <?php echo e(ucwords(request()->route()->getActionMethod())); ?> News
        </h1>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-main'); ?>
    <section class="content page-news">
        <div class="row">
            <div class="col-xs-12">
                <?php if($error == true): ?>
                    <?php echo $__env->make('partials.notif', ['type' => 'danger', 'message' => 'Something went wrong.'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
                <?php endif; ?>
                <form action="<?php echo e($action); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <div class="form-group">
                        <label
                                for="title">
                            Title
                        </label>
                        <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                value="<?php echo e(isset($news) ? $news->title : ''); ?>"
                                placeholder="Some Title">
                    </div>
                    <div class="form-group">
                        <label
                                for="article">
                            Article
                        </label>
                        <textarea
                                class="form-control"
                                id="article"
                                name="article"
                                rows="8"><?php echo e(isset($news) ? trim($news->article) : ''); ?></textarea>
                    </div>

                    <div class="btn-container">
                        <a href="#" class="btn btn-danger pull-right">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>