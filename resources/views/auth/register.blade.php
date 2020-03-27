<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Font Icon -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('vendors/fonts/material-icon/css/material-design-iconic-font.min.css')}}">


    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('vendors/css/style.css')}}">


</head>

<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="{{ route('register') }}">
                        <h2 class="form-title">Create account</h2>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input for="name" type="text" class="form-input" name="name" id="name" value="{{ old('name') }}" placeholder="Your Name" / required autofocus>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input for="email" type="email" class="form-input" name="email" id="email" value="{{ old('email') }}" placeholder="Your Email" / required>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input for="password" type="password" class="form-input" name="password" id="password" placeholder="Password" / required>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input for="password-confirm" type="password" class="form-input" name="password_confirmation" id="password-confirm" placeholder="Repeat your password" / required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up" />
                        </div>


                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="{{ route('login') }}" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('vendors/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/js/main.js')}}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>