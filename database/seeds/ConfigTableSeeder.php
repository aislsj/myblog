<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->insert([
            ['cnname' => '头像', 'enname' => 'userinfo_img','type' => 4,'value' => '','values'=>''],
            ['cnname' => '关键词', 'enname' => 'keywords','type' => 1,'value' => 'PHP,个人博客','values'=>''],
            ['cnname' => '简介', 'enname' => 'description','type' => 1,'value' => 'PHP,个人博客，为学习而开发的一套个人博客','values'=>''],
            ['cnname' => '个人简介', 'enname' => 'userinfo_content','type' => 2,'value' => '','values'=>''],
            ['cnname' => '是否启用验证码', 'enname' => 'verification_code','type' => 3,'value' => '','values'=>'是，否'],
            ['cnname' => '是否开启评论', 'enname' => 'customer_comment','type' => 3,'value' => '','values'=>'是，否'],
        ]);
    }
}
