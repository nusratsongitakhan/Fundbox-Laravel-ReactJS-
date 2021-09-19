<!-- BEGIN: Header-->
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Email">
                                <i class="ficon bx bx-envelope"></i>
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Chat">
                                <i class="ficon bx bx-chat"></i>
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Todo">
                                <i class="ficon bx bx-check-circle"></i>
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Calendar">
                                <i class="ficon bx bx-calendar-alt"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link nav-link-expand">
                            <i class="ficon bx bx-fullscreen nav-item-home-floating" data-toggle="tooltip" data-placement="top" title="Fullscreen"></i>
                        </a>
                    </li>
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name">{{session()->get('full_name')}}</span>
                                <span class="user-status text-muted">{{session()->get('user_email')}}</span>
                            </div>
                            <span>
                            @if(session()->has('user_image'))
                                <img class="round" src="{{ url(session()->get('user_image')) }}" alt="avatar" height="40" width="40">
                            @else
                                <img class="round" src="{{ url('/images/avatar/avatar.png') }}" alt="avatar" height="40" width="40">
                            @endif
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pb-0">
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-user mr-50"></i> Edit Profile</a>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item" href="/logout">
                                <i class="bx bx-power-off mr-50"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->

<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header mb-3">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="/">
                    <img src="{{ url('/images/logo/dummyLogo.png') }}" width="80%" height="100px"  />
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content" style="padding-bottom: 100px;">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            
            <li class="nav-item @if(url('/admin/dashboard') == Request::url()) active @endif">
                <a class="nav-hover" href="{{ url('/admin/dashboard') }}">
            
                    <i class="bx bx-desktop mr-50"></i>
                    <span class="menu-title">Admin Dashboard</span>
                </a>
            </li>

            <li class=" navigation-header"><span>Admin</span></li>
            
            <li class="nav-item @if(url('/admin/createAdmin') == Request::url()) active @endif">
                <a class="nav-hover" href="{{ url('/admin/createAdmin') }}">
                    <i class="bx bxs-city mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Create Admin</span>
                </a>
            </li>

            <li class="nav-item @if(url('/admin/manageAdmin') == Request::url()) active @endif">
                <a class="nav-hover" href="/admin/manageAdmin">
                    <i class="bx bxs-city mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Manage Admin</span>
                </a>
            </li>
            
            <li class=" navigation-header"><span>Organisation</span></li>
            <li class="nav-item @if(url('/admin/createOrg') == Request::url()) active @endif">
                <a class="nav-hover" href="/admin/createOrg">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Create Organisation</span>
                </a>
            </li>
            <li class="nav-item @if(url('/admin/pendingOrg') == Request::url()) active @endif">
                <a class="nav-hover" href="/admin/pendingOrg">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Pending Organisation</span>
                </a>
            </li>
            <li class="nav-item @if(url('/admin/manageOrg') == Request::url()) active @endif">
                <a class="nav-hover" href="/admin/manageOrg">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Manage Organisation</span>
                </a>
            </li>

            <li class=" navigation-header"><span>Category</span></li>
            <li class="nav-item @if(url('/admin/eventCategory') == Request::url()) active @endif">
                <a class="nav-hover" href="/admin/eventCategory">
                    <i class="bx bxs-city mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Event Category</span>
                </a>
            </li>

            <li class=" navigation-header"><span>Event</span></li>
            <li class="nav-item has-sub">
                <a href="#">
                    <i class="bx bxs-package mr-50"></i>
                    <span class="menu-title" data-i18n="Area Coverage">Event</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item @if(url('/admin/createAdminEvent') == Request::url()) active @endif">
                        <a class="nav-hover" href="/admin/createAdminEvent">
                            <i class="bx bxs-navigation mr-50"></i>
                            <span class="menu-title" data-i18n="Category Manager">Create Admin Event</span>
                        </a>
                    </li>
                    <li class="nav-item @if(url('/admin/createOrgEvent') == Request::url()) active @endif">
                        <a class="nav-hover" href="/admin/createOrgEvent">
                            <i class="bx bxs-navigation mr-50"></i>
                            <span class="menu-title" data-i18n="Category Manager">Create organisation Event</span>
                        </a>
                    </li>
                    <li class="nav-item @if(url('/admin/createVolunteerEvent') == Request::url()) active @endif">
                        <a class="nav-hover" href="/admin/createVolunteerEvent">
                            <i class="bx bxs-navigation mr-50"></i>
                            <span class="menu-title" data-i18n="City Manager">Create Volunteer Event</span>
                        </a>
                    </li>
                    
                    <li class="nav-item has-sub">
                        <a href="#">
                            <i class="bx bxs-package mr-50"></i>
                            <span class="menu-title" data-i18n="Area Coverage">Manage Events</span>
                        </a>
                        <ul class="menu-content">
                            <li class="nav-item @if(url('/admin/manageAdminEvent') == Request::url()) active @endif">
                                <a class="nav-hover" href="/admin/manageAdminEvent">
                                    <i class="bx bxs-navigation mr-50"></i>
                                    <span class="menu-title" data-i18n="Category Manager">Admin</span>
                                </a>
                            </li>
                            <li class="nav-item @if(url('/admin/managePendingEvent') == Request::url()) active @endif">
                                <a class="nav-hover" href="/admin/managePendingEvent">
                                    <i class="bx bxs-navigation mr-50"></i>
                                    <span class="menu-title" data-i18n="Category Manager">Pending</span>
                                </a>
                            </li>
                            <li class="nav-item @if(url('/admin/manageAcceptedEvent') == Request::url()) active @endif">
                                <a class="nav-hover" href="/admin/manageAcceptedEvent">
                                    <i class="bx bxs-navigation mr-50"></i>
                                    <span class="menu-title" data-i18n="Category Manager">Accepted</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                
            </li>
            <li class="nav-item @if(url('/admin/volunteerList') == Request::url()) active @endif">
                <a class="nav-hover" href="/admin/volunteerList">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Volunteer List</span>
                </a>
            </li>
             <li class="nav-item @if(url('/admin/transitionList') == Request::url()) active @endif">
                <a class="nav-hover" href="/admin/transitionList">
                    <i class="bx bxs-bar-chart-alt-2 mr-50"></i>
                    <span class="menu-title" data-i18n="Category Manager">Transition List</span>
                </a>
            </li>   

            
            <li class=" navigation-header"><span>Sponsoor</span></li>
            <li class="nav-item @if(url('/admin/sponsor') == Request::url()) active @endif">
                <a class="nav-hover" href="/admin/sponsor">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Pending Request</span>
                </a>
            </li>
            <li class="nav-item @if(url('/admin/sponsorManage') == Request::url()) active @endif">
                <a class="nav-hover" href="/admin/sponsorManage">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Manage Sponsor</span>
                </a>
            </li>
            <li class="nav-item @if(url('/admin/sponsorBanner') == Request::url()) active @endif">
                <a class="nav-hover" href="/admin/sponsorBanner">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Sponsor Banner</span>
                </a>
            </li>          

            <li class=" navigation-header"><span>Report</span></li>
            <li class="nav-item @if(url('/admin/reports') == Request::url()) active @endif">
                <a class="nav-hover" href="/admin/reports">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Manage Reports</span>
                </a>
            </li>

            <li class=" navigation-header"><span>Account</span></li>
            <li class="nav-item @if(url('/admin/ManageProfile') == Request::url()) active @endif">
                <a class="nav-hover" href="/admin/ManageProfile">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Manage Account</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->