<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                {{-- Dashboard --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('home.index')}}">
                        <i class="ri-dashboard-2-line"></i> <span>@lang('translation.dashboards')</span>
                    </a>
                </li>
                {{-- Dashboard --}}

                {{-- User Management --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUser" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarUser">
                        <i class="ri-dashboard-2-line"></i> <span>User Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUser">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics" class="nav-link">@lang('translation.analytics')</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- User Management --}}

                {{-- Organization Management --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('form.index')}}">
                        <i class="ri-dashboard-2-line"></i> <span>Organization Management</span>
                    </a>
                </li>
                {{-- Organization Management --}}

                  {{-- Form Management --}}
                  <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('form.index')}}">
                        <i class="ri-dashboard-2-line"></i> <span>Form Management</span>
                    </a>
                </li>
                {{-- Form Management --}}

                {{-- Form Management --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('form.index')}}">
                        <i class="ri-dashboard-2-line"></i> <span>Form Management</span>
                    </a>
                </li>
                {{-- Form Management --}}

                {{-- Survey Management --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('survey.index')}}">
                        <i class="ri-dashboard-2-line"></i> <span>Survey Lists</span>
                    </a>
                </li>
                {{-- Survey Management --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
