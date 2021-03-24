<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="page-ads">
            <form id="searchForm" action="<?php echo e(route('publicList')); ?>">
                <input type="hidden" name="type" value="<?php echo e(app('request')->input('type')); ?>"/>
                <input type="hidden" name="place_id" id="placeID"/>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-9 col-xs-9">
                        <input id="autocomplete" class="form-control" style="min-height: 40px" placeholder="<?php echo e(__('trans.city')); ?>" aria-label="City" type="text" size="50">
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-3">
                        <select name="radius" aria-label="Radius" class="form-control" style="min-height: 40px;">
                            <?php
                                $radius = [0, 10, 25, 50, 100, 150, 200, 350, 500]
                            ?>
                            <?php $__currentLoopData = $radius; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ITEM): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($ITEM); ?>"><?php echo e($ITEM); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <select id="category" data-url="<?php echo e(route('api.categories.sub')); ?>" class="form-control" name="category"
                                aria-label="Select category" style="min-height: 40px;">
                            <option value="" selected><?php echo e(__('trans.category')); ?></option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->text); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <select id="subCategory" class="form-control" aria-label="Sub category"
                                style="min-height: 40px" name="sub_category">
                            <option value="" selected><?php echo e(__('trans.sub_category')); ?></option>

                        </select>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-1 co-sm-12 col-xs-12">
                        <button class="btn btn-primary w-100" type="submit">
                            <img src="<?php echo e(asset('image/search.svg')); ?>" width="26" alt="search-icon"/>
                        </button>
                    </div>
                </div>
            </form>

            <div class="row">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="<?php echo e(route('front.ads.show', ['id' => $item->id])); ?>" style="display: block;background: url(<?php echo e($item->ad->getImage()); ?>)" class="single-ad">
                            <div class="title">
                                <?php echo e($item->title); ?>

                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('customScripts'); ?>
    <script>
        function initialize() {
            var input = document.getElementById('autocomplete');
            const autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                const place = autocomplete.getPlace();
                const lat = place.geometry.location.lat();
                const lng = place.geometry.location.lng();
                $('#locationLAT').val(lat);
                $('#locationLNG').val(lng);
                $('#placeID').val(place.place_id);
            })
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/advert/publicList.blade.php ENDPATH**/ ?>