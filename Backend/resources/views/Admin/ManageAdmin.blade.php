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
                                                <option value="/admin/userExport">Excel</option>
                                                <option value="/admin/userCSVExport">PDF</option>
                                                <option value="/admin/userPDFExport">CSV</option>
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
                                                    <th>Name</th>
                                                    <th>Info</th>
                                                    <th>Status</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($allAdmins as $key => $admin)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td> 
                                                        @if($admin->image)
                                                            <?php if (file_exists("../public".$admin->image)){ ?>
                                                                <div class="osahan-slider-item" style="background-color:#fff;">
                                                                    <img src="{{asset($admin->image)}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
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
                                                        <b>{{ $admin->name }}</b> <br>
                                                        <small> <b>username: </b> {{ $admin->username }}</small>
                                                        <br>
                                                        @if(session()->get('admin_is_super_admin')==1)
                                                            @if($admin->is_super_admin == 1 )
                                                            <a class="nav-hover" href="#">
                                                                <span class="menu-title" data-toggle="modal" data-target="#addUserModal" data-i18n="City Manager" onclick="makeSuperAdmin('{{ $admin->id }}','0')"> <b> Remove Super Admin </b></span>
                                                            </a>
                                                            @elseif($admin->is_super_admin == 0 )
                                                            <a class="nav-hover" href="#">
                                                                <span class="menu-title" data-toggle="modal" data-target="#addUserModal" data-i18n="City Manager" onclick="makeSuperAdmin('{{ $admin->id }}','1')"> <b> Make Super Admin </b></span>
                                                            </a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                    <b>Email: </b> {{ $admin->email }}</small> <br>
                                                    <b>Phone: </b> {{ $admin->phone }}</small>
                                                    </td>
                                                    @if(session()->get('admin_is_super_admin')==1)
                                                    @if($admin->status == "1")
                                                    <td class="text-center" style="width: 5%">
                                                        <div class="custom-control custom-switch custom-control-inline mb-1">
                                                            <input type="checkbox" class="custom-control-input" checked="" id="statusSwitch{{ $key }}" value="0" onclick="statusUpdate('{{ $admin->id }}', '{{ $key }}')">
                                                            <label class="custom-control-label" for="statusSwitch{{ $key }}"></label>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td class="text-center" style="width: 5%">
                                                        <div class="custom-control custom-switch custom-control-inline mb-1">
                                                            <input type="checkbox" class="custom-control-input" id="statusSwitch{{ $key }}" value="1" onclick="statusUpdate('{{ $admin->id }}', '{{ $key }}')">
                                                            <label class="custom-control-label" for="statusSwitch{{ $key }}"></label>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    @else
                                                    <td class="text-center" style="width: 5%">
                                                        <div class="custom-control custom-switch custom-control-inline mb-1">
                                                            <input type="checkbox" class="custom-control-input" >
                                                            <label class="custom-control-label" ></label>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <button type="submit" data-toggle="modal" data-target="#updateModal" class="btn btn-info glow" onclick="updateUser('{{ $admin->id }}', '{{ $admin->name }}', '{{ $admin->email }}', '{{ $admin->phone }}')">Edit</button>
                                                        @if(session()->get('admin_is_super_admin')==1)
                                                        <button type="submit" id="deleteBtn" class="btn btn-danger glow" style="margin-top: 3px"  onclick="deleteAdmin('{{ $admin->id }}')">Delete</button>
                                                        @endif
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
                <form action="{{ url('/admin/manageAdmin/updateUserInfo') }}" enctype="multipart/form-data" method="POST">
                @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
                    </div>
                    <div style="padding: 10px;">
                        <div class="form-group row">
                            <!-- <label class="col-sm-3 control-label">ID: </label> -->
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" id="editUser_id" placeholder="ID" name="editUser_id" required>
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
                            <label for="editEmail" class="col-sm-3 control-label">Email </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editEmail" placeholder="Email" name="editEmail" required>
                            </div>
                        </div> <!-- /form-group-->
                        <div class="row" style="margin-top:5px">
                            <label for="editPhone" class="col-sm-3 control-label">Phone </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="editPhone" name="editPhone" placeholder="Number" required>
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

        function updateUser(userId, userName, email,phone) {
            $('#editUser_id').val(userId)
            $('#editName').val(userName)
            $('#editEmail').val(email)
            $('#editPhone').val(phone)
        }

        function makeSuperAdmin(user_id,value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('/admin/manageAdmin/makeSuperAdmin') }}",
                type: "POST",
                data: {
                    user_id: user_id,
                    value: value
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
                        location.reload();
                    } else {
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

        function statusUpdate(user_id, item) {
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
                url: "{{ url('/admin/manageAdmin/updateStatus') }}",
                type: "POST",
                data: {
                    user_id: user_id,
                    user_status: status
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

        function deleteAdmin(adminId) {
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
                        url: "{{ url('/admin/manageAdmin/deleteAdmin') }}",
                        type: "POST",
                        data: {
                            adminId: adminId
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