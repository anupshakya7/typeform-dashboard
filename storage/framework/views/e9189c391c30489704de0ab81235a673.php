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
        
        <?php
            $currentPage = $paginator->currentPage();
            $lastPage = $paginator->lastPage();
            $start = max(1, $currentPage - 1);
            $end = min($lastPage,$currentPage+1);
        ?>
        
        <?php if($start > 1): ?>
            <li class="page-item"><a class="page-link" href="<?php echo e($paginator->url(1)); ?>">1</a></li>
            <?php if($start > 2): ?>
                <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
            <?php endif; ?>
        <?php endif; ?>
        
        
        <?php for($i = $start; $i <= $end; $i++): ?>
            <li class="page-item <?php echo e($i == $currentPage ? 'active' : ''); ?>">
                <a class="page-link" href="<?php echo e($paginator->url($i)); ?>"><?php echo e($i); ?></a>
            </li>
        <?php endfor; ?>
        
        
        <?php if($end < $lastPage): ?>
            <?php if($end < $lastPage - 1): ?>
                <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
            <?php endif; ?>
            <li class="page-item"><a class="page-link" href="<?php echo e($paginator->url($lastPage)); ?>"><?php echo e($lastPage); ?></a></li>
        <?php endif; ?>
        
        
        

        <?php if($paginator->hasMorePages()): ?>
            <li class="page-item"> <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="page-link">Next</a> </li>
        <?php else: ?>
            <li class="page-item disabled"> <a href="#" class="page-link">Next</a> </li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>
</div><?php /**PATH F:\KDS- ARPIN\CSB-New\typeform-dashboard\resources\views/typeform/partials/pagination.blade.php ENDPATH**/ ?>