<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.crm'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet">
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!--greeting section -->

    <div class="mb-3 pb-1 d-flex align-items-center flex-row">
        <div class="flex-grow-1">
            <h4 class="fs-16 mb-1">User Management</h4>
        </div>
    </div>

    <!--end greeting section-->
    <!--form section top -->
    <div class="form-top-bar mb-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="flex-shrink-0">
                <div class="d-flex gap-1 flex-wrap">

                    <a href="<?php echo e(route('user.create')); ?>" class="btn btn-info add-btn"><i
                            class="ri-add-line align-bottom me-1"></i> Create
                        User</a>
                </div>
            </div>
            
        </div>
    </div>

    <!--form section starts here -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">User Lists</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="scroll-horizontal" class="table nowrap align-middle table-bordered " style="width:100%">
                            <thead class="table-head">
                                <tr>
                                    <th>S.No.</th>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Organization</th>
                                    <th>Role</th>
                                    
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($user->serial_no); ?></td>
                                        <td>
                                            <?php
                                                $profile =  $user->avatar ? asset('storage/'.$user->avatar) : asset('build/images/users/user-default.png');
                                            ?>
                                            <img src="<?php echo e($profile); ?>" alt="<?php echo e($user->name); ?>" width="45" style="border-radius:50%;height: 45px;object-fit:contain;">
                                        </td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e(optional($user->organization)->name); ?></td>
                                        <td><span class="role-batch"><?php echo e(optional($user->role)->name); ?></span></td>
                                        
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>

                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="<?php echo e(route('user.show', $user)); ?>"
                                                            class="dropdown-item"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View</a>
                                                    </li>
                                                    <?php if($user->role->name !== 'superadmin'): ?>
                                                    <?php if((auth()->user()->role->name=="organization" && $user->role->name!=="organization") || auth()->user()->role->name!=="organization" || auth()->user()->id == $user->id): ?>
                                                    <li><a href="<?php echo e(route('user.edit',$user)); ?>" class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a>
                                                    </li>
                                                    <?php if(auth()->user()->id !== $user->id): ?>
                                                    <li>
                                                        <button class="dropdown-item remove-item-btn"
                                                            data-item-id="<?php echo e($user->id); ?>"
                                                            data-item-name="<?php echo e($user->name); ?>" data-bs-toggle="modal"
                                                            data-bs-target="#zoomInModal">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </button>
                                                    </li>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!--tfooter section-->
                    <?php echo $__env->make('typeform.partials.pagination', ['paginator' => $users], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--form section ends here-->
    </div>
    </div>

    </div>
    <!--end col-->
    </div>
    <!--end row-->
    <!--form section ends here-->

    <!-- Modal Blur -->
    <?php echo $__env->make('typeform.partials.deleteModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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




    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="<?php echo e(URL::asset('build/js/pages/datatables.init.js')); ?>"></script>

    <script>
        document.querySelectorAll('.remove-item-btn').forEach(button => {
            button.addEventListener('click', function() {
                var itemId = this.getAttribute('data-item-id');
                var itemName = this.getAttribute('data-item-name');

                //Set the organization Id in the hidden input field
                document.getElementById('delete_item_id').value = itemId;

                //Set the organization name
                document.getElementById('delete_item').textContent = itemName;

                //Set Item Description
                document.getElementById('delete_item_description').innerHTML = 'Deleting this item will permanently remove it from the system.';

                var deleteForm = document.getElementById('deleteForm');
                
                var baseUrl = window.location.origin+window.location.pathname;
    
                deleteForm.action = baseUrl+ '/' + itemId;

            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/prateeklalwani/Desktop/Typeform Main/typeform-dashboard/resources/views/typeform/users/index.blade.php ENDPATH**/ ?>