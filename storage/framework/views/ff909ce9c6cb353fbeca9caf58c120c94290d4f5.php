<?php $__env->startSection('content'); ?>
    <div class="container shadow p-3 mb-5">
        <h4 class="mb-3"> <?php echo e($item->title); ?></h4>
        <p>
            <?php echo $item->content; ?>

        </p>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/front/pages/show.blade.php ENDPATH**/ ?>