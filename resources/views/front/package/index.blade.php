@extends('front.layout.index')
@section('meta')
    
<title>PACKAGES | PAYS TO YOU</title>
    <meta name="description" content="PAYS TO YOU | BEST ONLINE EARNING SITE | No. 1 Marketing Forum to Earn Online.">
@endsection

@section('content')
<div class="header-title white" data-parallax="scroll" data-position="top" data-natural-height="650"        data-natural-width="1920" data-image-src="{{asset('front/banner1.jpg')}}">
    <div class="container">
        <div class="title-base">
            <hr class="anima" />
            <h1>OUR PACKAGES | <a href="{{url('/')}}">HOME</a></h1> 
        </div>
    </div>
</div>
<hr class="space" />
<div class="section-bg-image parallax-window" data-natural-height="750" data-natural-width="1920" data-parallax="scroll" data-image-src="{{asset('front/images/bg-13.jpg')}}">
    <div class="container content">
        <div class="row vertical-row">
            @foreach (App\Models\Package::all()->take(8) as $package)
            <div class="col-md-3">
                <div class="advs-box advs-box-side-icon boxed-inverse">
                    <div class="caption-box text-center">
                        <h3><span>PKR</span>{{$package->price}}</h3>
                        <h3>{{$package->name}}</h3>
                        <p class="text-center">
                            Total Earning: PKR {{$package->t_earning}}
                        </p>
                        <p class="text-center">
                            Earning Per Day: PKR {{$package->day}}
                        </p> 
                        <p class="text-center">
                            Earning Per Referral : {{$package->click}} % 
                        </p> 
                        <p class="text-center">
                            Daily Ads: {{$package->ads}}
                        </p>  
                        <p class="text-center">
                            Package Validity in Days: {{$package->package_validity}} Days
                        </p>
                        <a href="{{route('user.login')}}" class="btn-text text-center">Deposit now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection