<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * 显示后台管理模板首页
     */
    public function index(){
        return view('admin.index.index');
    }

    public function homepage(){
        return view("admin.index.homepage");
    }



}
