<!doctype html >
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title><?php echo $__env->yieldContent('title'); ?> | Community Strength Barometer- CSB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Community Strength Barometer- CSB" name="description" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(URL::asset('build/images/favicons/favicon.ico')); ?>">
    <link rel="icon" href="<?php echo e(URL::asset('build/images/favicons/favicon.ico')); ?>" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(URL::asset('build/images/favicons/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(URL::asset('build/images/favicons/favicon-16x16.png')); ?>">

    <?php echo $__env->make('typeform.partials.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/css/style.css')); ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/all.min.css">
</head>

<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('typeform.partials.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldSection(); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php echo $__env->make('typeform.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('typeform.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
            <?php echo $__env->make('typeform.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('typeform.partials.customizer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- JAVASCRIPT -->
    <?php echo $__env->make('typeform.partials.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
    <script src="<?php echo e(URL::asset('build/js/script.js')); ?>"></script>

    <script>
        <?php if(session::has('success')): ?>
            toastr.success("<?php echo e(session::get('success')); ?>");
        <?php endif; ?>

        <?php if(session::has('error')): ?>
            toastr.error("<?php echo e(session::get('error')); ?>");
        <?php endif; ?>
        var $=jQuery;
        $(document).ready(function(){
            $('.select2').select2();

            $('a[data-bs-toggle="offcanvas"],div[data-bs-toggle="offcanvas"]').on('click',function(event){
                event.preventDefault();

                var title = $(this).data('title');
                var content = $(this).data('content');

                if(title && content){
                    $('#info_title').text(title);
                    $('#info_content').html(content);
                }else{
                    $('#info_title').html('');
                    $('#info_content').html('');
                }
            });
        });


    </script>
</body>

</html>
<?php /**PATH /home/krizmaticcomau/projects.krizmatic.com.au/TypeForm-New/resources/views/typeform/layout/web.blade.php ENDPATH**/ ?>