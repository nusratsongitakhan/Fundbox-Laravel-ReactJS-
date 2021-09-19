@extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('Layout.SpMenu')

    <!-- BEGIN: Content-->
    
   <!-- BEGIN: Content-->
   <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section id="widgets-Statistics">
                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Sponser Summary ()</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto mb-50">
                                            <i class="bx bx-receipt font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Total Advertise</div>
                                        <h3 class="mb-0">0.00</h3>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto mb-50">
                                            <i class="bx bxs-error font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Site Visitor</div>
                                        <h3 class="mb-0">{{$totalSiteVisit}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                            <i class="bx bxs-smiley-happy font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Delivered Orders</div>
                                        <h3 class="mb-0">0.00</h3>
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
                                        <div class="text-muted line-ellipsis">Cancelled Orders</div>
                                        <h3 class="mb-0">0.00</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </section>
                <section id="widgets-Statistics">
                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Transaction Summary ({{ date('d-M-Y', strtotime($date)) }})</h4>
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
                                        <div class="text-muted line-ellipsis">Total Donated Ammount</div>
                                        <h3 class="mb-0">৳ {{$totalMoneyCollect}}</h3>
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
                                        <div class="text-muted line-ellipsis">Donate to Fundbox</div>
                                        <h3 class="mb-0">৳ 0.00</h3>
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
                                        <div class="text-muted line-ellipsis">Donate to event</div>
                                        <h3 class="mb-0">৳ 0.00</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                            <i class="bx bxs-smiley-sad font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Cancelled Order Amount</div>
                                        <h3 class="mb-0">৳ 0.00</h3>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </section>
                <!-- <section id="widgets-Statistics">
                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Statistics</h4>
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
                                        <h3 class="mb-0">0.00</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                            <i class="bx bx-user font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Users</div>
                                        <h3 class="mb-0">0.00</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->
            </div>
        </div>
    </div>

    @include('Layout.footer')

    @include('Layout.scripts')
</body>
@endsection