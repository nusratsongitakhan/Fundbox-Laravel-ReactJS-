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
                            <h4>Organization List</h4>
                            <hr>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Details</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($organizationList as $organization)
                            <tr>
                                <td>{{$organization['user_id']}}</td>
                                <td>{{$organization['name']}}</td>
                                <td>{{$organization['phone']}}</td>
                                <td>{{$organization['address']}}</td>
                                <td>{{$organization['status']}}</td>
                                <td><a href="/user/organizationDetails/{{$organization['id']}}" class="btn btn-success">Details</a></td>
                            
                            </tr>
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