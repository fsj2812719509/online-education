@extends('Admin/layouts/main')

@section('title', '用户展示')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Basic Tables
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">管理员展示</h4>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>专题名称</th>
                                    <th>专题添加时间</th>
                                    <th>专题状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($arr as $k=>$v)
                                    <tr>
                                        <td><div class="bsImg">
                                                {{$v->f_name}}
                                            </div></td>
                                        <td>{{$v->f_time}}</td>
                                        <td>{{$v->f_status}}</td>
                                        <td>
                                            <a href="/Sdelete?id={{$v->f_id}}">删除</a>
                                            <a href="/Supdate?id={{$v->f_id}}">修改</a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="paging">{{ $arr->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection