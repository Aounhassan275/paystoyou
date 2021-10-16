@extends('front.layout.index')
@section('meta')
    
<title>VIDEOS | PAY EARN CASH</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
<div class="header-title white" data-parallax="scroll" data-position="top" data-natural-height="650"        data-natural-width="1920" data-image-src="{{asset('front/banner1.jpg')}}">
    <div class="container">
        <div class="title-base">
            <hr class="anima" />
            <h1>OUR VIDEOS | <a href="{{url('/')}}">HOME</a></h1> 
        </div>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row">
            @foreach (App\Models\Ad::video() as $ad)
            <div class="col-md-4">
                <iframe  src="{{$ad->link}}"></iframe>
            </div>
            @endforeach
        </div>
        <hr class="space" />
    </div>
</div>
@endsection