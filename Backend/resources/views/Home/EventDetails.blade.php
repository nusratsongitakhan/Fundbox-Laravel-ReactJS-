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
<div class="event" style="background-color:#F2F4F4;">
    <div class="container" >
        <div class="row" style="padding-top: 20px;padding-bottom:10px;">
            <div class="col-lg-8">
                <div class="mb-3">
                @if($Events->image)
                    <?php if (file_exists("../public".$Events->image)){ ?>
                        <div class="osahan-slider-item" style="background-color:#fff;">
                            <img src="{{asset($Events->image)}}" style="width: 100%;height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                        </div>
                    <?php } else{ ?>
                        <div class="osahan-slider-item" style="background-color:#fff;">
                            <img src="{{asset('/B0eS.gif')}}" style="width: 100%;height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                        </div>
                    <?php } ?>
                @else
                    <div class="osahan-slider-item" style="background-color:#fff;">
                        <img src="{{asset('/B0eS.gif')}}" style="width: 100%;height:400px;box-shadow:none !important;object-fit:contain;" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                    </div>
                @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 bg-white rounded shadow-sm" >
                    <div class="pt-0">
                    <h2 class="font-weight-bold">{{$Events->event_name}}</h2>
                   
                        @if($Events->eventType == "1")
                            <p class="font-weight-light text-dark m-0 d-flex align-items-center">
                            Target Money : <b class="h6 text-dark m-0"> BDT {{ $Events->targetMoney }} </b>
                            </p>
                            <p class="font-weight-light text-dark m-0 d-flex align-items-center">
                            Collect Money: <b class="h6 text-dark m-0"> BDT {{ $totalCollect }} </b>
                            </p>
                        @elseif($Events->eventType == "2")
                        <p class="font-weight-light text-dark m-0 d-flex align-items-center">
                            Vanue : <b class="h6 text-dark m-0"> {{$Events->venue}} </b>
                            </p>
                        @endif
                    
                    </div>
                    
                    <div class="details">
                    <div class="pt-3">
                        <p class="font-weight-bold mb-2">Info</p>
                        <p class="text-muted small mb-0"><b>Contact: {{$Events->contact}}</b></p>
                        <p class="text-muted small mb-0"><b>Target Date: {{ date("d M, Y",strtotime($Events->targetDate))}}</b></p><br>
                        
                        @if(session()->has('username'))
                            @if($Events->eventType == "1")
                                <a href="{{ URL::to('/example2/'.base64_encode($Events->id).'/'.base64_encode($Events->orgId).'/'.base64_encode(1)) }}" class="btn btn-primary">Donate Now</a>
                            @elseif($Events->eventType == "2")
                                <a href="{{ URL::to('/applyForVolunteer/'.$Events->id) }}" class="btn btn-primary">Apply Now</a>
                            @endif
                        @else
                            @if($Events->eventType == "1")
                                <a href="#" class="btn btn-primary loginAlert" aria-hidden="true" onclick="" >Donate Now</a>
                            @elseif($Events->eventType == "2")
                                <a href="#" class="btn btn-primary loginAlert" aria-hidden="true" onclick="" >Apply Now</a>
                            @endif
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="padding-bottom:30px;">
            <div class="col-lg-8">
                <div class="mb-3">
                
                    <div class="osahan-slider-item">
                    <p style="font-size: 18px;text-align: justify;color: black;">{!!nl2br(str_replace(" ", " &nbsp;", $Events->details))!!}</p>
                    </div>
                </div>
                <br>
                @if(session()->has('username'))
                    @if($Events->eventType == "1")
                    <a style="width: 80%;" href="{{ URL::to('/example2/'.base64_encode($Events->id).'/'.base64_encode($Events->orgId).'/'.base64_encode(1)) }}" class="btn btn-primary">Donate Now</a>
                    @elseif($Events->eventType == "2")
                    <a href="{{ URL::to('/applyForVolunteer/'.$Events->id) }}" style="width: 80%;" class="btn btn-primary">Apply Now</a>
                    @endif
                @else
                    @if($Events->eventType == "1")
                        <a href="#" style="width: 80%;" class="btn btn-primary loginAlert" aria-hidden="true" onclick="" >Donate Now</a>
                    @elseif($Events->eventType == "2")
                        <a href="#" style="width: 80%;" class="btn btn-primary loginAlert" aria-hidden="true" onclick="" >Apply Now</a>
                    @endif
                @endif   
            </div>
            <div class="col-lg-4">
                <div class="p-4 bg-white rounded shadow-sm">
                    <div class="pt-3">
                    @if($Events->eventType == "1")
                        <p class="font-weight-bold text-dark">Total Collect: {{$totalCollect}}</p>
                        <p class="font-weight-bold mb-2">Last Transition List</p>
                        @foreach($trnsList as $key => $list)
                            @if($list->visibleType=="2")
                            <p class="text-muted small mb-0"><b>Amount: {{$list->amount}} -> HIDE INFO </b></p>
                            @else
                            <p class="text-muted small mb-0"><b>Amount: {{$list->amount}} -> {{$list->name}} </b></p>
                            @endif
                        @endforeach
                    @elseif($Events->eventType == "2")
                        <p class="font-weight-bold text-dark">Total Apply: {{$totalVApply}}</p>
                        <p class="font-weight-bold mb-2">Last Apply List</p>
                        @foreach($volunteersList as $key => $voluntrList)
                            <p class="text-muted small mb-0"><b>Name: {{$voluntrList->user_name}} </b></p>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection