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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="#" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="row">
                                            <h1 class="container p-3 mb-2 bg-secondary text-white">Transition List</h1>
  
                                            <table class="table table-success table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>Type</th>
                                                        <th>Name</th>
                                                        <th>Details</th>
                                                        <th>Donated amount</th>
                                                    </tr>
                                                </thead>
                                                    @foreach($allTransactionList as $key => $transactionList)
                                                        <tbody>
                                                            <tr>
                                                                <td>{{$key+1}}</td>
                                                                <td>
                                                                @if($transactionList->paymentType == 1)
                                                                        <b>Event</b>
                                                                @elseif($transactionList->paymentType == 2)
                                                                        <b>Organisation</b>
                                                                @elseif($transactionList->paymentType == 3)
                                                                        <b>Fundbox</b>
                                                                @endif

                                                                </td>
                                                                <td>{{$transactionList->event_name}}</td>
                                                                </td>
                                                                <td>
                                                                    @if($transactionList->visibleType == 1)
                                                                        <small> <b>Visible Type: </b> Show</small><br>
                                                                    @elseif($transactionList->visibleType == 2)
                                                                        <small> <b>Visible Type: </b> Hide</small><br>
                                                                    @endif
                                                                    <small> <b>Date: </b> {{ date("d M, Y",strtotime($transactionList->created_at))}}</small><br>
                                                                </td>
                                                                <td>{{$transactionList->amount}}</td>
                                                            </tr>
                                                    @endforeach
                                            </table>
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