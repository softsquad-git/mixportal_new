<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="mixportal, noclegi, zespoły muzyczne, firmy w polsce, dj-e, artyści, newsy">
    <meta name="keywords" content="mixportal, noclegi, zespoły muzyczne, firmy w polsce, dj-e, artyści, newsy">
    <?php echo $__env->yieldContent('facebook_meta'); ?>
    <meta name="robots" content="index, follow">
    <link rel="icon" href="<?php echo e(URL::asset('/favicon.png')); ?>" type="image/x-icon"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
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
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH /opt/lampp/htdocs/mixportal/resources/views/layouts/app.blade.php ENDPATH**/ ?>