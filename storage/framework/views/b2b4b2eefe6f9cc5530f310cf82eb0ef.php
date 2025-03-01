
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.crm'); ?> <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('form.create')); ?>" class="btn btn-primary">Create</a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\New Advance Project\typeform-dashboard\resources\views/typeform/form/index.blade.php ENDPATH**/ ?>