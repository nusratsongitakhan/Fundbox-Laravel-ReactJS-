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
                            <h4>Apply Volunteer Event</h4>
                            <hr>
                        </div>
                    </div>

                    <form class="row g-3">

                        <div class="col-6">
                            <label for="inputUserName" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="inputUserName" placeholder="1234 Main St">
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>

                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>

                        <div class="col-6">
                            <label for="inputPhone" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="inputPhone" >
                        </div>

                        <div class="col-6">
                            <label for="inputAddress" class="form-label">Address</label>
                            <textarea class="form-control" placeholder="1234 Main St" id="inputAddress" style="height: 100px"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">City</label>
                            <textarea class="form-control" placeholder="" id="inputCity" style="height: 100px"></textarea>
                        </div>
                        
                        <div class="col-md-12">
                           <br>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-success  form-control">Done</button>
                        </div>
                    </form>
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