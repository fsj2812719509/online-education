<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //用户添加页面
    public function AdminUser(){
        return view('Admin.user');
    }

    //用户添加
    public function AdminUserDo(Request $request){
        $a_name = $request->post('a_name');
        $a_email = $request->post('a_email');
        $a_tel = $request->post('a_tel');
        $a_level = $request->post('a_level');

        $a_pwd = $request->post('a_pwd');

        $a_time = time();
        if($a_name==''){
            return 1;//用户名不能为空
        }else if($a_email==''){
            return 2;//邮箱不能为空
        }else if($a_tel==''){
            return 3;//电话不能为空
        }else if($a_pwd==''){
            return 4;//密码不能为空
        }else if($a_level==''){
            return 5;//管理员权限不能为空
        }
        //  查询是否已有此管理员
        $where = [
            'a_name'=>$a_name
        ];
        $res = AdminsModel::where($where)->first();
        if($res){
            return 8;//已有此用户
        }else{
            //密码加密
            $a_pwd = Hash::make($a_pwd);

            //将数据存入数据库
            $data = [
                'a_name'=>$a_name,
                'a_email'=>$a_email,
                'a_tel'=>$a_tel,
                'a_pwd'=>$a_pwd,
                'a_level'=>$a_level,
                'a_time'=>$a_time,
                'status'=>1
            ];

            $sql = AdminsModel::insert($data);
            if($sql){
                return 6;//添加成功
            }else{
                return 7;//添加失败
            }
        }

    }

    //管理员展示
    public function AdminUserList(){

        $res = AdminsModel::select()->paginate(3);
        return view('Admin.userlist',['res'=>$res]);
    }
    //管理员退休
    public function AdminDelete(){
        $a_id =$_GET['id'];
        //根据a_id修改数据库状态
        $res = AdminsModel::where(['a_id'=>$a_id])->update(['status'=>0]);
        if($res){
            echo '退休成功';
            return redirect('/AdminUserList');
        }else{
            echo '退休失败';
            return redirect('/AdminUserList');
        }
    }

}
