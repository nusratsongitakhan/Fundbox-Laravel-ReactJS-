@extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('Layout.UserMenu')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section id="widgets-Statistics">
                   


                   <form method= "post" action ="/user/search" >
                   @csrf
                    <div class="row">
                        <div class="col-10 mt-1 mb-2">
                        <input type="text" class="form-control" id="inputAddress" name="eventSearch" placeholder="Search event here...">
                        </div>

                        <div class="col-2 mt-1 mb-2">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                        </div>
                    </div>
                    </form>

                   
                       
                        <form method= "post" action ="/user/CategoryWiseEvent" >
                        @csrf
                        <div class="row">
                        <div class="col-10 mt-1 mb-2">

                            <select class="form-select form-control" name="selectedCategory" aria-label="Default select example">
                                <option selected>Category</option>

                                @foreach ($eventCategorys as $eventCategory)
                                <option value="{{$eventCategory->id}}">{{$eventCategory->name}}</option>
                            
                                @endforeach

                               
                            </select>
                            </div>

                            
                                    <div class="col-2 mt-1 mb-2">
                                        <button type="submit" class="btn btn-success ">Sort</button>
                                    </div>
                       
                                    </div>      
                        
                        </form>
                                                
                        

                        

                   


                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Events Based on Category</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                    @foreach ($Events as $Event)
                      @if($Event['eventType']==1)
                        <div class="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                <img src="{{$Event['image']}}" class="card-img-top" alt="...">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto mb-50">
                                            <i class="bx bx-receipt font-medium-5"></i>
                                        </div>
                                        <h5 class="card-title">{{$Event['event_name']}}</h5>
                                        <p class="card-text">{{$Event['details']}}</p>
                                        
                                       
                                       
                                        <a href="{{ URL::to('/example2/'.base64_encode($Event->id).'/'.base64_encode($Event->orgId)) }}" class="btn btn-primary">Donate Now</a>
                                       
                                          <br><br>  
                                      

                                        <a href="/user/review/{{$Event['id']}}" class="btn btn-primary btn-sm">Review</a>
                                        <a href="/user/report/{{$Event['id']}}" class="btn btn-primary btn-sm">Report</a>
                                       

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    </div>      
                </section>
                
              
            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('Layout.footer')

    @include('Layout.scripts')
</body>
@endsection