<?php $__env->startSection('content'); ?>
    <div class="container mb-5">
        <h5 class="mb-4">
            <?php echo e(__('trans.pages.advert.add_base')); ?> <?php echo e(trans('trans.pages.advert.title.'.$type)); ?>

        </h5>
        <user-advert-form-component
            :save_url="'<?php echo e(route('user.advert.create', ['type' => $type])); ?>'"
            :type="'<?php echo e($type); ?>'"
            :ig_url="'<?php echo e(asset('image/instagram.png')); ?>'"
            :fb_url="'<?php echo e(asset('image/facebook.png')); ?>'"
            :yt_url="'<?php echo e(asset('image/youtube.png')); ?>'"
            :sc_url="'<?php echo e(asset('image/soundcloud.png')); ?>'"
            :categories_url="'<?php echo e(route('api.categories.all')); ?>'"
            :sub_categories_url="'<?php echo e(route('api.categories.sub')); ?>'"
            :current_lang="'<?php echo e(App::getLocale()); ?>'"
            :amenities_url="'<?php echo e(route('api.adverts.amenities')); ?>'"
        ></user-advert-form-component>
        <div class="payments-logo">
            <img src="<?php echo e(asset('image/PAYU_LOGO_LIME.png')); ?>" alt="PayU"/>
            <img src="<?php echo e(asset('image/PayPal-Logo.png')); ?>" alt="PayPal"/>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/user/adverts/form.blade.php ENDPATH**/ ?>