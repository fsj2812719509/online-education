<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminsModel extends Model
{
    protected $primarykey = 'a_id';
    protected $table = "admins";
    public $timestamps=false;
}
