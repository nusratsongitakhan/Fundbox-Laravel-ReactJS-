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
                            <h4>Transition Details</h4>
                            <hr>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Event Id</th>
                                <th>Amount</th>
                                <th>Visible Type</th>
                                <th>Payment Type</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th> </th>
                            
                            </tr>
                            </thead>
                            <tbody>



                            @foreach ($transitionList as $transition)

                            @if($transition->user_id == $user_id)
                            <tr>
                                <td>{{$transition->eventId}}</td>
                                <td>{{$transition->amount}}</td>
                                <td>{{$transition->visibleType}}</td>
                                <td>{{$transition->paymentType}}</td>
                                <td>{{$transition->status}}</td>
                                <td>{{$transition->created_at}}</td>
                                <td><a href = "/user/generateInvoice/{{$transition->id}}" class="btn btn-success float-right py-0">Generate pdf</a></td>
                                
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