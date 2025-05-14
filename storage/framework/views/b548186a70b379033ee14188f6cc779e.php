<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-topbar="light" data-sidebar-image="none">

    <head>
    <meta charset="utf-8" />
    <title><?php echo $__env->yieldContent('title'); ?> | Community Strength Barometer- CSB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Community Strength Barometer- CSB" name="description" />
    <!-- App favicon -->
    <!--<link rel="shortcut icon" href="<?php echo e(URL::asset('build/images/favicon.ico')); ?>">-->
    <link rel="shortcut icon" href="<?php echo e(URL::asset('build/images/favicons/favicon.ico')); ?>">
    <link rel="icon" href="<?php echo e(URL::asset('build/images/favicons/favicon.ico')); ?>" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(URL::asset('build/images/favicons/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(URL::asset('build/images/favicons/favicon-16x16.png')); ?>">
        <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>

    <?php echo $__env->yieldContent('body'); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('layouts.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH /home/krizmaticcomau/projects.krizmatic.com.au/TypeForm-Version-2.0/resources/views/layouts/master-without-nav.blade.php ENDPATH**/ ?>