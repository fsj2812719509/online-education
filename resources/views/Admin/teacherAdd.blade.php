@extends('Admin/layouts/main')

@section('title', '后台首页')


@section('content')
    <form action="do_teacherAdd" method="post" enctype="multipart/form-data">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">教师添加</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputUsername1">教师名称：</label>
                        <input type="text" class="form-control" name="t_name" id="t_name">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">教师等级</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="t_level" id="t_level">
                                <option value="1">一级教师</option>
                                <option value="2">二级教师</option>
                                <option value="3">三级教师</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleTextarea1">教师介绍</label>
                            <textarea class="form-control" name="t_desc" id="t_desc" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleTextarea1">教师图片</label>
                            <input type="file" name="t_img" id="exampleInputFile" class="form-control">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-gradient-primary mr-2"  value="提交">
                    <button class="btn btn-light">取消</button>
                </form>
            </div>
        </div>
    </div>
    </form>
@endsection