@extends('front.layout.index')
@section('meta')
    
<title>PACKAGES | PAYS TO YOU</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
 <!--=======Banner-Section Starts Here=======-->
 <section class="bg_img hero-section-2 " data-background="front/assets/images/about/hero-bg4.png">
    <div class="container">
        <div class="hero-content text-white">
            <h1 class="title">OUR PACKAGES</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    Packages
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- ==========How-Section Starts Here========== -->
<section class="how-section bg_img padding-top padding-bottom pt-max-md-0" data-background="front/assets/images/affiliate/affiliate-bg.png">
    <div class="ball-3" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
    data-paroller-type="foreground" data-paroller-direction="horizontal">
        <img src="front/assets/images/balls/ball-group9.png" alt="balls">
    </div>
    <div class="ball-2" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
    data-paroller-type="foreground" data-paroller-direction="horizontal">
        <img src="front/assets/images/balls/ball-group10.png" alt="balls">
    </div>
    <div class="container">
        <div class="row justify-content-center mb-30-none">
            @foreach (App\Models\Package::all() as $package)
            <div class="col-md-6 col-lg-4 col-sm-10">
                <div class="how-item">
                    <div class="how-thumb-area">
                        <div class="how-thumb">
                            <img src="{{asset('front/assets/images/how/how6.png')}}" alt="how">
                        </div>
                    </div>
                    <div class="how-content">
                        <h5 class="title">{{$package->name}}</h5>
                        <span class="amount">Total Earning: $ {{$package->t_earning}}</span><br>
                        <span class="amount">Earning Per Day: $ {{$package->day}}</span><br>
                        {{-- <span class="amount">Earning Per Referral : {{$package->click}} % </span><br> --}}
                        <span class="amount">Daily Ads: {{$package->ads}}</span><br>
                        <span class="amount">Package Amount</span><br>
                        <h5 class="sub-title">$ {{$package->price}}</h5>
                        <a href="{{route('user.login')}}">Start Now <i class="flaticon-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ==========How-Section Ends Here========== -->
@endsection