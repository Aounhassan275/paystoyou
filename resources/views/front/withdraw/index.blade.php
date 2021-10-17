@extends('front.layout.index')
@section('meta')
    
<title>WITHDRAW HISTORY | PAYS TO YOU</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
 <!--=======Banner-Section Starts Here=======-->
 <section class="bg_img hero-section-2" data-background="front/assets/images/about/hero-bg2.jpg">
    <div class="container">
        <div class="hero-content text-white">
            <h1 class="title">WITHDRAW HISTORY</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    Withdraw History
                </li>
            </ul>
        </div>
    </div>
    <div class="hero-shape">
        <img class="wow slideInUp" src="front/assets/images/about/hero-shape1.png" alt="about" data-wow-duration="1s">
    </div>
</section>
<!--=======Banner-Section Ends Here=======-->

    <!--=======Investor-Section Starts Here=======-->
    <section class="investor-section padding-bottom padding-top pt-max-lg-0">
        <div class="ball-group-1 ball-group-4" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60" data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="{{asset('front/assets/images/balls/ball-group4.png')}}" alt="balls">
        </div>
        <div class="ball-group-2 ball-group-3" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30" data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="{{asset('front/assets/images/balls/ball-group3.png')}}" alt="balls">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-xl-6">
                    <div class="section-header">
                        <h2 class="title">
                            Our Withdraw History
                        </h2>
                    </div>
                </div>
            </div>                
            <div class="owl-carousel owl-theme investor-slider">
                @foreach (App\Models\Withdraw::all() as $key => $withdraw)
                <div class="investor-item">
                    <div class="investor-thumb">
                        <img src="{{asset($withdraw->user->image)}}" alt="investor">
                    </div>
                    <div class="investor-content">
                        <h5 class="title"><a href="#0">{{$withdraw->user->name}}</a></h5>
                    <h3 class="amount">PKR {{$withdraw->payment}}</h3>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--=======Investor-Section Ends Here=======-->
    
@endsection