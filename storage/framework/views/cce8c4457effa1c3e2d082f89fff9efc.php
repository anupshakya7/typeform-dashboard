
<!--new filter-->
<div class="row mb-3">
    <?php if($formDetails->form_type == 0): ?>
    <div class="col-12 col-sm-10 col-md-9">
        <div class="filter-section show-filter d-flex flex-column align-content-stretch justify-content-start h-100">
            <div class="mb-2">
                <?php
                    $user = auth()->user()->role->name;
                    if ($user == 'superadmin') {
                        $lastText = ' or Organisation';
                    } elseif ($user == 'organization') {
                        $lastText = ' or Division';
                    } else {
                        $lastText = '';
                    }
                ?>
                <h5 class="my-1" style="font-size:16px;color: #333;">Showing insights for
                    <b><?php echo e($formDetails->form_title); ?></b>. <span class="survey-type">Country Survey</span>
                        <?php if($user !== 'survey'): ?>
                            <br><span>Use the filters below to switch between different surveys or refine your results
                                by Country<?php echo e($lastText); ?>.</span></h5>
                <?php endif; ?>
            </div>

            <div class="mt-3 mt-lg-0 d-flex justify-content-between flex-wrap gap-3">
                <form action="<?php echo e(route('home.index')); ?>" method="GET">
                    <div class="row gap-3 m-0 p-0 dashboard flex-nowra align-items-center">
                        
                        <div class="col-auto p-0">
                            <?php if(auth()->user()->role->name == 'superadmin'): ?>
                                <select class="form-select select2" id="organization" name="organization"
                                    aria-label="Default select example">
                                    <option value="" selected>Select Organization</option>
                                    <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($organization->id); ?>"
                                            <?php echo e(($filterData && $filterData->organization_id == $organization->id) || request('organization') == $organization->id || $selectedOrganizationwithSurvey == $organization->id ? 'selected' : ''); ?>>
                                            <?php echo e($organization->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php else: ?>
                                <input type="text" class="form-control organization-name"
                                    value="<?php echo e(auth()->user()->organization->name); ?>" readonly>
                                <input type="hidden" name="organization" class="form-control"
                                    value="<?php echo e(old('organization', auth()->user()->organization_id)); ?>" id="organization"
                                    readonly>
                            <?php endif; ?>
                        </div>

                        <div class="col-auto p-0">
                            
                            <select class="form-select select2" id="branch" name="branch"
                                aria-label="Default select example" disabled>
                                <option value="" selected>Select Division</option>
                            </select>
                            
                        </div>
                        <div class="col-auto p-0">
                            
                            <select class="form-select select2" name="survey" id="survey"
                                aria-label="Default select example">
                                <option value="" selected>Select Survey</option>
                                <?php $__currentLoopData = $surveyForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surveyForm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($surveyForm->form_title); ?>"
                                        <?php echo e(($filterData && $filterData->form_id == $surveyForm->form_id) || request('survey') == $surveyForm->form_id ? 'selected' : ''); ?>>
                                        <?php echo e($surveyForm->form_title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                        </div>
                        <div class="col-auto p-0">
                            <select class="form-select select2" name="country" id="country"
                                aria-label="Default select example">
                                <option value="">Select Country</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->country); ?>"
                                        <?php echo e(($filterData && $filterData->country == $country->country) || request('country') == $country->country || $selectedCountrywithSurvey == $country->country ? 'selected' : ''); ?>>
                                        <?php echo e($country->country); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-auto p-0">
                            <select class="form-select select2" name="state" id="state" aria-label="Default select example">
                                        <option value="" selected>Select State</option>
                                        <option value="Bagmati">Bagmati</option>
                                        <option value="Gandaki">Gandaki</option>
                                        <option value="Lumbini">Lumbini</option>
                                        <option value="Koshi">Koshi</option>
                                        <option value="Madhesh">Madhesh</option>
                                        <option value="Sudurpashchim">Sudurpashchim</option>
                                        <option value="Karnali">Karnali</option>
                                    </select>
                                    
                        </div>
                        
                        
                        
                        
                        <div class="col-auto p-0">
                            <button href="#" class="view-insight-btn" id="filter_btn"
                                onclick="this.form.submit();" <?php echo e(request('survey') ? '' : 'disabled'); ?>>
                                <span>View Insight</span>
                                <i class='bx bx-arrow-back bx-rotate-180'></i>
                            </button>

                        </div>

                        
                    </div>

            </div>

            </form>

        </div>
    </div>
    <?php elseif($formDetails->form_type == 1): ?>
    <div class="col-12 col-sm-10 col-md-9">
        <div class="filter-section show-filter d-flex flex-column align-content-stretch justify-content-start h-100">
            <div class="mb-2">
                <?php
                    $user = auth()->user()->role->name;
                    if ($user == 'superadmin') {
                        $lastText = ' or Organisation';
                    } elseif ($user == 'organization') {
                        $lastText = ' or Division';
                    } else {
                        $lastText = '';
                    }
                ?>
                <h5 class="my-1" style="font-size:16px;color: #333;">Showing insights for
                    <b><?php echo e($formDetails->form_title); ?></b>. <span class="survey-type">Global Survey</span>
                        <?php if($user !== 'survey'): ?>
                            <br><span>Use the filters below to switch between different surveys or refine your results
                                by Country<?php echo e($lastText); ?>.</span></h5>
                <?php endif; ?>
            </div>

            <div class="mt-3 mt-lg-0 d-flex justify-content-between flex-wrap gap-3">
                <form action="<?php echo e(route('home.index')); ?>" method="GET">
                    <div class="row gap-3 m-0 p-0 dashboard flex-nowra align-items-center">
                        <div class="col-auto p-0">
                            <?php if(auth()->user()->role->name == 'superadmin'): ?>
                                <select class="form-select select2" id="organization" name="organization"
                                    aria-label="Default select example">
                                    <option value="" selected>Select Organization</option>
                                    <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($organization->id); ?>"
                                            <?php echo e(($filterData && $filterData->organization_id == $organization->id) || request('organization') == $organization->id || $selectedOrganizationwithSurvey == $organization->id ? 'selected' : ''); ?>>
                                            <?php echo e($organization->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php else: ?>
                                <input type="text" class="form-control organization-name"
                                    value="<?php echo e(auth()->user()->organization->name); ?>" readonly>
                                <input type="hidden" name="organization" class="form-control"
                                    value="<?php echo e(old('organization', auth()->user()->organization_id)); ?>" id="organization"
                                    readonly>
                            <?php endif; ?>
                        </div>

                        <div class="col-auto p-0">
                            
                            <select class="form-select select2" id="branch" name="branch"
                                aria-label="Default select example" disabled>
                                <option value="" selected>Select Division</option>
                            </select>
                            
                        </div>
                        <div class="col-auto p-0">
                            
                            <select class="form-select select2" name="survey" id="survey"
                                aria-label="Default select example">
                                <option value="" selected>Select Survey</option>
                                <?php $__currentLoopData = $surveyForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surveyForm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($surveyForm->form_title); ?>"
                                        <?php echo e(($filterData && $filterData->form_id == $surveyForm->form_id) || request('survey') == $surveyForm->form_id ? 'selected' : ''); ?>>
                                        <?php echo e($surveyForm->form_title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                        </div>
                        <div class="col-auto p-0">
                            <button href="#" class="view-insight-btn" id="filter_btn"
                                onclick="this.form.submit();" <?php echo e(request('survey') ? '' : 'disabled'); ?>>
                                <span>View Insight</span>
                                <i class='bx bx-arrow-back bx-rotate-180'></i>
                            </button>

                        </div>
                        <div class="col-auto p-0">
                            <select class="form-select select2" name="country" id="country"
                                aria-label="Default select example">
                                <option value="">Select Country</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->country); ?>"
                                        <?php echo e(($filterData && $filterData->country == $country->country) || request('country') == $country->country || $selectedCountrywithSurvey == $country->country ? 'selected' : ''); ?>>
                                        <?php echo e($country->country); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-auto p-0">
                            <select class="form-select select2" name="state" id="state" aria-label="Default select example">
                                        <option value="" selected>Select State</option>
                                        <option value="Bagmati">Bagmati</option>
                                        <option value="Gandaki">Gandaki</option>
                                        <option value="Lumbini">Lumbini</option>
                                        <option value="Koshi">Koshi</option>
                                        <option value="Madhesh">Madhesh</option>
                                        <option value="Sudurpashchim">Sudurpashchim</option>
                                        <option value="Karnali">Karnali</option>
                                    </select>
                                    
                        </div>
                        <div class="col-auto p-0">
                            <select class="form-select select2" name="state" id="state"
                                aria-label="Default select example">
                                <option value="">Select State</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->country); ?>"
                                        <?php echo e(($filterData && $filterData->country == $country->country) || request('country') == $country->country || $selectedCountrywithSurvey == $country->country ? 'selected' : ''); ?>>
                                        <?php echo e($country->country); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
   
                        

                        
                    </div>

            </div>

            </form>

        </div>
    </div>
    <?php endif; ?>

    <div class="col-12 col-sm-2 col-md-3">
        <div class="card card-animate stat-card people-card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-row gap-3 align-items-center">
                        <i class="fa-solid fa-user" style="font-size:18px;"></i>
                        <p class="mb-0" style="font-size:18px;">
                            Survey Participants</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                            aria-controls="theme-settings-offcanvas" data-title="Survey Participants"
                            data-content="<p>Total number of respondents who participated in the survey.</p>">
                            <i class='bx bx-info-circle' style="font-size:24px;"></i>
                        </div>
                    </div>
                </div>
                <div class="gap-2 mt-4">
                    <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value"
                            data-target="<?php echo e($topBox['people']); ?>"><?php echo e($topBox['people']); ?></span>
                    </h4>



                </div>
            </div>
        </div>
    </div>
</div>

<!--new filter-->
                        
<!--
<div class="row mb-3">
    <?php if($formDetails->form_type == 0): ?>
    <div class="col-12 col-sm-10 col-md-9">
        <div class="filter-section show-filter d-flex flex-column align-content-stretch justify-content-start h-100">
            <div class="mb-2">
                <?php
                    $user = auth()->user()->role->name;
                    if ($user == 'superadmin') {
                        $lastText = ' or Organisation';
                    } elseif ($user == 'organization') {
                        $lastText = ' or Division';
                    } else {
                        $lastText = '';
                    }
                ?>
                <h5 class="my-1" style="font-size:16px;color: #333;">Showing insights for
                    <b><?php echo e($formDetails->form_title); ?></b>. <span class="survey-type">Country Survey</span>
                        <?php if($user !== 'survey'): ?>
                            <br><span>Use the filters below to switch between different surveys or refine your results
                                by Country<?php echo e($lastText); ?>.</span></h5>
                <?php endif; ?>
            </div>

            <div class="mt-3 mt-lg-0 d-flex justify-content-between flex-wrap gap-3">
                <form action="<?php echo e(route('home.index')); ?>" method="GET">
                    <div class="row gap-3 m-0 p-0 dashboard flex-nowra align-items-center">
                        
                        <div class="col-auto p-0">
                            <?php if(auth()->user()->role->name == 'superadmin'): ?>
                                <select class="form-select select2" id="organization" name="organization"
                                    aria-label="Default select example">
                                    <option value="" selected>Select Organization</option>
                                    <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($organization->id); ?>"
                                            <?php echo e(($filterData && $filterData->organization_id == $organization->id) || request('organization') == $organization->id || $selectedOrganizationwithSurvey == $organization->id ? 'selected' : ''); ?>>
                                            <?php echo e($organization->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php else: ?>
                                <input type="text" class="form-control organization-name"
                                    value="<?php echo e(auth()->user()->organization->name); ?>" readonly>
                                <input type="hidden" name="organization" class="form-control"
                                    value="<?php echo e(old('organization', auth()->user()->organization_id)); ?>" id="organization"
                                    readonly>
                            <?php endif; ?>
                        </div>

                        <div class="col-auto p-0">
                            
                            <select class="form-select select2" id="branch" name="branch"
                                aria-label="Default select example" disabled>
                                <option value="" selected>Select Division</option>
                            </select>
                            
                        </div>
                        <div class="col-auto p-0">
                            <select class="form-select select2" name="country" id="country"
                                aria-label="Default select example">
                                <option value="">Select Country</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->country); ?>"
                                        <?php echo e(($filterData && $filterData->country == $country->country) || request('country') == $country->country || $selectedCountrywithSurvey == $country->country ? 'selected' : ''); ?>>
                                        <?php echo e($country->country); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-auto p-0">
                            
                            <select class="form-select select2" name="survey" id="survey"
                                aria-label="Default select example">
                                <option value="" selected>Select Survey</option>
                                <?php $__currentLoopData = $surveyForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surveyForm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($surveyForm->form_title); ?>"
                                        <?php echo e(($filterData && $filterData->form_id == $surveyForm->form_id) || request('survey') == $surveyForm->form_id ? 'selected' : ''); ?>>
                                        <?php echo e($surveyForm->form_title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                        </div>
                        
                        
                        <div class="col-auto p-0">
                            <button href="#" class="view-insight-btn" id="filter_btn"
                                onclick="this.form.submit();" <?php echo e(request('survey') ? '' : 'disabled'); ?>>
                                <span>View Insight</span>
                                <i class='bx bx-arrow-back bx-rotate-180'></i>
                            </button>

                        </div>

                        
                    </div>

            </div>

            </form>

        </div>
    </div>
    <?php elseif($formDetails->form_type == 1): ?>
    <div class="col-12 col-sm-10 col-md-9">
        <div class="filter-section show-filter d-flex flex-column align-content-stretch justify-content-start h-100">
            <div class="mb-2">
                <?php
                    $user = auth()->user()->role->name;
                    if ($user == 'superadmin') {
                        $lastText = ' or Organisation';
                    } elseif ($user == 'organization') {
                        $lastText = ' or Division';
                    } else {
                        $lastText = '';
                    }
                ?>
                <h5 class="my-1" style="font-size:16px;color: #333;">Showing insights for
                    <b><?php echo e($formDetails->form_title); ?></b>. <span class="survey-type">Global Survey</span>
                        <?php if($user !== 'survey'): ?>
                            <br><span>Use the filters below to switch between different surveys or refine your results
                                by Country<?php echo e($lastText); ?>.</span></h5>
                <?php endif; ?>
            </div>

            <div class="mt-3 mt-lg-0 d-flex justify-content-between flex-wrap gap-3">
                <form action="<?php echo e(route('home.index')); ?>" method="GET">
                    <div class="row gap-3 m-0 p-0 dashboard flex-nowra align-items-center">
                        <div class="col-auto p-0">
                            <?php if(auth()->user()->role->name == 'superadmin'): ?>
                                <select class="form-select select2" id="organization" name="organization"
                                    aria-label="Default select example">
                                    <option value="" selected>Select Organization</option>
                                    <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($organization->id); ?>"
                                            <?php echo e(($filterData && $filterData->organization_id == $organization->id) || request('organization') == $organization->id || $selectedOrganizationwithSurvey == $organization->id ? 'selected' : ''); ?>>
                                            <?php echo e($organization->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php else: ?>
                                <input type="text" class="form-control organization-name"
                                    value="<?php echo e(auth()->user()->organization->name); ?>" readonly>
                                <input type="hidden" name="organization" class="form-control"
                                    value="<?php echo e(old('organization', auth()->user()->organization_id)); ?>" id="organization"
                                    readonly>
                            <?php endif; ?>
                        </div>

                        <div class="col-auto p-0">
                            
                            <select class="form-select select2" id="branch" name="branch"
                                aria-label="Default select example" disabled>
                                <option value="" selected>Select Division</option>
                            </select>
                            
                        </div>
                        <div class="col-auto p-0">
                            
                            <select class="form-select select2" name="survey" id="survey"
                                aria-label="Default select example">
                                <option value="" selected>Select Survey</option>
                                <?php $__currentLoopData = $surveyForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surveyForm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($surveyForm->form_title); ?>"
                                        <?php echo e(($filterData && $filterData->form_id == $surveyForm->form_id) || request('survey') == $surveyForm->form_id ? 'selected' : ''); ?>>
                                        <?php echo e($surveyForm->form_title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                        </div>

                        <div class="col-auto p-0">
                            <select class="form-select select2" name="country" id="country"
                                aria-label="Default select example">
                                <option value="">Select Country</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->country); ?>"
                                        <?php echo e(($filterData && $filterData->country == $country->country) || request('country') == $country->country || $selectedCountrywithSurvey == $country->country ? 'selected' : ''); ?>>
                                        <?php echo e($country->country); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-auto p-0">
                            <select class="form-select select2" name="state" id="state"
                                aria-label="Default select example">
                                <option value="">Select State</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->country); ?>"
                                        <?php echo e(($filterData && $filterData->country == $country->country) || request('country') == $country->country || $selectedCountrywithSurvey == $country->country ? 'selected' : ''); ?>>
                                        <?php echo e($country->country); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
   
                        <div class="col-auto p-0">
                            <button href="#" class="view-insight-btn" id="filter_btn"
                                onclick="this.form.submit();" <?php echo e(request('survey') ? '' : 'disabled'); ?>>
                                <span>View Insight</span>
                                <i class='bx bx-arrow-back bx-rotate-180'></i>
                            </button>

                        </div>

                        
                    </div>

            </div>

            </form>

        </div>
    </div>
    <?php endif; ?>

    <div class="col-12 col-sm-2 col-md-3">
        <div class="card card-animate stat-card people-card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-row gap-3 align-items-center">
                        <i class="fa-solid fa-user" style="font-size:18px;"></i>
                        <p class="mb-0" style="font-size:18px;">
                            Survey Participants</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                            aria-controls="theme-settings-offcanvas" data-title="Survey Participants"
                            data-content="<p>Total number of respondents who participated in the survey.</p>">
                            <i class='bx bx-info-circle' style="font-size:24px;"></i>
                        </div>
                    </div>
                </div>
                <div class="gap-2 mt-4">
                    <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value"
                            data-target="<?php echo e($topBox['people']); ?>"><?php echo e($topBox['people']); ?></span>
                    </h4>



                </div>
            </div>
        </div>
    </div>
</div>

-->
<?php /**PATH F:\CSB 2025\typeform-dashboard\resources\views/typeform/partials/dashboard-filter.blade.php ENDPATH**/ ?>