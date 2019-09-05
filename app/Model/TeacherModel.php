<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    //关联表明
    protected $table = 'teacher';
    //自增id
    protected $primaryKey = 't_id';
    //不自动设置时间戳
    public $timestamps = false;

    protected $guarded = [];
}
