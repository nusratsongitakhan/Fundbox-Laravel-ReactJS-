@extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('Layout.orgMenu')


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
                                                    
                                                    <th>Id</th>
                                                    <th>Image</th>
                                                    <th>Event Name</th>
                                                    <th>details</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($EventList as $user)
                                                 <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td> @if($user->image)
                                                            <?php if (file_exists("../public".$user->image)){ ?>
                                                            <div class="osahan-slider-item" style="background-color:#fff;">
                                                                <img src="{{asset($user->image)}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
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
                                                @endif</td> 
                                                 <td>{{$user->event_name}}</td>
                                                  <td>{{$user->details}}</td>
                                                  {{-- <td><a href="/org/edit/{{$user->id}}/{{$user->eventType}}"> Edit </a></td> --}}
                                                   <td><button type="submit" data-toggle="modal" data-target="#updateModal" class="btn btn-info glow" onclick="updateEvent('{{ $user->id }}', '{{ $user->event_name }}', '{{ $user->details }}', '{{ $user->venue }}')">Edit</button> </td>
                                                  <td><a href="/org/delete/{{$user->id}}/{{$user->eventType}}"> Delete </a></td>
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
                <form action ="{{url('/org/ManageVolunteerEvent/updateVolEvent')}}"class="form-horizontal" enctype="multipart/form-data" method="POST">
                @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
                    </div>
                    <div style="padding: 10px;">
                        <div class="form-group row">
                            <!-- <label class="col-sm-3 control-label">ID: </label> -->
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editId" placeholder="ID" name="editId" required>
                            </div>
                        </div> 
                        <!-- /form-group-->
                        {{-- <div class="row"style="margin-top:5px" >
                                <input type="text" class="form-control" id="editId" placeholder="Id" name="editId" required>
                        </div> --}}
                        <div class="row">
                            <label for="editName" class="col-sm-3 control-label">Name </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editName" placeholder="Name" name="editName" required>
                            </div>
                        </div>  <!-- /form-group-->
                        <div class="row" style="margin-top:5px">
                            <label for="eventDetails" class="col-sm-3 control-label">Details: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="eventDetails" id="eventDetails" rows="3" placeholder="Details" required></textarea>
                                <!-- <input type="text" class="form-control" id="eventDetails" placeholder="Conditions" name="editPromoCon" required> -->
                            </div>
                        </div> <!-- /form-group-->
                        <div class="row" style="margin-top:5px">
                            <label for="editVenue" class="col-sm-3 control-label">Venue</label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editVenue" placeholder="Venue" name="editVenue" required>
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
        function updateEvent($id,$name,$details,$venue) {
            $('#editId').val(id)
            $('#editName').val(name)
            $('#eventDetails').val(details)
            $('#editVenue').val(venue)
        }

        function statusUpdate("code", 1) {
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
                url: "#",
                type: "POST",
                data: {
                    promo_id: promo_id,
                    promo_status: status
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
