<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ClassifyModel;
use Illuminate\Support\Facades\DB;

class SpecialController extends Controller
{
    //专题页面展示
    public function Sindex(){
        return view('Admin.specialadd');
    }

    //专题添加
    public function Sadd(Request $request){
        $data = $request->input();
        //dd($data);
        $data['f_time']=time();
        //var_dump($time);exit;
        $res = ClassifyModel::insert($data);
        if($res){
            return redirect('/Sshow');
        }else{
            return redirect('/Sindex');
        }
    }

    //专题展示
    public function Sshow(){
        $arr = ClassifyModel::paginate(2);
        //dd($arr);
        return view('Admin.specialshow',["arr"=>$arr]);
    }

    //专题删除
    public function Sdelete(Request $request){
        //接收id
        $id = $_GET['id'];
        //dd($id);
        $arr = ClassifyModel::where(['f_id'=>$id])->delete();
        //dd($arr);
        if($arr){
            return redirect('/Sshow');
        }else{
            return redirect('/Sshow');
        }
    }

    //专题修改展示
    public function Supdate(Request $request){
        //接收id
        $id = $_GET['id'];
        //dd($id);
        //查id为此id的数据
        $res = ClassifyModel::where(['f_id'=>$id])->first();
        //dd($res);
        return view('Admin.Specialupdate', ["res" => $res]);
    }

    //专题修改
    public function Supdatedo(Request $request){
        //接收
        $data = $request->all();
        unset($data['_token']);
//        var_dump($data);exit;
        $data['f_time'] = time();
        $id = $request->f_id;
        $res = ClassifyModel::where(['f_id'=>$id])->update($data);
        if($res){
            return redirect('/Sshow');
        }else{
            echo 0000;
        }
    }
}
