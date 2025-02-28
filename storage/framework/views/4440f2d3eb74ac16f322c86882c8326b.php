
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.crm'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet">
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
    type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--greeting section -->

<div class="mb-3 pb-1 d-flex align-items-center flex-row">
    <div class="flex-grow-1">
        <h4 class="fs-16 mb-1">Form Management</h4>
        <p class="text-muted mb-0">Create and manage forms easily accessing the form information.</p>
    </div>
</div>

<!--end greeting section-->
<!--form section top -->
<div class="form-top-bar mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <div class="flex-shrink-0">
            <div class="d-flex gap-1 flex-wrap">

                <button type="button" class="btn btn-info add-btn" data-bs-toggle="modal" id="create-btn"
                    data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Create
                    Form</button>
            </div>
        </div>
        <div class="flex-shrink-0">
            <div class="d-flex flex-row gap-2 align-items-center">
                <!--info here-->
                <button type="button" class="btn btn-success"><i class="ri-file-download-line align-bottom me-1"></i>

                    Export</button>

                <a class="icon-frame" href="#" class="m-0 p-0 d-flex justify-content-center align-items-center">

                    <img class="svg-icon" type="image/svg+xml" src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                </a>
                <a class="icon-frame" href="#" class="m-0 p-0 d-flex justify-content-center align-items-center">

                    <img class="svg-icon" type="image/svg+xml" src="<?php echo e(URL::asset('build/icons/info.svg')); ?>"></img>

                </a>
            </div>
        </div>
    </div>
</div>

<!--form section top -->
<!--form section starts here-->

<div class="row">
    <div class="col-lg-12">
        <div class="card " id="applicationList">
            <div class="card-header  ">
                <div class="d-md-flex align-items-center">
                    <h5 class="card-title mb-3 mb-md-0 flex-grow-1">Form Lists</h5>

                </div>
            </div>

            <div class="card-body">
                <div class="d-flex flex-row align-items-center justify-content-between pb-3">
                    <div class="d-flex flex-row align-items-center gap-1"><span>Showing</span>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>10</option>
                            <option value="1">20</option>
                            <option value="2">50</option>
                            <option value="3">100</option>
                        </select>
                        <span>entries</span>
                    </div>
                    <div class="row">
                        <div class="col-auto d-flex justify-content-sm-end">
                            <div class="search-box">
                                <input type="text" class="form-control" id="searchProductList" placeholder="Search">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>

                        <div class="col-auto">
                            <select class="form-select " aria-label="Default select example">
                                <option selected>Country </option>
                                <option value="1">Australia</option>
                                <option value="2">USA</option>
                                <option value="3">India</option>
                                <option value="4">Nepal</option>

                            </select>
                        </div>
                        <div class="col-auto">


                            <div class="col-auto">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Project</option>
                                    <option value="1">Project1</option>
                                    <option value="2">Project2</option>
                                    <option value="3">Project3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3">


                    <div class="card-body">
                        <table id="scroll-vertical"
                            class="table table-bordered dt-responsive nowrap align-middle mdl-data-table"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Project</th>
                                    <th>Task</th>
                                    <th>Client Name</th>
                                    <th>Assigned To</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>VLZ-452</td>
                                    <td>Symox v1.0.0</td>
                                    <td><a href="#!">Add Dynamic Contact List</a></td>
                                    <td>RH Nichols</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-3.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-3.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>03 Oct, 2021</td>
                                    <td><span class="badge bg-info-subtle text-info">Re-open</span></td>
                                    <td><span class="badge bg-danger">High</span></td>
                                </tr>
                                <tr>
                                    <td>VLZ-453</td>
                                    <td>Doot - Chat App Template</td>
                                    <td><a href="#!">Additional Calendar</a></td>
                                    <td>Diana Kohler</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-4.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-4.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-5.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-5.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>05 Oct, 2021</td>
                                    <td><span class="badge bg-secondary-subtle text-secondary">On-Hold</span></td>
                                    <td><span class="badge bg-info">Medium</span></td>
                                </tr>
                                <tr>
                                    <td>VLZ-454</td>
                                    <td>Qexal - Landing Page</td>
                                    <td><a href="#!">Make a creating an account profile</a></td>
                                    <td>David Nichols</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-6.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-6.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-7.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-7.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-8.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-8.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>27 April, 2022</td>
                                    <td><span class="badge bg-danger-subtle text-danger">Closed</span></td>
                                    <td><span class="badge bg-success">Low</span></td>
                                </tr>
                                <tr>
                                    <td>VLZ-455</td>
                                    <td>Dorsin - Landing Page</td>
                                    <td><a href="#!">Apologize for shopping Error!</a></td>
                                    <td>Tonya Noble</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-6.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-6.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-7.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-7.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>14 June, 2021</td>
                                    <td><span class="badge bg-warning-subtle text-warning">Inprogress</span></td>
                                    <td><span class="badge bg-info">Medium</span></td>
                                </tr>
                                <tr>
                                    <td>VLZ-456</td>
                                    <td>Minimal - v2.1.0</td>
                                    <td><a href="#!">Support for theme</a></td>
                                    <td>Donald Palmer</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-2.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-2.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>25 June, 2021</td>
                                    <td><span class="badge bg-danger-subtle text-danger">Closed</span></td>
                                    <td><span class="badge bg-success">Low</span></td>
                                </tr>
                                <tr>
                                    <td>VLZ-457</td>
                                    <td>Dason - v1.0.0</td>
                                    <td><a href="#!">Benner design for FB & Twitter</a></td>
                                    <td>Jennifer Carter</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-5.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-5.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-6.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-6.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-7.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-7.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-8.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-8.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>14 Aug, 2021</td>
                                    <td><span class="badge bg-warning-subtle text-warning">Inprogress</span></td>
                                    <td><span class="badge bg-info">Medium</span></td>
                                </tr>
                                <tr>
                                    <td>VLZ-458</td>
                                    <td>Velzon v1.6.0</td>
                                    <td><a href="#!">Add datatables</a></td>
                                    <td>James Morris</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-4.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-4.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-5.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-5.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>12 March, 2022</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Open</span></td>
                                    <td><span class="badge bg-danger">High</span></td>
                                </tr>
                                <tr>
                                    <td>VLZ-460</td>
                                    <td>Skote v2.0.0</td>
                                    <td><a href="#!">Support for theme</a></td>
                                    <td>Nancy Martino</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-3.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-3.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-10.jpg" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-10.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-9.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-9.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>28 Feb, 2022</td>
                                    <td><span class="badge bg-secondary-subtle text-secondary">On-Hold</span></td>
                                    <td><span class="badge bg-success">Low</span></td>
                                </tr>
                                <tr>
                                    <td>VLZ-461</td>
                                    <td>Velzon v1.0.0</td>
                                    <td><a href="#!">Form submit issue</a></td>
                                    <td>Grace Coles</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-5.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-5.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-9.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-9.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-10.jpg" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-10.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>07 Jan, 2022</td>
                                    <td><span class="badge bg-success-subtle text-success">New</span></td>
                                    <td><span class="badge bg-danger">High</span></td>
                                </tr>
                                <tr>
                                    <td>VLZ-462</td>
                                    <td>Minimal - v2.2.0</td>
                                    <td><a href="#!">Edit customer testimonial</a></td>
                                    <td>Freda</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-2.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-2.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>16 Aug, 2021</td>
                                    <td><span class="badge bg-danger-subtle text-danger">Closed</span></td>
                                    <td><span class="badge bg-info">Medium</span></td>
                                </tr>
                                <tr>
                                    <td>VLZ-454</td>
                                    <td>Qexal - Landing Page</td>
                                    <td><a href="#!">Make a creating an account profile</a></td>
                                    <td>David Nichols</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-6.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-6.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-7.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-7.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-8.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-8.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>27 April, 2022</td>
                                    <td><span class="badge bg-danger-subtle text-danger">Closed</span></td>
                                    <td><span class="badge bg-success">Low</span></td>
                                </tr>
                                <tr>
                                    <td>VLZ-455</td>
                                    <td>Dorsin - Landing Page</td>
                                    <td><a href="#!">Apologize for shopping Error!</a></td>
                                    <td>Tonya Noble</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-6.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-6.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-7.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-7.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>14 June, 2021</td>
                                    <td><span class="badge bg-warning-subtle text-warning">Inprogress</span></td>
                                    <td><span class="badge bg-info">Medium</span></td>
                                </tr>
                                <tr>
                                    <td>VLZ-456</td>
                                    <td>Minimal - v2.1.0</td>
                                    <td><a href="#!">Support for theme</a></td>
                                    <td>Donald Palmer</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-2.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-2.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>25 June, 2021</td>
                                    <td><span class="badge bg-danger-subtle text-danger">Closed</span></td>
                                    <td><span class="badge bg-success">Low</span></td>
                                </tr>
                                <tr>
                                    <td>VLZ-457</td>
                                    <td>Dason - v1.0.0</td>
                                    <td><a href="#!">Benner design for FB & Twitter</a></td>
                                    <td>Jennifer Carter</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-5.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-5.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-6.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-6.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-7.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-7.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>

                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-img="avatar-8.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Username">
                                                <img src="<?php echo e(URL::asset('build/images/users/avatar-8.jpg')); ?>" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </td>
                                    <td>14 Aug, 2021</td>
                                    <td><span class="badge bg-warning-subtle text-warning">Inprogress</span></td>
                                    <td><span class="badge bg-info">Medium</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!--tfooter section-->

                <div class="align-items-center mt-xl-3 mt-4 justify-content-between d-flex">
                    <div class="flex-shrink-0">
                        <div class="text-muted">Showing <span class="fw-semibold">5</span> of <span
                                class="fw-semibold">25</span> Results
                        </div>
                    </div>
                    <ul class="pagination pagination-separated pagination-sm mb-0">
                        <li class="page-item disabled">
                            <a href="#" class="page-link">Previous</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">1</a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">Next</a>
                        </li>
                    </ul>
                </div>

                <!--tfooter section-->


                <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                            </div>
                            <form class="tablelist-form" autocomplete="off">
                                <div class="modal-body">
                                    <input type="hidden" id="id-field" />

                                    <div class="mb-3 d-none" id="modal-id">
                                        <label for="applicationId" class="form-label">ID</label>
                                        <input type="text" id="applicationId" class="form-control" placeholder="ID"
                                            readonly />
                                    </div>

                                    <div class="text-center">
                                        <div class="position-relative d-inline-block">
                                            <div class="position-absolute  bottom-0 end-0">
                                                <label for="companylogo-image-input" class="mb-0"
                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                    title="Select Image">
                                                    <div class="avatar-xs cursor-pointer">
                                                        <div
                                                            class="avatar-title bg-light border rounded-circle text-muted">
                                                            <i class="ri-image-fill"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input class="form-control d-none" value="" id="companylogo-image-input"
                                                    type="file" accept="image/png, image/gif, image/jpeg">
                                            </div>
                                            <div class="avatar-lg p-1">
                                                <div class="avatar-title bg-light rounded-circle">
                                                    <img src="<?php echo e(URL::asset('build/images/users/multi-user.jpg')); ?>"
                                                        id="companylogo-img"
                                                        class="avatar-md h-auto rounded-circle object-fit-cover" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="company-field" class="form-label">Company</label>
                                        <input type="text" id="company-field" class="form-control"
                                            placeholder="Enter company name" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="designation-field" class="form-label">Designation</label>
                                        <input type="text" id="designation-field" class="form-control"
                                            placeholder="Enter designation" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="date-field" class="form-label">Apply Date</label>
                                        <input type="date" id="date-field" class="form-control"
                                            data-provider="flatpickr" data-date-format="d M, Y" required
                                            placeholder="Select date" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="contact-field" class="form-label">Contacts</label>
                                        <input type="text" id="contact-field" class="form-control"
                                            placeholder="Enter contact" required />
                                    </div>

                                    <div class="row gy-4 mb-3">
                                        <div class="col-md-6">
                                            <div>
                                                <label for="status-input" class="form-label">Status</label>
                                                <select class="form-control" data-trigger name="status-input"
                                                    id="status-input">
                                                    <option value="">Status</option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="New">New</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Rejected">Rejected</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <label for="type-input" class="form-label">Type</label>
                                                <select class="form-control" data-trigger name="type-input"
                                                    id="type-input">
                                                    <option value="">Select Type</option>
                                                    <option value="Full Time">Full Time</option>
                                                    <option value="Part Time">Part Time</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="add-btn">Add</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body p-5 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                    colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px">
                                </lord-icon>
                                <div class="mt-4 text-center">
                                    <h4>You are about to delete a order ?</h4>
                                    <p class="text-muted fs-15 mb-4">Deleting your order will remove all of your
                                        information from our database.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                        <button class="btn btn-link link-success fw-medium text-decoration-none"
                                            id="deleteRecord-close" data-bs-dismiss="modal"><i
                                                class="ri-close-line me-1 align-middle"></i> Close</button>
                                        <button class="btn btn-danger" id="delete-record">Yes, Delete It</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal -->
            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->
<!--form section ends here-->



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- list.js min js -->
<script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>

<!--list pagination js-->
<script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>

<!-- ecommerce-order init js -->
<script src="<?php echo e(URL::asset('build/js/pages/job-application.init.js')); ?>"></script>

<!-- Sweet Alerts js -->
<script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

<!-- App js -->
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->

<script src="<?php echo e(URL::asset('build/js/pages/datatables.init.js')); ?>"></script>



<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\CSB 2025\typeform-dashboard\resources\views/typeform/form/index.blade.php ENDPATH**/ ?>