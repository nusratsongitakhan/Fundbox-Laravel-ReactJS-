@extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('Layout.OrgMenu')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="users-list-wrapper">
                    <div class="users-list-filter">
                        @if(session()->has('error') && !session()->get('error'))
                        <div class="alert alert-success alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center">
                                <i class="bx bx-like"></i>
                                <span>
                                    {{ session()->get('message') }}
                                </span>
                            </div>
                        </div>
                        @endif
                        @if(session()->has('error') && session()->get('error'))
                        <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center">
                                <i class="bx bx-error"></i>
                                <span>
                                    {{ session()->get('message') }}
                                </span>
                            </div>
                        </div>
                        @endif
                        
                    </div>
                    <div class="restaurant-list-table">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- datatable start -->
                                    <div class="">
                                    <form action="{{ url('/serverMaintenance/update') }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-lg-12">
                                                <input type="text" name="sm_id" value="1" hidden>
                                            </div>
                                            <div class="col-12 col-sm-12 col-lg-12">
                                                    
                                                        <div class="osahan-slider-item" style="background-color:#fff;">
                                                            <img src="{{ url('/images/avatar/avatar.png') }}" style="width:100%;height:150px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                                                        </div>
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-top:10px">
                                                <fieldset class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="sm_image">
                                                        <label class="custom-file-label" for="inputGroupFile02">Choose image</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            
                                            <div class="col-12 col-sm-12" style="margin-bottom:10px">
                                                <p>Name</p>
                                                <input type="text" class="form-control" value="User Name" name="sm_text" placeholder="Text">
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-bottom:10px">
                                                <p>Email</p>
                                                <input type="text" class="form-control" value="user@gmail.com" name="sm_text" placeholder="Text">
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-bottom:10px">
                                                <p>Phone</p>
                                                <input type="text" class="form-control" value="0171111111" name="sm_text" placeholder="Text">
                                            </div>
                                            
                                            <div class="col-12 col-sm-12" style="margin-top: 10px">
                                                <button type="submit" class="btn btn-block btn-success glow">Update Profile</button>
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-top: 10px">
                                            <button type="submit" class="btn btn-block btn-danger glow">Delete Account</button>

                                            </div>
                                        </div>
                                    </form>                                
                                
                                    </div>
                                    <!-- datatable ends -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users list ends -->
            </div>
        </div>
    </div>

    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('Layout.footer')

    @include('Layout.scripts')

</body>
@endsection