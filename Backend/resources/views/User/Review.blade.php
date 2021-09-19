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
                            <h4>Review</h4>
                            <hr>
                        </div>
                    </div>

                    <form method ="post" action ="/user/review">

                    @csrf

                  
                            <input type="hidden" class="form-control"  name="e" value="{{$event_id}}">
                      
                        <br>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Write your review here..." id="floatingTextarea2" name="review" style="height: 100px"></textarea>

                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-success">Submit</button>
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