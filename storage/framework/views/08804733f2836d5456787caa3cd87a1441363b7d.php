<a href="<?php echo e(route('front.news.show', ['id' => $item->id])); ?>" class="single-news <?php if(isset($big) && $big == true): ?> big <?php endif; ?>" style="background: url(<?php echo e($item->news->getImage()); ?>)">
    <div class="title">
        <?php echo e($item->title); ?>

    </div>
</a><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/front/partials/single_news.blade.php ENDPATH**/ ?>