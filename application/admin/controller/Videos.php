<?php
/**
 * Created by PhpStorm.
 * User : Leopard
 * Date : 2018/2/2
 * Time : 13:43
 * Email: 417780879@qq.com
 */
namespace app\admin\controller;
use app\common\controller\Common;
use think\Request;

class Videos extends Common
{
    public function _initialize()
    {
        parent ::_initialize();
        $this->model=new \app\admin\model\Videos();
        $this->url=url('admin/videos/index');
    }

    public function index()
    {
        $banaerData=$this->model->order('sort desc')->select()->toArray();
        $this->assign('videosData',$banaerData);
        return view();
    }

    public function addvideos(Request $request)
    {
        if($request->isPost()){
            $data=$request->param();
            $this->return_res($this->model->store($data),$this->url);
        }
        return view();
    }

    public function editvideos(Request $request)
    {
        $oldData=$this->model->get($request->param('id'));
        if($request->isPost()){
            $data=$request->param();
            $this->return_res($this->model->store($data),$this->url);
        }
        $this->assign('oldData',$oldData);
        return view();
    }

    public function ajaxEditSort(Request $request)
    {
        if($request->isAjax()){
            return $this ->model -> editsort($request -> param());
        }
    }

    public function delvideos(Request $request)
    {
        if($request->isGet()){
            $id=$request->param('id');
            $data=$this->model->get($id);
            $picflie=ROOT_PATH . 'public' . DS . 'uploads'.DS.$data['pic'];
            $num=$this->model->destroy($id);
            $this->return_del($num,$this->url,$picflie);
        }
    }
}