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
                                                    <th style="width:5%;">SL</th>
                                                    <th>Image</th>
                                                    <th>Advertise Title</th>
                                                    <th>Post Date</th>
                                                    <th>Status</th>
                                                    <th>Options</th>
                                                </tr> 
                                            </thead>
                                            <tbody>
                                            @foreach($allAdvertise as $key => $advertise)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>
                                                        @if($advertise->image)
                                                            <div class="osahan-slider-item" style="background-color:#fff;">
                                                                <img src="{{asset( $advertise->image )}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Event image">
                                                            </div>
                                                        @else
                                                            <div class="osahan-slider-item" style="background-color:#fff;">
                                                                <img src="{{asset('/images/pages/loading.gif')}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Event image">
                                                            </div>
                                                        @endif
                                                    
                                                    </td>
                                                    <td>
                                                        <b>{{ $advertise->title }}</b>
                                                    </td>
                                                    <td>
                                                        {{ date("d M, Y",strtotime($advertise->created_at))}}
                                                    </td>
                                                    @if($advertise->status == "1")
                                                    <td class="text-center" style="width: 5%">
                                                        <div class="custom-control custom-switch custom-control-inline mb-1">
                                                            <input type="checkbox" class="custom-control-input" checked="" id="statusSwitch{{ $key }}" value="0" onclick="statusUpdate('{{ $advertise->id }}', '{{ $key }}')">
                                                            <label class="custom-control-label" for="statusSwitch{{ $key }}"></label>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td class="text-center" style="width: 5%">
                                                        <div class="custom-control custom-switch custom-control-inline mb-1">
                                                            <input type="checkbox" class="custom-control-input" id="statusSwitch{{ $key }}" value="1" onclick="statusUpdate('{{ $advertise->id }}', '{{ $key }}')">
                                                            <label class="custom-control-label" for="statusSwitch{{ $key }}"></label>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <button type="submit" data-toggle="modal" data-target="#updateModal" class="btn btn-info glow" onclick="updateSponsorship('{{ $advertise->id }}', '{{ $advertise->title }}')">Edit</button>
                                                        <button type="submit" id="deleteBtn" class="btn btn-danger glow" style="margin-top: 3px"  onclick="deleteSponsorship('{{ $advertise->id }}')">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
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
                <form action="{{ url('/sp/addAdvertise/updateAddInfo') }}" enctype="multipart/form-data" method="POST">
                @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
                    </div>
                    <div style="padding: 10px;">
                        <div class="form-group row">
                            <!-- <label class="col-sm-3 control-label">ID: </label> -->
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" id="editAddId" placeholder="ID" name="editAddId" required>
                            </div>
                        </div> 
                        <!-- /form-group-->
                        <div class="row">
                            <label for="editTitle" class="col-sm-3 control-label">Title </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editTitle" placeholder="Title" name="editTitle" required>
                            </div>
                        </div> <!-- /form-group-->
                        <fieldset class="form-group">
                                 <div class="custom-file">
                                       <label class="custom-file-label mt-1" for="inputGroupFile02">Choose Advertise Banner</label>
                                       <input type="file" class="custom-file-input" id="inputGroupFile02" name="editImage">
                                </div>
                         </fieldset>
                        
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

function updateSponsorship(AddId, AddTitle){
    $('#editAddId').val(AddId)
    $('#editTitle').val(AddTitle)
}

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
        url: "{{ url('/sp/addAdvertise/updateStatus') }}",
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
function deleteSponsorship(id) {
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
                url: "{{ url('/sp/addAdvertise/delete') }}",
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