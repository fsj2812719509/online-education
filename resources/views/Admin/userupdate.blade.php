@extends('Admin/layouts/main')

@section('title', '后台首页')


@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">管理员添加</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputUsername1">用户名：</label>
                        <input type="text" class="form-control" id="a_name" placeholder="Username" value={{$res['a_name']}}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">邮箱</label>
                        <input type="email" class="form-control" id="a_email" placeholder="Email" value={{$res['a_email']}}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">电话</label>
                        <input type="tel" class="form-control" id="a_tel" placeholder="Tel" value={{$res['a_tel']}}>
                    </div>

                    管理员权限<div class="col-md-6">
                        <div class="form-group">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="a_level" value="1" >
                                    用户管理
                                </label>
                            </div>
                            <div class="form-check form-check-success">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="a_level" value="2" >
                                    教室管理
                                </label>
                            </div>
                            <div class="form-check form-check-info">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="a_level" value="3" >
                                    课程管理
                                </label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="a_level" value="4" >
                                    专题管理
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2" id="btn">修改</button>
                    <button class="btn btn-light">取消</button>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/jquery-1.7.2.min.js"></script>
    <script>
        $(function () {
            $("#btn").click(function () {
                var obj = document.getElementsByName('a_level');


                var a_level = '';

                for (var i = 0; i < obj.length; i++) {

                    if (obj[i].checked) a_level += obj[i].value;

                }


                var a_name = $("#a_name").val();
                var a_email = $("#a_email").val();
                var a_tel = $("#a_tel").val();
                var a_pwd = $("#a_pwd").val();

                $.ajax({
                    url:"/AdminUpdate",
                    data:{a_name:a_name,a_email:a_email,a_pwd:a_pwd,a_tel:a_tel,a_level:a_level},
                    dataType:"json",
                    type:"post",
                    success:function (msg) {
                        console.log(msg);
                        /*if(msg==1){
                            alert('请输入您的名字');
                        }else if(msg==2){
                            alert('请输入您的邮箱');
                        }else if(msg==3){
                            alert('电话不能为空');
                        }else if(msg==4){
                            alert('密码不能为空');
                        }else if(msg==5){
                            alert('管理员权限不能为空');
                        }else if(msg==6){
                            alert('管理员添加成功');
                        }else if(msg==7){
                            alert('管理员添加失败');
                        }else if(msg==8){
                            alert('此管理员已存在');
                        }*/
                    }
                })
            })
        })
    </script>

@endsection