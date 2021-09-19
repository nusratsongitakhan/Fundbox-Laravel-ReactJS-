@extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('Layout.OrgMenu')

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
                                        <div class="row">
                                            <h1 class="container p-3 mb-2 bg-secondary text-white">Events List</h1>
  
                                        <table class="table table-success table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Image</th>
                                                    <th>Event Name</th>
                                                    <th>targetMoney</th>
                                                    <th>eventType</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($EventList as $key => $user) 
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
                                                    <td>{{$user->targetMoney}}$</td>
                                                    <td>{{$user->eventType}}</td>
                                                     @if($user->status == "1")
                                                        <td class="text-center" style="width: 5%">
                                                            <div class="custom-control custom-switch custom-control-inline mb-1">
                                                                <input type="checkbox" class="custom-control-input" checked="" id="statusSwitch{{ $key }}" value="0" onclick="statusUpdate('{{ $user->id }}', '{{ $key }}')">
                                                                <label class="custom-control-label" for="statusSwitch{{ $key }}"></label>
                                                            </div>
                                                        </td>
                                                        @else
                                                        <td class="text-center" style="width: 5%">
                                                            <div class="custom-control custom-switch custom-control-inline mb-1">
                                                                <input type="checkbox" class="custom-control-input" id="statusSwitch{{ $key }}" value="1" onclick="statusUpdate('{{ $user->id }}', '{{ $key }}')">
                                                                <label class="custom-control-label" for="statusSwitch{{ $key }}"></label>
                                                            </div>
                                                        </td>
                                                        @endif
                                                    <td> <button type="submit" data-toggle="modal" data-target="#detailseModal" class="btn btn-info glow" onclick="viewDetiils('{{ $user->event_name }}', '{{ $user->details }}')">Details</button></td>
                                                    <td><a href="/org/edit/{{$user->id}}/{{$user->eventType}}"> Edit </a></td>
                                                    <td><a href="/org/delete/{{$user->id}}/{{$user->eventType}}"> Delete </a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>

                                        </div>
                                    
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
 <div class="modal fade" id="detailseModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
        
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
                    </div>
                    <div style="padding: 10px;">
                        
                        <div class="row">
                            <label for="eventName" class="col-sm-3 control-label">Name </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="eventName" placeholder="Name" name="eventName" required>
                            </div>
                        </div> 
                        <div class="row" style="margin-top:5px">
                            <label for="editDetails" class="col-sm-3 control-label">Details </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="editDetails" placeholder="details" name="editDetails" required></textarea>
                                
                            </div>
                        </div> 
                        
                    <div class="modal-footer editBrandFooter">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                    </div>
                <!-- /modal-footer -->
              
               
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
        function viewDetiils(name, details) {
            $('#eventName').val(name)
            $('#editDetails').val(details)
        }
                function statusUpdate(event_id, item) {
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
                url: "{{ url('/org/edit/statusUpdate') }}",
                type: "POST",
                data: {
                    id: event_id,
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

       
    </script>

</body>
@endsection