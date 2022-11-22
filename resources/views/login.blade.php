<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{ asset('img/logo_big.png') }}">

    <title>Login Page 2 | Creative - Bootstrap 3 Responsive Admin Template</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/elegant_icons_style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />
</head>

<body class="login-img3-body">

    <div class="container">

        <form class="login-form" action="{{ route('login') }}" method="POST"> @csrf
            <div class="login-wrap">
                <p class="login-img"><i class="icon_lock_alt"></i></p>
                <div class="input-group">
                    <label for="" class="input-group-addon">+993</label>
                    <input class="form-control" type="number" placeholder="" value=""></div>
                <label class="checkbox">
                    <span class="pull-right"> <a href="{{ route('register') }}"> Register</a></span>
                </label>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </div>
        </form>
    </div>


</body>

</html>
