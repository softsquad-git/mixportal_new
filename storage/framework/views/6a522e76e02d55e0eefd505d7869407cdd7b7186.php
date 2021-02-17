<?php $__env->startSection('content'); ?>
    <div class="container">
    <h4 class="text-left"><?php echo e(trans('trans.pages.register.invoice_data')); ?></h4>
        <form method="POST" action="">
            <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group row">
                <label for="firstname" class="col-md-3 col-form-label text-md-left "><?php echo e(trans('trans.forms.name')); ?></label>

                <div class="col-md-6">
                    <input id="firstname" type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="firstname" required value="<?php echo e($data->firstname); ?>" required autocomplete="firstname">

                    <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="surname" class="col-md-3 col-form-label text-md-left "><?php echo e(trans('trans.forms.last_name')); ?></label>

                <div class="col-md-6">
                    <input id="surname" type="text" class="form-control <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="surname" required value="<?php echo e($data->surname); ?>" required autocomplete="surname">

                    <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="company" class="col-md-3 col-form-label text-md-left "><?php echo e(trans('trans.forms.company.name')); ?></label>

                <div class="col-md-6">
                    <input id="company" type="text" class="form-control <?php $__errorArgs = ['company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="company" value="<?php echo e($data->company); ?>"  autocomplete="company" >

                    <?php $__errorArgs = ['company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="nip" class="col-md-3 col-form-label text-md-left "><?php echo e(trans('trans.forms.company.nip')); ?></label>

                <div class="col-md-6">
                    <input id="nip" type="text" class="form-control <?php $__errorArgs = ['nip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nip" value="<?php echo e($data->nip); ?>"  autocomplete="nip" >

                    <?php $__errorArgs = ['nip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="form-group row">
                <label for="street" class="col-md-4 col-form-label text-md-left "><?php echo e(trans('trans.forms.address.address')); ?></label>

                <div class="col-md-7">
                    <input id="street" type="text" class="form-control <?php $__errorArgs = ['street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="street" value="<?php echo e($data->street); ?>"  autocomplete="street" required >

                    <?php $__errorArgs = ['street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="postcode" class="col-md-4 col-form-label text-md-left "><?php echo e(trans('trans.forms.address.post_code')); ?></label>

                <div class="col-md-7">
                    <input id="postcode" type="text" class="form-control <?php $__errorArgs = ['postcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="postcode" value="<?php echo e($data->postcode); ?>"  autocomplete="postcode"  inputmode="numeric" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$" required>

                    <?php $__errorArgs = ['postcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-left "><?php echo e(trans('trans.forms.address.city')); ?></label>
                <div class="col-md-7">
                    <input type="text" class="form-control" id="city" onfocus="this.value=''" value="<?php echo e($data->city); ?>" autocomplete="state" name="city" list="cities" required >
                    <datalist id="cities"></datalist>
                </div>
            </div>


            <div class="form-group row">
                <label for="state" class="col-md-4 col-form-label text-md-left "><?php echo e(trans('trans.forms.address.voivodeship')); ?></label>

                <div class="col-md-7">
                <!--<input id="state" type="text" class="form-control <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="state" value="<?php echo e(old('state')); ?>"  autocomplete="state" >-->
                    <select class="form-control" id="state" value="<?php echo e($data->state); ?>"  autocomplete="state" name="state" required>
                        <?php foreach ($states as $provin){
                            echo '<option class="state_option" value="'.$provin.'">'.$provin.'</option>';
                        }?>

                    </select>
                    <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

        </div>

    </div>
        <div class="form-group row mb-3">
            <div class="col-md-2 ">
                <button type="submit" class="btn btn-outline-primary btn-block">
                    <?php echo e(__('trans.buttons.save')); ?>

                </button>
            </div>
            <?php if($successData?? false): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(__('trans.pages.profile.saved')); ?>

            </div>
            <?php endif; ?>
        </div>
    </form>
        <form method="post" action="<?php echo e(route('changeEmail')); ?>">
            <?php echo csrf_field(); ?>
        <hr>
        <h4 class="text-left"><?php echo e(__('trans.pages.register.account_data')); ?></h4>

        <div class="form-group row">
            <label for="email" class="col-md-1 col-form-label text-md-left "><?php echo e(__('trans.forms.email')); ?></label>
            <div class="col-md-4">
                <input id="email" type="text" class="form-control" name="email" value="<?php echo e($data->email); ?>"  autocomplete="off" required>

            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-block">
                    <?php echo e(__('trans.pages.profile.email_confirmed')); ?>

                </button>
            </div>
            <?php if($successChangeEmail?? false): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(__('trans.pages.profile.email_changed')); ?>

                </div>
            <?php endif; ?>

    </div>
        </form>
        <hr>
        <div class="form-group row mb-3">
        <form action="/password/reset" >
                <div class="col-md-12 ">
                    <button type="submit" class="btn btn-warning btn-block">
                        <?php echo e(__('trans.pages.profile.change_password')); ?>

                    </button>
                </div>

        </form>


        <?php if(request()->user()->admin != 1): ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                <?php echo e(__('Usuń konto')); ?>

            </button>
        <?php endif; ?>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="POST" action="/user/delete">
                        <?php echo csrf_field(); ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Usuwanie konta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Czy na pewno chcesz usunąć swoje konto ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                            <button type="submit" class="btn btn-primary">Potwierdzam</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/profile.blade.php ENDPATH**/ ?>