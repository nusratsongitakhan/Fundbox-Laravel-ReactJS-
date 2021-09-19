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
                                    <div class="">
                                    <form action="{{ url('/sp/updateAccount') }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-lg-12">
                                                <input type="text" name="sm_id" value="1" hidden>
                                            </div>
                                            <div class="col-12 col-sm-12 col-lg-12">

                                                        @if($userInfo->image)
                                                            <div class="osahan-slider-item" style="background-color:#fff;">
                                                                <img src="{{asset( $userInfo->image )}}" style="width:100%;height:150px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                                                            </div>
                                                        @else
                                                            <div class="osahan-slider-item" style="background-color:#fff;">
                                                                <img src="{{ url('/images/avatar/avatar.png') }}" style="width:100%;height:150px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                                                            </div>
                                                        @endif
                                                    
                                                        <!-- <div class="osahan-slider-item" style="background-color:#fff;">
                                                            <img src="{{ url('/images/avatar/avatar.png') }}" style="width:100%;height:150px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                                                        </div> -->
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-top:10px">
                                                <fieldset class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" value="{{$spInfo ->image}}" id="inputGroupFile02" name="image">
                                                        <label class="custom-file-label" for="inputGroupFile02">Choose image</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            
                                            <div class="col-12 col-sm-12" style="margin-bottom:10px">
                                                <p>Title</p>
                                                <input type="text" class="form-control" value="{{$spInfo ->title}}" name="title" placeholder="Text">
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-bottom:10px">
                                                <p>Email</p>
                                                <input type="text" class="form-control" value="{{$userInfo ->email}}" name="Email" placeholder="Text" readonly>
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-bottom:10px">
                                                <p>Phone Number</p>
                                                <input type="text" class="form-control" value="{{$userInfo ->phone}}" name="Phone" placeholder="Text" >
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-bottom:10px">
                                                <p>Name</p>
                                                <input type="text" class="form-control" value="{{$userInfo ->name}}" name="name" placeholder="Text">
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-bottom:10px">
                                                <p>Details</p>
                                                <input type="text" class="form-control" value="{{$spInfo ->details}}" name="details" placeholder="Text">
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-bottom:10px">
                                                <p>First Donated Amonunt</p>
                                                <input type="text" class="form-control" value="{{$spInfo ->amount}}" name="sm_text" placeholder="Text" readonly>
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-bottom:10px">
                                                <p>Sponsor Start Date</p>
                                                <input type="text" class="form-control" value="{{ date('d-M-Y', strtotime($spInfo->created_at )) }}" name="sm_text" placeholder="Text" readonly>
                                            </div>
                                            
                                            <div class="col-12 col-sm-12" style="margin-top: 10px">
                                                <button type="submit" class="btn btn-block btn-success glow">Update Profile</button>
                                            </div>
                                            <div class="col-12 col-sm-12" style="margin-top: 10px">
                                            </div>
                                        </div>
                                    </form>  
   
                                    <button type="submit" id="deleteBtn" class="btn btn-block btn-danger glow" style="margin-top: 3px"  onclick="deleteAccount('{{ $userInfo->id }}')">Delete</button>                          
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

function deleteAccount(id) {
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
                url: "{{ url('/sp/manageAccount/delete') }}",
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
                        location.reload('/');
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