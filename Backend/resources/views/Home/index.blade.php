@extends('Layout.masterlayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 style="margin-top : 90px;">Fundraising for the people and causes you care about</h1>
            <h5>Get Start Today</h5>
            <button type="button" class="btn btn-lg btn-primary" disabled>Start Donation</button>
        </div>
        <div class="col-6">
            <img src="/images/pages/undraw_team_work_k80m.png" alt="team width="500" height="500"">
        </div>
    </div>
</div>
<div class="event" style="background-color:#F2F4F4;">
    <div class="container">
        <div class="row" style="padding-bottom:30px;">
            <div class="col-12" >
                <h2 class="text-center" style="margin:30px 0px;">Feature Events</h2>
                <div class="row">
                @foreach($featureEvents as $key => $feaEvent)
                <a href="{{ URL::to('/EventDetails/'.base64_encode($feaEvent->id)) }}" class="text-dark">
                    <div class="col-4">
                        <div class="card" style="width: 20rem;margin-top:10px;">
                            @if($feaEvent->image)
                                <?php if (file_exists("../public".$feaEvent->image)){ ?>
                                    <img class="card-img-top" style="height:13.4rem;" src="{{asset($feaEvent->image)}}" alt="Card image cap">
                                <?php } else{ ?>
                                    <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                                <?php } ?>
                            @else
                                <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                            @endif
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title" style="overflow: hidden;text-overflow: ellipsis;">{{$feaEvent->event_name}}</h5>
                                <p class="card-text" style="height: 80px;width: 250px;overflow: hidden;text-overflow: ellipsis;">{{$feaEvent->details}}</p>
                                <!-- <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                                </div> -->
                                <h6 style="margin-top:10px;">Need ৳ {{$feaEvent->targetMoney}}</h6>
                                @if(session()->has('username'))
                                <a href="{{ URL::to('/example2/'.base64_encode($feaEvent->id).'/'.base64_encode($feaEvent->orgId).'/'.base64_encode(1)) }}" class="btn btn-primary">Donate Now</a>
                                @else
                                <a href="#" class="btn btn-primary loginAlert" aria-hidden="true" onclick="" style="color: white;">Donate Now</a>
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

<div class="status" style="background-color:#F2F4F4;">
    <div class="container" style="padding-bottom:30px;">
        <h2 class="text-center" >We will save the world</h2>
        <h6 class="text-center" style="margin-bottom:30px;">We have the strongest community</h6>
        <div class="row">
            <div class="col-4" style="text-align: center;">
                <h2><b>{{$totalVolunteers}}</b></h2>
                <h3>Volunteers</h3>
            </div>
            <div class="col-4" style="text-align: center;">
                <h2><b>{{$totalEvents}}</b></h2>
                <h3>Events</h3>
            </div>
            <div class="col-4" style="text-align: center;">
                <h2><b>{{$totalMoneyCollect}} ৳</b></h2>
                <h3>Total Donation</h3>
            </div>
        </div>
    </div>
</div>


<div class="event" style="background-color:#ffffff;">
    <div class="container" style="padding-bottom:30px;">
        <div class="recommend-sli pb-0 mb-0 slick-slider">
            <!-- <div class="promo-slider"> -->
                @foreach($banners as $banner)
                <div class="osahan-slider-item mx-2">
                    @if($banner->image)
                        <?php if (file_exists("../public".$banner->image)){ ?>
                            <img style="width: 50%; background-color: #ffffff" src="{{asset($banner->image)}}" class="img-fluid mx-auto rounded promo-slider" alt="Responsive image">
                        <?php } else{ ?>
                            <img style="width: 50%; background-color: #ffffff;object-fit:contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid mx-auto rounded promo-slider" alt="Responsive image">
                        <?php } ?>
                    @else
                        <img style="width: 50%; background-color: #ffffff;object-fit:contain;" src="{{asset('/B0eS.gif')}}" class="img-fluid mx-auto rounded promo-slider" alt="Responsive image">
                    @endif
                </div>
                @endforeach
            <!-- </div> -->
        </div>
    </div>
</div>

<div class="event" style="background-color:#F2F4F4;">
    <div class="container">
        <div class="row" style="padding-bottom:30px;">
            <div class="col-12" >
                <h2 class="text-center" style="margin:30px 0px;">Ongoing Events</h2>
                <div class="row">
                @foreach($ongoingEvents as $key => $ongEvents)
                <a href="{{ URL::to('/EventDetails/'.base64_encode($ongEvents->id)) }}" class="text-dark">
                    <div class="col-4">
                        <div class="card" style="width: 20rem;margin-top:10px;">
                            @if($ongEvents->image)
                                <?php if (file_exists("../public".$ongEvents->image)){ ?>
                                    <img class="card-img-top" style="height:13.4rem;" src="{{asset($ongEvents->image)}}" alt="Card image cap">
                                <?php } else{ ?>
                                    <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                                <?php } ?>
                            @else
                                <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                            @endif
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title" style="overflow: hidden;text-overflow: ellipsis;">{{$ongEvents->event_name}}</h5>
                                <p class="card-text" style="height: 80px;width: 250px;overflow: hidden;text-overflow: ellipsis;">{{$ongEvents->details}}</p>
                                <!-- <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                                </div> -->
                                <h6 style="margin-top:10px;">Need ৳ {{$ongEvents->targetMoney}}</h6>
                                @if(session()->has('username'))
                                <a href="{{ URL::to('/example2/'.base64_encode($ongEvents->id).'/'.base64_encode($ongEvents->orgId).'/'.base64_encode(1)) }}" class="btn btn-primary">Donate Now</a>
                                @else
                                <a href="#" class="btn btn-primary loginAlert" aria-hidden="true" onclick="" style="color: white;">Donate Now</a>
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
<div class="event" >
    <div class="container" style="height:200px; text-align: center; margin-top:100px;">
        <h2 style="margin-top:20px;">Ready to Join us?</h2>
        @if(session()->has('username'))
        <a type="button" href="{{URL::to('/joinOrg')}}" class="btn btn-success">Join as Organization</a>
        <a type="button" href="{{URL::to('/joinSponsor')}}" class="btn btn-success">Join as Sponsor</a>
        @else
        <a type="button" style="color: white;" class="btn btn-success loginAlert" aria-hidden="true" onclick=""></i> Join as Organization</a>
        <a type="button" style="color: white;" class="btn btn-success loginAlert" aria-hidden="true" onclick="">Join as Sponsor</a>
        @endif
    </div>
</div>


@endsection