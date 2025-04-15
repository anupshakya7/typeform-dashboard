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

    

    <!--end greeting section-->

    <!--form section starts here -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="padding: 20px 40px;"> 
                    <h5 class="card-title mb-0 d-flex flex-row align-content-center" style="font-size:23px;font-weight:550;"><i class='bx bxs-info-circle' style="margin-right: 5px;font-size: 24px;"></i><span>About</span></h5>
                </div>
                <div class="card-body" style="padding: 25px 40px;">
                    <h3>Community Strength Barometer (CSB) </h3>
                    <p>
                        The Community Strength Barometer (CSB) Survey provides a systemic, data-driven approach to measuring societal resilience. Grounded in the empirically validated Pillars of Positive Peace, the survey captures a holistic portrait of community dynamics, offering objective insights into societal strengths and areas for development. 
                        <br>
                        <br>
                        The survey assesses citizen perceptions across ten key areas of community life, including governance, resources, social cohesion, and economic opportunities. By analysing these factors, the CSB Survey highlights variations in satisfaction and lived experiences across different countries, identifying both areas of strength and opportunities for improvement. 
                        <br>
                        <br>
                        Understanding these perceptions is essential for policymakers, organisations, and communities seeking to foster resilience, enhance social cohesion, and drive positive change. 
                    </p>
                    <hr>
                    <h3>Methodology</h3>
                    <p>The study employs a six-point Likert scale survey, covering ten questions related to different aspects of community life.  The questions are carefully crafted to be cross-culturally applicable and easy to understand, ensuring reliable responses from a diverse range of participants.</p>

                    <p style="font-weight:bold;">Survey Design and Analysis:</p>

                    <p>Survey Scale: Respondents will rate their level of agreement with each statement using a six-point Likert scale:</p>
                    <ul>
                        <li>1 = Strongly Disagree</li>
                        <li>2 = Disagree</li>
                        <li>3 = Slightly Disagree</li>
                        <li>4 = Slightly Agree</li>
                        <li>5 = Agree</li>
                        <li>6 = Strongly Agree</li>
                    </ul>
                    <p>
                       Data Analysis: The collected data will be analysed using median scores and percentage distribution for each question. 
                    </p>
                    <p>
                        Average Completion Time: The survey can be completed in less than 5 minutes.
                    </p>
                    <!--<p>The study employs a six-point scale survey, covering ten questions related to different aspects of community life. Participating respondents will provide insights into their level of agreement with each statement. The data is analysed using median scores and percentage distributions for each question.</p>-->
                    
                    <!--<p> Survey Methodology: </p>-->
                    <!-- <ul>-->
                    <!--    <li>Average completion time: Under 5 minutes</li>-->
                    <!--    <li>Question design: Focused on cross-cultural applicability and ease of understanding </li>-->
                    <!-- </ul>-->
                    <hr>
                    <h3>Positive Peace & Community Strength </h3>
                    <p>
                        Positive Peace refers to the attitudes, institutions, and structures that create and sustain peaceful societies. Unlike Negative Peace, which is simply the absence of violence or the threat of violence, Positive Peace encompasses the presence of conditions that foster societal well-being and harmony. 
                    </p>
                    <p>
                        Enhancing Positive Peace not only strengthens peace but is also associated with various societal benefits, including higher GDP growth, improved well-being, increased resilience, and more harmonious communities. By focusing on Positive Peace, societies and communities can create an optimal environment for human potential to flourish, addressing underlying issues that lead to conflict and promoting sustainable development. 
                    </p>
                    
                    <p>
                        The Positive Peace Index (PPI) measures the level of societal resilience of 163 countries, covering 99.7 per cent of the world’s population. The PPI is the most systemic global, quantitative approach to defining and measuring the factors that create peaceful societies. This body of work provides an actionable platform for development, policy makers, business and other stakeholders who are interested in improving their societies. 
                    </p>
                    
                    <p>
                        For more information, please see IEP Reports  
                    </p>
                    <hr>
                    
                    <h3>Positive Peace Framework </h3>
                    
                    <p>The 8 Pillars of Positive Peace  </p>
                    <ol>
                        <li>
                            Well-functioning Government 
                            <p>
                                A well-functioning government delivers high-quality public and civil services, engenders trust and participation, demonstrates political stability and upholds the rule of law. 
                            </p>
                        </li>
                        <li>
                            Sound Business Environment 
                            <p>
                                The strength of economic conditions as well as the formal institutions that support the operation of the private sector. Business competitiveness and economic productivity are both associated with the most peaceful countries and are key to a robust business environment. 
                            </p>
                        </li>
                        <li>
                            Equitable Distribution of Resources 
                            <p>
                                Peaceful countries tend to ensure equity in access to resources such as education, health and, to a lesser extent, equity in income distribution. 
                            </p>
                        </li>
                        <li>
                            Acceptance of the Rights of Others 
                            <p>
                                Peaceful nations enforce formal laws that guarantee basic human rights and freedoms and the informal social and cultural norms that relate to behaviours of citizens. 
                            </p>
                        </li>
                        <li>
                            Good Relations with Neighbours 
                            <p>
                                Harmonious relations with other countries or between ethnic, religious and cultural groups within a country are vital for peace. Countries with positive internal and external relations are more peaceful and tend to be more politically stable, have better functioning governments, are regionally integrated and have lower levels of organised internal conflict. 
                            </p>
                        </li>
                        <li>
                            Free Flow of Information 
                            <p>
                                Free and independent media disseminates information in a way that leads to greater knowledge and helps individuals, business and civil society make better decisions. This leads to better outcomes and more rational responses in times of crisis. 
                            </p>
                        </li>
                        <li>
                            High Levels of Human Capital 
                            <p>
                                A skilled human capital base reflects the extent to which societies educate citizens and promote the development of knowledge, thereby improving economic productivity, care for the young, political participation and social capital. 
                            </p>
                        </li>
                        <li>
                            Low Levels of corruption
                            <p>
                                In societies with high levels of corruption, resources are inefficiently allocated, often leading to a lack of funding for essential services, which in turn can lead to dissatisfaction and civil unrest. Low corruption can enhance confidence and trust in institutions as well as improve the efficiency of business and the competitiveness of the country.  
                            </p>
                        </li>
                    </ol>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/prateeklalwani/Desktop/Typeform Main/typeform-dashboard/resources/views/typeform/about/index.blade.php ENDPATH**/ ?>