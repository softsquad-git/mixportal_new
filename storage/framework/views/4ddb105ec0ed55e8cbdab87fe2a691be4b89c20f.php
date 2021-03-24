<?php $__env->startSection('content'); ?>
<div class="container">
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="">
			<div class="card-body">
				<form method="POST" action="<?php echo e(route('login')); ?>">
					<?php echo csrf_field(); ?>
					<h4 class="text-center mb-3 font-weight-bold">Logowanie</h4>
					<div class="form-group row justify-content-center ">

						<div class=" col-md-6">
							<input id="email" type="email" placeholder="Email" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

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

					<div class="form-group row justify-content-center">

						<div class="col-md-6">
							<input id="password" type="password" placeholder="Hasło" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

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
						<div class="col-lg-3 col-md-3 offset-md-4 offset-lg-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
								<label class="form-check-label" for="remember">
									<?php echo e(__('Pamiętaj mnie')); ?>

								</label>
							</div>
						</div>

						<div class="col-md-4 offset-md-0">
							<div class="form-check">
						<?php if(Route::has('password.request')): ?>
							<a class="" href="<?php echo e(route('password.request')); ?>">
								<?php echo e(__('Zapomniałem hasła')); ?>

							</a>
						<?php endif; ?>
						</div>
						</div>
					</div>

					<div class="form-group row mb-0 justify-content-center">
						<div class="mt-2">
							<ui5-button style="width:150px" type="submit" submits="true" design="Default"> <?php echo e(__('Zaloguj się')); ?></ui5-button>

						</div>
					</div>
				</form>

				<div class="form-group row mb-0 justify-content-center">
					<div class="col-md-12 offset-md-0 offset-lg-12 mt-4">
						<h3 class="text-center">Nie masz konta?</h3>
					</div>
					<div class="mt-3">
						<form method="GET" action="<?php echo e(route('register')); ?>">
						<ui5-button  submits="true"  style="width:150px"  design="Default"> <?php echo e(__('Zarejestruj się')); ?></ui5-button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/informackr/www/resources/views/auth/login.blade.php ENDPATH**/ ?>