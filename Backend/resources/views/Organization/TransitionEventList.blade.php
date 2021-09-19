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
                                    <div class="table-responsive">
                                        <table id="seven-item-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%;">SN</th>
                                                    <th>Event Name</th>
                                                    <th>User Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        @foreach ($Transaction as $Req)
                                                    
                                        
                                        <tr>
                                            <td>{{$Req->id}}</td>
                                            
                                            <td>
                                                <b>{{$Req->event_name}}</b>
                                            </td>
                                            <td>
                                                <b>{{$Req->name}}</b>
                                            </td>
                                            <td>
                                                <b>{{$Req->amount}}</b>
                                            </td>
                                            <td>
                                                <a href="{{route('org.refund',$Req->id)}}" class="btn btn-danger">Refund money</a>
                                                
                                            </td>
                                            
                                            
                                        </tr>
                                                 @endforeach
                                           <td>
                                                <a href="{{route('org.transactionspdf')}}" class="btn btn-success"> Download PDF</a>   
                                                
                                            </td>
                                               <td>
                                                <a href="{{route('org.transactionsexcel')}}" class="btn btn-success"> Download excel</a>   
                                                
                                            </td>
                                            </tbody>
                                        </table>
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