<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 co-md-6 col-sm-12 col-xs-12">
                <?php $__currentLoopData = $news->slice(0, 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('front.partials.single_news', ['item' => $new, 'big' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-xl-6 col-lg-6 co-md-6 col-sm-12 col-xs-12">
                <div class="row">
                    <?php $__currentLoopData = $news->slice(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <?php echo $__env->make('front.partials.single_news', ['item' => $new], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $news->slice(5, 100000000000); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <?php echo $__env->make('front.partials.single_news', ['item' => $new], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row">
            <div class="col-12">
                <?php echo e($news->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/home.blade.php ENDPATH**/ ?>