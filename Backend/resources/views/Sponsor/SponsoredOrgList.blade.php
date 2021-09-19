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
                                            @foreach($sponsorOrgList as $key => $spList)
                                                <tbody>
                                                    <tr>
                                                        <td><b>{{$key+1}}</b></td>
                                                        <td>
                                                        @if($spList->sponsorLogo )
                                                            <div class="osahan-slider-item" style="background-color:#fff;">
                                                                <img src="{{asset( $spList->sponsorLogo  )}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Event image">
                                                            </div>
                                                        @else
                                                            <div class="osahan-slider-item" style="background-color:#fff;">
                                                                <img src="{{asset('/images/pages/loading.gif')}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Event image">
                                                            </div>
                                                        @endif
                                                        </td>
                                                        <td>
                                                            <b>{{$spList->title}}</b>
                                                        </td>
                                                        <td>
                                                            <b>{{$spList->details}}</b>
                                                        </td>
                                                        <td>
                                                            <b>{{$spList->startDate}}</b>
                                                        </td>
                                                        <td>
                                                            <b>{{$spList->endDate}}</b>
                                                        </td>
                                                        <td>
                                                            <b>{{$spList->amount}}</b>
                                                        </td>
                                                        <td>
                                                            <button type="submit" data-toggle="modal" data-target="#updateModal" class="btn btn-info glow" onclick="updateSponsership('{{ $spList->title }}', '{{ $spList->details }}', '{{ $spList->startDate }}', '{{ $spList->endDate }}' ,'{{ $spList->amount }}' ,'{{ $spList->id }}')">Edit</button>
                                                            <button type="submit" id="deleteBtn" class="btn btn-danger glow" style="margin-top: 3px"  onclick="deleteSponsorship()">Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
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

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            
            <form class="form-horizontal" id="editBrandForm" action="{{ url('/sp/UpdateAppliedInOrg') }}" method="POST">
                @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i>Update</h4>
                    </div>
                    <div style="padding: 10px;">
                        <div class="form-group row">
                            <!-- <label class="col-sm-3 control-label">ID: </label> -->
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" id="spoId" placeholder="ID" name="spoId" required>
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
                    </div>
                    <div class="modal-footer editBrandFooter">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                        <button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i>Update</button>
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
        function updateSponsership(title, details, startDate, endDate , amount,id) {
            $('#title').val(title)
            $('#editStartDate').val(startDate)
            $('#editEndDate').val(endDate)
            $('#details').val(details)
            $('#editAmount').val(amount)
            $('#spoId').val(id)
        }

        function deleteEvent() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                    document.getElementById('deleteBtn').innerText = 'Loading..';
                    var status = "0";
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "#",
                        type: "POST",
                        data: {
                            promo_id: promo_id,
                            promo_status: status
                        },
                        success: function(result) {
                            if (!result.error) {
                                document.getElementById('deleteBtn').innerText = 'Done';
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: result.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                location.reload();
                            } else {
                                document.getElementById('deleteBtn').innerText = 'Error';
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'danger',
                                    title: result.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                location.reload();
                            }
                        }
                    });
                }
            })
        }
    </script>

</body>
@endsection