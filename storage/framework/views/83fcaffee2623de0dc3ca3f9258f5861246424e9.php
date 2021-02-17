<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">L.p</th>
            <th scope="col">Imię & Nazwisko</th>
            <th scope="col">Adres e-mail</th>
            <th scope="col">Aktywne?</th>
            <th scope="col">Data rejestracji</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr <?php if($item->admin == 1): ?> style="background: darkseagreen" <?php endif; ?>>
                <th scope="row"><?php echo e($key + 1); ?></th>
                <td><?php echo e($item->getFullName()); ?></td>
                <td><?php echo e($item->email); ?></td>
                <td><?php echo e($item->email_verified_at ? $item->email_verified_at : 'Nie'); ?></td>
                <td><?php echo e($item->created_at); ?></td>
                <td>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/admin/users/index.blade.php ENDPATH**/ ?>