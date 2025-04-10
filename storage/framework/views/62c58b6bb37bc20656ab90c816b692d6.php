<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu" >
    <!-- LOGO -->
    <?php

        /**if(auth()->user()->role->name == 'superadmin'){
            $organizationLogo = auth()->user()->organization ? asset('storage/'.auth()->user()->organization->logo) :  URL::asset('build/images/iep_logo.png');
        }else{**/
            //$organizationLogo = auth()->user()->organization->logo ? asset('storage/'.auth()->user()->organization->logo) :  URL::asset('build/images/iep_logo.png');
        //}
    
   ?>
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="<?php echo e(route('home.index')); ?>" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/iep_logo.png')); ?>" alt="" width="120">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/iep_logo.png')); ?>" alt="" width="120">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="<?php echo e(route('home.index')); ?>" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('images/small-logo.png')); ?>" alt="">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/iep_logo.png')); ?>" alt="" width="120">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div>
        <p class="aside-tag">Community Strength Barometer</p>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('home.index')); ?>">
                    <i class="fa-solid fa-gauge"></i> <span>Dashboard</span>
                    </a>
                </li>
                

                
                <?php if(hasPermissionToRoute('user.index') || hasPermissionToRoute('role.index') || hasPermissionToRoute('permission.index') || hasPermissionToRoute('user.password-change')): ?>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUser" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarUser">
                        <i class="fa-solid fa-user"></i> <span>User Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUser">
                        <ul class="nav nav-sm flex-column">
                            <?php if(hasPermissionToRoute('user.index')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('user.index')); ?>" class="nav-link">User</a>
                            </li>
                            <?php endif; ?>
                            <?php if(hasPermissionToRoute('role.index')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('role.index')); ?>" class="nav-link">Role</a>
                            </li>
                            <?php endif; ?>
                            <?php if(auth()->user()->role->name == 'krizmatic'): ?>
                            <?php if(hasPermissionToRoute('permission.index')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('permission.index')); ?>" class="nav-link">Permission</a>
                            </li>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if(hasPermissionToRoute('user.password-change')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('user.password-change')); ?>" class="nav-link">Reset Password</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>
                

                
                <?php if(hasPermissionToRoute('organization.index')): ?>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('organization.index')); ?>">
                    <i class="fa-solid fa-building-columns"></i> <span>Organization</span>
                    </a>
                </li>
                <?php endif; ?>
                

                
                <?php if(hasPermissionToRoute('branch.index')): ?>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('branch.index')); ?>">
                    <i class="fa-solid fa-landmark-flag"></i> <span>Divisions</span>
                    </a>
                </li>
                <?php endif; ?>
                

                
                <?php if(hasPermissionToRoute('form.index')): ?>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('form.index')); ?>">
                    <i class="fa-solid fa-file"></i> <span>Survey Management</span>
                    </a>
                </li>
                <?php endif; ?>
                

                 
                 <?php if(hasPermissionToRoute('survey.index')): ?>
                 <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('survey.index')); ?>">
                    <i class="fa-solid fa-clipboard-list"></i> <span>Survey Data</span>
                    </a>
                </li>
                <?php endif; ?>
                

                 
                 <?php if(hasPermissionToRoute('about.index')): ?>
                 <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('about.index')); ?>">
                    <i class='bx bxs-info-circle'></i> <span>About</span>
                    </a>
                </li>
                <?php endif; ?>
                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div><?php /**PATH /home/krizmaticcomau/projects.krizmatic.com.au/TypeForm-New/resources/views/typeform/partials/sidebar.blade.php ENDPATH**/ ?>