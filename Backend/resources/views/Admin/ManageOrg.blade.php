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
                                    <!-- datatable start -->
                                    <div class="table-responsive">
                                        <table id="seven-item-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%;">SN</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Info</th>
                                                    <th>Status</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($allOrgs as $key => $orgs)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td> 
                                                        @if($orgs->image)
                                                            <?php if (file_exists("../public".$orgs->image)){ ?>
                                                                <div class="osahan-slider-item" style="background-color:#fff;">
                                                                    <img src="{{asset($orgs->image)}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
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
                                                        @if($orgs->status != "3")
                                                            <form action="{{ url('/admin/manageOrg/updateImage') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="text" name="orgEdiImageId" value="{{ $orgs->id }}" hidden>
                                                                <div class="row" style="margin-top: 10px">
                                                                    <div class="col-6">
                                                                        <fieldset class="form-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="inputGroupFile02" name="editOrgImage" required>
                                                                                <label class="custom-file-label" for="inputGroupFile02"></label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <button type="submit" class="btn btn-success glow">Save</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <b>{{ $orgs->name }}</b> <br>
                                                        <small> <b>userId: </b> {{ $orgs->user_id }}</small>
                                                        @if(!$orgs->user_id)
                                                        <a class="nav-hover" href="#">
                                                            <span class="menu-title" data-toggle="modal" data-target="#addUserModal" data-i18n="City Manager" onclick="addUser('{{ $orgs->id }}')"> <b> Add User </b></span>
                                                        </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                    <b>Phone: </b> {{ $orgs->phone }}</small> <br>
                                                    <b>Address: </b> {{ $orgs->address }}</small>
                                                    </td>
                                                    @if($orgs->status == "2" || $orgs->status == "3")
                                                        <td class="text-center" style="width: 5%">
                                                            <div class="custom-control custom-switch custom-control-inline mb-1">
                                                                <input type="checkbox" class="custom-control-input">
                                                                <label class="custom-control-label"></label>
                                                            </div>
                                                        </td>
                                                    @else
                                                        @if($orgs->status == "1")
                                                        <td class="text-center" style="width: 5%">
                                                            <div class="custom-control custom-switch custom-control-inline mb-1">
                                                                <input type="checkbox" class="custom-control-input" checked="" id="statusSwitch{{ $key }}" value="0" onclick="statusUpdate('{{ $orgs->id }}', '{{ $key }}')">
                                                                <label class="custom-control-label" for="statusSwitch{{ $key }}"></label>
                                                            </div>
                                                        </td>
                                                        @else
                                                        <td class="text-center" style="width: 5%">
                                                            <div class="custom-control custom-switch custom-control-inline mb-1">
                                                                <input type="checkbox" class="custom-control-input" id="statusSwitch{{ $key }}" value="1" onclick="statusUpdate('{{ $orgs->id }}', '{{ $key }}')">
                                                                <label class="custom-control-label" for="statusSwitch{{ $key }}"></label>
                                                            </div>
                                                        </td>
                                                        @endif
                                                    @endif
                                                    <td>
                                                        @if($orgs->status == "3")
                                                            <a href="{{URL::to('/admin/pendingOrg/accept/'.base64_encode($orgs->id)) }}" class="btn btn-info glow" style="margin-top: 3px" >Accept</a>
                                                            <a href="{{URL::to('/admin/pendingOrg/delete/'.base64_encode($orgs->id)) }}" class="btn btn-danger glow" style="margin-top: 3px" >Delete</a>
                                                        @else
                                                            <button type="submit" data-toggle="modal" data-target="#updateModal" class="btn btn-info glow" onclick="updateUser('{{ $orgs->id }}', '{{ $orgs->name }}', '{{ $orgs->phone }}', '{{ $orgs->address }}', '{{ $orgs->details }}')">Edit</button>
                                                            <button type="submit" id="deleteBtn" class="btn btn-danger glow" style="margin-top: 3px"  onclick="deleteOrg('{{ $orgs->id }}')">Delete</button>
                                                            @if($orgs->status == "1" || $orgs->status == "0")
                                                                <button type="submit" id="blockBtn" class="btn btn-danger glow" style="margin-top: 3px"  onclick="blockOrg('{{ $orgs->id }}',2)">Block</button>
                                                            @elseif($orgs->status == "2")
                                                                <button type="submit" id="blockBtn" class="btn btn-danger glow" style="margin-top: 3px"  onclick="blockOrg('{{ $orgs->id }}',1)">UnBlock</button>
                                                            @endif
                                                        @endif
                                                        
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                        <div class="col-md-12 col-12 overflow-auto">
                                            {!! $allOrgs->links() !!}
                                        </div>
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

    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/admin/manageOrg/addOrgUser') }}" enctype="multipart/form-data" method="POST">
                @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Assign User</h4>
                    </div>
                    <div style="padding: 10px;">
                        <div class="form-group row">
                            <!-- <label class="col-sm-3 control-label">ID: </label> -->
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" id="edit_orgid" placeholder="ID" name="edit_orgid" required>
                            </div>
                        </div> 
                        <!-- /form-group-->
                        <div class="row">
                            <label for="editName" class="col-sm-3 control-label">Select User </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <fieldset class="form-group">
                                    <select name="user_id" class="form-control" id="basicSelect" required>
                                        <option disabled selected>Select User</option>
                                        @foreach($allUsers as $key => $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->username }} </option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                        </div> <!-- /form-group-->
                    </div>
                    <div class="modal-footer editBrandFooter">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                        <button type="submit" class="btn btn-success" id="editAddUserBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                    </div>
                <!-- /modal-footer -->
                </form>
                <!-- /.form -->
            </div>
            <!-- /modal-content -->
        </div>
        <!-- /modal-dailog -->
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/admin/manageOrg/updateInfo') }}" enctype="multipart/form-data" method="POST">
                @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
                    </div>
                    <div style="padding: 10px;">
                        <div class="form-group row">
                            <!-- <label class="col-sm-3 control-label">ID: </label> -->
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" id="edit_id" placeholder="ID" name="edit_id" required>
                            </div>
                        </div> 
                        <!-- /form-group-->
                        <div class="row">
                            <label for="editName" class="col-sm-3 control-label">Name </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editName" placeholder="Name" name="editName" required>
                            </div>
                        </div> <!-- /form-group-->
                        <div class="row" style="margin-top:5px">
                            <label for="editPhone" class="col-sm-3 control-label">Phone </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="editPhone" name="editPhone" placeholder="Number" required>
                            </div>
                        </div>
                        <div class="row" style="margin-top:5px">
                            <label for="editAddress" class="col-sm-3 control-label">Address </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editAddress" placeholder="Email" name="editAddress" required>
                            </div>
                        </div> <!-- /form-group-->
                        <div class="row" style="margin-top:5px">
                            <label for="edit_details" class="col-sm-3 control-label">Details </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <fieldset class="form-group">
                                    <textarea class="form-control" name="edit_details" id="edit_details" rows="3" placeholder="Details" required></textarea>
                                </fieldset>
                            </div>
                        </div> <!-- /form-group-->
                        
                    </div>
                    <div class="modal-footer editBrandFooter">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                        <button type="submit" class="btn btn-success" id="editOrgBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
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

        function addUser(Id) {
            $('#edit_orgid').val(Id)
        }
        function updateUser(Id, name,phone, address, details) {
            $('#edit_id').val(Id)
            $('#editName').val(name)
            $('#editPhone').val(phone)
            $('#editAddress').val(address)
            $('#edit_details').val(details)
        }

        function statusUpdate(org_id, item) {
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
                url: "{{ url('/admin/manageOrg/updateStatus') }}",
                type: "POST",
                data: {
                    id: org_id,
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
        
        function blockOrg(orgId,value) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be able to revert this!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Do it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                    document.getElementById('blockBtn').innerText = 'Loading..';
                    var status = "0";
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('/admin/manageOrg/block') }}",
                        type: "POST",
                        data: {
                            orgId: orgId,
                            value: value
                        },
                        success: function(result) {
                            if (!result.error) {
                                document.getElementById('blockBtn').innerText = 'Done';
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: result.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                location.reload();
                            } else {
                                document.getElementById('blockBtn').innerText = 'Error';
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

        function deleteOrg(orgId) {
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
                        url: "{{ url('/admin/manageOrg/delete') }}",
                        type: "POST",
                        data: {
                            orgId: orgId
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