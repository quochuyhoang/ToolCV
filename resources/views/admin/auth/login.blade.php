<!DOCTYPE html>
<html lang="en">

<head>
    <title>Material Login Form a Responsive Widget Template :: w3layouts</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates,
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="{{ asset('assets/css/login') }}/css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="{{ asset('assets/css/login') }}/css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- /google fonts-->

</head>


<body>
<h1>Login to CVTool Admin</h1>
<div class=" w3l-login-form">
    <h2>Login Here</h2>
    <form method="POST" action="{{ route('admin.auth.loginAdmin') }}">
        @csrf

        <div class=" w3l-form-group">
            <label>{{ __('E-Mail Address') }}</label>
            <div class="group">
                <i class="fas fa-user"></i>
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" required autofocus onchange="checkEmail(this)"/>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class=" w3l-form-group">
            <label>{{ __('Password') }}</label>
            <div class="group">
                <i class="fas fa-unlock"></i>
                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required >

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class="forgot">
            <p>

                <input type="checkbox"  onclick="showPass()">Show password
            </p>
            <script>
                function showPass() {
                    var x= document.getElementById('password');

                    if( x.type === 'password'){
                        x.type = 'text';
                    }
                    else{
                        x.type = 'password';
                    }

                }
                function checkEmail(obj) {
                    var x= obj.value;

                    var vitri = x.search("@");
                    if(vitri === 0){
                        alert('"@" cannot be at the beginning of the string');
                        obj.focus();
                    }
                    else if(vitri === x.length-1){
                        alert('"@" cannot be at the the end of the string');
                        obj.focus();
                    }
                    else if(vitri === -1){
                        alert('Please include "@" in the email address');
                        obj.focus();
                    }
                    else {

                    }
                }
            </script>
        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('Login Admin') }}
        </button>
    </form>

</div>
<footer>
    <p class="copyright-agileinfo"> &copy; 2018 Material Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
</footer>

</body>

</html>