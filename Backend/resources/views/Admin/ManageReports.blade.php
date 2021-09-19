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
                                                    <th>User Image</th>
                                                    <th>User Name</th>
                                                    <th>Message</th>
                                                    <th>Reply</th>
                                                    <th>Event Name</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($allReports as $key => $report)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td> 
                                                        @if($report->image)
                                                            <?php if (file_exists("../public".$report->image)){ ?>
                                                                <div class="osahan-slider-item" style="background-color:#fff;">
                                                                    <img src="{{asset($report->image)}}" style="height:100px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
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
                                                        <b>{{ $report->name }}</b><br>
                                                        <small> <b>username: </b> {{ $report->username }}</small> <br>
                                                    </td>
                                                    <td> <small><b>Message: </b> {{ $report->details }}</small> </td>
                                                    <td> <small><b>EventName: </b> {{ $report->event_name }}</small> </td>
                                                    <td> <small><b>Reply: </b> {{ $report->reply }}</small> </td>
                                                    <td>
                                                        @if($report->reply)
                                                        <button type="submit" data-toggle="modal" data-target="#replyModal" class="btn btn-info glow" onclick="replyReport('{{ $report->id }}','{{ $report->details }}','{{ $report->reply }}')">Edit</button>
                                                        @else
                                                        <button type="submit" data-toggle="modal" data-target="#replyModal" class="btn btn-info glow" onclick="replyReport('{{ $report->id }}','{{ $report->details }}','{{ $report->reply }}')">Reply</button>
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

    <div class="modal fade" id="replyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/admin/reports') }}" enctype="multipart/form-data" method="POST">
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
                            <label for="edit_message" class="col-sm-3 control-label">Message: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <fieldset class="form-group">
                                    <textarea class="form-control" name="edit_message" id="edit_message" rows="3" placeholder="Message" readonly required></textarea>
                                </fieldset>
                            </div>
                        </div> <!-- /form-group-->
                        <div class="row" style="margin-top:5px">
                            <label for="edit_reply" class="col-sm-3 control-label">Reply </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <fieldset class="form-group">
                                    <textarea class="form-control" name="edit_reply" id="edit_reply" rows="3" placeholder="Reply" required></textarea>
                                </fieldset>
                            </div>
                        </div> <!-- /form-group-->
                        
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

        function replyReport(id, message,reply) {
            $('#edit_id').val(id)
            $('#edit_message').val(message)
            $('#edit_reply').val(reply)

        }

    </script>

</body>
@endsection