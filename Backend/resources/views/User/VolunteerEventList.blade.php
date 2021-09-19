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
                            <h4>Volunteer Event List</h4>
                            <hr>
                        </div>
                    </div>

                <div class="row">
                    @foreach ($volunteerEventList as $volunteerEvent)
                   
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                <img src="{{$volunteerEvent['image']}}" class="card-img-top" alt="...">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto mb-50">
                                            <i class="bx bx-receipt font-medium-5"></i>
                                        </div>
                                        <h5 class="card-title">{{$volunteerEvent['event_name']}}</h5>
                                        <p class="card-text">{{$volunteerEvent['details']}}</p>
                                        
                                        <a href="{{route('User.applyVolunteerEvent')}}" class="btn btn-primary">Apply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                    @endforeach
                </div> 
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