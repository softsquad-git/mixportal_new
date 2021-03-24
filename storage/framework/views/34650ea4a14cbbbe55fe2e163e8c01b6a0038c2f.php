    

    <?php $__env->startSection('content'); ?>
    <div class="container mb-5">
        <div class="row justify-content-start">
            <div class="col-md-12 mt-2 mb-2">
                <h4 class="text-left"><?php echo e(trans('trans.pages.register.basic_data')); ?></h4>
            </div>

            <div class="col-md-12">
                        <form method="POST" action="<?php echo e(route('register')); ?>" id="ItemEditForm">
                            <div class="row">
                            <div class="col-lg-6">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-left "><?php echo e(trans('trans.forms.email')); ?></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                    <?php $__errorArgs = ['email'];
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
                                <label for="password" class="col-md-3 col-form-label text-md-left "><?php echo e(trans('trans.forms.password.password')); ?></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                                    <?php $__errorArgs = ['password'];
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
                                <label for="password-confirm" class="col-md-3 col-form-label text-md-left "><?php echo e(trans('trans.forms.password.confirm')); ?></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            </div>
                            </div>


                                <div class="col-md-12 col-lg-12 mt-2 mb-2" style="padding-left: 0px;">
                                    <hr>
                                </div>

                            <h4 class="text-left"><?php echo e(trans('trans.pages.register.invoice_data')); ?></h4>
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
unset($__errorArgs, $__bag); ?>" name="firstname" required value="<?php echo e(old('firstname')); ?>" required autocomplete="firstname">

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
unset($__errorArgs, $__bag); ?>" name="surname" required value="<?php echo e(old('surname')); ?>" required autocomplete="surname">

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
unset($__errorArgs, $__bag); ?>" name="company" value="<?php echo e(old('company')); ?>"  autocomplete="company" >

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
unset($__errorArgs, $__bag); ?>" name="nip" value="<?php echo e(old('nip')); ?>"  autocomplete="nip" >

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
unset($__errorArgs, $__bag); ?>" name="street" value="<?php echo e(old('street')); ?>"  autocomplete="street" required >

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
unset($__errorArgs, $__bag); ?>" name="postcode" value="<?php echo e(old('postcode')); ?>"  autocomplete="postcode"  inputmode="numeric" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$" required>

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
                                            <input type="text" class="form-control" id="city" value="<?php echo e(old('city') ?? ''); ?>"  autocomplete="off" name="city" list="cities" required >
                                            <datalist id="cities"></datalist>
                                            <span class="invalid-feedback" id="alertErrorCity"  role="alert">
                                            <strong id="errorCity"></strong>
                                        </span>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="state" class="col-md-4 col-form-label text-md-left "><?php echo e(trans('trans.forms.address.country')); ?></label>

                                        <div class="col-md-7">
                                            <select name="country" class="form-control" aria-label="<?php echo e(trans('trans.forms.address.country')); ?>">
                                                <option value="" selected><?php echo e(__('trans.forms.address.country')); ?></option>
                                                <?php $__currentLoopData = config('app.countries'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($code); ?>"><?php echo e($country); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="isVat">
                                                <input id="isVat" type="checkbox" class="custom-checkbox" name="is_payer_vat">
                                                <?php echo e(App::getLocale() == 'pl' ? 'Jestem podatnikiem VAT UE' : 'I am a VAT payer UE'); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12 col-lg-12 mt-2 mb-2" style="">

                                <div class="row justify-content-end">

                                    <div class="col-md-9">
                                <div class="col-lg-12 mt-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="regulamin" name="regulamin" value="on"
                                           <?php echo e(old('regulamin') == 'on' ? 'checked' : ''); ?> required>
                                    <label class="form-check-label" for="regulamin"><?php echo e(trans('trans.pages.register.accept')); ?> <a href="<?php echo e(route('tabs','Regulamin')); ?>"><?php echo e(trans('trans.pages.register.reg')); ?></a></label>
                                </div>
                            </div>
                                <div class="col-lg-12 mt-0">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="policy" id="policy" value="on"
                                               <?php echo e(old('policy') == 'on' ? 'checked' : ''); ?> required>
                                        <label class="form-check-label" for="policy"><?php echo e(trans('trans.pages.register.accept')); ?> <a href="<?php echo e(route('tabs','polityka-prywatnosci')); ?>"><?php echo e(trans('trans.pages.register.pp')); ?></a></label>
                                    </div>
                                </div>
                                        <div class="col-lg-12 mt-0">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="policy" id="policy" value="on"
                                                       <?php echo e(old('accident') == 'on' ? 'checked' : ''); ?> required>
                                                <label class="form-check-label" for="policy"><?php echo e(trans('trans.pages.register.accept')); ?> <?php echo e(trans('trans.pages.register.that_reg')); ?><a href="<?php echo e(route('tabs','polityka-prywatnosci')); ?>"> <?php echo e(trans('trans.pages.register.reg')); ?></a> <?php echo e(trans('trans.pages.register.accident')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12 offset-md-0">
                                            <button type="submit" class="btn btn-outline-primary">
                                                <?php echo e(__('trans.nav.create_account')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                </div>

                            </div>
                        </form>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/auth/register.blade.php ENDPATH**/ ?>