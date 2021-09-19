@extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('Layout.UserMenu')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section id="widgets-Statistics">
                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Replies of your Reports</h4>
                            <hr>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Event Id</th>
                                <th>Details</th>
                                <th>Reply</th>
                                <th>Date</th>
                                
                            </tr>
                            </thead>
                            <tbody>



                            @foreach ($Reports as $Report)

                            @if($Report->user_id == $user_id)
                            <tr>
                                <td>{{$Report->event_id}}</td>
                                <td>{{$Report->details}}</td>
                                <td>{{$Report->reply}}</td>
                                <td>{{$Report->created_at}}</td>
                                
                            </tr>
                            @endif 
                            @endforeach
                            </tbody>
                        </table>
                </section>
            </div>
        </div>
        </div>
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('Layout.footer')

    @include('Layout.scripts')
</body>
@endsection