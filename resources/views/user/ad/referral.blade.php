@extends('user.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>REFERRAL AD | ADVERT FOXX</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            @foreach (App\Models\Ad::referral()->take(1) as $ad)
            <div class="card-header">
                <h5 class="card-title">{{$ad->name}}</h5>
            </div>
            <div class="card-body pt-0">
                <div class="embed-responsive embed-responsive-21by9">
                    <iframe class="embed-responsive-item" src="{{$ad->link}}"></iframe>
                </div>
            </div>
            @endforeach
          
        </div>
    </div>
</div>
@endsection