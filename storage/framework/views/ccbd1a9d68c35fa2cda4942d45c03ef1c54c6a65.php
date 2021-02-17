<?php $__env->startSection('content'); ?>
<?php $__env->startSection('facebook_meta'); ?>
    <meta property="og:image" content="/images/news/<?php echo e($news->mainImage); ?>">
    <meta property="og:description" content="<?php echo e($news->title); ?>">
<?php $__env->stopSection(); ?>

    <div class="container mb-3">
        <h4 style="height: auto"><?php echo e($news->title); ?></h4>
        <hr>
        <div class="row justify-content-start">
            <div class="col-md-5">
                <img class="img-fluid" src="/images/news/<?php echo e($news->mainImage); ?>" >
                <p><?php echo e($news->imageSource); ?></p>
            </div>

            <div class="col-md-6">
                <?php echo "<p style='color:red;'>".$news->text. "</p>" ?>
            </div>
            </div>

    </div>
    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/informackr/www/resources/views/news/news.blade.php ENDPATH**/ ?>