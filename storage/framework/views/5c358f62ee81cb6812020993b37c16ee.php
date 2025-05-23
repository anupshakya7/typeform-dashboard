<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.crm'); ?> <?php $__env->stopSection(); ?>
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
        <h4 class="fs-16 mb-1">Survey Management</h4>
        <p class="text-muted mb-0">Create and manage survey easily accessing the survey information.</p>
    </div>
</div>

<!--end greeting section-->
<!--form section top -->
<div class="form-top-bar mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <div class="flex-shrink-0">
            <div class="d-flex gap-1 flex-wrap">

                <a href="<?php echo e(route('form.create')); ?>" class="btn btn-info add-btn"><i class="ri-add-line align-bottom me-1"></i> Create
                    Survey</a>
            </div>
        </div>
        <div class="flex-shrink-0">
            <div class="d-flex flex-row gap-2 align-items-center">
                <!--info here-->
                <a href="<?php echo e(route('form.csv',['search_title'=> request('search_title'),'country'=>request('country'),'organization'=>request('organization'),'branch'=>request('branch'),'survey'=>request('survey') ])); ?>" type="button" class="btn btn-success"><i class="ri-file-download-line align-bottom me-1"></i>
                    Export</a>
                
            </div>
        </div>
    </div>
</div>

<!--form section starts here -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Survey Lists</h5>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row align-items-center justify-content-between pb-3">
                    <div class="d-flex flex-row align-items-center gap-1">
                        
                    </div>
                    <form action="<?php echo e(route('form.index')); ?>" method="GET" id="form_search" style="display: inline-block">
                    <div class="row dashboard g-3">
                            <div class="col-auto d-flex justify-content-sm-end">
                                <div class="search-box"> <input type="text" class="form-control" value="<?php echo e(request('search_title')); ?>" name="search_title" onkeyup="debounceSearch()" id="searchProductList"
                                        placeholder="Search"> <i class="ri-search-line search-icon"></i> </div>
                            </div>
                            <div class="col-auto"> 
                                <select class="form-select select2" name="country" aria-label="Default select example" onchange="this.form.submit()">
                                    <option value="" selected>Select Country </option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->country); ?>" <?php echo e(request('country') == $country->country ? 'selected':''); ?>><?php echo e($country->country); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select> </div>
                            <div class="col-auto">
                                <div class="col-auto"> 
                                    <select class="form-select select2" name="organization" aria-label="Default select example" onchange="this.form.submit()">
                                        <option value="" selected>Select Organization</option>
                                        <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($organization->id); ?>" <?php echo e(request('organization') == $organization->id ? 'selected':''); ?>><?php echo e($organization->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select> </div>
                            </div>
                            <div class="col-auto">
                                <div class="col-auto"> 
                                    <select class="form-select select2" name="branch" id="branch" aria-label="Default select example" onchange="this.form.submit()" disabled>
                                        <option value="" selected>Select Division</option>
                                        
                                    </select> </div>
                            </div>

                            <div class="col-auto">
                                <div class="col-auto"> 
                                    <select class="form-select select2" name="survey" id="survey" aria-label="Default select example" onchange="this.form.submit()" disabled>
                                        <option value="" selected>Select Survey</option>
                                        
                                    </select> </div>
                            </div>
                    </div>
                </form>
                </div>
            
                <div class="table-responsive">
                    <table id="scroll-horizontal" class="table nowrap align-middle table-bordered " style="width:100%">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">
                                   S.No.
                                </th>
                                <th>Survey ID</th>
                                <th>Survey Name</th>
                                <th>Country</th>
                                <th>Webhook</th>
                                <th>Organization</th>
                                <th>Division</th>
                                <th>Before Survey</th>
                                <th>During Survey</th>
                                <th>After Survey</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row">
                                    <?php echo e($form->serial_no); ?>

                                </th>
                                <td><?php echo e($form->form_id); ?></td>
                                <td><?php echo e($form->form_title); ?></td>
                                <td><?php echo e($form->country); ?></td>
                                <!-- <td>
                                    <?php echo e($form->webhook == 1 ? 'Active':'Inactive'); ?></td> -->
                                    <td>
                                    <span class="<?php echo e($form->webhook == 1 ? 'webhook-active' : 'webhook-inactive'); ?>"><?php echo e($form->webhook == 1 ? 'Active' : 'Inactive'); ?></span>
                                </td>
                                <td><?php echo e(optional($form->organization)->name); ?></td>
                                

                                <td><?php echo e($form->branches ? optional($form->branches)->name : 'Head Office'); ?></td>
                                <td><?php echo e($form->before); ?> </td>
                                <td><?php echo e($form->during); ?></td>
                                <td><?php echo e($form->after); ?></td>
                                <td><?php echo e(Carbon\Carbon::parse($form->created_at)->format('d M, Y')); ?></td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="<?php echo e(route('form.show',$form)); ?>" class="dropdown-item"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                            </li>
                                            <li><a href="<?php echo e(route('form.question',$form)); ?>" class="dropdown-item"><i class="fa-solid fa-question align-bottom me-2 mb-1 text-muted"></i>Questions</a>
                                            </li>
                                            <li><a href="<?php echo e(route('form.edit',$form)); ?>" class="dropdown-item edit-item-btn"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit</a>
                                            </li>
                                            <li>
                                                <button class="dropdown-item remove-item-btn"
                                                    data-item-id="<?php echo e($form->id); ?>"
                                                    data-item-name="<?php echo e($form->form_title); ?>"
                                                    data-bs-toggle="modal" data-bs-target="#zoomInModal">
                                                    <i
                                                        class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Delete
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!--tfooter section-->
                <?php echo $__env->make('typeform.partials.pagination',['paginator' => $forms], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
           
        </div>
    </div>
    <!--end col-->
</div>
<!--form section ends here-->


 <!-- Modal Blur -->
 <?php echo $__env->make('typeform.partials.deleteModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                    

<!-- Modal -->

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
                document.getElementById('delete_item_description').innerHTML =
                    'Deleting this item will permanently remove it from the system, <span class="text-danger"> along with all questions which are part of this form</span';

                var deleteForm = document.getElementById('deleteForm');
                
                var currentUrl = window.location.href;
                        
                var url = new URL(currentUrl);

                var baseUrl = url.origin+url.pathname;

                deleteForm.action = baseUrl + '/' + itemId;

            })
        });

        let debounceTimeout;

        function debounceSearch(){
            clearTimeout(debounceTimeout);

            debounceTimeout = setTimeout(function(){
                document.getElementById('form_search').submit();
            },800);
        }

        $(document).ready(function(){
            function getQueryParams(param) {
                var urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }

            var country_name = getQueryParams('country');
            var organization_id = getQueryParams('organization');
            var branch_id = getQueryParams('branch');
            var survey_id = getQueryParams('survey');

            if(country_name !== null){
                filterSurvey();
            }

            if(organization_id !== null){
                filterBranch();
                filterSurvey();
            }

            if(branch_id !== null){
                filterSurvey();
            }


            function filterBranch(callback) {
                var organizationVal = organization_id;

                if (organizationVal !== '') {
                    $.ajax({
                        url: "<?php echo e(route('branch.get')); ?>",
                        method: 'GET',
                        data: {
                            organization_id: organizationVal
                        },
                        success: function(response) {
                            $('#branch').prop('disabled', false);
                            $('#branch').html('');
                            $('#branch').append('<option value="" selected>Select Division</option>');

                            var userRole = <?php echo json_encode(auth()->user()->role->name, 15, 512) ?>;
                            var userBranchId = <?php echo json_encode(auth()->user()->branch_id, 15, 512) ?>;

                        
                            var branchList = response.branches.filter(function(branch){
                                if(userRole == "division"){
                                    let branchIds = Array.isArray(userBranchId) ? userBranchId : userBranchId.split(', ');
                                    return branchIds.includes(branch.id.toString());
                                }

                                return true;
                            });
                            
                            branchList.forEach(function(branchItem) {
                                // $('#branch').append(new Option(branch.name,
                                // branch.id));
                                var option = new Option(branchItem.name, branchItem.id);
                                $('#branch').append(option);

                                if (branch_id && branch_id == branchItem.id) {
                                    $(option).prop('selected', true);
                                }
                            });

                            if (callback && typeof callback == 'function') {
                                callback();
                            }

                            isFirstLoad = false;
                        },
                        error: function(xhr, status, error) {
                            $('#branch').prop('disabled', true);
                            $('#branch').html('');
                            $('#branch').append('<option value="" selected>Select Division</option>');
                        }
                    })
                }
            }

            function filterSurvey() {
                var countryVal = country_name;
                var organizationVal = organization_id;
                var branchVal = branch_id;

                if (organizationVal !== '' || countryVal !=='') {
                    $.ajax({
                        url: "<?php echo e(route('survey.get')); ?>",
                        method: 'GET',
                        data: {
                            country: countryVal,
                            organization_id: organizationVal,
                            branch_id: branchVal
                        },
                        success: function(response) {
                            $('#survey').prop('disabled', false);
                            $('#survey').html('');
                            $('#survey').append('<option value="" selected>Select Survey</option>');
                            response.forms.forEach(function(formItem) {
                                // $('#survey').append(new Option(form.form_title,
                                // form.id));
                                var option = new Option(formItem.form_title, formItem.form_id);
                                $('#survey').append(option);

                                if (survey_id && survey_id == formItem.form_id) {
                                    $(option).prop('selected', true);
                                }
                            });

                        },
                        error: function(xhr, status, error) {
                            $('#survey').prop('disabled', true);
                            $('#survey').html('');
                            $('#survey').append('<option value="" selected>Select Survey</option>');
                        }
                    })
                }
            }
        });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/krizmaticcomau/projects.krizmatic.com.au/TypeForm-New/resources/views/typeform/form/index.blade.php ENDPATH**/ ?>