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
                                    <th>序号</th>
                                    <th>教师名称</th>
                                    <th>教师介绍</th>
                                    <th>教师图片</th>
                                    <th>教师等级</th>
                                    <th>添加时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($info as $k=>$v)
                                    <tr>
                                        <td>{{$v->t_id}}</td>
                                        <td>{{$v->t_name}}</td>
                                        <td>{{$v->t_desc}}</td>
                                        <td><img width="100px" height="100px" src="{{asset($v->t_img)}}" alt=""></td>
                                        <td>
                                            @if($v->t_level==1)
                                                一级教师
                                            @elseif($v->t_level==2)
                                                二级教师
                                            @else
                                                三级教师
                                            @endif
                                        </td>
                                        <td>{{date('Y-m-d H:i:s',$v->t_time)}}</td>
                                        <td>
                                            <a href="../teacherDel?t_id={{$v->t_id}}">删除</a>
                                            <a href="../teacherUpdate?t_id={{$v->t_id}}">修改</a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="paging">{{ $info->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection