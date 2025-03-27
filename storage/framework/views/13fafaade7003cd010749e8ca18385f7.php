<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>

<!--preloader-->
<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>


<!--end back-to-top-->
<!-- <div class="customizer-setting d-none d-md-block">
    <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
        data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
        <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
    </div>
</div> -->

<!-- Theme Settings -->
<div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
    <div class="d-flex align-items-center bg-offcanvas bg-gradient p-3 offcanvas-header">
        <h5 class="m-0 me-2 text-white" id="info_title"></h5>

        <button type="button" class="btn-close btn-close-white ms-auto" id="customizerclose-btn"
            data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="info-content p-3" id="info_content">
                

        </div>

    </div>
    <div class="offcanvas-footer border-top p-3 text-center">
        <p class="p-0 m-0">© CSB: <a href="<?php echo e(route('home.index')); ?>" target="_blank" class="text-decoration-underline">Survey Data Source</a></p>
    </div>
</div><?php /**PATH E:\New Advance Project\typeform-dashboard\resources\views/typeform/partials/customizer.blade.php ENDPATH**/ ?>