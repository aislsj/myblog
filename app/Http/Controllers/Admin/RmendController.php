<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ArticleService;
use App\Services\CategoryService;
use App\Services\RmendService;
use Illuminate\Http\Request;



class RmendController extends Controller
{

    public $request;
    public $RmendService;

    public function __construct(Request $request,RmendService $RmendService)
    {
        $this->request = $request;
        $this->RmendService = $RmendService;
    }

    public function index(){
        $data = $this->RmendService->getRmendList(5);
        return view("admin.rmend.index")->with('rmends',$data);
    }

    public function create(){
        return view("admin.rmend.create");
    }


    public function store(){
        $data   = $this->request->all();
        $req_result = $this->RmendService->createRmend($data);
        if($req_result['success']){
            return redirect('/admin/rmend');
        }else{
            return back()->withErrors([$req_result['msg']])->withInput();
        }
    }

    public function edit($id){
        $rmend = RmendService::getRmend($id);
        return view("admin.rmend.edit")->with("rmend",$rmend['data']);
    }

    public function update(){
        $data   = $this->request->all();
        $req_result = $this->RmendService->updateRmend($data);
        if($req_result['success']){
            return redirect('/admin/rmend');
        }else{
            return back()->withErrors([$req_result['msg']])->withInput();
        }
    }

    public function destroy($id){
        $req_result = $this->RmendService->deleteArticle($id);
        if ($req_result['success'] == true) {
            $result['code'] = 1000;
            $result['msg']  = '操作成功';
        } else {
            $result['code'] = 2000;
            $result['msg']  = isset($req_result['msg']) ? $req_result['msg'] : '操作失败';
        }
        return $result;
    }
}
