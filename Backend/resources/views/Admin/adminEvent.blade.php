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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create New Event For Admin</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="#" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-lg-12">
                                                <input type="text" class="form-control" name="event_name" placeholder="Event Name" required>
                                            </div>
                                            
                                             <div class="col-12 col-sm-12" style="margin-top:10px">
                                                <fieldset class="form-group">
                                                    <textarea class="form-control" name="event_details" id="basicTextarea" rows="3" placeholder="Details" required></textarea>
                                                </fieldset>
                                            </div>

                                            <div class="col-12 col-sm-12 col-lg-6" style="margin-top:10px;">
                                                <fieldset class="form-group">
                                                    <select name="event_category" class="form-control" id="basicSelect" required>
                                                        <option disabled selected>Select Event Category</option>
                                                        @foreach($allCategory as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach                                                        
                                                    </select>
                                                </fieldset>
                                            </div>

                                            <div class="col-12 col-sm-12 col-lg-6" style="margin-top:10px">
                                                <input type="number" class="form-control" name="event_amount" placeholder="Amount" required>
                                            </div>
                                            <div class="col-12 col-sm-12 col-lg-6 mb-1" style="margin-top:10px">
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="datetime-local" name="date"  class="form-control" id="#" placeholder="Target Date" autocomplete="off" required>
                                                </fieldset>
                                            </div>

                                            <div class="col-12 col-sm-12 col-lg-6" style="margin-top:10px">
                                                <input type="number" class="form-control" name="event_phone" placeholder="Number" required>
                                            </div>
                                            <div class="col-12 col-sm-12 col-lg-6" >
                                                <fieldset class="form-group">
                                                    <select name="status" class="form-control" id="basicSelect" required>
                                                        <option disabled selected>Select Status</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactivate</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <fieldset class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="image" required>
                                                        <label class="custom-file-label" for="inputGroupFile02">Choose Event image</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            
                                            <div class="col-12 col-sm-12" style="margin-top: 10px">
                                                <button type="submit" class="btn btn-block btn-success glow">Add</button>
                                            </div>
                                        </div>
                                    </form>
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

</body>
@endsection