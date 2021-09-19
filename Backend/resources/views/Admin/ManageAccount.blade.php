@extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

@include('Layout.AdminMenu')

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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Manage Profile</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-lg-12">
                                                <input type="text" name="sm_id" value="1" hidden>
                                            </div>
                                            <div class="col-12 col-sm-12 col-lg-12">
                                                    @if($UserInfo->image)
                                                            <?php if (file_exists("../public".$UserInfo->image)){ ?>
                                                            <div class="osahan-slider-item" style="background-color:#fff;">
                                                                <img class="round" src="{{asset($UserInfo->image)}}" style="width:100%;height:300px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                                                            </div>
                                                            <?php } else{ ?>
                                                            <div class="osahan-slider-item" style="background-color:#fff;">
                                                                <img class="round" src="{{ url('/images/avatar/avatar.png') }}" style="width:100%;height:300px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                                                            </div>
                                                            <?php } ?>
                                                    @else
                                                        <div class="osahan-slider-item" style="background-color:#fff;">
                                                            <img class="round" src="{{ url('/images/avatar/avatar.png') }}" style="width:100%;height:300px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                                                        </div>
                                                    @endif  
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-top:10px">
                                                <fieldset class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="update_image">
                                                        <label class="custom-file-label" for="inputGroupFile02">Choose image</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-6" style="margin-bottom:10px">
                                                <p>Username</p>
                                                <input type="text" class="form-control" value="{{$UserInfo->username}}" name="username" placeholder="username" readonly>
                                            </div>
                                            <div class="col-12 col-sm-6" style="margin-bottom:10px">
                                                <p>Email</p>
                                                <input type="text" class="form-control" value="{{$UserInfo->email}}" name="email" placeholder="Email" readonly>
                                            </div>
                                            <div class="col-12 col-sm-6" style="margin-bottom:10px">
                                                <p>name</p>
                                                <input type="text" class="form-control" value="{{$UserInfo->name}}" name="name" placeholder="Name">
                                            </div>
                                            <div class="col-12 col-sm-6" style="margin-bottom:10px">
                                                <p>Phone</p>
                                                <input type="number" class="form-control" value="{{$UserInfo->phone}}" name="phone" placeholder="phone">
                                            </div>
                                            <div class="col-12 col-sm-6" style="margin-bottom:10px">
                                                <p>Password</p>
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                            <div class="col-12 col-sm-6" style="margin-bottom:10px">
                                                <p>Confirm Password</p>
                                                <input type="password" class="form-control" name="con_pass" placeholder="Confrim Password">
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-top: 10px">
                                                <button type="submit" class="btn btn-block btn-success glow">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="/admin/ManageProfile/deactivated" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="col-12 col-sm-12" style="margin-top: 10px">
                                            <button type="submit" class="btn btn-block btn-danger glow">Deactivated</button>
                                        </div>
                                    </form>
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