<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/2/5
 * Time: 19:13
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\ArticleService;
use App\Services\CategoryService;


class ArticleController extends Controller{



    public function info($id){
        $ArticleInfo = ArticleService::getArticle($id);
        $Category = CategoryService::getCategory($ArticleInfo['data']['category_id']);
        return view("home.article.info")->with('article',$ArticleInfo['data'])->with('category',$Category['data']);
    }
}
