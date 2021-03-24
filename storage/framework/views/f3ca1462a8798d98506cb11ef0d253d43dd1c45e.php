<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card  border-light">
                   <h2 class="text-center text-info">Kontakt</h2>
                    <form class="d-inline" method="POST" action="">
                        <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="topic" class="col-md-2 col-form-label text-md-left "><?php echo e(__('Temat')); ?></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="city" value="<?php echo e($topic); ?>" name="topic" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left "><?php echo e(__('Email')); ?></label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="email" autocomplete="email" placeholder="Email"  name="email" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-2 col-form-label text-md-left "><?php echo e(__('Treść')); ?></label>
                            <div class="col-md-9">
                                <textarea type="email" class="form-control" id="ontent"  name="content" placeholder="Proszę wpisać powód zgłoszenia" ></textarea>
                            </div>
                        </div>

                            <button type="submit" class="btn btn-primary m-0 "><?php echo e(__('Wyślij zgłoszenie')); ?></button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/informackr/www/resources/views/advert/report.blade.php ENDPATH**/ ?>