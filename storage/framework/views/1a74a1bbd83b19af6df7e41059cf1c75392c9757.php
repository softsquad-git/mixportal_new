<?php $__env->startSection('content'); ?>
    <div class="container mb-5">
        <h5 class="mb-4">
            <?php echo e($title); ?>

        </h5>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">L.p</th>
                <th scope="col"><?php echo e(App::getLocale() == 'pl' ? 'Tytuł' : 'Title'); ?></th>
                <th scope="col"><?php echo e(App::getLocale() == 'pl' ? 'Kategoria' : 'Category'); ?></th>
                <th scope="col">Status</th>
                <th scope="col"><?php echo e(App::getLocale() == 'pl' ? 'Data dodania' : 'Created at'); ?></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($key + 1); ?></th>
                    <td><?php echo e($item->title); ?></td>
                    <td><?php echo e($item->ad->category->name); ?></td>
                    <td><?php echo e($item->ad->status); ?></td>
                    <td><?php echo e($item->ad->created_at); ?></td>
                    <td>
                        <a href="<?php echo e(route('user.advert.update', ['id' => $item->ad->id])); ?>" class="btn btn-sm btn-warning"><?php echo e(App::getLocale() == 'pl' ? 'Edytuj' : 'Edit'); ?></a>
                        <a href="" class="btn btn-sm btn-danger"><?php echo e(App::getLocale() == 'pl' ? 'Usuń' : 'Remove'); ?></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/user/adverts/index.blade.php ENDPATH**/ ?>