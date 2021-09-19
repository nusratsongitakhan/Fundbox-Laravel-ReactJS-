@extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('Layout.SpMenu')

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
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Details</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Amount</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            @foreach($allOngoingOrgList as $key => $ongoingOrgList)
                                                <tbody>
                                                    <tr>
                                                        <td><b>{{$key+1}}</b></td>
                                                        <td>
                                                            @if($ongoingOrgList->sponsorLogo )
                                                                <div class="osahan-slider-item" style="background-color:#fff;">
                                                                    <img src="{{asset( $ongoingOrgList->sponsorLogo  )}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Event image">
                                                                </div>
                                                            @else
                                                                <div class="osahan-slider-item" style="background-color:#fff;">
                                                                    <img src="{{asset('/images/pages/loading.gif')}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Event image">
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <b>{{$ongoingOrgList->title}}</b>
                                                        </td>
                                                        <td>
                                                            <b>{{$ongoingOrgList->details}}</b>
                                                        </td>
                                                        <td>
                                                            <b>{{$ongoingOrgList->startDate}}</b>
                                                        </td>
                                                        <td>
                                                            <b>{{$ongoingOrgList->endDate}}</b>
                                                        </td>
                                                        <td>
                                                            <b>{{$ongoingOrgList->amount}}</b>
                                                        </td>
                                                        <td>
                                                            <a href="{{ URL::to('/example2/'.base64_encode($sponsorInfo->id).'/'.base64_encode($ongoingOrgList->org_Id).'/'.base64_encode(2)) }}" class="btn btn-info glow">Make a Payment</a>
                                                            
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endforeach
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

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('Layout.footer')

    @include('Layout.scripts')

    <script>  
    function updateEvent() {
        }

        
    </script>

</body>
@endsection