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
                            <h4>Organization Details</h4>
                            <hr>
                        </div>
                    </div>

                    <div class="container">
                           
                            <h3 >{{$organization['name']}} </h3>
                        <br><br>
                            <img src="{{$organization['image']}}" class="mx-auto d-block"  class="img-thumbnail" alt="Organization picture" max-width="800" height="300" > 
                            
                            <div class="col-12">
                            <label for="inputAddress" class="form-label"><b>About</b></label>
                            <p>{{$organization['details']}}</p>
                        </div>

                            <div class="col-12 col text-center">
                                <!-- <button type="submit" class="btn btn-outline-success" >Follow</button> -->
                                <!-- <button type="submit" class="btn btn-outline-success" >Event List</button> -->
                                <a href="/user/organizationEvents/{{$organization['id']}}" class="btn btn-success">Event List</a>

                                <a href="/user/organizationFollow/{{$organization['id']}}" class="btn btn-success">Follow</a>


                            </div>
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