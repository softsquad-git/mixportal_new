<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="mixportal, noclegi, zespoły muzyczne, firmy w polsce, dj-e, artyści, newsy">
    <meta name="keywords" content="mixportal, noclegi, zespoły muzyczne, firmy w polsce, dj-e, artyści, newsy">
    <?php echo $__env->yieldContent('facebook_meta'); ?>
    <meta name="robots" content="index, follow">
    <link rel="icon" href="<?php echo e(asset('favicon.png')); ?>" type="image/x-icon"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI_jGXlQWPpqJCKXXhzHjXsuQn7NkFdPU&libraries=places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
</head>
<body>

<div id="app">
    <?php echo $__env->make('front.partials.facebook_widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('front.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="content-page">
        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>
</div>
<script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>"></script>


<?php echo $__env->yieldContent('customScripts'); ?>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/layouts/app.blade.php ENDPATH**/ ?>