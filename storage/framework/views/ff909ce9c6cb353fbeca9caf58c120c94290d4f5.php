<?php $__env->startSection('content'); ?>
    <div class="container shadow p-3 mb-5">
        <h4 class="mb-3"> <?php echo e($item->title); ?></h4>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <img src="<?php echo e($item->news->getImage()); ?>" class="w-100" alt="<?php echo e($item->title); ?>">
            </div>
            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <p>
                    <?php echo $item->text; ?>

                </p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/front/pages/show.blade.php ENDPATH**/ ?>