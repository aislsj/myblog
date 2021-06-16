<?php

namespace App\Http\Distribution;

use App\Services\ArticleService;
use App\Services\CategoryService;
use App\Services\ConfigService;
use App\Services\LableService;
use Illuminate\View\View;

//分类数据渲染到公共页面
class ConfigureController
{
    public $CategoryService;
    public $ConfigService;

    public function __construct(CategoryService $CategoryService,ConfigService $ConfigService){
        $this->CategoryService = $CategoryService;
        $this->ConfigService = $ConfigService;
    }


    public function compose(View $view){
        //分类
        $category_data = $this->CategoryService->CategoryList();
        $category_data = $this->CategoryService->generateTree($category_data['data']);
        //獲取推薦文章
        $RmendArticle = ArticleService::getArticleList('recommend',0,10);
        //獲取點擊排行文章
        $click_article = ArticleService::getArticleList('clack',0,10);
        //標籤  網頁標籤與友情標籤
        $lable  = LableService::getLableList(1);
        $amity_link  = LableService::getLableList(2);
        //设置项
        $config_data = $this->ConfigService->getConfig();
        $myConfig = [];
        foreach($config_data as $config){
            if($config['cnname'] == '头像'){
                $myConfig['userinfo_img']=$config['value'];
            }
            if($config['cnname'] == '关键词'){
                $myConfig['keywords']=$config['value'];
            }
            if($config['cnname'] == '简介'){
                $myConfig['description']=$config['value'];
            }
            if($config['cnname'] == '个人简介'){
                $myConfig['userinfo_content']=$config['value'];
            }
            if($config['cnname'] == '是否开启评论'){
                $myConfig['customer_comment']=$config['value'];
            }
        }
        $view->with('list',$category_data)->with('lable',$lable['data'])->with('amity_link',$amity_link['data'])->with('click_article',$click_article)->with('re_article',$RmendArticle)->with('myconfig',$myConfig);;
    }

}
