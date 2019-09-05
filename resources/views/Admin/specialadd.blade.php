@extends('Admin/layouts/main')

@section('title', '后台首页')


@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">专题添加</h4>
                <form action="Sadd">
                    <div class="form-group">
                        <label for="exampleInputUsername1">专题名称：</label>
                        <input type="text" class="form-control"  name="f_name" placeholder="Username">
                    </div>
                    专题状态<div class="col-md-6">
                        <div class="form-group">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input"  name="f_status"  value="1" >
                                    上架
                                </label>
                            </div>
                            <div class="form-check form-check-success">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="f_status" value="2" >
                                    下架
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-gradient-primary mr-2">
                    <button class="btn btn-light">取消</button>
                </form>
            </div>
        </div>
    </div>
@endsection