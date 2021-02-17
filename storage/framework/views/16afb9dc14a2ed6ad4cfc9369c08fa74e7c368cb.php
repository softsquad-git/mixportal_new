<?php $__env->startSection('content'); ?>
    <div class="container">
        <h4><?php echo e($title); ?></h4>
        <form action="<?php echo e($item->id ? route('edit.news', ['id' => $item->id]) : route('create.news')); ?>"
              method="POST"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row form-group">
                <div class="col-md-6">
                    <label for="photoImageNews">
                        <a class="btn btn-outline-primary"><?php echo e(trans('trans.forms.add_photo')); ?></a>
                    </label>
                    <input type="file" id="photoImageNews" class="custom-file-input"
                           <?php if(!($item->mainImage ?? '')): ?>required <?php endif; ?>>

                    <label for="imageSource" class="form-label"><?php echo e(trans('trans.forms.image_source')); ?></label>
                    <input type="text" class="form-control" id="imageSource" name="imageSource" maxlength="200"
                           value="<?php echo e($item->imageSource ?? ''); ?>">
                </div>
                <div class="col-md-6">
                    <div id="image-list-news" class="row justify-content-center">
                        <?php if($item->mainImage ?? ''): ?>
                            <div class="image-container ml-2"
                                 id="container_<?php echo e(str_replace('.','',$item->mainImage ?? '')); ?>"><img alt="img-thu"
                                                                                                    width="190px"
                                                                                                    class="img-thumbnail img-fluid"
                                                                                                    src="<?php echo e(asset('images/news/'.$item->mainImage)); ?>">
                                <img id="<?php echo e($item->mainImage ?? ''); ?>" onclick="removeImage(this)" class="remove-img"
                                     src="<?php echo e(asset('image/criss-cross.png')); ?>" alt="img">
                            </div>
                            <input type="hidden" id="image_0" name="image_0" value=<?php echo e($item->mainImage?? ''); ?> >
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- translate -->
            <?php $__currentLoopData = config('app.languages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button class="btn btn-outline-primary w-100 btn-sm mb-2" type="button" data-toggle="collapse"
                        data-target="#lang-<?php echo e($key); ?>" aria-expanded="false" aria-controls="lang-<?php echo e($key); ?>">
                    <?php echo e($lang); ?>

                </button>
                <div class="collapse mb-2" id="lang-<?php echo e($key); ?>">
                    <div class="form-group">
                        <label for="title"><?php echo e(trans('trans.forms.title')); ?></label>
                        <input type="text" class="form-control" id="title" name="trans[<?php echo e($key); ?>][title]"
                               value="<?php echo e(isset($item->translations[0]['lang']) == $key ? $item->translations[0]['title'] : old('trans.'.$key.'.title')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pretext"><?php echo e(trans('trans.forms.pre_info')); ?></label>
                        <textarea type="text" class="form-control" id="pretext" name="trans[<?php echo e($key); ?>][pretext]"
                                  maxlength="200"><?php echo e($item->pretext ?? ''); ?></textarea>
                    </div>
                    <div class="form-group">
                        <textarea id="wysywig-editor" class="ckeditor form-control"
                                  name="trans[<?php echo e($key); ?>][wysiwyg-editor]" required><?php echo e($item->text ?? ''); ?></textarea>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <button type="submit" class="btn btn-outline-primary btn-sm mt-3 mb-5"><?php echo e(trans('trans.buttons.save')); ?></button>
        </form>

        <?php if($newsData->id ?? ''): ?>
            <div class="col-md-12  text-center  mt-2">
                <form method="post" action="/removenews/<?php echo e($newsData->id ??' '); ?>?_method=DELETE">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($newsData->id ?? ''); ?>">
                    <button type="submit" class="btn btn-outline-danger btn-block ">Usuń</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
    <script type="text/javascript">
        CKEDITOR.replace('wysiwyg-editor', {
            filebrowserUploadUrl: "<?php echo e(route('ckeditor.upload', ['_token' => csrf_token() ])); ?>",
            filebrowserUploadMethod: 'form'

        });


        window.removeImage = function (e) {
            axios({
                method: 'post',
                url: '/api/imageToNewsRemove',
                data: {name: e.id},
                config: {
                    headers: {
                        'Authorization': 'Bearer ' + $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json',
                    }
                }
            }).then((result) => {
                $('#container_' + e.id.split('.').join("")).remove();
            });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/news/form.blade.php ENDPATH**/ ?>