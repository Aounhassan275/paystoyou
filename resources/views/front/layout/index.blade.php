<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from pixner.net/hyipland/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Apr 2020 08:08:03 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('meta')

    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/main.css')}}">

    <link rel="shortcut icon" href="{{asset('front/assets/images/favicon.png')}}" type="image/x-icon">
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
    <div class="main--body">
        <!--========== Preloader ==========-->
        <div class="preloader">
            <div class="preloader-wrapper">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
        <div class="overlay"></div>
        <!--========== Preloader ==========-->
        

        <!--=======Header-Section Starts Here=======-->
        <header class="header-section">
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <ul class="support-area">
                                <li>
                                    <a href="#0"><i class="flaticon-support"></i>Support</a>
                                </li>
                                <li>
                                    <a href="Mailto:info@paystoyou.com"><i class="flaticon-email"></i>info@paystoyou.com </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">                            
                            <ul class="cart-area">
                                <li>
                                    <a href="{{route('user.login')}}"><i class="flaticon-globe"></i>Sign In</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="header-area">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                {{-- <img src="front/assets/images/logo/logo.png" alt="logo"> --}}
                                <img src="{{asset('front/assets/images/favicon.png')}}" alt="logo">
                            </a>
                        </div>
                        <ul class="menu">
                            <li class="{{Request::is('/')?'active':''}}">
                                <a  href="{{asset('/')}}">Home</a>
                            </li>
                            <li class="{{Request::is('packages')?'active':''}}">
                                <a  href="{{asset('packages')}}">Packages</a>
                            </li>  
                            <li class="{{Request::is('videos')?'active':''}}">
                                <a  href="{{asset('videos')}}">Video's</a>
                            </li>   
                            <li class="{{Request::is('withdraw')?'active':''}}">
                                <a  href="{{asset('withdraw')}}">Withdraw</a>
                            </li> 
                            <li class="{{Request::is('about_us')?'active':''}}">
                                <a  href="{{asset('about_us')}}">About Us</a>
                            </li>
                            <li class="{{Request::is('contact_us')?'active':''}}">
                                <a  href="{{asset('contact_us')}}">Contact Us</a>
                            </li>
                            <li class="pr-0">
                                <a href="{{route('user.register')}}" class="custom-button">SIGN UP</a>
                            </li>
                        </ul>
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--=======Header-Section Ends Here=======-->
        @yield('content')


        
        <!-- ==========Footer-Section Starts Here========== -->
        <footer class="footer-section">
            <div class="newslater-section padding-bottom">
                <div class="container">
                    <div class="newslater-area">
                        <div class="newslater-content padding-bottom padding-top">
                            <span class="cate">Get in touch</span>
                            <h3 class="title">To Get Exclusive Benefits</h3>
                            <form class="contact-form" action="{{route('admin.message.store')}}"  method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" placeholder="Enter Your Name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="text" id="email" placeholder="Enter Your Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" placeholder="Subject" name="Subject" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">How can we help?</label>
                                    <textarea name="message" id="message" placeholder="Type Here Your Message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Send Message">
                                </div>
                            </form>
                        </div>
                        <div class="newslater-thumb">
                            <img src="front/assets/images/footer/footer.png" alt="footer">
                            <div class="coin-1">
                                <img src="front/assets/images/footer/Coin_01.png" alt="footer">
                            </div>
                            <div class="coin-2">
                                <img src="front/assets/images/footer/Coin_02.png" alt="footer">
                            </div>
                            <div class="coin-3">
                                <img src="front/assets/images/footer/Coin_03.png" alt="footer">
                            </div>
                            <div class="coin-4">
                                <img src="front/assets/images/footer/Coin_04.png" alt="footer">
                            </div>
                            <div class="coin-5">
                                <img src="front/assets/images/footer/Coin_05.png" alt="footer">
                            </div>
                            <div class="coin-6">
                                <img src="front/assets/images/footer/Coin_06.png" alt="footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="footer-top">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="{{asset('front/assets/images/favicon.png')}}" alt="logo">
                        </a>
                    </div>
                    <ul class="links">
                        <li><a href="{{url('/')}}" style="color:white!important;">Home</a></li>
                        <li><a href="{{url('packages')}}"  style="color:white!important;">Packages</a></li>
                        <li><a href="{{url('videos')}}"  style="color:white!important;">Video's</a></li>
                        <li><a href="{{url('about_us')}}"  style="color:white!important;">About Us</a></li>
                        <li><a href="{{url('contact_us')}}" style="color:white!important;">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-bottom">
                    <div class="footer-bottom-area">
                        <div class="left">
                            <p>&copy; 2020 <a href="{{url('/')}}">PAYSTOYOU</a> | All right reserved</p>
                        </div>
                        <ul class="social-icons">
                            <li>
                                <a href="#0">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0" >
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ==========Footer-Section Ends Here========== -->

        
    </div>

    <script src="{{asset('front/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('front/assets/js/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins.js')}}"></script>
    <script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/assets/js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('front/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('front/assets/js/odometer.min.js')}}"></script>
    <script src="{{asset('front/assets/js/viewport.jquery.js')}}"></script>
    <script src="{{asset('front/assets/js/nice-select.js')}}"></script>
    <script src="{{asset('front/assets/js/owl.min.js')}}"></script>
    <script src="{{asset('front/assets/js/paroller.js')}}"></script>
    <script src="{{asset('front/assets/js/main.js')}}"></script>
        <!--End of Tawk.to Script-->
    @toastr_js
    @toastr_render
    @yield('javascript')
</body>


<!-- Mirrored from pixner.net/hyipland/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Apr 2020 08:09:53 GMT -->
</html>