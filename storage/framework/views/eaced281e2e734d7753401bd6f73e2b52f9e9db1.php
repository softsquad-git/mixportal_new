<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row mt-3">
        <div class="col-md-2">
            <ul class="nav flex-column lang-nav" id="myTab" role="tablist">
                <li class="nav-item d-block" role="presentation">
                    <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account"
                            type="button" role="tab" aria-controls="account" aria-selected="true">Konta
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button"
                            role="tab" aria-controls="user" aria-selected="false">Użytkowników
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="page-tab" data-bs-toggle="tab" data-bs-target="#page" type="button"
                            role="tab" aria-controls="page" aria-selected="false">Strony
                    </button>
                </li>
            </ul>
        </div>

        <div class="col-md-10">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <form method="post" action="<?php echo e(route('admin.settings.save')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="email" aria-label="E-mail" placeholder="Adres e-mail" name="email"
                                       class="form-control"
                                       value="<?php echo e(Auth::user()->email ? Auth::user()->email : old('email')); ?>">
                            </div>
                            <div class="col-md-6">
                                <input type="password" aria-label="Hasło" placeholder="Hasło" name="password"
                                       value="<?php echo e(old('password')); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-outline-success">Zapisz</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
                    <form method="post" action="<?php echo e(route('admin.settings.save')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <select name="user_id" aria-label="Wybierz użytkownika" class="form-control">
                                    <option value="" selected>Wybierz użytkownika</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->getFullName()); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="email" aria-label="E-mail" placeholder="Adres e-mail" name="email"
                                       class="form-control" value="<?php echo e(old('email')); ?>">
                            </div>
                            <div class="col-md-4">
                                <input type="password" aria-label="Hasło" placeholder="Hasło" name="password"
                                       value="<?php echo e(old('password')); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="mt-3 row form-group">
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-outline-success">Zapisz</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="page" role="tabpanel" aria-labelledby="page-tab">
                    <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form method="post" action="<?php echo e(route('admin.settings.page', ['id' => $setting->id])); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mt-2">
                                <label for="item_<?php echo e($key); ?>"
                                       class="form-label"><?php echo e($setting->getNameType($setting->type)); ?></label>
                                <input type="text" id="item_<?php echo e($key); ?>" name="value" class="form-control" placeholder="Wartosć"
                                       value="<?php echo e($setting->value ? $setting->value : old('value')); ?>">
                            </div>
                            <div class="mt-1 row form-group">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Zapisz</button>
                                </div>
                            </div>
                        </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/admin/settings/index.blade.php ENDPATH**/ ?>