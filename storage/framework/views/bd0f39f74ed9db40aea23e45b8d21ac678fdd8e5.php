<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.partials.header', ['title' => $title, 'cancel' => route('admin.pages.index')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="<?php echo e($item->id ? route('admin.pages.update', ['id' => $item->id]) : route('admin.pages.create')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row form-group">
            <div class="col-md-8">
                <label class="form-label" for="title">Tytuł</label>
                <input type="text" id="title" class="form-control" value="<?php echo e($item->title ? $item->title : old('title')); ?>" name="title">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-4">
                <label class="form-label" for="lang">Język</label>
                <select id="lang" class="form-control" name="lang">
                    <?php $__currentLoopData = config('app.languages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"<?php echo e($item->lang == $key ? 'selected' : ''); ?>><?php echo e($lang); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['lang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="row form-group mt-3">
            <div class="col-md-12">
                <label class="form-label" for="content">Treść</label>
                <textarea name="content" class="ckeditor form-control" id="content"><?php echo e($item->content ? $item->content : old('content')); ?></textarea>
            </div>
        </div>
        <div class="row form-group mt-3">
            <div class="col-md-2">
                <button type="submit" class="btn btn-sm btn-outline-success">Zapisz</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/admin/pages/form.blade.php ENDPATH**/ ?>