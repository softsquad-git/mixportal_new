<?php $__env->startSection('content'); ?>
<div class="container mb-3">

    <?php if(isset($news[0])): ?>
    <div class="row">
        <div class="col-sm-8 col-md-6 col-lg-6">
            <div class="card ">
                <a style="color:black" href="<?php echo e(route('news',['slug'=>$news[0]->slug])); ?>">
                    <div class="image-shadowed hoverEffect">
                        <img class="card-img" src="/images/news/<?php echo e($news[0]->mainImage); ?>" alt="Bologna">
                        <div class="inset-shadow">
                            <div class="title"><?php echo e($news[0]->title); ?></div>
                            <div class="pretext"><?php echo e($news[0]->pretext); ?></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php endif; ?>

        <?php $count = 0; ?>
    <div class="col-lg-6">
        <div class="row">
            <?php if($news): ?><?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->first): ?> <?php continue; ?> <?php endif; ?>
                    <?php if($count<4): ?>
                        <div class="col-sm-8 col-md-6 col-lg-6 mb-4">
                            <div class="card">
                                <a style="color:black" href="<?php echo e(route('news',['slug'=>$news[$count+1]->slug])); ?>">
                                    <div class="image-shadowed hoverEffect">
                                        <img class="card-img" src="/images/news/<?php echo e($new->mainImage); ?>" alt="Bologna">
                                        <div class="inset-shadow small">
                                            <div class="title"><?php echo e($new->title); ?></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php $count++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>

        <?php $count = 0; ?>
        <div class="col-lg-12">
            <div class="row">
                <?php if($news): ?><?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->first): ?> <?php continue; ?> <?php endif; ?>
                    <?php if($count>=4): ?>
                        <div class="col-sm-8 col-md-6 col-lg-3 mb-4">
                            <div class="card">
                                <a style="color:black" href="<?php echo e(route('news',['slug'=>$news[$count+1]->slug])); ?>">
                                    <div class="image-shadowed hoverEffect">
                                        <img class="card-img" src="/images/news/<?php echo e($new->mainImage); ?>" alt="Bologna">
                                        <div class="inset-shadow small">
                                            <div class="title"><?php echo e($new->title); ?></div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php $count++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

        <nav aria-label="Page navigation ">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link <?php echo e((Session::get('currentPage') == 1)?'btn disabled' : null); ?>" href=<?php echo e(route('page',['page'=>Session::get('currentPage')-1])); ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for($i = 1; $i < Session::get('countPage'); $i++): ?>
                <li class="page-item"><a class="page-link <?php echo e((Session::get('currentPage') == $i) ?'font-weight-bold' : null); ?>" href=<?php echo e(route('page',['page'=>$i])); ?>><?php echo e($i); ?></a></li>
                <?php endfor; ?>

                <li class="page-item">
                    <a class="page-link <?php echo e((Session::get('currentPage') == Session::get('countPage'))?'btn disabled' : null); ?>"  href=<?php echo e(route('page',['page'=>Session::get('currentPage')+1])); ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

</div>



        </div>

</div>
<script type="text/javascript">

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/informackr/www/resources/views/home.blade.php ENDPATH**/ ?>