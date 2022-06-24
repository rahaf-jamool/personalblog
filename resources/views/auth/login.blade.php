<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/assets/style.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="login-wrap">
        <div class="login-html">
            <h1>Login</h1>
            <div class="login-form">
                <form class="sign-in-htm" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="group">
                        <label for="login" class="label">Username or Email</label>
                        <input type="text" id="login"
                            class="input {{ $errors->has('username') || $errors->has('email') ? 'is-invalid' : '' }} "
                            name="login" value="{{ old('username') ?: old('email') }}" required
                            autofocus>
                        @if($errors->has('username') || $errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="password" type="password"
                            class="input @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password"
                            placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="{{ __('Login') }}">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

</body>

</html>
