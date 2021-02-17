<?php $__env->startSection('facebook_meta'); ?>
    <meta property="og:image" content="<?php echo e(url('images/news/'.$item->news->mainImage)); ?>">
    <meta property="og:description" content="<?php echo e($item->title); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mb-3">
        <div class="card shadow-sm">
            <div class="card-header">
                <?php echo e($item->title); ?>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <img class="img-fluid" src="<?php echo e(asset('images/news/'.$item->news->mainImage)); ?>" alt="<?php echo e($item->title); ?>">
                        <p><?php echo e($item->news->imageSource); ?></p>
                    </div>
                    <div class="col-md-6">
                        <?php echo $item->text; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/news/news.blade.php ENDPATH**/ ?>