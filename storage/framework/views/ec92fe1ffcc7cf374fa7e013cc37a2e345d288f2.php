<?php $__env->startSection('content-header'); ?>
    <section class="content-header">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">
                    <?php echo e(ucwords(request()->route()->getActionMethod())); ?> Opportunity
                </h1>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-main'); ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <form action="<?php echo e($action); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <div class="form-group">
                        <label
                            for="position">
                            Position
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="position"
                            name="position"
                            required
                            value="<?php echo e(isset($opportunity) ? $opportunity->position : ''); ?> "
                            placeholder="Web Developer">
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label
                                        for="company">
                                    Company
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="company"
                                    name="company"
                                    required
                                    value="<?php echo e(isset($opportunity) ? $opportunity->company : ''); ?> "
                                    placeholder="XYZ Company">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label
                                    for="company_website">
                                    Company Website
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="company_website"
                                    name="company_website"
                                    required
                                    value="<?php echo e(isset($opportunity) ? $opportunity->company_website : ''); ?> "
                                    placeholder="http://xyzcompany.com">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="Classification">
                                    Classification
                                </label>

                                <select
                                    name="classification"
                                    class="form-control"
                                    required
                                    id="classification">
                                    <option value="">Select classification</option>

                                    <?php $__currentLoopData = $classifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                                <?php echo e((isset($opportunity) && ($opportunity->programs_id === $classification->id))
                                                    ? 'selected'  : ''); ?>

                                                value="<?php echo e($classification->id); ?>">
                                            <?php echo e($classification->title); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label
                                        for="company_email">
                                    Email
                                </label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="company_email"
                                    name="company_email"
                                    value="<?php echo e(isset($opportunity) ? $opportunity->company_email : ''); ?>"
                                    required
                                    placeholder="sampleemail@xyzcompany.com">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label
                                        for="location">
                                    Location
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="location"
                                    name="location"
                                    value="<?php echo e(isset($opportunity) ? $opportunity->location : ''); ?>"
                                    required
                                    placeholder="Makati City">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="interview_date">
                                    Interview Date:
                                </label>

                                <input
                                    type="date"
                                    name="interview_date"
                                    id="interview_date"
                                    required
                                    value="<?php echo e(isset($opportunity) ? $opportunity->interview_date : ''); ?>"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="form-group">
                                <label
                                    for="start_end">
                                    Start-End
                                </label>
                                <input
                                        type="text"
                                        class="form-control"
                                        id="start_end"
                                        required
                                        value="<?php echo e(isset($opportunity) ? $opportunity->start_end : ''); ?>"
                                        name="start_end">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="duration">
                                    Duration/Span in Days
                                </label>
                                <input
                                        type="text"
                                        id="duration"
                                        name="duration"
                                        readonly
                                        value="<?php echo e(isset($opportunity) ? $opportunity->duration : ''); ?>"
                                        class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="stipend">
                                    Stipend
                                </label>

                                <input
                                    type="number"
                                    name="stipend"
                                    id="stipend"
                                    value="<?php echo e(isset($opportunity) ? $opportunity->stipend : ''); ?>"
                                    required
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="stipend_currency">
                                    Currency
                                </label>

                                <input
                                    type="text"
                                    name="stipend_currency"
                                    id="stipend_currency"
                                    required
                                    value="<?php echo e(isset($opportunity) ? $opportunity->stipend_currency : ''); ?>"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="housing_information">
                                    Housing Information
                                </label>

                                <input
                                    type="text"
                                    name="housing_information"
                                    id="housing_information"
                                    value="<?php echo e(isset($opportunity) ? $opportunity->housing_information : ''); ?>"
                                    required
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="local_transport">
                                    Local Transport
                                </label>
                                <input
                                    type="text"
                                    name="local_transport"
                                    id="local_transport"
                                    value="<?php echo e(isset($opportunity) ? $opportunity->local_transport : ''); ?>"
                                    required
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="post">
                                Description
                            </label>
                            <textarea
                                name="description"
                                id="description"
                                rows="20"
                                required
                                class="summernote"> <?php echo e(isset($opportunity) ? $opportunity->description : ''); ?>

                            </textarea>
                        </div>
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

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 250
            });


            $('input[name="start_end"]').daterangepicker({
                locale: {
                    format: 'MM/DD/YYYY'
                }
            });

            $('#start_end').change(function() {
                var start_end = $('#start_end').val();
                start_end = start_end.split('-');

                var start = start_end[0];
                var end = start_end[1];

                start = new Date(start);
                end = new Date(end);

                var timeDiff = Math.abs(start.getTime() - end.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

                $('#duration').val(diffDays);

            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>