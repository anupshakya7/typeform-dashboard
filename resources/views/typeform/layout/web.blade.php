<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | Community Strength Barometer- CSB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Community Strength Barometer- CSB" name="description" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico')}}">

    @include('layouts.head-css')
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <link rel="stylesheet" href="{{ URL::asset('build/css/style.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/all.min.css">
</head>

@section('body')
    @include('layouts.body')
@show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('typeform.partials.topbar')
        @include('typeform.partials.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('typeform.partials.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    @include('typeform.partials.customizer')

    <!-- JAVASCRIPT -->
    @include('layouts.vendor-scripts')
   
    <script src="{{ URL::asset('build/js/script.js')}}"></script>

    <script>
        @if(session::has('success'))
            toastr.success("{{session::get('success')}}");
        @endif

        @if(session::has('error'))
            toastr.error("{{session::get('error')}}");
        @endif
        var $=jQuery;
        $(document).ready(function(){
            $('.select2').select2();

            $('a[data-bs-toggle="offcanvas"],div[data-bs-toggle="offcanvas"]').on('click',function(event){
                event.preventDefault();

                var title = $(this).data('title');
                var content = $(this).data('content');

                if(title && content){
                    $('#info_title').text(title);
                    $('#info_content').html(content);
                }else{
                    $('#info_title').html('');
                    $('#info_content').html('');
                }
            });
        });


    </script>
</body>

</html>
