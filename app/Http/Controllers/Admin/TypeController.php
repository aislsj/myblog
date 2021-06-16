<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/2/5
 * Time: 19:13
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TypeController extends Controller{


    //显示分类页面
    public function index(){
        $data=\DB::table('type')->get();
        return view("admin.type.index")->with('data',$data);
    }

    public function create(){
        return view("admin.type.create");
    }


    //添加分类
    public function store(Request $request){
        $arr=$request->all();
        $rules=[
            'catename'=>'required',//存在\是否重复\6-12位',
            'sort'=>'required'//存在\是否重复\6-12位
        ];
        //表单提示信息
        $messages=[
            'catename.required'=>'请输入分类名称',
            'sort.required'=>'请输入排序号'
        ];
        $validator = \Validator::make($arr,$rules,$messages);//数据 验证规则 提示信息
        if($validator->passes()){
            unset($arr['_token']);
            if(\DB::table('type')->insert($arr)){
                    return redirect('/admin/type');
            }else{
                return back();
            }
        }else{
           return back()->withErrors($validator);
        }
    }


    public function edit($id){
        $data=\DB::table('type')->find($id);
        return view("admin.type.edit")->with('data',$data);
    }

    public function update(Request $request){
        $data = $request->except('_token','_method');
        $rules=[
            'catename'=>'required',//存在\是否重复\6-12位',
            'sort'=>'required'//存在\是否重复\6-12位
        ];
        //表单提示信息
        $messages=[
            'catename.required'=>'请输入分类名称',
            'sort.required'=>'请输入排序号'
        ];
        $validator = \Validator::make($data,$rules,$messages);//数据 验证规则 提示信息
        if($validator->passes()){
            \DB::table('type')->where('id',$data['id'])->update($data);
            return redirect('admin/type');
        }else{
            return back()->withErrors($validator);
        }
    }

    //删除分类名称
    public function destroy($id){
        if(\DB::table("type")->delete($id)){
            return 1;
        }else{
            return 0;
        }
    }

}
