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
                                                    <th style="width:30%;">Name</th>
                                                    <th style="width:30%;">Others</th>
                                                    <th style="width:30%;">Details</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($pendingSponsor as $key => $sponsor)
                                                <tr>
                                                    <td>{{1+$key}}</td>
                                                    <td>
                                                    @if($sponsor->spoImage)
                                                        <?php if (file_exists("../public".$sponsor->spoImage)){ ?>
                                                            <div class="osahan-slider-item" style="background-color:#fff;">
                                                                <img src="{{asset($sponsor->spoImage)}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
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
                                                        <b>Sponsor: {{$sponsor->spoName}}</b><br>
                                                        <small> <b>user Name: </b> {{ $sponsor->name }}</small><br>
                                                        <small> <b>Usename: </b> {{ $sponsor->username }}</small><br>
                                                    </td>
                                                    <td>
                                                        <small> <b>Email: </b> {{ $sponsor->email }}</small><br>
                                                        <small> <b>Phone: </b> {{ $sponsor->phone }}</small><br>
                                                        <small> <b>Amout: </b> {{ $sponsor->amount }}</small><br>
                                                        <small> <b>Start: </b> {{ date("d M, Y",strtotime($sponsor->startDate))}}</small><br>
                                                        <small> <b>End: </b> {{ date("d M, Y",strtotime($sponsor->endDate))}}</small><br>
                                                        
                                                    </td>
                                                    <td>
                                                        <small>{{$sponsor->details}}</small>
                                                    </td>
                                                    
                                                    <td>
                                                        <button type="submit" class="btn btn-info glow" onclick="acceptSponsor('{{ $sponsor->id }}')">Accept</button>
                                                        <button type="submit" id="deleteBtn" class="btn btn-danger glow" style="margin-top: 3px"  onclick="deleteSponsor('{{ $sponsor->id }}')">Delete</button>
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

    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('Layout.footer')

    @include('Layout.scripts')

    <script>

        function acceptSponsor(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, do it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                    document.getElementById('deleteBtn').innerText = 'Loading..';
                    var status = "0";
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('/admin/sponsor/accept') }}",
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

        function deleteSponsor(id) {
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
                        url: "{{ url('/admin/sponsor/delete') }}",
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