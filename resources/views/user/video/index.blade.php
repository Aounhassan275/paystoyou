@extends('user.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIDEO | PAYS TO YOU</h3>
    </div>
</div>
<div class="row">
    @foreach (App\Models\Ad::video()->all() as $ad)
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{$ad->name}}</h5>
            </div>
            <div class="card-body pt-0">
                <div class="embed-responsive embed-responsive-21by9">
                    <iframe class="embed-responsive-item" src="{{$ad->link}}"></iframe>
                </div>
            </div>          
        </div>
    </div>
    @endforeach
</div>
@endsection