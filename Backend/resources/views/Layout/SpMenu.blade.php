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
                                <span class="user-name">GR_Sponsor_NAME</span>
                                <span class="user-status text-muted">GR_Sponsor_EMAIL</span>
                            </div>
                            <span>
                                <img class="round" src="{{ url('/images/avatar/avatar.png') }}" alt="avatar" height="40" width="40">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pb-0">
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-user mr-50"></i> Edit Profile</a>
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-envelope mr-50"></i> My Inbox</a>
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-check-square mr-50"></i> Notification</a>
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-message mr-50"></i> Chats</a>
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
                <a class="navbar-brand" href="#">
                    <img src="{{ url('/images/logo/dummyLogo.png') }}" width="100%" height="70px"  />
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content" style="padding-bottom: 100px;">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
<!-- sponsor dashboard main bar -->
            <li class="nav-item @if(url('/sp/dashboard') == Request::url()) active @endif">
                <a class="nav-hover" href="{{ url('/sp/dashboard') }}">
            
                    <i class="bx bx-desktop mr-50"></i>
                    <span class="menu-title">Sponsor Dashboard</span>
                </a>
            </li>
<!-- Advertise section Start -->
            <li class=" navigation-header"><span>Advertise</span></li>
            
            <li class="nav-item @if(url('/sp/addAdvertise') == Request::url()) active @endif">
                <a class="nav-hover" href="{{ url('/sp/addAdvertise') }}">
                    <i class="bx bxs-city mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Add Advertise</span>
                </a>
            </li>

            <li class="nav-item @if(url('/sp/allAdvertise') == Request::url()) active @endif">
                <a class="nav-hover" href="/sp/allAdvertise">
                    <i class="bx bxs-city mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">All Advertise</span>
                </a>
            </li>
<!-- Advertise section End -->

<!-- Sponsored section Start -->
            <li class=" navigation-header"><span>Event</span></li>

            <!-- <li class="nav-item @if(url('/sp/updateSponsorship') == Request::url()) active @endif">
                <a class="nav-hover" href="/sp/updateSponsorship">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Update Sponsorship</span>
                </a>
            </li> -->
            <!-- <li class="nav-item @if(url('/sp/sponsoredEvents') == Request::url()) active @endif">
                <a class="nav-hover" href="/sp/sponsoredEvents">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Sponsored Events</span>
                </a>
            </li> -->
            <li class="nav-item @if(url('/sp/allEvents') == Request::url()) active @endif">
                <a class="nav-hover" href="/events">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Ongoing Events</span>
                </a>
            </li>
<!-- Sponsored section End -->

<!-- Organisation section Start -->
               <li class=" navigation-header"><span>Organisation Sponsorship</span></li>

                 <li class="nav-item @if(url('/sp/applyOrg') == Request::url()) active @endif">
                <a class="nav-hover" href="/sp/applyOrg">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Apply in Organisation</span>
                </a>
            </li>

            <li class="nav-item @if(url('/sp/sponsoredOrgList') == Request::url()) active @endif">
                <a class="nav-hover" href="/sp/sponsoredOrgList">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">All Sponsored Organisation</span>
                </a>
            </li>
            <li class="nav-item @if(url('/sp/pendingOrgList') == Request::url()) active @endif">
                <a class="nav-hover" href="/sp/pendingOrgList">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Pending Request</span>
                </a>
            </li>
            <li class="nav-item @if(url('/sp/ongoingOrgList') == Request::url()) active @endif">
                <a class="nav-hover" href="/sp/ongoingOrgList">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Ongoing Process</span>
                </a>
            </li>
<!-- Organisation section End -->

<!-- Account section Start -->

            <li class=" navigation-header"><span>Account</span></li>
            <li class="nav-item @if(url('/sp/manageAccount') == Request::url()) active @endif">
                <a class="nav-hover" href="/sp/manageAccount">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Manage Account</span>
                </a>
            </li>
            <!-- <li class="nav-item @if(url('/sp/transactionList') == Request::url()) active @endif">
                <a class="nav-hover" href="/sp/transactionList">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Transaction List</span>
                </a>
            </li> -->

            <!-- <li class=" navigation-header"><span>Event</span></li>
            <li class="nav-item has-sub">
                <a href="#">
                    <i class="bx bxs-package mr-50"></i>
                    <span class="menu-title" data-i18n="Area Coverage">Transaction List</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item @if(url('/sp/allTransactionList') == Request::url()) active @endif">
                        <a class="nav-hover" href="/admin/createAdminEvent">
                            <i class="bx bxs-navigation mr-50"></i>
                            <span class="menu-title" data-i18n="Category Manager">All Transaction</span>
                        </a>
                    </li>
                    <li class="nav-item @if(url('/sp/orgTransactionList') == Request::url()) active @endif">
                        <a class="nav-hover" href="/admin/createOrgEvent">
                            <i class="bx bxs-navigation mr-50"></i>
                            <span class="menu-title" data-i18n="Category Manager">Sponsor transaction</span>
                        </a>
                    </li>
                    <li class="nav-item @if(url('/sp/eventTransactionList') == Request::url()) active @endif">
                        <a class="nav-hover" href="/admin/createVolunteerEvent">
                            <i class="bx bxs-navigation mr-50"></i>
                            <span class="menu-title" data-i18n="City Manager">Event Transaction</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- <li class="nav-item @if(url('/sp/payment') == Request::url()) active @endif">
                <a class="nav-hover" href="/sp/payment">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Payment</span>
                </a>
            </li> -->
            <li class="nav-item @if(url('/sp/allTransactionList') == Request::url()) active @endif">
                <a class="nav-hover" href="/sp/allTransactionList">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Transaction List</span>
                </a>
            </li>
            <!-- <li class="nav-item @if(url('/sp/siteTraffic') == Request::url()) active @endif">
                <a class="nav-hover" href="/sp/siteTraffic">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Site Traffic</span>
                </a>
            </li> -->
<!-- Account section Start -->
        </ul>
    </div>
</div>
<!-- END: Main Menu-->