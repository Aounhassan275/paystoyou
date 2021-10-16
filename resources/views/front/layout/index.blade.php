<!DOCTYPE html>
<!--[if lt IE 10]> <html  lang="en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <script src="{{asset('front/scripts/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('front/scripts/bootstrap/css/bootstrap.css')}}">
    <script src="{{asset('front/scripts/script.js')}}"></script>
    <link rel="stylesheet" href="{{asset('front/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/content-box.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/image-box.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/animations.css')}}">
    <link rel="stylesheet" href="{{asset('front/scripts/jquery.flipster.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('front/scripts/flexslider/flexslider.css')}}">
    <link rel="stylesheet" href="{{asset('front/scripts/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('front/scripts/php/contact-form.css')}}">
    <link rel="icon" href="{{asset('12.png')}}">
    <link rel="stylesheet" href="{{asset('front/skin.css')}}">
    <style>
        .blink_me {
        animation: blinker 1s linear infinite;
        }
        @keyframes blinker {
        50% {
        opacity: 0;
        }
        }
    </style>
    @toastr_css
</head>
<body>
    <div id="preloader"></div>
    <header class="fixed-top scroll-change" data-menu-anima="fade-in">
        <div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
            <div class="navbar navbar-main">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}" style="width:250px;
                        height: 80px;">
                            <img class="logo-default" src="{{asset('1.png')}}"  alt="logo" />
                            <img class="logo-retina" src="{{asset('1.png')}}" alt="logo" />
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="{{Request::is('/')?'active':''}}">
                                <a  href="{{asset('/')}}">Home</a>
                            </li>
                            <li class="{{Request::is('packages')?'active':''}}">
                                <a  href="{{asset('packages')}}">Packages</a>
                            </li>  
                            <li class="{{Request::is('videos')?'active':''}}">
                                <a  href="{{asset('videos')}}">Video's</a>
                            </li> 
                            <li class="{{Request::is('about_us')?'active':''}}">
                                <a  href="{{asset('about_us')}}">About Us</a>
                            </li>
                            <li class="{{Request::is('contact_us')?'active':''}}">
                                <a  href="{{asset('contact_us')}}">Contact Us</a>
                            </li>
                        </ul>
                        <div class="nav navbar-nav navbar-right">
                            <ul class="nav navbar-nav lan-menu">
                                <li >
                                    <a href="{{route('user.register')}}" >Sign Up<span class="caret"></span></a>
                                </li>
                                <li >
                                    <a href="{{route('user.login')}}">Sign In<span class="caret"></span></a>
                                </li>
								 <li >
                                    <a href="{{url('https://web.facebook.com/groups/')}}">Follow Us On Facebook<span class="caret"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    
    <i class="scroll-top scroll-top-mobile fa fa-sort-asc"></i>
    <footer class="footer-base" style="background-color:black;">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-left text-left">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Menu</h3>
                                <ul class="ul-dots text-s">
                                    <li><a href="{{url('/')}}" style="color:white!important;">Home</a></li>
                                    <li><a href="{{url('packages')}}"  style="color:white!important;">Packages</a></li>
                                    <li><a href="{{url('videos')}}"  style="color:white!important;">Video's</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3>Pages</h3>
                                <ul class="ul-dots text-s">
                                    <li><a href="{{url('about_us')}}"  style="color:white!important;">About Us</a></li>
                                    <li><a href="{{url('contact_us')}}" style="color:white!important;">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 footer-center text-left">
                        <h3>Mission Statement</h3>
                        <p class="text-s" style="color:white!important;">
                            PAYS TO YOU is a registered and recognized platform for those who want to earn money online. Simply sign up to view ads and earn money or if you’re a business and want to publish your ad, contact us today.
                        </p>
                    </div>
                    <div class="col-md-4 footer-right text-left">
                        <img width="300px" src="1.png" alt="" />
                        {{-- <hr class="space m" /> --}}
                        {{-- <p class="text-s" style="color:white!important;">Famous Tower, B 153, Block H North Nazimabad Town,Karachi City, Sindh.</p> --}}
                        {{-- <div class="tag-row text-s">
                            <span style="color:white!important;">contact@paystoyou.online</span>
                            <span style="color:white!important;">+02 3205550678</span>
                        </div> --}}
                        {{-- <hr class="space m" /> --}}
                    </div>                      
                </div>
            </div>
            <div class="row copy-row">
                <div class="col-md-12 copy-text">
                    © 2020 ALL RIGHTS RESERVED BY <a href="{{url('/')}}" style="color:white!important;">paystoyou.online</a>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="{{asset('front/scripts/iconsmind/line-icons.min.css')}}">
        <script async src="{{asset('front/scripts/bootstrap/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/scripts/imagesloaded.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/scripts/parallax.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/scripts/flexslider/jquery.flexslider-min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/scripts/jquery.flipster.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/scripts/php/contact-form.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/scripts/jquery.progress-counter.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/scripts/jquery.tab-accordion.js')}}"_expanded_></script>
        <script type="text/javascript" src="{{asset('front/scripts/bootstrap/js/bootstrap.popover.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/scripts/jquery.magnific-popup.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/scripts/google.maps.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyCp69VyBGUlCdAAsfgcRvf3Pg57B6vNHd8')}}"></script>
        <script type="text/javascript" src="{{asset('front/scripts/isotope.min.js')}}"></script>
        <script src="{{asset('front/scripts/smooth.scroll.min.js')}}"></script>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5ee9beeb9e5f69442290b910/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
        @toastr_js
	    @toastr_render
    </footer>
    
</body>
</html>
