@extends('Layout.masterlayout')
@section('content')
<div class="event">
    <div class="container">
        <div class="row" style="padding-bottom:30px;">
            <div class="col-12" >
                <h2 class="text-center" style="margin:30px 0px;">Organization</h2>
                <div class="row">
                @foreach($allOrg as $key => $org)
                    <div class="col-4">
                        <div class="card" style="width: 20rem;margin-top:10px;">
                            @if($org->image)
                                <?php if (file_exists("../public".$org->image)){ ?>
                                    <img class="card-img-top" style="height:13.4rem;" src="{{asset($org->image)}}" alt="Card image cap">
                                <?php } else{ ?>
                                    <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                                <?php } ?>
                            @else
                                <img class="card-img-top" style="height:13.4rem;" src="{{asset('/B0eS.gif')}}" alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title" style="height: 80px;overflow: hidden;text-overflow: ellipsis;">{{$org->name}}</h5>
                                <p class="card-text" style="height: 80px;width: 200px;overflow: hidden;text-overflow: ellipsis;">{{$org->details}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12 col-12 overflow-auto" style="margin-top:10px">
                        {!! $allOrg->links() !!}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection