@extends('front.layout.index')
@section('meta')
    
<title>CONTACT US | PAY EARN CASH</title>
    <meta name="description" content="ADVERT FOXX | BEST ONLINE EARNING SITE | No. 1 Marketing Forum to Earn Online.">
@endsection

@section('content')
<div class="header-title white" data-parallax="scroll" data-position="top" data-natural-height="650"        data-natural-width="1920" data-image-src="{{asset('front/banner1.jpg')}}">
    <div class="container">
        <div class="title-base">
            <hr class="anima" />
            <h1>CONTACT US | <a href="{{url('/')}}">HOME</a></h1> 
        </div>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-8 col-center text-center">
                <hr class="space s" />
                <ul class="fa-ul text-center">
                    <li><i class="fa-li im-headset"></i>Visit our Facebook Page: <a href="https://web.facebook.com/groups/advertfoxxofficial/">Advert Foxx Official</a></li>
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
</div>
@endsection