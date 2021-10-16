@extends('front.layout.index')
@section('meta')
    
<title>HOME | ADVERT FOXX </title>
    <meta name="description" content="ADVERT FOXX | BEST ONLINE EARNING SITE | No. 1 Marketing Forum to Earn Online.">
@endsection

@section('content')
<div class="section-slider row-20">
    <div class="flexslider advanced-slider slider white" data-options="animation:fade">
        <ul class="slides">
            <li data-slider-anima="fade-left">
                <div class="section-slide">
                    <div class="bg-cover" style="background-image:url('front/banner1.jpg')">
                    </div>
                    <div class="container">
                        <div class="container-middle">
                            <div class="container-inner text-left text-center-sm">
                                <div class="row vertical-row">
                                    <div class="col-md-12">
                                        <h1 class="text-light text-xl anima text-center">Welcome to ADVERT FOXX</h1>
                                        <p class="text-light anima text-center">ADVERT FOXX is here to help those who seek easy ways to earn money online. It is a platform that pays you on each ad you view. Simply sign up now and start making money!</p>
                                        <hr class="space xs" />
                                        <hr class="space visible-sm" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>


</div>
<div class="section-bg-image parallax-window" data-natural-height="750" data-natural-width="1920" data-parallax="scroll" data-image-src="{{asset('front/images/bg-13.jpg')}}">
    <div class="container content">
        <div class="row">
            
                      <marquee behavior="move" direction="left">   @foreach (App\Models\Ticker::all() as $ticker)
                    {{$ticker->message}} .
                        @endforeach
    </marquee>
            <div class="col-md-4">
                <div class="icon-box icon-box-top-bottom">
                    <div class="icon-box-cell">
                        <i class="im-cool-guy text-xl"></i>
                    </div>
                    <div class="icon-box-cell">
                        <b><label class="text-l" data-to="{{App\Models\User::active()->count()}}">{{App\Models\User::active()->count()}}</label></b>
                        <p>Registered users</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="icon-box icon-box-top-bottom">
                    <div class="icon-box-cell">
                        <i class="im-business-manwoman text-xl"></i>
                    </div>
                    <div class="icon-box-cell">
                        <b><label class=" text-l" data-to="{{App\Models\User::pending()->count()}}">{{App\Models\User::pending()->count()}}</label></b>
                        <p>Pending users</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="icon-box icon-box-top-bottom">
                    <div class="icon-box-cell">
                        <i class="im-coins text-xl"></i>
                    </div>
                    <div class="icon-box-cell">
                        <b><label class=" text-l"  data-to="{{App\Models\Withdraw::all()->sum('payment')}}">{{App\Models\Withdraw::all()->sum('payment')}}</label></b>
                        <p>Total Withdraw</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-empty section-border">
    <div class="container content">
        <div class="row vertical-row">
                <div class="col-md-12 text-center">
                    <h4>LATEST WITHDRAWS</h4>
                </div>
            </div>  
              <div class="row">
                              @foreach (App\Models\Withdraw::orderBy('created_at','DESC')->get()->take(16)  as $key => $withdraw)
@if($withdraw->status=="Completed")
@if (($key+1)%2==0)
                <div class="col-md-6">
                    <div class="list-items text-left">
                        <div class="list-item list-item-img">
                            <div class="row">
                                <div class="col-md-9">
                                    <i class="onlycover circle icon" style="background-image:url({{asset('verify.png')}})"></i>
                                    <h3>{{$withdraw->user->fname}}</h3>
                                    <p>
                                    {{Carbon\Carbon::parse($withdraw->updated_at)->diffForHumans()}}
                                    </p>
                                     <p>
                                     <button class="btn btn-success">{{$withdraw->status}}</button>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <span>RS {{$withdraw->payment}} /-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else

                <div class="col-md-6">
                    <div class="list-items text-left">
                        <div class="list-item list-item-img">
                            <div class="row">
                                <div class="col-md-9">
                                    <i class="onlycover circle icon" style="background-image:url({{asset('verify.png')}})"></i>
                                   <h3>{{$withdraw->user->fname}}</h3>
                                    <p>
                                    {{Carbon\Carbon::parse($withdraw->updated_at)->diffForHumans()}}
                                    </p>
                                     <p>
                                     <button class="btn btn-success">{{$withdraw->status}}</button>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <span>RS {{$withdraw->payment}} /-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
@endif
@endforeach
               
            </div>          
        </div>
        <hr class="space" />
    </div>
</div>

<div class="section-bg-color">
    <div class="container content">
        <div class="row vertical-row">
            <div class="col-md-12 text-center">
                <h4>WHY CHOOSE US?
                </h4>
            </div>
        </div>
        <div class="flexslider carousel outer-navs" data-options="minWidth:230,itemMargin:30,numItems:4,directionNav:true">
            <ul class="slides">
                <li>
                    <div class="advs-box advs-box-top-icon boxed-inverse" data-anima="rotate-20" data-trigger="hover">
                        <i class="im-dna-2 icon circle anima"></i>
                        <h3>DAILY INCOME</h3>
                    </div>
                </li>
                <li>
                    <div class="advs-box advs-box-top-icon boxed-inverse" data-anima="rotate-20" data-trigger="hover">
                        <i class="im-double-tap icon circle anima"></i>
                        <h3>EASY TO USE</h3>
                    </div>
                </li>
                <li>
                    <div class="advs-box advs-box-top-icon boxed-inverse" data-anima="rotate-20" data-trigger="hover">
                        <i class="im-dropbox icon circle anima"></i>
                        <h3>24/7 SUPPORT</h3>
                    </div>
                </li>
                <li>
                    <div class="advs-box advs-box-top-icon boxed-inverse" data-anima="rotate-20" data-trigger="hover">
                        <i class="im-pen-3 icon circle anima"></i>
                        <h3>REGISTER COMPANY</h3>
                    </div>
                </li>
                <li>
                    <div class="advs-box advs-box-top-icon boxed-inverse" data-anima="rotate-20" data-trigger="hover">
                        <i class="im-compass icon circle anima"></i>
                        <h3>SIMPLE & CLEAN</h3>
                    </div>
                </li>
                <li>
                    <div class="advs-box advs-box-top-icon boxed-inverse" data-anima="rotate-20" data-trigger="hover">
                        <i class="im-checked-user icon circle anima"></i>
                        <h3>HAPPY CLIENTS</h3>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="section-bg-image parallax-window" data-natural-height="750" data-natural-width="1920" data-parallax="scroll" data-image-src="{{asset('front/images/bg-13.jpg')}}">
    <div class="container content">
      <div class="row">
            <div class="col-md-12">
                <h1 class="text-center"><b>OUR PACKAGES</b></h1>
            </div>
        </div>
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

{{-- 
<div class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-12 text-center-sm">
                <h4 class="no-margins text-center">OUR CUSTOMER REVIEW VIDEOS</h4>
                <hr class="space xs" />
            </div>
        </div>
        <hr class="space m" />
        <div class="grid-list">
            <div class="grid-box small-margins row">
                @foreach (App\Models\Video::all() as $video)
                <div class="grid-item col-md-4">
                    <div class="advs-box niche-box-team" data-anima="scale-up" data-trigger="hover">
                        <a class="img-box">
                            <video width="345" height="400" controls>
                                <source src="{{asset($video->video)}}" type="video/mp4">
                            </video>                        
                        </a>
                        <div class="content-box">
                        <h2>{{$video->name}}</h2>
                            <hr class="e" />
                        </div>
                    </div>
                    <hr class="space s" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center"><b>OUR CUSTOMER REVIEW</b></h1>
            </div>
        </div>
        <div class="flexslider carousel outer-navs" data-options="numItems:3,itemMargin:15,controlNav:true,directionNav:true">
            <ul class="slides">
                @foreach (App\Models\Review::all() as $key => $review)
                <li>
                    <div class="advs-box niche-box-testimonails-cloud">
                        <p>
                            “{{ $review->message }}’’
                        </p>
                        <div class="name-box vertical-row">
                            <i class="vertical-col fa text-l circle onlycover" style="background-image:url('{{asset($review->image)}}')"></i>
                            <h5 class="vertical-col subtitle">{{$review->name}} 
                                <span class="subtxt">Customer Package Name: {{$review->p_name}}</span>
                                <span class="subtxt">Customer Package Amount: {{$review->amount}}</span>
                            </h5>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div> --}}

<div class="section-empty">
    <div class="container content">
        <h4 class="text-center">Frequntly asked questions</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="list-group accordion-list">
                    <div class="list-group-item">
                        <a href="#">What is advertfoxx.com?</a>
                        <div class="panel">
                            <div class="inner">
                                Advert Foxx is a registered online platform for those who want to earn money online. Simply sign up make a deposit to view ads and earn money.
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <a href="#">How many accounts can I open on the site?</a>
                        <div class="panel">
                            <div class="inner">
                               You can open multiple accounts at a time.
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <a href="#"> How secure user accounts and personal data?</a>
                        <div class="panel">
                            <div class="inner">
                                This is an online 100 percent secure method of earning money from home by watching adz that we provide you and secure payment with a secure payment method instantly to your account without any fees or charges, so let's get started working with us and start making comfortable home earnings.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="list-group accordion-list">
                    <div class="list-group-item">
                        <a href="#"> What is the minimum withdraw you can?</a>
                        <div class="panel">
                            <div class="inner">
                                The Minimum withdrawal limit depends upon the subscribed package.

                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <a href="#">What is refferal program?</a>
                        <div class="panel">
                            <div class="inner">
                             One can make as many refferals as can by sharing his unique refferal link. He get paid on every earning of his refferal.
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <a href="#"> What's our withdrawal method?</a>
                        <div class="panel">
                            <div class="inner">
                               Our payment methods are Jazzcash, Easypaisa, Cashmaal, Skrill and Bank transfer.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="space" />
    </div>
</div>
{{-- <div class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-8 col-center text-center">
                <h4>Contact us now</h4>
                <hr class="space s" />
                <ul class="fa-ul text-center">
                    <li><i class="fa-li im-headset"></i>Visit our Facebook Page: <a href="https://www.facebook.com/groups/cashpayearnofficial?_rdc=1&_rdr">ADVERT FOXX Official</a></li>
                </ul>
                <hr class="space m" />
                <form action="{{route('admin.message.store')}}"  method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input id="name" name="name" placeholder="Name" type="text" class="form-control form-value" required>
                        </div>
                        <div class="col-md-6">
                            <input id="email" name="email" placeholder="Email" type="email" class="form-control form-value" required>
                        </div>
                    </div>  
                    <hr class="space xs" />
                    <div class="row">
                        <div class="col-md-12">
                            <input id="subject" name="subject" placeholder="Subject" type="text" class="form-control form-value" required>
                        </div>
                    </div>
                    <hr class="space xs" />
                    <div class="row">
                        <div class="col-md-12">
                            <textarea id="message" name="message" placeholder="Type here your message" class="form-control form-value" required></textarea>
                            <hr class="space s" />
                            <button class="btn btn-primary" type="submit"><i class="im-mail-send"></i>Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr class="space" />
    </div>
</div> --}}
@endsection