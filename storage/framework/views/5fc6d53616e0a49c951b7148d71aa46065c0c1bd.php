<div class="alert alert-<?php echo e($flash['type']); ?> alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <?php echo e($flash['message']); ?>

</div>