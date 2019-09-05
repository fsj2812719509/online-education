<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//后台
Route::any('/admin_index','Admin\IndexController@index');//后台页面
Route::any('/admin_login','Admin\LoginController@login');//后台登录页面
Route::any('/AdminLoginDo','Admin\LoginController@AdminLoginDo');//后台登录
Route::any('/quit','Admin\LoginController@quit');//退出登录
Route::any('/AdminUpdatePwdList','Admin\LoginController@AdminUpdatePwdList');//修改密码
Route::any('/AdminUpdatePwdDo','Admin\LoginController@AdminUpdatePwdDo');//修改密码


Route::any('/AdminUser','Admin\UserController@AdminUser')->middleware('login');//后台用户添加页面
Route::any('/AdminUserDo','Admin\UserController@AdminUserDo')->middleware('login');//后台用户添加页面
Route::any('/AdminUserList','Admin\UserController@AdminUserList')->middleware('login');//后台用户展示
Route::any('/AdminDelete','Admin\UserController@AdminDelete')->middleware('login');//用户修改



//教师管理
Route::any('/teacherAdd','Admin\TeacherController@teacherAdd')->middleware('login');//教师添加
Route::any('/do_teacherAdd','Admin\TeacherController@do_teacherAdd')->middleware('login');//执行添加
Route::any('/teacherList','Admin\TeacherController@teacherList')->middleware('login');//教师展示
Route::any('/teacherDel','Admin\TeacherController@teacherDel')->middleware('login');//教师删除
Route::any('/teacherUpdate','Admin\TeacherController@teacherUpdate')->middleware('login');//教师修改页面
Route::any('/do_teacherUpdate','Admin\TeacherController@do_teacherUpdate')->middleware('login');//教师修改页面


//专题
Route::any('/Sindex','Admin\SpecialController@Sindex')->middleware('login');//专题页面展示
Route::any('/Sadd','Admin\SpecialController@Sadd')->middleware('login');//专题添加
Route::any('/Sshow','Admin\SpecialController@Sshow')->middleware('login');//专题展示
Route::any('/Sdelete','Admin\SpecialController@Sdelete')->middleware('login');//专题删除
Route::any('/Supdate','Admin\SpecialController@Supdate')->middleware('login');//专题修改展示
Route::any('/Supdatedo','Admin\SpecialController@Supdatedo')->middleware('login');//专题修改


//课程
Route::any('/classadd','Admin\ClassController@classadd')->middleware('login');//后台课程添加页面
Route::any('/classadddo','Admin\ClassController@classadddo')->middleware('login');//后台课程添加执行页面
Route::any('/classlist','Admin\ClassController@classlist')->middleware('login');//后台课程未审核列表展示页面
Route::any('/classpass','Admin\ClassController@classpass')->middleware('login');//后台课程通过系统
Route::any('/classstop','Admin\ClassController@classstop')->middleware('login');//后台课程驳回系统
Route::any('/classlister','Admin\ClassController@classlister')->middleware('login');//后台审核课程通过的列表页
Route::any('/classdel','Admin\ClassController@classdel')->middleware('login');//后台审核课程通过的列表页删除
Route::any('/classupd','Admin\ClassController@classupd')->middleware('login');//后台审核课程通过的列表页修改
Route::any('/classupddo','Admin\ClassController@classupddo')->middleware('login');//后台审核课程通过的列表页修改执行






//前台
Route::any('/','Index\IndexController@index');//前台页面
Route::any('/index_login','Index\LoginController@login');//前台登录页面

