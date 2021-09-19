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
                                            @foreach($allPendingOrgList as $key => $pendingOrgList)
                                                <tbody>
                                                    <tr>
                                                        <td><b>{{$key+1}}</b></td>
                                                        <td>
                                                            @if($pendingOrgList->sponsorLogo )
                                                                <div class="osahan-slider-item" style="background-color:#fff;">
                                                                    <img src="{{asset( $pendingOrgList->sponsorLogo  )}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Event image">
                                                                </div>
                                                            @else
                                                                <div class="osahan-slider-item" style="background-color:#fff;">
                                                                    <img src="{{asset('/images/pages/loading.gif')}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Event image">
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <b>{{$pendingOrgList->title}}</b>
                                                        </td>
                                                        <td>
                                                            <b>{{$pendingOrgList->details}}</b>
                                                        </td>
                                                        <td>
                                                            <b>{{$pendingOrgList->startDate}}</b>
                                                        </td>
                                                        <td>
                                                            <b>{{$pendingOrgList->endDate}}</b>
                                                        </td>
                                                        <td>
                                                            <b>{{$pendingOrgList->amount}}</b>
                                                        </td>
                                                        <td>
                                                         <button type="submit" id="deleteBtn" class="btn btn-danger glow" style="margin-top: 3px"  onclick="deleteEvent()">Cancel</button>
                                                        </td>
                                                    </tr>
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

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('Layout.footer')

    @include('Layout.scripts')

    <script>  
        function updateEvent() {
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