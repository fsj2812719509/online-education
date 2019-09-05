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
                                    <th>姓名</th>
                                    <th>邮箱</th>
                                    <th>手机号</th>
                                    <th>管理员状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($res as $k=>$v)
                                <tr>
                                    <td>{{$v['a_name']}}</td>
                                    <td>{{$v['a_email']}}</td>
                                    <td>{{$v['a_tel']}}</td>
                                    @if($v['status']==1)
                                        <td>
                                            <a href="#">已入职</a>
                                            <a href="/AdminDelete?id={{$v['a_id']}}" class="badge badge-info">点击退休</a>
                                        </td>
                                    @elseif($v['status']==0)
                                        <td>
                                            <a href="#">已退休</a>
                                        </td>
                                    @endif
                                </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection