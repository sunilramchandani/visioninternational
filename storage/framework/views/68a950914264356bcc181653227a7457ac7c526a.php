<?php $__env->startSection('content-header'); ?>
    <section class="content-header">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">
                    <?php echo e(ucwords(request()->route()->getActionMethod())); ?> Testimonials
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
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="first_name">
                            First Name
                        </label>
                        <input
                            type="text"
                            name="first_name"
                            id="first_name"
                            placeholder="Michael"
                            value="<?php echo e((isset($testimonial)) ? $testimonial->first_name : ''); ?>"
                            required
                            class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="last_name">
                            Last Name
                        </label>
                        <input
                            type="text"
                            name="last_name"
                            id="last_name"
                            placeholder="Kemp"
                            required
                            value="<?php echo e((isset($testimonial)) ? $testimonial->last_name : ''); ?>"
                            class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="organization">
                    Organization
                </label>

                <input
                    type="text"
                    name="organization"
                    id="organization"
                    placeholder="ABC University"
                    required
                    value="<?php echo e((isset($testimonial)) ? $testimonial->organization : ''); ?>"
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="testimony">
                    Testimony
                </label>

                <textarea
                    name="testimony"
                    id="testimony"
                    class="form-control"
                    required
                    rows="10"><?php echo e((isset($testimonial)) ? $testimonial->testimony : ''); ?>

                </textarea>
            </div>

            <div class="row">
                <div class="col-xs-12 btn-container">
                    <a href="<?php echo e(route('testimonials.list')); ?>" class="btn btn-danger pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
            </div>
        </form>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>