<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.partials.header', ['title' => $title, 'create' => route('admin.categories.create')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">L.p</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Język</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($key + 1); ?></th>
                <td><?php echo e($item->text); ?></td>
                <td><?php echo e($item->lang); ?></td>
                <td>
                    <a href="<?php echo e(route('admin.categories.update', ['id' => $item->category->id])); ?>" class="btn btn-outline-warning btn-sm">Edytuj</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo e($data->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/admin/categories/index.blade.php ENDPATH**/ ?>