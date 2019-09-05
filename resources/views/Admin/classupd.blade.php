@extends('Admin/layouts/main')

@section('title', '后台首页')


@section('content')
<article class="page-container">
    <form action="classupddo" method="post"  enctype="multipart/form-data">
        <input type="hidden" value="{{$str->c_id}}" name="c_id">

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3" style="width:100px;display:block;overflow:hidden;white-space:nowrap; "><span class="c-red">*</span>课程名称</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" style="width:200px;height:30px;"  value="{{$str->c_name}}"  placeholder="" id="c_name" name="c_name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3" style="width:100px;display:block;overflow:hidden;white-space:nowrap; "><span class="c-red">*</span>课程价格</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" style="width:200px;height:30px;"  value="{{$str->c_price}}" placeholder="" id="c_price" name="c_price">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3" style="width:100px;display:block;overflow:hidden;white-space:nowrap; "><span class="c-red">*</span>课程简介</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="c_desc" id="" cols="30" rows="10">{{$str->c_desc}}</textarea>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3" style="width:100px;display:block;overflow:hidden;white-space:nowrap; ">所属专题</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="f_id" size="1" id="f_id">
            <?php  foreach($sql as $k=>$v){?>
				<option value="<?php echo $v->f_id?>"><?php echo $v->f_name?></option>
            <?php }?>
			</select>
			</span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3" style="width:100px;display:block;overflow:hidden;white-space:nowrap; ">所属老师</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="t_id" size="1" id="t_id">
            <?php  foreach($teacher as $k=>$v){?>
				<option value="<?php echo $v->t_id?>"><?php echo $v->t_name?></option>
            <?php }?>
			</select>
			</span> </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <button class="btn btn-primary radius"  value="&nbsp;&nbsp;&nbsp;&nbsp;">提交</button>
            </div>
        </div>
    </form>
</article>


<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-admin-add").validate({
            rules:{
                adminName:{
                    required:true,
                    minlength:4,
                    maxlength:16
                },
                password:{
                    required:true,
                },
                password2:{
                    required:true,
                    equalTo: "#password"
                },
                sex:{
                    required:true,
                },
                phone:{
                    required:true,
                    isPhone:true,
                },
                email:{
                    required:true,
                    email:true,
                },
                adminRole:{
                    required:true,
                },
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "xxxxxxx" ,
                    success: function(data){
                        layer.msg('添加成功!',{icon:1,time:1000});
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown){
                        layer.msg('error!',{icon:1,time:1000});
                    }
                });
                var index = parent.layer.getFrameIndex(window.name);
                parent.$('.btn-refresh').click();
                parent.layer.close(index);
            }
        });

    });





</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
@endsection