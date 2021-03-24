<div class="row mt-2 mb-4">
    <div class="col-md-5">
        <h4><?php echo e($title ?? ''); ?></h4>
    </div>
    <div class="col-md-7" style="text-align: right!important;">
        <?php if(isset($create) && !empty($create)): ?>
            <a href="<?php echo e($create); ?>" class="btn btn-sm btn-outline-success" title="Dodaj">Dodaj</a>
        <?php endif; ?>
        <?php if(isset($cancel) && !empty($cancel)): ?>
            <a href="<?php echo e($cancel); ?>" class="btn btn-sm btn-outline-danger" title="Anuluj">Anuluj</a>
        <?php endif; ?>
    </div>
</div><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/admin/partials/header.blade.php ENDPATH**/ ?>