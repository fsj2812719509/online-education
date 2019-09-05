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
        <div class="lowin-box lowin-register">
            <div class="lowin-box-inner">
                <form>
                    <div class="lowin-group">
                        <input type="hidden" value="{{$res['a_id']}}" id="id">
                        <p>{{$res['a_name']}}</p>
                        <label>new password</label>
                        <input type="password" name="password" autocomplete="current-password" class="lowin-input" id="password">
                    </div>
                    <input type="button" class="lowin-btn" id="btn" value="修改">

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
            var password = $("#password").val();
            var id = $("#id").val();

            $.ajax({
                url:"/AdminUpdatePwdDo",
                data:{id:id,password:password},
                dataType:"json",
                type:"post",
                success:function (msg) {
                    if(msg==1){
                        alert('修改成功，请重新登录');
                        location.href="/admin_login";
                    }else if(msg==2){
                        alert('修改失败');
                        location.href = '/admin_index';
                    }else if(msg==3){
                        alert('请输入密码');
                    }
                }
            })
        })
    })
</script>