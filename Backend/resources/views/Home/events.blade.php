@extends('Layout.masterlayout')
@section('content')
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
<div class="event" style="background-color:#F2F4F4; height:200px; ">
    <div class="container">
        <h1 class="text-center" style="padding-top:70px;">Events</h1>
    </div>
</div>
<div class="event">
    <div class="container">
        <div class="row" style="padding-bottom:30px;">
            <div class="col-12" >
                <h2 class="text-center" style="margin:30px 0px;">All Events</h2>
                <div class="row">
                    @foreach($allEvents as $key => $events)
                    <a href="{{ URL::to('/EventDetails/'.base64_encode($events->id)) }}" class="text-dark">
                        <div class="col-4">
                            <div class="card" style="width: 20rem;margin-top:10px;">
                                @if($events->image)
                                    <?php if (file_exists("../public".$events->image)){ ?>
                                        <img class="card-img-top" style="height:13.4rem;" src="{{asset($events->image)}}" alt="Card image cap">
                                    <?php } else{ ?>
                                        <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                                    <?php } ?>
                                @else
                                    <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                                @endif
                                <div class="card-body" style="text-align: center;">
                                    <h5 class="card-title" style="height: 80px;overflow: hidden;text-overflow: ellipsis;">{{$events->event_name}}</h5>
                                    <p class="card-text" style="height: 80px;width: 250px;overflow: hidden;text-overflow: ellipsis;">{{$events->details}}</p>
                                    <!-- <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                                    </div> -->
                                    <h6 style="margin-top:10px;">Need ৳ {{$events->targetMoney}}</h6>
                                    @if(session()->has('username'))
                                    <a href="{{ URL::to('/example2/'.base64_encode($events->id).'/'.base64_encode($events->orgId).'/'.base64_encode(1)) }}" class="btn btn-primary">Donate Now</a>
                                    @else
                                    <a href="#" class="btn btn-primary loginAlert" aria-hidden="true" onclick="" style="color: white;">Donate Now</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    <div class="col-md-12 col-12 overflow-auto">
                        {!! $allEvents->links() !!}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="event" style="background-color:#F2F4F4;">
    <div class="container">
        <div class="row" style="padding-bottom:30px;">
            <div class="col-12" >
                <h2 class="text-center" style="margin:30px 0px;">Volunteer Events</h2>
                <div class="row">
                @foreach($volEvents as $key => $vEvents)
                <a href="{{ URL::to('/EventDetails/'.base64_encode($vEvents->id)) }}" class="text-dark">
                    <div class="col-4">
                        <div class="card" style="width: 20rem;margin-top:10px;">
                            @if($vEvents->image)
                                <?php if (file_exists("../public".$vEvents->image)){ ?>
                                    <img class="card-img-top" style="height:13.4rem;" src="{{asset($vEvents->image)}}" alt="Card image cap">
                                <?php } else{ ?>
                                    <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                                <?php } ?>
                            @else
                                <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                            @endif
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title" style="height: 80px;overflow: hidden;text-overflow: ellipsis;">{{$vEvents->event_name}}</h5>
                                <p class="card-text" style="height: 80px;width: 250px;overflow: hidden;text-overflow: ellipsis;">{{$vEvents->details}}</p>
                                @if(session()->has('username'))
                                    <a href="{{ URL::to('/applyForVolunteer/'.$vEvents->id) }}" class="btn btn-primary">Apply</a>
                                @else
                                <a href="#" class="btn btn-primary loginAlert" aria-hidden="true" onclick="" style="color: white;">Apply</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection