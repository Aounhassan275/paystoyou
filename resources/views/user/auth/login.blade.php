@extends('front.layout.index')
@section('meta')
    
<title>LOGIN | PAYS TO YOU</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
  <!--=======Banner-Section Starts Here=======-->
  <section class="bg_img hero-section-2 left-bottom-lg-max" data-background="{{asset('front/assets/images/about/hero-bg5.png')}}">
    <div class="container">
        <div class="hero-content text-white">
            <h1 class="title">Sign In</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    Sign In
                </li>
            </ul>
        </div>
    </div>
</section>
<!--=======Banner-Section Ends Here=======-->

        <!--=======Contact-Section Starts Here=======-->
        <section class="contact-section padding-bottom padding-top">
            <div class="container">
                <div class="contact-wrapper padding-top">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-xl-4 offset-xl-1">
                            <div class="contact-header">
                                <h2 class="title">Sign In</h2>
                            </div>
                            <div class="contact-content">
                                <p>
                                    If You have any issue in Login.Contact Support.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-xl-1">
                            <form action="{{route('user.login')}}" method="POST" class="contact-form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">UserName</label>
                                    <input type="text" id="name" placeholder="username" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input  id="password" class="form-control"  type="password" name="password" placeholder="Enter password" required>
                                </div>
                                
                                <div class="form-group">
                                    <a href="{{route('user.verification')}}">Forget Password ?</a>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Contact-Section Ends Here=======-->

@endsection