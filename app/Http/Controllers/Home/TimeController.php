<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\ArticleService;

class TimeController extends Controller{


    //时间墙
    public function index(){
        $Article = new ArticleService();
        $res_data = $Article->getArticleList('',0,50);
        return view("home.time.index")->with('article',$res_data);
    }
}
