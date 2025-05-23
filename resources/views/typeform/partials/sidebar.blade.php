<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu" >
    <!-- LOGO -->
    @php

        /**if(auth()->user()->role->name == 'superadmin'){
            $organizationLogo = auth()->user()->organization ? asset('storage/'.auth()->user()->organization->logo) :  URL::asset('build/images/iep_logo.png');
        }else{**/
            //$organizationLogo = auth()->user()->organization->logo ? asset('storage/'.auth()->user()->organization->logo) :  URL::asset('build/images/iep_logo.png');
        //}
    
   @endphp
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('home.index')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/iep_logo.png') }}" alt="" width="120">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/iep_logo.png') }}" alt="" width="120">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('home.index')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('images/small-logo.png') }}" alt="">
            </span>
            <span class="logo-lg">
                <img src="{{URL::asset('build/images/iep_logo.png') }}" alt="" width="120">
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
                {{-- Dashboard --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('home.index')}}">
                    <i class="fa-solid fa-gauge"></i> <span>Dashboard</span>
                    </a>
                </li>
                {{-- Dashboard --}}

                {{-- User Management --}}
                @if(hasPermissionToRoute('user.index') || hasPermissionToRoute('role.index') || hasPermissionToRoute('permission.index') || hasPermissionToRoute('user.password-change'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUser" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarUser">
                        <i class="fa-solid fa-user"></i> <span>User Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUser">
                        <ul class="nav nav-sm flex-column">
                            @if(hasPermissionToRoute('user.index'))
                            <li class="nav-item">
                                <a href="{{route('user.index')}}" class="nav-link">User</a>
                            </li>
                            @endif
                            @if(hasPermissionToRoute('role.index'))
                            <li class="nav-item">
                                <a href="{{route('role.index')}}" class="nav-link">Role</a>
                            </li>
                            @endif
                            @if(auth()->user()->role->name == 'krizmatic')
                            @if(hasPermissionToRoute('permission.index'))
                            <li class="nav-item">
                                <a href="{{route('permission.index')}}" class="nav-link">Permission</a>
                            </li>
                            @endif
                            @endif
                            @if(hasPermissionToRoute('user.password-change'))
                            <li class="nav-item">
                                <a href="{{route('user.password-change')}}" class="nav-link">Reset Password</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                {{-- User Management --}}

                {{-- Organization Management --}}
                @if(hasPermissionToRoute('organization.index'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('organization.index')}}">
                    <i class="fa-solid fa-building-columns"></i> <span>Organization</span>
                    </a>
                </li>
                @endif
                {{-- Organization Management --}}

                {{-- Branch Management --}}
                @if(hasPermissionToRoute('branch.index'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('branch.index')}}">
                    <i class="fa-solid fa-landmark-flag"></i> <span>Divisions</span>
                    </a>
                </li>
                @endif
                {{-- Branch Management --}}

                {{-- Form Management --}}
                @if(hasPermissionToRoute('form.index'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('form.index')}}">
                    <i class="fa-solid fa-file"></i> <span>Survey Management</span>
                    </a>
                </li>
                @endif
                {{-- Form Management --}}

                 {{-- Survey Management --}}
                 @if(hasPermissionToRoute('survey.index'))
                 <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('survey.index')}}">
                    <i class="fa-solid fa-clipboard-list"></i> <span>Survey Data</span>
                    </a>
                </li>
                @endif
                {{-- Survey Management --}}

                 {{-- About Us --}}
                 @if(hasPermissionToRoute('about.index'))
                 <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('about.index')}}">
                    <i class='bx bxs-info-circle'></i> <span>About</span>
                    </a>
                </li>
                @endif
                {{-- About Us --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>