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
                                                    <th>Organisation Name</th>
                                                    <th>Contact Number</th>
                                                    <th>Address</th>
                                                    <th>Event Type</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($allOrgList as $key => $orgList)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>
                                                        @if($orgList->image)
                                                            <div class="osahan-slider-item" style="background-color:#fff;">
                                                                <img src="{{asset( $orgList->image )}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Event image">
                                                            </div>
                                                        @else
                                                            <div class="osahan-slider-item" style="background-color:#fff;">
                                                                <img src="{{asset('/images/pages/loading.gif')}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Event image">
                                                            </div>
                                                        @endif
                                                     
                                                    </td>
                                                    <td>
                                                        <b>{{$orgList->name}}</b>
                                                    </td>
                                                    <td>
                                                        <b>{{$orgList->phone}}</b>
                                                    </td>
                                                    <td>
                                                        <b>{{$orgList->address}}</b>
                                                    </td>
                                                    <td>
                                                        {{$orgList->details}}
                                                    </td>
                                                    <td>
                                                        <button type="submit" data-toggle="modal" data-target="#updateModal" class="btn btn-success glow" onclick="apply('{{ $orgList->id }}')">Apply</button>
                                                    </td>
                                                </tr>
                                            @endforeach
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

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            
            <form class="form-horizontal" id="editBrandForm" action="{{ url('/sp/applyInOrg') }}" method="POST">
                @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i>Apply</h4>
                    </div>
                    <div style="padding: 10px;">
                        <div class="form-group row">
                            <!-- <label class="col-sm-3 control-label">ID: </label> -->
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="orgId" placeholder="ID" name="orgId" required>
                            </div>
                        </div> 
                        <!-- /form-group-->
                        <div class="row">
                            <label for="title" class="col-sm-3 control-label">Title: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="title" placeholder="Code" name="title" required>
                            </div>
                        </div> <!-- /form-group-->
                        <div class="row" style="margin-top:5px">
                            <label for="editStartDate" class="col-sm-3 control-label">Start: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="datetime-local" class="form-control" id="editStartDate" name="editStartDate" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="row" style="margin-top:5px">
                            <label for="editEndDate" class="col-sm-3 control-label">End: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="datetime-local" class="form-control" id="editEndDate" placeholder="End Date" name="editEndDate" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="row" style="margin-top:5px">
                            <label for="details" class="col-sm-3 control-label">Details: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="details" id="details" rows="3" placeholder="Conditions" required></textarea>
                                <!-- <input type="text" class="form-control" id="editPromoCon" placeholder="Conditions" name="editPromoCon" required> -->
                            </div>
                        </div> <!-- /form-group-->
                        <div class="row" style="margin-top:5px">
                            <label for="editAmount" class="col-sm-3 control-label"> Amount</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editAmount" placeholder="Discount Amount" name="editAmount" required>
                            </div>
                        </div>
                        <!-- <div class="row" style="margin-top:5px">
                            <label for="image" class="col-sm-3 control-label"> Sponsor Logo</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="image" placeholder="Discount Amount" name="image" required>
                            </div>
                        </div> -->
                    </div>
                    <div class="modal-footer editBrandFooter">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                        <button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i>Submit</button>
                    </div>
                <!-- /modal-footer -->
                </form>
                <!-- /.form -->
            </div>
            <!-- /modal-content -->
        </div>
        <!-- /modal-dailog -->
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('Layout.footer')

    @include('Layout.scripts')

    <script>  
        function apply(orgId){
            $('#orgId').val(orgId)
        }
    </script>

</body>
@endsection