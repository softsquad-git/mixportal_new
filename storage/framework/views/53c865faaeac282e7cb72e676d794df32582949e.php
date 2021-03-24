<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-12 mt-2 mb-2">
                <h4 class="text-left"><?php echo e(__('Dane podstawowe:')); ?></h4>
            </div>

            <div class="col-md-12">
                <form method="POST" action="/advert" id="ItemEditForm">
                    <input type="hidden" name="type" value="<?php echo e($type); ?>">
                    <div class="row">
                        <div class="col-lg-6">
                        <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-left "><?php echo e(__('Tytuł oferty:')); ?></label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title" value="<?php echo e(old('title')); ?> <?php echo e($data->title ?? null); ?>"  autocomplete="email" maxlength="40" required>

                                    <?php $__errorArgs = ['title'];
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


                            <?php if($type == 1000): ?>
                                <div class="form-group row">
                                    <label for="category" class="col-md-3 col-form-label text-md-left "><?php echo e(__('Kategoria:')); ?></label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="categoryCompany" value="<?php echo e(old('state')); ?>"  autocomplete="state" name="category" >
                                            <?php foreach ($categories as $cat){
                                                if(isset($data->category) && $cat->id == $data->category->id )echo '<option value="'.$cat->id.'" selected>'.$cat->text.'</option>';
                                                else echo '<option value="'.$cat->id.'">'.$cat->text.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                        <div class="col-md-6 offset-3 mt-3">
                                            <input type="hidden" id="id_subcategory" value="<?php echo e($data->subcategory['id'] ?? ''); ?>">
                                        <select class="form-control d-none" id="subcategory"  autocomplete="state" name="subcategory" >
                                        </select>

                                    </div>
                                </div>

                            <?php else: ?>
                            <div class="form-group row">
                                <label for="category" class="col-md-3 col-form-label text-md-left "><?php echo e(__('Kategoria:')); ?></label>
                                <div class="col-md-6">
                                    <select class="form-control" id="category" value="<?php echo e(old('state')); ?>"  autocomplete="state" name="category" >

                                        <?php foreach ($categories as $cat){
                                            if(isset($data->category) && $cat->id == $data->category->id )echo '<option value="'.$cat->id.'" selected>'.$cat->text.'</option>';
                                           else echo '<option value="'.$cat->id.'">'.$cat->text.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="form-group row">
                                <label for="city" class="col-md-3 col-form-label text-md-left "><?php echo e(__('Miejscowość:')); ?></label>
                                <div class="col-md-6">
                                    <input type="hidden" value="<?php echo e($data->hiddenCity ?? ''); ?>city" name="hiddenCity" id="hiddenCity">
                                    <input type="text" class="form-control" id="city" value="<?php echo e($data->location[0]->text ?? ''); ?>"  autocomplete="off" name="city" list="cities" required >
                                    <datalist id="cities"></datalist>

                                    <span class="invalid-feedback" id="alertErrorCity"  role="alert">
                                            <strong id="errorCity"></strong>
                                        </span>

                                </div>
                            </div>

                            <?php if($type === 100): ?>
                                <div class="form-group row">
                                    <label for="street" class="col-md-3 col-form-label text-md-left "><?php echo e(__('Ulica, nr domu / mieszkania')); ?></label>
                                    <div class="col-md-6 mt-3">
                                        <input type="text" class="form-control" id="street" value="<?php echo e($data->street ?? ''); ?>"   name="street" >
                                    </div>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="price" class="col-md-3 col-form-label text-md-left "><?php echo e(__('Cena:')); ?></label>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                    <input id="price" type="number" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price" value="<?php echo e($data->price ?? ''); ?>" required >
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">PLN</span>
                                    </div>
                                    </div>
                                    <?php $__errorArgs = ['price'];
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

                        <div class="col-md-12 col-lg-12 mt-2 mb-2" style="padding-left: 0px;">
                            <hr>
                        </div>
                        <div class="col-md-12 mt-2 mb-2">
                            <h4 class="text-left"><?php echo e(__('Opis:')); ?></h4>
                        </div>

                            <div class="col-md-12">
                                <textarea class="ckeditor form-control"  name="content" required><?php echo e($data->content ?? ''); ?></textarea>

                            </div>


                    <?php if($type === 100): ?>
                            <div class="col-md-12 col-lg-12 mt-2 mb-2" style="padding-left: 0px;">
                                <hr>
                            </div>

                        <div class="col-md-12 mt-2 mb-2">
                            <h4 class="text-left"><?php echo e(__('Udogodnienia:')); ?></h4>
                        </div>

                        <div class="form-row align-items-center">
                        <div class="col-lg-12 ">

                        <?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="form-check form-check-inline pl-2">
                              <input type="hidden" name="fac_<?php echo e($fc->id); ?>" value="0" />
                           <input class="form-check-input" value=1 name="fac_<?php echo e($fc->id); ?>" <?php if( isset($data->facility) && array_search($fc->id, array_column(json_decode($data->facility ?? ''), 'id')) != null)echo 'checked'; ?>   id="fc" type="checkbox">

                              <label class="form-check-label" for="fc" ><?php echo e($fc->text); ?></label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <?php endif; ?>

                        <div class="col-md-12 col-lg-12 mt-2 mb-2" style="padding-left: 0px;">
                            <hr>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group row justify-content-start">
                                <label for="email" class="col-md-3 col-form-label text-md-left "> <?php echo e(__('Email do formularza kontaktowego:')); ?></label>

                                <div class="col-md-4 ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="phone"><img src="<?php echo e(url('/image/open-email.png')); ?>" width="20"></span>
                                        </div>
                                        <input id="email" type="email"  class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($data->email ?? ''); ?>">
                                        <small id="emailHelp" class="form-text text-muted">W przypadku braku maila brak formularza kontaktowego </small>
                                    </div>

                                    <?php $__errorArgs = ['phone'];
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

                        <div class="col-lg-12">
                            <div class="form-group row justify-content-start">
                                <label for="emailVisible" class="col-md-3 col-form-label text-md-left "> <?php echo e(__('Email widoczny w ogłoszeniu:')); ?></label>

                                <div class="col-md-4 ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="phone"><img src="<?php echo e(url('/image/open-email.png')); ?>" width="20"></span>
                                        </div>
                                        <input id="emailVisible" type="email"  class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="emailVisible" value="<?php echo e($data->emailVisible ?? ''); ?>">
                                        <small id="emailHelp" class="form-text text-muted">Może być to email rejestracyjny lub ten sam co powyżej</small>
                                    </div>

                                    <?php $__errorArgs = ['phone'];
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


                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="www" class="col-md-2 col-form-label text-md-left "><?php echo e(__('WWW:')); ?></label>
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="www"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-globe" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M1.018 7.5h2.49c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5zM2.255 4H4.09a9.266 9.266 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.024 7.024 0 0 0 2.255 4zM8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm-.5 1.077c-.67.204-1.335.82-1.887 1.855-.173.324-.33.682-.468 1.068H7.5V1.077zM7.5 5H4.847a12.5 12.5 0 0 0-.338 2.5H7.5V5zm1 2.5V5h2.653c.187.765.306 1.608.338 2.5H8.5zm-1 1H4.51a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm1 2.5V8.5h2.99a12.495 12.495 0 0 1-.337 2.5H8.5zm-1 1H5.145c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12zm-2.173 2.472a6.695 6.695 0 0 1-.597-.933A9.267 9.267 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM1.674 11H3.82a13.651 13.651 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm8.999 3.472A7.024 7.024 0 0 0 13.745 12h-1.834a9.278 9.278 0 0 1-.641 1.539 6.688 6.688 0 0 1-.597.933zM10.855 12H8.5v2.923c.67-.204 1.335-.82 1.887-1.855A7.98 7.98 0 0 0 10.855 12zm1.325-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm.312-3.5h2.49a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.91 4a9.277 9.277 0 0 0-.64-1.539 6.692 6.692 0 0 0-.597-.933A7.024 7.024 0 0 1 13.745 4h-1.834zm-1.055 0H8.5V1.077c.67.204 1.335.82 1.887 1.855.173.324.33.682.468 1.068z"/>
                                             </svg></span>
                                        </div>
                                        <input id="www" type="text" class="form-control <?php $__errorArgs = ['www'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="www" value="<?php echo e($data->www ?? ''); ?>">
                                    </div>
                                    <?php $__errorArgs = ['www'];
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

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="phone" class="col-md-2 col-form-label text-md-left "><?php echo e(__('Telefon:')); ?></label>
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="phone"><img src="<?php echo e(url('/image/phone.png')); ?>" width="20"></span>
                                        </div>
                                        <input id="phone" type="phone" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" value="<?php echo e($data->phone ?? ''); ?>">
                                    </div>
                                    <?php $__errorArgs = ['phone'];
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




                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="www" class="col-md-2 col-form-label text-md-left "><?php echo e(__('Instagram:')); ?></label>
                                    <div class="col-md-7">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="www"><img src="<?php echo e(url('/image/instagram.png')); ?>" width="20"></span>
                                            </div>
                                            <input id="www" type="text" class="form-control <?php $__errorArgs = ['www'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="instagram" value="<?php echo e($data->instagram ?? ''); ?>">
                                        </div>
                                        <?php $__errorArgs = ['www'];
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

                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="facebook" class="col-md-2 col-form-label text-md-left "><?php echo e(__('Facebook:')); ?></label>
                                        <div class="col-md-7">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="facebook"><img src="<?php echo e(url('/image/facebook.png')); ?>" width="20"></span>
                                                </div>
                                                <input id="facebook" type="text" class="form-control <?php $__errorArgs = ['www'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="facebook" value="<?php echo e($data->fb ?? ''); ?>" >
                                            </div>
                                            <?php $__errorArgs = ['facebook'];
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

                        <?php if($type === 10): ?>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="youtube" class="col-md-2 col-form-label text-md-left "><?php echo e(__('Youtube:')); ?></label>
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="youtube"><img src="<?php echo e(url('/image/youtube.png')); ?>" width="20"></span>
                                        </div>
                                        <input id="youtube" type="text" class="form-control <?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="youtube" value="<?php echo e($data->yt ?? ''); ?>" >
                                        <small id="emailHelp" class="form-text text-muted">Link zostanie wyświetlony jako odtwarzacz video</small>
                                    </div>

                                    <?php $__errorArgs = ['youtube'];
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

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="soundcloud" class="col-md-2 col-form-label text-md-left "><?php echo e(__('Soundcloud:')); ?></label>
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="soundcloud"><img src="<?php echo e(url('/image/soundcloud.png')); ?>" width="20"></span>
                                        </div>
                                        <input id="soundcloud" type="text" class="form-control <?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="soundcloud" value="<?php echo e($data->soundcloud ?? ''); ?>" >
                                    </div>
                                    <small id="emailHelp" class="form-text text-muted">Link zostanie wyświetlony jako odtwarzacz soundcloud</small>
                                    <?php $__errorArgs = ['soundcloud'];
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
                        <?php endif; ?>

                        <div class="col-md-12 col-lg-12 mt-2 mb-2" style="padding-left: 0px;">
                            <hr>
                        </div>
                        <div class="col-md-12 mt-2 mb-2">
                            <h4 class="text-left"><?php echo e(__('Zdjecia:')); ?></h4>
                        </div>

                        <div class="col-lg-12 mt-1">
                        <div class="col-md-12">
                                    <div id="image-list" class="row justify-content-center">
                                        <?php if(isset($data->allphotos)): ?>
                                        <?php $countOfImage = 0 ?>
                                        <?php $__currentLoopData = $data->allphotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="image-container ml-2" id="container_<?php echo e(str_replace(".","",$photo->url)); ?>">
                                            <img width="190px" class="img-thumbnail img-fluid" src="/images/adverts/<?php echo e($photo->url); ?>">
                                            <img id="<?php echo e($photo->url); ?>" onclick="removeImage(this)" class="remove-img" src="image/criss-cross.png">

                            <input type="hidden" id="image_<?php echo e($countOfImage); ?>" name="image_<?php echo e($countOfImage); ?>" value='<?php echo e($photo->url); ?>'>
                                            </div>
                                <?php $countOfImage++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                    </div>
                            </div>

                            <div class="mt-2 text-center">
                                <label for="photoImage">
                                    <a class="btn btn-outline-primary photoImageBtn" aria-disabled="true">Dodaj zdjecie</a>
                                    <div class="text-danger" id="maxImageError">Maksymalnie możesz dodać 12 zdjęć.(max 4 MB jedno zdjęcie)</div>
                                </label>
                            <input type="file" id="photoImage" class="custom-file-input">
                                </div>

                        </div>
                    </div>


                    <div class="col-lg-12 mt-1">
                        <div class="form-group row justify-content-end">

                            <input type="hidden" name="id" value="<?php echo e($data->id ?? ''); ?>">
                            <?php if($data && $data->payment->status == 'SUCCESS'): ?>

                                <div class="col-md-6 text-right ">
                                    <button type="submit" class="btn btn-outline-primary">
                                        <?php echo e(__('Zaktualizuj ogłoszenie')); ?>

                                    </button>
                                </div>
                            <?php else: ?>

                                <div class="col-lg-6">
                                    <div class="alert alert-primary" role="alert">
                                        Koszt za ogłoszenie w <?php echo e($paymentSetting[0]['name']); ?> wynosi <?php echo e($paymentSetting[0]['price']); ?> zł
                                        <input type="hidden" name="type" id="type" value="<?php echo e($type); ?>" >
                                    </div>
                                </div>

                            <div class="col-md-6 text-right ">
                                <button type="submit" class="btn btn-outline-primary">
                                    <?php echo e(__('Dodaj ogłoszenie i przejdź do płatności')); ?>

                                </button>
                            </div>


                            <div class="col-md-4 col-sm-12 text-right ">
                                <span class="payu-text">Płatności obsługuje</span>
                                <img width="90" class="img-fluid mr-3" src="image/PAYU_LOGO_LIME.png">
                            </div>

                                <?php endif; ?>

                        </div>
                    </div>
                </form>
                    </div>
              </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<script type="text/javascript">


    window.removeImage = function(e){
        axios({
            method: 'post',
            url:'/api/imageRemove',
            data:{name:e.id},
            config: {
                headers: {
                    'Authorization':'Bearer '+$('meta[name="csrf-token"]').attr('content'),
                    'Accept' : 'application/json',
                }}}).then((result)=>{
                    console.log(result)
            $('#container_'+e.id.split('.').join("")).remove();
        });
    }

    </script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/informackr/www/resources/views/advert/add.blade.php ENDPATH**/ ?>