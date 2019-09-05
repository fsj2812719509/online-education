<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\TeacherModel;

class TeacherController extends Controller
{
    //教师添加页
    public function teacherAdd(){
        return view('Admin/teacherAdd');
    }

    //执行教师添加
    public function do_teacherAdd(Request $request){
        $data = $request->all();
        if (!empty($data['t_img'])){
            //生成文件名
            $filename=md5(time().rand(10000,99999)).".".$data['t_img']->getClientOriginalExtension();
            //上传到本地
            $path = $request->file('t_img')->storeAs('/public/teacher',$filename);
            //验证是否上传成功
            if( !$request->hasFile('t_img') || !$request->file('t_img')->isValid()){
                echo "文件上传失败";die;
            }
            $t_img =Storage::url($path);
        }
        $data['t_img'] = $t_img;
        $data['t_time'] = time();
        $res = TeacherModel::insert($data);
        if ($res){
            return redirect('teacherList');
        }else{
            return redirect('teacherAdd');
        }
    }

    //教师展示
    public function teacherList(){
        $info = TeacherModel::paginate(2);
        return view('Admin/teacherList',['info'=>$info]);
    }


    //教师删除
    public function teacherDel(Request $request){
        $t_id = request('t_id');
        $res = TeacherModel::where(['t_id'=>$t_id])->delete();
        if ($res){
            return redirect('teacherList');
        }else{
            return redirect('teacherList');
        }
    }

    //修改页面
    public function teacherUpdate(Request $request){
        $t_id = request('t_id');
        $info = TeacherModel::where(['t_id'=>$t_id])->first()->toArray();
        return view('Admin/teacherUpdate',['info'=>$info]);
    }

    //执行修改
    public function do_teacherUpdate(Request $request){
        $data = $request->all();
        if (!empty($data['t_img'])){
            //生成文件名
            $filename=md5(time().rand(10000,99999)).".".$data['t_img']->getClientOriginalExtension();
            //上传到本地
            $path = $request->file('t_img')->storeAs('/public/teacher',$filename);
            //验证是否上传成功
            if( !$request->hasFile('t_img') || !$request->file('t_img')->isValid()){
                echo "文件上传失败";die;
            }
            $t_img =Storage::url($path);
            $data['t_img'] = $t_img;
        }
        $res = TeacherModel::where(['t_id'=>$data['t_id']])->update($data);
        if ($res){
            return redirect('teacherList');
        }else{
            return redirect('teacherUpdate');
        }

    }
}

