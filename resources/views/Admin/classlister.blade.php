@extends('Admin/layouts/main')

@section('title', '后台首页')


@section('content')
<form action="/admin/goodslists" method="post">
    <input type="text" class="input-text" style="width:250px" placeholder="输入关键字" id="" name="title">
    <button type="submit" class="btn btn-success" ><i class="icon-search"></i> 搜索</button>
</form>
<table class="table table-border table-bordered table-bg">
    <thead>
    <tr>
        <th scope="col" colspan="9">审核通过列表</th>
    </tr>
    <tr class="text-c">
        <th width="25"><input type="checkbox" name="" value=""></th>
        <th width="60">ID</th>
        <th width="90">课程标题</th>
        <th width="220">课程内容</th>
        <th width="90">课程价格</th>
        <th width="220">课程视频</th>
        <th width="220">添加时间</th>
        <th width="90">所属专题</th>
        <th width="90">所属老师</th>
        <th width="220">操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sql as $k=>$v)
        <tr class="text-c">
            <td><input type="checkbox" value="1" name=""></td>
            <td>{{$v->c_id}}</td>
            <td>{{$v->c_name}}</td>
            <td>{{$v->c_desc}}</td>
            <td>{{$v->c_price}}</td>
            <td ><video src="{{$v->c_video}}"  height="100" width="120" controls="controls"></video></td>
            <td>{{ date('Y-m-d H:i:s',$v->c_time)}}</td>
            <td>{{$v->f_id}}</td>
            <td>{{$v->t_id}}</td>
            <td class="td-manage">
                <a title="删除"  href="classdel?c_id={{$v->c_id}}">删除</a>
                <a title="修改" href="classupd?c_id={{$v->c_id}}">修改</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="a">
    {{ $sql->links() }}
</div>
@endsection
