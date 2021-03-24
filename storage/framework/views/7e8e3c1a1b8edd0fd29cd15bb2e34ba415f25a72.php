<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="payment card shadow-lg">
            <h4><?php echo e(trans('trans.get_payment')); ?></h4>
            <p><?php echo e(trans('trans.get_payment_info')); ?></p>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <a href="<?php echo e(route('user.advert.get_payment', ['adId' => $id, 'type' => 'paypal'])); ?>" class="payment-link">
                        <img src="<?php echo e(asset('image/PayPal-Logo.png')); ?>" alt="paypal">
                        <span><?php echo e(trans('trans.payment_paypal')); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/user/adverts/payment.blade.php ENDPATH**/ ?>