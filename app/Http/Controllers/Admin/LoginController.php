<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        
        return view('Admin.login');
    }


    //后台登录
    public function AdminLoginDo(Request $request){
        $a_name = $request->post('name');
        $a_pwd = $request->post('password');

        if($a_name==''){
            return 1;
        }else if($a_pwd==''){
           return 2;
        }

        //根据名字查询此用户是否登录过
        $value = $request->session()->pull('admins');
        if($value){
            //根据用户名，电话，邮箱查询数据库是否有有此管理员
            $res = AdminsModel::where(['a_name'=>$a_name])->first();
            $res2 = AdminsModel::where(['a_tel'=>$a_name])->first();
            $res3 = AdminsModel::where(['a_email'=>$a_name])->first();

            if($res){
                //根据名字查询用户数据
                $a_pwd_model =  $res['a_pwd'];
                $a_level = $res['a_level'];
                $a_id = $res['a_id'];
                $a_name = $res['a_name'];
            }else if($res2){
                //根据名字查询用户数据
                $a_pwd_model =  $res2['a_pwd'];
                $a_level = $res2['a_level'];
                $a_id = $res2['a_id'];
                $a_name = $res2['a_name'];
            }else if($res3){
                $a_pwd_model =  $res3['a_pwd'];
                $a_level = $res3['a_level'];
                $a_id = $res3['a_id'];
                $a_name = $res3['a_name'];
            }else{
                return 1;
            }

            if(Hash::check($a_pwd,$a_pwd_model)){
                $data = [
                    'a_id'=>$a_id,
                    'a_name'=>$a_name,
                    'a_level'=>$a_level
                ];
                //存入session
                session(['admins' => $data]);
                return 2;

            }else{
                return 1;}

        }

    }

    //退出登录
    public function quit(Request $request){
        $id = $_GET['id'];
        //获取session
        $a_id = session('admins.a_id');
        if($id==$a_id){
            //清空session
            $value = $request->session()->pull('admins');
            if($value){
                return redirect('/admin_login');
            }else{
                echo '退出失败';
                return redirect('/admin_index');
            }
        }
    }

    //修改密码
    public function AdminUpdatePwdList(){
        $id = $_GET['id'];
        //根据id查询
        $res = AdminsModel::where(['a_id'=>$id])->first();
        return view('Admin.updatepwd',['res'=>$res]);
    }
    public function AdminUpdatePwdDo(Request $request){
        $a_id = $request->input('id');
        $a_pwd = $request->input('password');
        if($a_pwd==''){
            return 3;
        }

        /** 对密码进行加密 */
        $a_pwd = Hash::make($a_pwd);
        $data = [
            'a_pwd'=>$a_pwd
        ];
        $res = AdminsModel::where(['a_id'=>$a_id])->update($data);
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

}
