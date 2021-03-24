<?php $__env->startSection('content'); ?>
    <div class="container shadow p-3 mb-5">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12" style="min-height: 400px">
                <div class="fotorama" data-allowfullscreen="true">
                  <?php $__currentLoopData = $item->ad->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="<?php echo e(asset('data/media/ad/'.$photo->src)); ?>" alt="<?php echo e($photo->src); ?>">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
            <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 col-xs-12">
                <h3><?php echo e($item->title); ?></h3>
                <ul class="social">
                    <?php if($item->ad->www): ?>
                        <li>
                            <a href="<?php echo e($item->ad->www); ?>"><?php echo e(App::getLocale() == 'pl' ? 'Strona internetowa' : 'Website page'); ?></a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <?php if($item->ad->fb): ?>
                            <a href="<?php echo e($item->ad->fb); ?>"><img src="<?php echo e(asset('image/facebook.png')); ?>" alt="fb"></a>
                        <?php endif; ?>
                        <?php if($item->ad->ig): ?>
                            <a href="<?php echo e($item->ad->ig); ?>"><img src="<?php echo e(asset('image/instagram.png')); ?>" alt="ig"></a>
                        <?php endif; ?>
                    </li>
                </ul>
                <div>
                    <?php echo e(App::getLocale() == 'pl' ? 'Cena:' : 'Price:'); ?> <?php echo e($item->price); ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php echo $item->content; ?>

            </div>
        </div>
        <?php if($item->ad->type == 'talent'): ?>
            <div class="row">
                <?php if($item->ad->yt): ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <iframe id="ytplayer" type="text/html" width="100%" height="360"
                                src="http://www.youtube.com/embed/<?php echo e(substr($item->ad->yt, strpos($item->ad->yt, '=') + 1)); ?>?html5=1&amp;rel=0&amp;hl=en_US&amp;version=3"
                                frameborder="0"/>
                    </div>
                <?php endif; ?>
                <?php if($item->ad->soundcloud): ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <iframe id='sc-widget' width='100%' height='166' scrolling='no' frameborder='no'
                                src='https://w.soundcloud.com/player/?url=<?php echo e($item->ad->soundcloud); ?>'></iframe>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if($item->ad->type == 'accommodation'): ?>
            <div class="row">
                <div class="col-md-12">
                    <h4><?php echo e(__('trans.accommodation')); ?></h4>
                </div>
                <div class="col-12" style="margin-bottom: 20px;">
                        <?php $__currentLoopData = $item->ad->amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img style="margin-right: 5px; width: 15px" src="<?php echo e(asset('image/tick.png')); ?>" alt="amenity-id-<?php echo e($amenity->id); ?>"><?php echo e($amenity->amenity->name); ?></img>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="contact-section">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h4><?php echo e(App::getLocale() == 'pl' ? 'Skontaktuj się' : 'Contact'); ?></h4>
                    <a href="mailto:<?php echo e($item->ad->email_visible ?? $item->ad->email); ?>"><?php echo e($$item->ad->email_visible ?? $item->ad->email); ?></a>
                    <form method="post" action="" style="margin-top: 30px">
                        <?php echo csrf_field(); ?>
                        <input name="email_from" type="hidden" value="<?php echo e($item->ad->email); ?>">
                        <input name="title" type="hidden" value="<?php echo e($item->title); ?>">
                        <div class="form-group">
                            <input id="name" aria-label="<?php echo e(__('trans.name')); ?>" name="name" class="form-control" placeholder="<?php echo e(__('trans.name')); ?>" value="<?php echo e(old('name')); ?>">
                        </div>
                        <div class="form-group">
                            <input id="email" aria-label="E-mail" class="form-control" placeholder="E-mail" type="email" name="email">
                        </div>
                        <div class="form-group">
                            <textarea id="message" class="form-control" aria-label="<?php echo e(__('trans.message')); ?>" placeholder="<?php echo e(__('trans.message')); ?>" name="message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary"><?php echo e(__('trans.send_message')); ?></button>
                        </div>
                    </form>
                </div>
                <?php if($item->ad->type == 'accommodation'): ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h4><?php echo e(__('trans.send_question')); ?></h4>
                        <form method="post" action="" style="margin-top: 30px">
                            <?php echo csrf_field(); ?>
                            <input name="email_from" type="hidden" value="<?php echo e($item->ad->email); ?>">
                            <input name="title" type="hidden" value="<?php echo e($item->title); ?>">
                            <div class="form-group">
                                <input id="name" aria-label="<?php echo e(__('trans.name')); ?>" name="name" class="form-control" placeholder="<?php echo e(__('trans.name')); ?>" value="<?php echo e(old('name')); ?>">
                            </div>
                            <div class="form-group">
                                <input id="email" aria-label="E-mail" class="form-control" placeholder="E-mail" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <textarea id="message" class="form-control" aria-label="<?php echo e(__('trans.message')); ?>" placeholder="<?php echo e(__('trans.message')); ?>" name="message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" aria-label="<?php echo e(__('trans.phone')); ?>" placeholder="<?php echo e(__('trans.phone')); ?>">
                            </div>
                            <div class="form-group row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="date_from"><?php echo e(__('trans.from')); ?></label>
                                    <input id="date_from" type="date" name="date_from" class="form-control" placeholder="<?php echo e(__('trans.from')); ?>" aria-label="<?php echo e(__('trans.from')); ?>">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="date_to"><?php echo e(__('trans.to')); ?></label>
                                    <input id="date_to" type="date" name="date_to" class="form-control" placeholder="<?php echo e(__('trans.to')); ?>" aria-label="<?php echo e(__('trans.to')); ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <input type="number" name="adults" class="form-control" placeholder="<?php echo e(__('trans.adults')); ?>" aria-label="<?php echo e(__('trans.adults')); ?>">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <input type="number" class="form-control" name="children" placeholder="<?php echo e(__('trans.children')); ?>" aria-label="<?php echo e(__('trans.children')); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary"><?php echo e(__('trans.send_message')); ?></button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customScripts'); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/advert/show.blade.php ENDPATH**/ ?>