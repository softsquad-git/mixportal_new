<?php $__env->startSection('content'); ?>
    <div class="container mb-5">

        <form method="post" action="<?php echo e(route('edittabs')); ?>">
            <?php echo csrf_field(); ?>
    <div class="accordion mb-2" id="accordionExample">

        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($item->id); ?>" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo e($item->name); ?>

                    </button>
                </h2>
            </div>

            <div id="collapse<?php echo e($item->id); ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <textarea class="ckeditor form-control" name="<?php echo e($item->id); ?>" required ><?php echo e($item->content ?? ''); ?></textarea>
               </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

            <button type="submit" class="btn btn-primary btn-block">Zapisz</button>
        </form>
    </div>

<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/informackr/www/resources/views/tabs/edit.blade.php ENDPATH**/ ?>