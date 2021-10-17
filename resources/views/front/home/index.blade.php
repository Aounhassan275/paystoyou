@extends('front.layout.index')
@section('meta')
    
<title>HOME | PAYS TO YOU </title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')

        <!--=======Banner-Section Starts Here=======-->
        <section class="banner-section" id="home">
            <div class="banner-bg d-lg-none">
                <img src="front/assets/images/banner/banner-bg2.jpg" alt="banner">
            </div>
            <div class="banner-bg d-none d-lg-block bg_img" data-background="front/assets/images/banner/banner.jpg">
                <div class="chart-1 wow fadeInLeft" data-wow-delay=".5s" data-wow-duration=".7s">
                    <img src="front/assets/images/banner/chart1.png" alt="banner">
                </div>
                <div class="chart-2 wow fadeInDown" data-wow-delay="1s" data-wow-duration=".7s">
                    <img src="front/assets/images/banner/chart2.png" alt="banner">
                </div>
                <div class="chart-3 wow fadeInRight" data-wow-delay="1.5s" data-wow-duration=".7s">
                    <img src="front/assets/images/banner/chart3.png" alt="banner">
                </div>
                <div class="chart-4 wow fadeInUp" data-wow-delay="2s" data-wow-duration=".7s">
                    <img src="front/assets/images/banner/clock.png" alt="banner">
                </div>
            </div>
            <div class="animation-area d-none d-lg-block">
                <div class="plot">
                    <img src="front/assets/images/banner/plot.png" alt="banner">
                </div>
                <div class="element-1 wow fadeIn" data-wow-delay="1s">
                    <img src="front/assets/images/banner/light.png" alt="banner">
                </div>
                <div class="element-2 wow fadeIn" data-wow-delay="1s">
                    <img src="front/assets/images/banner/coin1.png" alt="banner">
                </div>
                <div class="element-3 wow fadeIn" data-wow-delay="1s">
                    <img src="front/assets/images/banner/coin2.png" alt="banner">
                </div>
                <div class="element-4 wow fadeIn" data-wow-delay="1s">
                    <img src="front/assets/images/banner/coin3.png" alt="banner">
                </div>
                <div class="element-5 wow fadeIn" data-wow-delay="1s">
                    <img src="front/assets/images/banner/coin4.png" alt="banner">
                </div>
                <div class="element-6 wow fadeIn" data-wow-delay="1s">
                    <img src="front/assets/images/banner/coin5.png" alt="banner">
                </div>
                <div class="element-7 wow fadeIn" data-wow-delay="1s">
                    <img src="front/assets/images/banner/coin6.png" alt="banner">
                </div>
                <div class="element-8 wow fadeIn" data-wow-delay="1s">
                    <img src="front/assets/images/banner/sheild.png" alt="banner">
                </div>
                <div class="element-9 wow fadeIn" data-wow-delay="1s">
                    <img src="front/assets/images/banner/coin7.png" alt="banner">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7">
                        <div class="banner-content">
                            <h1 class="title">Simply <span>Profitably </span> Conveniently</h1>
                            <p>
                                A Profitable platform for high-margin investment
                            </p>
                            <div class="button-group">
                                <a href="#0" class="custom-button">Get Started Now!</a>
                                <a href="https://www.youtube.com/watch?v=GT6-H4BRyqQ" class="popup video-button"><i class="flaticon-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Banner-Section Ends Here=======-->


        <!--=======Counter-Section Starts Here=======-->
        <div class="counter-section">
            <div class="container">
                <div class="row align-items-center mb-30-none justify-content-center">
                    <div class="col-sm-6 col-md-4">
                        <div class="counter-item">
                            <div class="counter-thumb">
                                <img src="front/assets/images/counter/counter01.png" alt="counter">
                            </div>
                            <div class="counter-content">
                                <div class="counter-header">
                                    <h3 class="title odometer" data-odometer-final="{{App\Models\User::active()->count()}}">{{App\Models\User::active()->count()}}</h3>
                                </div>
                                <p>Registered users</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="counter-item">
                            <div class="counter-thumb">
                                <img src="front/assets/images/counter/counter02.png" alt="counter">
                            </div>
                            <div class="counter-content">
                                <div class="counter-header">
                                    <h3 class="title odometer" data-odometer-final="{{App\Models\User::pending()->count()}}">{{App\Models\User::pending()->count()}}</h3>
                                </div>
                                <p>Pending User</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="counter-item">
                            <div class="counter-thumb">
                                <img src="front/assets/images/counter/counter03.png" alt="counter">
                            </div>
                            <div class="counter-content">
                                <div class="counter-header">
                                    <h3 class="title">$ </h3><h3 class="odometer title" data-odometer-final="{{App\Models\Withdraw::sum('payment')}}"> {{App\Models\Withdraw::sum('payment')}}</h3>
                                </div>
                                <p>Total Withdraw</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=======Counter-Section Ends Here=======-->


        <!--=======About-Section Starts Here=======-->
        <section class="about-section padding-top padding-bottom" id="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 d-none d-lg-block rtl">
                        <img src="front/assets/images/about/about.png" alt="about">
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header left-style">
                            <span class="cate">WELCOME TO PAYS TO YOU</span>
                            <h2 class="title">About PAYS TO YOU</h2>
                            <p>
                                Paystoyou is a registered online platform for those who want to earn money online. Simply sign up make a deposit to view ads and earn money. Paystoyou has been dreaming of devoting all its energies to the welfare of the poor in our country. Paystoyou has also felt the pain and sorrow that people suffer from poverty, particularly women and children who are unable to go to school and obtain proper medical care. This is the online 100% secure method to earn money from home.So lets started work with us and start handsome earning from home.
                            </p>
                        </div>
                        <div class="about--content">
                            <div class="about-item">
                                <div class="about-thumb">
                                    <img src="front/assets/images/about/about01.png" alt="about">
                                </div>
                                <div class="about-content">
                                    <h5 class="title">Secure & Reliable</h5>
                                    <p>
                                        Secure assets fund for users
                                    </p>
                                </div>
                            </div>
                            <div class="about-item">
                                <div class="about-thumb">
                                    <img src="front/assets/images/about/about02.png" alt="about">
                                </div>
                                <div class="about-content">
                                    <h5 class="title">Fast Withdrawals</h5>
                                    <p>
                                        Quick money withdrawals for users
                                    </p>
                                </div>
                            </div>
                            <div class="about-item">
                                <div class="about-thumb">
                                    <img src="front/assets/images/about/about03.png" alt="about">
                                </div>
                                <div class="about-content">
                                    <h5 class="title">Guaranteed</h5>
                                    <p>
                                        Your return on investment is guaranteed
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======About-Section Ends Here=======-->


        <!--=======Feature-Section Starts Here=======-->
        <section class="feature-section padding-top padding-bottom bg_img" data-background="./front/assets/images/feature/feature-bg.png" id="feature">
            <div class="ball-1" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="front/assets/images/balls/ball1.png" alt="balls">
            </div>
            <div class="ball-2" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="front/assets/images/balls/ball2.png" alt="balls">
            </div>
            <div class="ball-3" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="front/assets/images/balls/ball3.png" alt="balls">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="section-header">
                            <span class="cate">Our Amazing Features</span>
                            <h2 class="title">
                                why should you invest
                            </h2>
                            <p class="mw-100">
                                We are worldwide investment company who are committed to the principle of revenue  
                                maximization and reduction of the financial risks at investing.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center feature-wrapper">
                    <div class="col-md-6 col-sm-10 col-lg-4">
                        <div class="feature-item">
                            <div class="feature-thumb">
                                <img src="front/assets/images/feature/feature01.png" alt="feature">
                            </div>
                            <div class="feature-content">
                                <h5 class="title">Profitable Investment</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-10 col-lg-4">
                        <div class="feature-item">
                            <div class="feature-thumb">
                                <img src="front/assets/images/feature/feature02.png" alt="feature">
                            </div>
                            <div class="feature-content">
                                <h5 class="title">DDS Protection</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-10 col-lg-4">
                        <div class="feature-item">
                            <div class="feature-thumb">
                                <img src="front/assets/images/feature/feature03.png" alt="feature">
                            </div>
                            <div class="feature-content">
                                <h5 class="title">24/7 Support Center</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Feature-Section Ends Here=======-->


        <!--=======How-Section Starts Here=======-->
        <section class="get-section padding-top padding-bottom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="section-header">
                            <span class="cate">get to know</span>
                            <h2 class="title">how we work?</h2>
                            <p>
                                Follow these simple steps and make profit!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hover-tab">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 d-lg-block d-none">
                            <div class="hover-tab-area">
                                <div class="tab-area">
                                    <div class="tab-item active first">
                                        <img src="front/assets/images/how/how01.png" alt="how">
                                    </div>
                                    <div class="tab-item second">
                                        <img src="front/assets/images/how/how02.png" alt="how">
                                    </div>
                                    <div class="tab-item third">
                                        <img src="front/assets/images/how/how03.png" alt="how">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-9">
                            <div class="hover-tab-menu">
                                <ul class="tab-menu">
                                    <li class="active">
                                        <div class="menu-thumb">
                                            <span>
                                                01
                                            </span>
                                        </div>
                                        <div class="menu-content">
                                            <h5 class="title">Instant  registration</h5>
                                            <p>
                                                Click <a href="{{route('user.register')}}">Sign Up</a> to fill the blank, our 256 SSL will Protect your privacy.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="menu-thumb">
                                            <span>
                                                02
                                            </span>
                                        </div>
                                        <div class="menu-content">
                                            <h5 class="title">MAKE AN INVEST</h5>
                                            <p>
                                                <a href="{{route('user.login')}}">Login</a> your account to click invest to start to earn the profit.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="menu-thumb">
                                            <span>
                                                03
                                            </span>
                                        </div>
                                        <div class="menu-content">
                                            <h5 class="title">get profit</h5>
                                            <p>
                                                You will get your profit on your profile, also you will get Instant Payment
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======How-Section Ends Here=======-->


        <!--=======Check-Section Starts Here=======-->
        <section class="call-section call-overlay bg_img" data-background="front/assets/images/call/call-bg.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="call--item">
                            <span class="cate">Why We are always ready</span>
                            <h3 class="title">Request a call back</h3>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="call-button">
                            <a href="Tel:0939303" class="call">
                                <img src="front/assets/images/call/icon02.png" alt="call">
                            </a>
                            <a href="{{url('contact_us')}}" class="custom-button"> Contact Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Check-Section Ends Here=======-->



        <!--=======Latest-Transaction-Section Starts Here=======-->
        <section class="latest-transaction padding-top padding-bottom" id="transaction">
            <div class="transaction-bg bg_img" data-background="front/assets/images/transaction/transaction-bg.png">
                <span class="d-none">Image</span>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <div class="section-header">
                            <h2 class="title">OUR PACKAGES OFFER</h2>
                        </div>
                    </div>
                </div>
                <div class="tab transaction-tab d-flex flex-wrap justify-content-center">
                  
                    <div class="tab-area">
                        <div class="tab-item active">
                            <div class="row justify-content-center mb-30-none">
                                @foreach (App\Models\Package::all()->take(8) as $package)
                                <div class="col-lg-4 col-xl-3 col-sm-6">
                                    <div class="transaction-item">
                                        <div class="transaction-header">
                                            <h5 class="title">{{$package->name}}</h5>
                                            <span class="date">FOR {{$package->package_validity}} Days</span>
                                        </div>
                                        <div class="transaction-thumb">
                                            <img src="front/assets/images/transaction/transaction02.png" alt="transaction">
                                        </div>
                                        <div class="transaction-footer">
                                            <span class="amount">Total Earning: $ {{$package->t_earning}}</span>
                                            <span class="amount">Earning Per Day: $ {{$package->day}}</span>
                                            {{-- <span class="amount">Earning Per Referral : {{$package->click}} % </span> --}}
                                            <span class="amount">Daily Ads: {{$package->ads}}</span>
                                            <span class="amount">Package Amount</span>
                                            <h5 class="sub-title">$ {{$package->price}}</h5>
                                            <a href="{{route('user.login')}}" class="custom-button">Invest now</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Latest-Transaction-Section Ends Here=======-->


     
     

        <!--=======Check-Section Starts Here=======-->
        <section class="client-section padding-bottom padding-top">
            <div class="background-map">
                <img src="front/assets/images/client/client-bg.png" alt="client">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10">
                        <div class="section-header left-style">
                            <h2 class="title">HAPPY CLIENTS</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9">
                        <div class="m--30">
                            <div class="client-slider owl-carousel owl-theme">
                                @foreach (App\Models\Review::all() as $key => $review)
                                <div class="client-item">
                                    <div class="client-content">
                                        <p>
                                            {{$review->message}}
                                        </p>
                                        <div class="rating">
                                            @for ($i = 1; $i <= $review->star; $i++)
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="client-thumb">
                                        <a href="#0">
                                            <img src="{{asset($review->image)}}" alt="client">
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Check-Section Ends Here=======-->

@endsection