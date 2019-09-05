@extends('Admin/layouts/main')

@section('title', '后台首页')


@section('content')
    <form action="/classadddo" method="post" enctype="multipart/form-data">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">课程添加</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputUsername1">
                                <span class="c-red">*</span>课程名称
                            </label>
                            <input type="text" class="form-control" id="c_name" name="c_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">
                                <span class="c-red">*</span>课程价格
                            </label>
                            <input type="text" class="form-control" placeholder="" id="c_price" name="c_price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">
                                <span class="c-red">*</span>课程简介
                            </label>
                            <textarea class="form-control" name="c_desc" id="c_desc" rows="4"></textarea>
                        </div>

                        <div class="row cl">
                            <label for="exampleInputUsername1"><span class="c-red">*</span>上传视频</label>
                            <div class="formControls col-xs-8 col-sm-9">
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000000">
                                <input type=file name=c_video size=20 class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">所属专题</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="f_id" id="f_id">
                                    @foreach($sql as $k=>$v)
                                        <option value="{{$v->f_id}}">{{$v->f_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>、
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">所属专题</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="t_id" id="t_id">
                                    @foreach($teacher as $k=>$v)
                                        <option value="{{$v->t_id}}">{{$v->t_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>、
                        <input type="submit" class="btn btn-gradient-primary mr-2"  value="提交">
                        <button class="btn btn-light">取消</button>
                    </form>
                </div>
            </div>
        </div>
    </form>
@endsection