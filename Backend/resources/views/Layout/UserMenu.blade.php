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
                                <span class="user-name">{{session('username')}}</span>
                                <span class="user-status text-muted">USER ID: {{session('user_id')}}</span>
                            </div>
                            <span>
                                <img class="round" src="{{ url('https://cdn0.iconfinder.com/data/icons/some-avatars/200/girlbrownhairsute-512.png') }}" alt="avatar" height="40" width="40">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pb-0">
                            <a class="dropdown-item" href="/user/editProfile">
                                <i class="bx bx-user mr-50"></i> Edit Profile</a>
                
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
                <a class="navbar-brand" href="#">
                    <img src="{{ url('/images/logo/dummyLogo.png') }}" width="100%" height="70px"  />
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content" style="padding-bottom: 100px;">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            

            <li class="nav-item">
                <a class="nav-hover" href="/user/dashboard">
                    <i class="bx bx-desktop mr-50"></i>
                    <span class="menu-title">User Dashboard</span>
                </a>
            </li>

        

            <li class=" navigation-header"><span>User</span></li>

            <li class="nav-item @if(url('/user/organizationList') == Request::url()) active @endif">
                <a class="nav-hover" href="/user/organizationList">
                    <i class="bx bxs-city mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">OrganizationList</span>
                </a>
            </li>

            <li class="nav-item @if(url('/user/followedOrganization') == Request::url()) active @endif">
                <a class="nav-hover" href="/user/followedOrganization">
                    <i class="bx bxs-city mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Followed Organization</span>
                </a>
            </li>
            
            <li class="nav-item @if(url('/user/categoryList') == Request::url()) active @endif">
                <a class="nav-hover" href="{{ url('/user/categoryList') }}">
                    <i class="bx bxs-city mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">CategoryList</span>
                </a>
            </li>

            <li class="nav-item @if(url('/user/transitionDetails') == Request::url()) active @endif">
                <a class="nav-hover" href="{{ url('/user/transitionDetails') }}">
                    <i class="bx bxs-city mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">TransitionDetails</span>
                </a>
            </li>

            
            <li class="nav-item @if(url('/user/reportReply') == Request::url()) active @endif">
                <a class="nav-hover" href="/user/reportReply">
                    <i class="bx bxs-city mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Replies of your Reports</span>
                </a>
            </li>

           

            <li class="nav-item @if(url('/user/events') == Request::url()) active @endif">
                <a class="nav-hover" href="{{ url('/user/events') }}">
                    <i class="bx bxs-city mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Events</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-hover" href="{{ url('/user/yourAppliedVolunteerEvents') }}">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">YourAppliedVoluteerEvents</span>
                </a>
            </li>
           


           
           
        

        </ul>
    </div>
</div>
<!-- END: Main Menu-->