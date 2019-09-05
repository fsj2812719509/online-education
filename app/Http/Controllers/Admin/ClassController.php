<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    //添加页面
    public function classadd(){
        // 查询专题分类并传输到课程添加页面
        $sql=DB::table('classify')->where('f_status',1)->get();
        // 查询所有老师并传输到课程添加页面
        $teacher=DB::table('teacher')->Orderby('t_level','desc')->get();
        return view('Admin.classadd',['sql'=>$sql,'teacher'=>$teacher]);
    }
    public function upload_file($files, $path = "./upload",$imagesExt=['jpg','png','jpeg','gif','mp4'])

    {

        // 判断错误号

        if (@$files['error'] == 00) {

            // 判断文件类型

            $ext = strtolower(pathinfo(@$files['name'],PATHINFO_EXTENSION));

            if (!in_array($ext,$imagesExt)){

                return "非法文件类型";

            }

            // 判断是否存在上传到的目录

            if (!is_dir($path)){

                mkdir($path,0777,true);

            }

            // 生成唯一的文件名

            $fileName = md5(uniqid(microtime(true),true)).'.'.$ext;

            // 将文件名拼接到指定的目录下

            $destName = $path."/".$fileName;

            // 进行文件移动

            if (!move_uploaded_file($files['tmp_name'],$destName)){

                return "文件上传失败！";

            }

            return $destName;

        } else {

            // 根据错误号返回提示信息

            switch (@$files['error']) {

                case 1:

                    echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";

                    break;

                case 2:

                    echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";

                    break;

                case 3:

                    echo "文件只有部分被上传";

                    break;

                case 4:

                    echo "没有文件被上传";

                    break;

                case 6:

                case 7:

                    echo "系统错误";

                    break;

            }

        }

    }


    //添加执行页面
    public function classadddo(Request $request){
        $c_name=$request->c_name;
        $c_desc=$request->c_desc;
        $f_id=$request->f_id;
        $t_id=$request->t_id;
        $c_price=$request->c_price;
        $c_video=$_FILES['c_video'];
        $c_video = $this->upload_file($c_video);
        $video=ltrim($c_video,".");

        $data=[
            'c_name'=>$c_name,
            'c_desc'=>$c_desc,
            'f_id'=>$f_id,
            't_id'=>$t_id,
            'c_price'=>$c_price,
            'c_video'=>$video,
            'c_status'=>0,
            'c_time'=>time(),
        ];
        if(empty($c_name)){
            die('课程名称');
        }else if(empty($c_desc)){
            die('课程简介不能为空');
        }else if(empty($f_id)){
            die('所属专题不能为空');
        }else if(empty($t_id)){
            die('所属老师不能为空');
        }
        $res = DB::table('class')->insert($data);
        if($res){
            echo "<script>alert('添加成功,请等待管理员的审核');location.href='classadd'</script>";
        }else{
            echo "课程添加失败";
        }
    }
    //未审核课程列表展示页面
    public function classlist(){
        $sql=DB::table('class')->Orderby('c_id')->where('c_status',0)->paginate(2);
        return view('admin.classlist',['sql'=>$sql]);
    }
    //课程审核驳回
    public function classstop(Request $request){
        $c_id=$request->c_id;
        $data=[
            'c_status'=>2
        ];
        $res=DB::table('class')->where('c_id',$c_id)->update($data);
        if($res){
            echo "<script>alert('驳回成功');location.href='classlist'</script>";
        }else{
            echo "驳回失败";
        }
    }
    //课程审核通过
    public function classpass(Request $request){
        $c_id=$request->c_id;
        $data=[
            'c_status'=>1
        ];
        $res=DB::table('class')->where('c_id',$c_id)->update($data);
        if($res){
            echo "<script>alert('通过成功');location.href='classlist'</script>";
        }else{
            echo "通过失败";
        }
    }
    //审核成功课程列表展示页面
    public function classlister(){
        $sql=DB::table('class')->Orderby('c_id')->where('c_status',1)->paginate(2);
        return view('admin.classlister',['sql'=>$sql]);
    }
    //审核成功课程列表页面删除
    public function classdel(Request $request){
        $c_id=$request->c_id;
        $sql=DB::table('class')->where('c_id',$c_id)->delete();
        if($sql){
            echo "<script>alert('删除成功');location.href='classlister'</script>";
        }else{
            echo "删除失败";
        }
    }
    //审核成功修改页面
    public function classupd(Request $request){
        $c_id=$request->c_id;
        //接收id 查询此id数据库中的数据传输到修改页面
        $str=DB::table('class')->where('c_id',$c_id)->first();
        // 查询专题分类并传输到课程添加页面
        $sql=DB::table('classify')->where('f_status',1)->get();
        // 查询所有老师并传输到课程添加页面
        $teacher=DB::table('teacher')->Orderby('t_level','desc')->get();
        return view('Admin.classupd',['str'=>$str,'sql'=>$sql,'teacher'=>$teacher]);

    }
    //审核成功修改执行页面
    public function classupddo(Request $request){
        $data=$request->all();
        $c_id=$data['c_id'];
        $res = DB::table('class')->where('c_id',$c_id)->update($data);
        if($res){
            echo "<script>alert('修改成功');location.href='classlister'</script>";
        }else{
            echo "修改失败";
        }
    }
}
