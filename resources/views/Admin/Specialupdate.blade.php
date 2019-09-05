@extends('Admin/layouts/main')

@section('title', '用户展示')


@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">专题修改</h4>
                <form action="Supdatedo">
                    <input type="hidden" name="f_id" value="{{$res->f_id}}">
                    <div class="form-group">
                        <label for="exampleInputUsername1">专题名称：</label>
                        <input type="text" class="form-control"  name="f_name" value="{{$res->f_name}}" placeholder="Username">
                    </div>
                    专题状态<div class="col-md-6">
                        <div class="form-group">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input"  name="f_status"  checked value="{{$res->f_status}}" >
                                    上架
                                </label>
                            </div>
                            <div class="form-check form-check-success">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="f_status" value="{{$res->f_status}}" >
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