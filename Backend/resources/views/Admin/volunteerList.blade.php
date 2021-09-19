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
                                
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="#" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="row">
                                            <h1 class="container">All Volunteer List</h1>
                                            <h5>{{$eventName}}</h5>
                                            <div class="table-responsive">
                                                <table id="seven-item-datatable" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>User Image</th>
                                                            <th>User name </th>
                                                            <th>Phone</th>
                                                            <th>Status</th>
                                                            <th>Event Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($allVolunteers as $key => $volunteer)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>
                                                                @if($volunteer->image)
                                                                    <?php if (file_exists("../public".$volunteer->image)){ ?>
                                                                        <div class="osahan-slider-item" >
                                                                            <img src="{{asset($volunteer->image)}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                                                                        </div>
                                                                        <?php } else{ ?>
                                                                        <div class="osahan-slider-item" style="background-color:#fff;">
                                                                            <img src="https://i.gifer.com/B0eS.gif" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                                                                        </div>
                                                                    <?php } ?>
                                                                @else
                                                                    <div class="osahan-slider-item" style="background-color:#fff;">
                                                                        <img src="https://i.gifer.com/VuKc.gif" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                                                                    </div>
                                                                @endif
                                                            </td>
                                                            <td>{{$volunteer->user_name}}</td>
                                                            <td>{{$volunteer->phone}}</td>
                                                            @if($volunteer->status==1)
                                                                <td>Active</td>
                                                            @else
                                                            <td>Deleted</td>
                                                            @endif
                                                            <td>{{$volunteer->event_name}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <div class="col-md-12 col-12 overflow-auto">
                                                        {!! $allVolunteers->links() !!}
                                                    </div>
                                                </table>
                                            </div>
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