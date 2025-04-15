<div class="align-items-center mt-xl-3 mt-4 justify-content-between d-flex">
    <?php if($paginator->hasPages()): ?>
    <div class="flex-shrink-0">
        <div class="text-muted">Showing <span class="fw-semibold"><?php echo e($paginator->firstItem()); ?></span> to <span class="fw-semibold"><?php echo e($paginator->lastItem()); ?></span> of <span
                class="fw-semibold"><?php echo e($paginator->total()); ?></span> Results </div>
    </div>
    <ul class="pagination pagination-separated pagination-sm mb-0">
        <?php if($paginator->onFirstPage()): ?>
            <li class="page-item disabled"> <a href="#" class="page-link">Previous</a> </li>
        <?php else: ?>
            <li class="page-item"> <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="page-link">Previous</a> </li>
        <?php endif; ?>
       
        <?php $__currentLoopData = $paginator->getUrlRange(1,$paginator->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page=>$url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="page-item <?php echo e($page ==$paginator->currentPage() ? 'active' :''); ?>"> <a href="<?php echo e($url); ?>" class="page-link"><?php echo e($page); ?></a> </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        

        <?php if($paginator->hasMorePages()): ?>
            <li class="page-item"> <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="page-link">Next</a> </li>
        <?php else: ?>
            <li class="page-item disabled"> <a href="#" class="page-link">Next</a> </li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>
</div><?php /**PATH /Users/prateeklalwani/Desktop/Typeform Main/typeform-dashboard/resources/views/typeform/partials/pagination.blade.php ENDPATH**/ ?>