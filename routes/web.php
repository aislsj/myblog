<?php
//前台
Route::group(['namespace' => 'Home'], function () {

    //前台
    Route::group([], function () {
        Route::get('/','IndexController@index');//主页
        Route::get('/about','AboutController@index');//关于我
        Route::get('/time','TimeController@index');//时间轴
//        Route::get('/share','ShareController@index');//代码分享
//        Route::get('/gbook','GbookController@index');//留言
        //文章
        Route::group([], function () {
            Route::get('/category/{id}','CategoryController@index');
            Route::get('/article/info/{id}','ArticleController@info');
        });

    });

});


//后台
Route::group(['middleware' => 'auth.admin'], function () {
    Route::group([], function () {
    //后台首页
    Route::group([], function () {
        Route::get('/admin/', 'Admin\IndexController@index');
        Route::get('/admin/homepage','Admin\IndexController@homepage');
    });
    //图片上传
    Route::post('/admin/uploadImage','Admin\UploadController@upload');
    //分类管理
    Route::group([], function () {
        Route::resource('/admin/category','Admin\CategoryController');//博文分类
        Route::post('/admin/category/sort','Admin\CategoryController@sort');//排序
    });
    //文章管理
    Route::group([], function () {
        Route::resource('/admin/article','Admin\ArticleController');//文章管理
        Route::get('/admin/article/addArticleImg','Admin\ArticleController@addArticleImg');//文章添加图片
        Route::post('/admin/article/ArticleImgSave','Admin\ArticleController@ArticleImgSave');//文章添加图片
    });
    //管理员管理
    Route::group([], function () {
        Route::resource('/admin/admin','Admin\AdminController');//管理员列表
        Route::post('/admin/admin/ajaxStatus','Admin\AdminController@ajaxStatus');//管理员启用停用

    });
    //页面布局
    Route::group([], function () {
        Route::resource("/admin/banner",'Admin\BannerController');//页面布局-轮播图管理
        Route::resource("/admin/rmend",'Admin\RmendController');//页面布局-特别推荐文章
        Route::resource("/admin/lable",'Admin\LableController');//页面布局-链接标签
    });
    //系统设置
    Route::group([], function () {
        Route::get('/admin/config','Admin\SettingController@index');//系统设置
        Route::post('/admin/config/update_config','Admin\SettingController@update_config');//保存系统设置
    });
});
//登录、注销 修改密码
Route::group([], function () {
    Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/admin/login', 'Admin\LoginController@login');
    Route::get('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');//后台退出
    Route::get('/admin/icons', 'Admin\IndexController@icon');
//        Route::post('update-password', 'IndexController@updatePassword');//修改密码
});
});





