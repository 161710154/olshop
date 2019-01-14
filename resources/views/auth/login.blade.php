
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    
    <div class="container-login100" style="background-image: url('assets/login/images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        @csrf
                <span class="login100-form-title p-b-37">
                   Login
                </span>

                <div class="wrap-input100 validate-input m-b-20 {{ $errors->has('email') ? ' has-error' : '' }}" data-validate="Enter username or email">
                    <input id="email" type="email" class="input100" name="email" value="{{ old('email') }}" placeholder="email" required>
                    <span class="focus-input100"></span>
                    @if ($errors->has('email'))
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>

                <div class="wrap-input100 validate-input m-b-25{{ $errors->has('password') ? ' has-error' : '' }}" data-validate = "Enter password">
                    <input id="password" type="password" class="input100" name="password"   type="password" name="pass" placeholder="password" required>
                    <span class="focus-input100"></span>
                    @if ($errors->has('password'))
                                        <strong>{{ $errors->first('password') }}</strong>
                                @endif
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>

                <br><br>
                <p>You don't have account? Please Register</p>
                <div class="btn text-center">
                    <a href="{{ route('register') }}" class="txt1 hov2">
                        Register
                    </a>
                </div>
            </form>

            
        </div>
    </div>
    
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="assets/login/js/main.js"></script>

</body>
</html>