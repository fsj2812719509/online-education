<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function Index(){
        return view('Admin.index', ['user' => 'asdsa']);
    }
}
