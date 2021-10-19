<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Bootlab">


    <title>VIEW AD | PAYS TO YOU</title>   
    <meta name="description" content="PAYS TO YOU | BEST ONLINE EARNING SITE | No. 1 Marketing Forum to Earn Online.">


	<link rel="preconnect" href="{{asset('//fonts.gstatic.com/')}}'" crossorigin="">
    <link rel="shortcut icon" href="{{asset('front/assets/images/favicon.png')}}" type="image/x-icon">

	<!-- PICK ONE OF THE STYLES BELOW -->
    <link href="{{asset('css/classic.css')}}" rel="stylesheet">	
    <link href="{{asset('css/toastr.css')}}" rel="stylesheet">	
    <!-- <link href="css/corporate.css" rel="stylesheet"> -->
	<!-- <link href="css/modern.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- You can remove this after picking a style -->
	<style>
		body {
			opacity: 0;
		}
         .ytplayer {
pointer-events: none;
position: absolute;
}
	.blink_me {
		animation: blinker 1s linear infinite;
		}
		@keyframes blinker {
		50% {
		opacity: 0;
		}
		}
	</style>
	<script src="{{asset('js\settings.js')}}"></script>
    <!-- END SETTINGS -->
    <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1685936,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    	@toastr_css
</head>

<body>
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <legend class="text-uppercase text-center font-size-sm font-weight-bold">
                            <form id="myForm" method="POST">
                                @csrf
                                 <button type="submit" id="btn" class="btn btn-primary btn-block  text-light">
                                        <span id="countdown">60</span>
                                </button>
                            </form>
                        </legend>
                        <div class="card-body pt-0">
                            <div class="embed-responsive embed-responsive-21by9">
                                <iframe class="ytplayer" width="100%" height="400" src="{!! $ad->link !!}?autoplay=1&controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                            
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>

        </div>
    </main>

	<script src="{{asset('js\app.js')}}"></script>
	@toastr_js
    @toastr_render
    <script type="text/javascript">
        var mSeconds = 40;
    
        var pause = false;
        var seconds = mSeconds;
        var button = document.getElementById("btn");
        var myForm = document.getElementById("myForm");
    
        var countdown = setInterval(function(){
            if(!pause){
                seconds--;
            }
            
            if(seconds >= 10)
                document.getElementById("countdown").textContent = seconds-10;
            
            if (seconds == 10) {
        // 		clearInterval(countdown);
                // btn.innerHTML = "Verify Now";
                myForm.action = "{{route('user.ad.store',$ad->id)}}";
                setDisabled();
            }
            else if (seconds == 0) {
                console.log('reached');
                myForm.submit();
            }
        },1000);
    
    function onVisibilityChanged() {
      if (document.hidden || document.mozHidden || document.webkitHidden || document.msHidden) {
        // The tab has lost focus
        pause = true;
      } else {
        // The tab has gained focus
        pause = false;
      }
    }

    $('#btn').on('click',function(e){
        if(seconds>10){e.preventDefault();}
    });
    
    document.addEventListener("visibilitychange", onVisibilityChanged, false);
    document.addEventListener("mozvisibilitychange", onVisibilityChanged, false);
    document.addEventListener("webkitvisibilitychange", onVisibilityChanged, false);
    document.addEventListener("msvisibilitychange", onVisibilityChanged, false);
    
    function setDisabled(){
       
    }
    
    </script>
</body>

</html>