<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-3 ">
                <h4>Lista Newsów</h4>
                <ui5-list id="listNews" style="height: 650px" infinite-scroll mode="SingleSelect">
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ui5-li onclick="send(<?php echo e($new); ?>)"  icon="nutrition-activity" image="images/news/<?php echo e($new->mainImage); ?>" description="<?php echo e($new->created_at); ?>" info="" info-state="Success"><?php echo e($new->title); ?></ui5-li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ui5-list>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function send(data){
            var url = '<?php echo e(route("edit.news", ['id' => ':id'])); ?>';
            url = url.replace(':id', data['id']);
            window.location.href=url;
        }
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/news/list.blade.php ENDPATH**/ ?>