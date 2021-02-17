<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-sm-12 col-md-8 mb-3 ">
                <h4>Dodawanie Newsa</h4>
                <?php if($newsData->id ?? ''): ?><form method="get" action="updatenews" enctype="multipart/form-data">
                    <?php else: ?> <form method="post" action="addnews" enctype="multipart/form-data">
                        <?php endif; ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($newsData->id ?? ''); ?>" >

                    <div class="form-group">
                        <label for="title">Tytuł:</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo e($newsData->title ?? ''); ?>" required >
                    </div>

                        <div class="form-group">
                            <label for="pretext">Informacja wstępna:</label>
                            <textarea type="text" class="form-control" id="pretext" name="pretext"  maxlength="200" ><?php echo e($newsData->pretext ?? ''); ?></textarea>
                        </div>
                    <h4>Zdjęcie główne</h4>
                    <div class="col-lg-12 mt-1">
                        <div class="col-md-12">
                            <div id="image-list-news" class="row justify-content-center">
                                <?php if($newsData->mainImage ?? ''): ?>
                                    <div class="image-container ml-2" id="container_<?php echo e(str_replace('.','',$newsData->mainImage ?? '')); ?>"><img width="190px" class="img-thumbnail img-fluid" src="/images/news/<?php echo e($newsData->mainImage); ?>">
                                <img id="<?php echo e($newsData->mainImage ?? ''); ?>" onclick="removeImage(this)" class="remove-img" src="image/criss-cross.png">
                                </div>
                                <input type="hidden" id="image_0" name="image_0" value=<?php echo e($newsData->mainImage?? ''); ?> >
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pretext">Tekst pod obrazkiem</label>
                            <input type="text" class="form-control" id="imageSource" name="imageSource"  maxlength="200" value="<?php echo e($newsData->imageSource ?? ''); ?>" >
                        </div>

                        <div class="mt-2 text-center">
                            <label for="photoImageNews">
                                <a class="btn btn-outline-primary">Dodaj zdjecie</a>
                            </label>
                            <input type="file"  id="photoImageNews" class="custom-file-input"  <?php if(!($newsData->mainImage ?? '')): ?>required <?php endif; ?>>
                        </div>



                    <div class="form-group">
                        <textarea class="ckeditor form-control" name="wysiwyg-editor" required ><?php echo e($newsData->text ?? ''); ?></textarea>
                    </div>

                        <div class="col-md-12">
                        <button type="submit" class="btn btn-outline-primary btn-block ">Zapisz</button>
                        </div>
                    </div>
                </form>
                </form>

                <?php if($newsData->id ?? ''): ?>
                    <div class="col-md-12  text-center  mt-2">
                    <form  method="post" action="/removenews/<?php echo e($newsData->id ??' '); ?>?_method=DELETE">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($newsData->id ?? ''); ?>">
                        <button type="submit" class="btn btn-outline-danger btn-block ">Usuń</button>
                    </form>
                </div>
                    <?php endif; ?>
            </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        CKEDITOR.replace('wysiwyg-editor', {
            filebrowserUploadUrl: "<?php echo e(route('ckeditor.upload', ['_token' => csrf_token() ])); ?>",
            filebrowserUploadMethod: 'form'

        });


        window.removeImage = function(e) {
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/informackr/www/resources/views/news/form.blade.php ENDPATH**/ ?>