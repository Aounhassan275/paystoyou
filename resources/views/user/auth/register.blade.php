@extends('front.layout.index')
@section('meta')
    
<title>REGISTER | PAYS TO YOU</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
  <!--=======Banner-Section Starts Here=======-->
  <section class="bg_img hero-section-2 left-bottom-lg-max" data-background="{{asset('front/assets/images/about/hero-bg5.png')}}">
    <div class="container">
        <div class="hero-content text-white">
            <h1 class="title">Register</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    Register
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
                                <h2 class="title">Register YourSelf</h2>
                            </div>
                            <div class="contact-content">
                                {{-- <h3 class="title">Have questions?</h3> --}}
                                <p>
                                    Have questions about payments or price plans? We have answers!
                                </p>
                                <a href="{{route('user.login')}}">Already Register?<i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-xl-1">
                            <form action="{{route('user.register')}}" method="POST" class="contact-form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">UserName</label>
                                    <input type="hidden" value="{{$code ?? ''}}" name="code">
                                    <input type="text" id="name" placeholder="username" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="surename">Phone</label>
                                    <input  name="phone" type="number"   placeholder="Enter You Phone Number"  required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="text" id="email" placeholder="Enter your email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Password</label>
                                    <input id="pwd" minlength="8" class="form-control" onkeyup="validatePassword(this.value);" type="password" name="password" placeholder="Enter password" required>
                                    <span id="msg"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Register">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Contact-Section Ends Here=======-->

@endsection
@section('javascript')
<script>
	$(document).ready(function () {
        $('.disablecopypaste').on('paste', function (e) {
                e.preventDefault();
        });
    });  
    // $('.phone').keyup(function(e) {
    //     // alert(this.value.length);
    //     if (this.value.length < 3) {
    //     this.value = '923';
    //     } else if (this.value.indexOf('923') !== 0) {
    //     this.value = '923' + String.fromCharCode(e.which);
    //     }
        
        
        
    // });
    
    // $('form').on('submit', function(e) {
    //     if($('#mPhone').val().length < 12 || $('#mPhone').val().length > 12){
    //         e.preventDefault();
    //         alert('Please enter correct phone number');
    //     }
    // });
 </script>
 <script>
     
		$('#cnic').keydown(function(e){
		
		  //allow  backspace, tab, ctrl+A, escape, carriage return
		  if (event.keyCode == 8 || event.keyCode == 9 
							|| event.keyCode == 27 || event.keyCode == 13 
							|| (event.keyCode == 65 && event.ctrlKey === true) )
								return;
		  if((event.keyCode < 48 || event.keyCode > 57))
		   event.preventDefault();
		
		  var length = $(this).val().length; 
					  
		  if(length == 5 || length == 13)
		   $(this).val($(this).val()+'-');
		   if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105)) {
			// 0-9 only
			}
		 });
		</script>
		 <script>
            function validatePassword(password) {
                
                // Do not show anything when the length of password is zero.
                if (password.length === 0) {
                    document.getElementById("msg").innerHTML = "";
                    return;
                }
                // Create an array and push all possible values that you want in password
                var matchedCase = new Array();
                matchedCase.push("[$@$!%*#?&]"); // Special Charector
                matchedCase.push("[A-Z]");      // Uppercase Alpabates
                matchedCase.push("[0-9]");      // Numbers
                matchedCase.push("[a-z]");     // Lowercase Alphabates

                // Check the conditions
                var ctr = 0;
                for (var i = 0; i < matchedCase.length; i++) {
                    if (new RegExp(matchedCase[i]).test(password)) {
                        ctr++;
                    }
                }
                // Display it
                var color = "";
                var strength = "";
                switch (ctr) {
                    case 0:
                    case 1:
                    case 2:
                        strength = "Very Weak";
                        color = "red";
                        break;
                    case 3:
                        strength = "Medium";
                        color = "orange";
                        break;
                    case 4:
                        strength = "Strong";
                        color = "green";
                        break;
                }
                document.getElementById("msg").innerHTML = strength;
                document.getElementById("msg").style.color = color;
            }
        </script>
@endsection