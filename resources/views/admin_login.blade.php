<!DOCTYPE html>
<html>
<head>
    <title>Đăng Nhập Trang Quảng Trị</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('public/frontend/img/284659317_700972667824995_6151864105056043416_n.png') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/style_login.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        .wave{
            -moz-transform: scaleX(-1);
            -o-transform: scaleX(-1);
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
            filter: FlipH;
            -ms-filter: "FlipH";
        }
    </style>
</head>
<body>
{{--<img class="wave" width="30%" src="{{asset('public/backend/images/')}}">--}}
<div class="container">
    <div class="img">
        <img height="80%" src="{{asset('public/backend/images/undraw_target.svg')}}">
    </div>
    <div class="login-content">
        <form action="{{ URL::to('/admin-dashboard') }}" method="post">
            {{ csrf_field() }}
            <img src="{{asset('public/backend/images/undraw_profile.svg')}}">
            <h2 class="title">Login</h2>
            <?php $message = Session::get('message');
            if (isset($message)){ ?>
            <div class="alert alert-danger">
                <strong>Thất bại! </strong> <?php echo $message;
                Session::put('message', null); // chỉ cho hiển thị một lần ?>
            </div>
            <?php } ?>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user" ></i>
                </div>
                <div class="div">
                    <h5>Username</h5>
                    <input type="text" class="input" name="admin_userName" id = "userName"
                           oninvalid="this.setCustomValidity('Username không để trống!')"
                           oninput="this.setCustomValidity('')"
                           autocomplete="off"
                           required>
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Password</h5>
                    <input type="password" class="input" name="admin_password" id="password"
                           oninvalid="this.setCustomValidity('Mật khẩu không để trống!')"
                           oninput="this.setCustomValidity('')"
                           autocomplete="off"
                           required>
                </div>
            </div>
            <a href="#">Quên mật khẩu?</a>
            <input style="background: #007BFF" type="submit" class="btn" value="Đăng Nhập">
        </form>
    </div>
</div>
<script type="text/javascript" src="{{asset('public/backend/js/main.js')}}"></script>
</body>
</html>
