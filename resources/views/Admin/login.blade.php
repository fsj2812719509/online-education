<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Lowin</title>
    <link rel="stylesheet" href="css/adminlogin/auth.css">
</head>

<body>
<div class="lowin">
    <div class="lowin-brand">
        <img src="img/kodinger.jpg" alt="logo">
    </div>
    <div class="lowin-wrapper">
        <div class="lowin-box lowin-login">
            <div class="lowin-box-inner">
                <form>
                    <p>Sign in to continue</p>
                    <div class="lowin-group">
                        <label>Email <a href="#" class="login-back-link">Sign in?</a></label>
                        <input type="email" autocomplete="email" name="email" class="lowin-input">
                    </div>
                    <div class="lowin-group password-group">
                        <label>Password <a href="#" class="forgot-link">Forgot Password?</a></label>
                        <input type="password" name="password" autocomplete="current-password" class="lowin-input">
                    </div>
                    <button class="lowin-btn login-btn">
                        Sign In
                    </button>

                    <div class="text-foot">
                        Don't have an account? <a href="" class="register-link">Register</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="lowin-box lowin-register">
            <div class="lowin-box-inner">
                <form>
                    <p>Let's create your account</p>
                    <div class="lowin-group">
                        <label>Name</label>
                        <input type="text" name="name" autocomplete="name" class="lowin-input" id="name">
                    </div>
                    <div class="lowin-group">
                        <label>Password</label>
                        <input type="password" name="password" autocomplete="current-password" class="lowin-input" id="password">
                    </div>
                    <input type="button" class="lowin-btn" id="btn" value="Sign Up">

                    <div class="text-foot">
                        Already have an account? <a href="" class="login-link">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<script src="js/adminlogin/auth.js"></script>
<script>
    Auth.init({
        login_url: '#login',
        forgot_url: '#forgot'
    });
</script>
</body>
</html>
<script src="js/jquery-1.7.2.min.js"></script>
<script>
    $(function () {
        $("#btn").click(function () {
            var name = $("#name").val();
            var password = $("#password").val();

            $.ajax({
                url:"/AdminLoginDo",
                data:{name:name,password:password},
                dataType:"json",
                type:"post",
                success:function (msg) {
                    if(msg==1){
                        alert('管理员用户名或密码有误');
                    }else if(msg==2){
                        alert('登录成功');
                        location.href = '/admin_index';
                    }else if(msg==3){
                        alert('密码不能为空');
                    }else if(msg==4){
                        alert('用户名不能为空');
                    }
                }
            })
        })
    })
</script>