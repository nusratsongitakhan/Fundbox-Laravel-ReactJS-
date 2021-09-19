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
                        
                    </div>
                    <div class="restaurant-list-table">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="col-12 col-sm-12 col-lg-3" style="margin-left: auto;">
                                        <fieldset class="form-group">
                                            Download List
                                            <select name="forma" onchange="location = this.value;">
                                                <option selected disable value="">Select Option</option>
                                                <option value="/admin/eventExvelExport">Excel</option>
                                                <option value="/admin/eventPDFExport">PDF</option>
                                                <option value="/admin/eventCSVExport">CSV</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <!-- datatable start -->
                                    <div class="table-responsive">
                                        <table id="seven-item-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%;">SN</th>
                                                    <th>Image</th>
                                                    <th style="width:30%;">Name</th>
                                                    <th style="width:30%;">Others</th>
                                                    <th>Status</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($allEvents as $key => $event)
                                                <tr>
                                                    <td>{{1+$key}}</td>
                                                    <td>
                                                    @if($event->image)
                                                        <?php if (file_exists("../public".$event->image)){ ?>
                                                            <div class="osahan-slider-item" style="background-color:#fff;">
                                                                <img src="{{asset($event->image)}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
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
                                                    <td>
                                                        <b>{{$event->event_name}}</b><br>
                                                        <small> <b>Details: </b> {{ $event->details }}</small><br>
                                                    </td>
                                                    <td>
                                                        <small> <b>Contact: </b> {{ $event->contact }}</small><br>
                                                        <small> <b>Category: </b> {{ $event->eventCategory }}</small><br>
                                                        @if($event->eventType == 2)
                                                            <small> <b>Event Type: </b> Volunteer</small><br>
                                                            <small> <b>Vanue: </b> {{ $event->venue }}</small><br>
                                                        @elseif($event->eventType == 1)
                                                            <small> <b>Event Type: </b> FundCollect</small><br>
                                                            <small> <b>Target Money: </b> {{ $event->targetMoney }}</small><br>
                                                        @endif
                                                        <small> <b>Target Date: </b> {{ $event->targetDate }}</small><br>
                                                        <small> <b>Reach: </b> {{ $event->visitor }}</small><br>
                                                    </td>
                                                    @if($event->status == "1")
                                                    <td class="text-center" style="width: 5%">
                                                        <div class="custom-control custom-switch custom-control-inline mb-1">
                                                            <input type="checkbox" class="custom-control-input" checked="" id="statusSwitch{{ $key }}" value="0" onclick="statusUpdate('{{ $event->id }}', '{{ $key }}')">
                                                            <label class="custom-control-label" for="statusSwitch{{ $key }}"></label>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td class="text-center" style="width: 5%">
                                                        <div class="custom-control custom-switch custom-control-inline mb-1">
                                                            <input type="checkbox" class="custom-control-input" id="statusSwitch{{ $key }}" value="1" onclick="statusUpdate('{{ $event->id }}', '{{ $key }}')">
                                                            <label class="custom-control-label" for="statusSwitch{{ $key }}"></label>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <button type="submit" data-toggle="modal" data-target="#updateModal" class="btn btn-info glow" onclick="updateEvent()">Edit</button>
                                                        <button type="submit" id="deleteBtn" class="btn btn-danger glow" style="margin-top: 3px"  onclick="deleteEvent('{{ $event->id }}')">Delete</button>
                                                        @if($event->eventType == 1)
                                                            <a href="{{URL::to('/admin/manageAcceptedEvent/fundResponse/'.base64_encode($event->id)) }}" class="btn btn-info glow" style="margin-top: 3px" >Response</a>
                                                        @else
                                                            <a href="{{URL::to('/admin/manageAcceptedEvent/volunteerResponse/'.base64_encode($event->id)) }}" class="btn btn-info glow" style="margin-top: 3px" >Response</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <div class="col-md-12 col-12 overflow-auto">
                                                {!! $allEvents->links() !!}
                                            </div>
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
                <form class="form-horizontal" id="editBrandForm" action="#" method="POST">
                @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
                    </div>
                    <div style="padding: 10px;">
                        <div class="form-group row">
                            <!-- <label class="col-sm-3 control-label">ID: </label> -->
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" id="editPromo_id" placeholder="ID" name="editPromo_id" required>
                            </div>
                        </div> 
                        <!-- /form-group-->
                        <div class="row">
                            <label for="editPromoCode" class="col-sm-3 control-label">Code: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editPromoCode" placeholder="Code" name="editPromoCode" required>
                            </div>
                        </div> <!-- /form-group-->
                        <div class="row" style="margin-top:5px">
                            <label for="editPromoCount" class="col-sm-3 control-label">Count: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editPromoCount" placeholder="Count" name="editPromoCount" required>
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
                            <label for="editPromoCon" class="col-sm-3 control-label">Conditions: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="editPromoCon" id="editPromoCon" rows="3" placeholder="Conditions" required></textarea>
                                <!-- <input type="text" class="form-control" id="editPromoCon" placeholder="Conditions" name="editPromoCon" required> -->
                            </div>
                        </div> <!-- /form-group-->
                        <div class="row" style="margin-top:5px">
                            <label for="editAmount" class="col-sm-3 control-label">Discount Amount</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editAmount" placeholder="Discount Amount" name="editAmount" required>
                            </div>
                        </div>
                        <div class="row" style="margin-top:5px">
                            <label for="editMinAmount" class="col-sm-3 control-label">Minimum Purchase Amount</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editMinAmount" placeholder="Minimum Purchase Amount" name="editMinAmount" required>
                            </div>
                        </div>
                        <div class="row">
                            <label for="edit_promo_type" class="col-sm-3 control-label">Promo type</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <fieldset class="form-group">
                                    <select name="edit_promo_type" class="form-control" id="edit_promo_type" required>
                                        <option disabled selected>Select Promo discount type</option>
                                        <option value="1">Flat</option>
                                        <option value="2">Percentage</option>
                                                            
                                    </select>
                                </fieldset>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer editBrandFooter">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                        <button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
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

        function statusUpdate(id, item) {
            var status = "";
            if ($("#statusSwitch" + item).val() == "1") {
                status = "1";
                $("#statusSwitch" + item).val("0");
            } else {
                status = "0";
                $("#statusSwitch" + item).val("1");
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('/admin/manageAcceptedEvent/updateStatus') }}",
                type: "POST",
                data: {
                    id: id,
                    status: status
                },
                success: function(result) {
                    if (!result.error) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: result.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'danger',
                            title: result.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            });
        }

        function deleteEvent(id) {
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
                        url: "{{ url('/admin/manageAdminEvent/delete') }}",
                        type: "POST",
                        data: {
                            id: id
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