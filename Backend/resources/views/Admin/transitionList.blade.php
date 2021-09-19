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
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="#" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="row">
                                            <h1 class="container">All Transition List</h1>
                                            <h5 class="">{{$eventName}}</h5>
                                            <div class="table-responsive">
                                                <table id="seven-item-datatable" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Event Name</th>
                                                            <th>User Name</th>
                                                            <th>Amount</th>
                                                            <th>Others</th>
                                                            <th>Status</th>
                                                            <th>Refund</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($allTransitions as $key => $trans)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>
                                                                {{$trans->event_name}}
                                                            </td>
                                                            <td>{{$trans->name}}</td>
                                                            <td>{{$trans->amount}}</td>
                                                            <td>
                                                                @if($trans->visibleType == 1)
                                                                    <small> <b>Visible Type: </b> Show</small><br>
                                                                @elseif($trans->visibleType == 2)
                                                                    <small> <b>Visible Type: </b> Hide</small><br>
                                                                @endif
                                                                <small> <b>Date: </b> {{ date("d M, Y",strtotime($trans->created_at))}}</small><br>
                                                            </td>
                                                            <td>
                                                                @if($trans->status == 1)
                                                                    <small style="color:blue"> <b>Active</b></small><br>
                                                                @elseif($trans->status == 5)
                                                                    <small style="color:red"> <b> Waiting for Refund </b></small><br>
                                                                @elseif($trans->status == 6)
                                                                    <small style="color:green"> <b> Refund Done </b></small><br>
                                                                @elseif($trans->status == 0)
                                                                    <small > <b> Cancel </b></small><br>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($trans->status == 5)
                                                                <a href="{{ URL::to('/example2/'.base64_encode($trans->id).'/'.base64_encode(0).'/'.base64_encode(4)) }}" class="btn btn-danger">Refund</a>
                                                                @elseif($trans->status == 6)
                                                                <a class="btn btn-success" style="color:white">Refund Done</a>
                                                                @else
                                                                <a class="btn btn-primary" style="color:white">Not applied</a>
                                                                @endif
                                                            </td>
                                                            
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <div class="col-md-12 col-12 overflow-auto">
                                                        {!! $allTransitions->links() !!}
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