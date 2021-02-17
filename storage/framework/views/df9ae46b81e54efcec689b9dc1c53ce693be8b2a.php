<?php $__env->startSection('content'); ?>
    <div class="container mb-5">
        <user-advert-form-component
            :save_url="'<?php echo e(route('user.advert.create', ['type' => $type])); ?>'"
            :type="'<?php echo e($type); ?>'"
            :ig_url="'<?php echo e(asset('image/instagram.png')); ?>'"
            :fb_url="'<?php echo e(asset('image/facebook.png')); ?>'"
        ></user-advert-form-component>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/user/adverts/form.blade.php ENDPATH**/ ?>