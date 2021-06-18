<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index(){
        dd('后台');
        return view('admin.index.index');
    }

    public function homepage(){
        return view("admin.index.homepage");
    }



}
