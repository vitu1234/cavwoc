<!DOCTYPE html>
<html lang="en">
<head>
    <title>ADMIN RESET PASSWORD </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('login_assets/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_assets/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_assets/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_assets/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_assets/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_assets/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_assets/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login_assets/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form method="POST" class="login100-form validate-form" action="{{ route('password.update') }}"
                  autocomplete="off">
                @csrf
                <span class="login100-form-title p-b-10">
<!--						<i class="zmdi zmdi-font"></i>-->
                        <a href="/"><img height="100" src="{{asset('images/logo_600_400.jpg')}}" alt="logo"/></a>
					</span>
                <span class="login100-form-title p-b-4">
						Create New Password
				</span>
                <!--                <p class="text-center " style="width: 100%"><small>GoM</small></p>-->

                @if(Session::has('success'))
                    <div class="alert alert-success text-center" style="width: 100%;">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger text-center" style="width: 100%; margin:10px">
                        {{ Session::get('error') }}
                        @php
                            Session::forget('error');
                        @endphp
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger text-center" style="width: 100%; margin:10px">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input autocomplete="off" class="input100" type="password" name="password" required/>
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Confirm password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input autocomplete="off" class="input100" type="password" name="password_confirmation" required/>
                    <span class="focus-input100" data-placeholder="Confirm Password"></span>
                </div>

                <input type="hidden" name="token" value="{{ $request->route('token') }}"/>
                <input value="{{$request->email}}" required class="input100" type="hidden" name="email"/>


                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Reset Password
                        </button>

                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('login_assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login_assets/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login_assets/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('login_assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login_assets/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login_assets/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('login_assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login_assets/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login_assets/js/main.js')}}"></script>

</body>
</html>
