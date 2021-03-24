<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.partials.header', ['title' => $title, 'cancel' => route('admin.categories.index')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form method="POST"
          action="<?php echo e($item->id ? route('admin.categories.update', ['id' => $item->id]) : route('admin.categories.create')); ?>">
        <?php echo csrf_field(); ?>
        <div class="row form-group">
            <div class="col-md-6">
                <label class="form-label" for="depth">Depth</label>
                <select id="depth" class="form-control" name="depth">
                    <option value="1"<?php echo e($item->depth == 1 ? 'selected' : ''); ?>>1</option>
                    <option value="2"<?php echo e($item->depth == 2 ? 'selected' : ''); ?>>2</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="main">Main</label>
                <select id="main" class="form-control" name="main">
                    <option value="10"<?php echo e($item->main == 10 ? 'selected' : ''); ?>>10</option>
                    <option value="100"<?php echo e($item->main == 100 ? 'selected' : ''); ?>>100</option>
                    <option value="1000"<?php echo e($item->main == 1000 ? 'selected' : ''); ?>>1000</option>
                </select>
            </div>
        </div>
        <div class="row form-group mt-4">
            <div class="col-md-2">
                <ul class="nav flex-column lang-nav" id="myTab" role="tablist">
                    <li class="nav-item d-block" role="presentation">
                        <button class="nav-link active" id="pl-tab" data-bs-toggle="tab" data-bs-target="#pl" type="button" role="tab" aria-controls="pl" aria-selected="true">Polski</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="en-tab" data-bs-toggle="tab" data-bs-target="#en" type="button" role="tab" aria-controls="en" aria-selected="false">Angielski</button>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="pl" role="tabpanel" aria-labelledby="pl-tab">
                        <div class="form-group">
                            <label for="textPL" class="form-label">Nazwa</label>
                            <input type="text" id="textPL" class="form-control" value="<?php echo e($item->getLangTranslate('pl') ? $item->getLangTranslate('pl')->text : old('trans.pl.text')); ?>" name="trans[pl][text]" placeholder="Wpisz nazwę w języku polskim">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                        <div class="form-group">
                            <label for="textPL" class="form-label">Nazwa</label>
                            <input type="text" id="textPL" class="form-control" value="<?php echo e($item->getLangTranslate('en') ? $item->getLangTranslate('en')->text : old('trans.en.text')); ?>" name="trans[en][text]" placeholder="Wpisz nazwę w języku angielskim">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group mt-4">
            <div class="col-12">
                <button type="submit" class="btn btn-outline-success btn-sm">Zapisz</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/admin/categories/form.blade.php ENDPATH**/ ?>