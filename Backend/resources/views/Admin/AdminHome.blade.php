@extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('Layout.AdminMenu')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
            <section id="widgets-Statistics">
                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Site Summary</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                    <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto mb-50">
                                            <i class="bx bx-receipt font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Total Site Visit</div>
                                        <h3 class="mb-0">{{$totalSiteVisit}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto mb-50">
                                        <i class="bx bx-receipt font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Unique IP</div>
                                        <h3 class="mb-0">{{$uniqueIp}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="widgets-Statistics">
                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Transaction Summary</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                    <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                            <i class="bx bxs-smiley-happy font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Total Collect</div>
                                        <h3 class="mb-0">৳ {{$totalMoneyCollect}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                            <i class="bx bxs-smiley-sad font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Refund Money</div>
                                        <h3 class="mb-0">৳ {{$refundMoney}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                            <i class="bx bxs-smiley-happy font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Today Collect</div>
                                        <h3 class="mb-0">৳ {{$todayCollect}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                            <i class="bx bxs-smiley-sad font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Today Refund Money</div>
                                        <h3 class="mb-0">৳ {{$todayRefund}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="widgets-Statistics">
                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Events Summary</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto mb-50">
                                            <i class="bx bx-receipt font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Total Event</div>
                                        <h3 class="mb-0">{{$totalEvents}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto mb-50">
                                            <i class="bx bxs-error font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Pending Event</div>
                                        <h3 class="mb-0">{{$pendingEvents}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                            <i class="bx bxs-smiley-happy font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Accepted Event</div>
                                        <h3 class="mb-0">{{$acceptedEvents}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                            <i class="bx bxs-smiley-sad font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Deactivate Event</div>
                                        <h3 class="mb-0">{{$deactiveEvents}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section id="widgets-Statistics">
                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>User Information</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                            <i class="bx bx-user font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Admins</div>
                                        <h3 class="mb-0">{{$totalAdmin}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                            <i class="bx bx-user font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Organization</div>
                                        <h3 class="mb-0">{{$totalOrg}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                            <i class="bx bx-user font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Sponsor</div>
                                        <h3 class="mb-0">{{$totalSpo}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                            <i class="bx bx-user font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">User</div>
                                        <h3 class="mb-0">{{$totalUser}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('Layout.footer')

    @include('Layout.scripts')
</body>
@endsection