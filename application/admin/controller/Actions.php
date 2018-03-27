<?php
/**
 * Created by PhpStorm.
 * User : Leopard
 * Date : 2018/1/4
 * Time : 16:02
 * Email: 417780879@qq.com
 */
namespace app\admin\controller;
use app\common\controller\Common;
use think\Request;

class Actions extends Common
{
    public function _initialize()
    {
        parent ::_initialize();
        $this->model=new \app\admin\model\Actions();
        $this->url=url('admin/actions/index');
        $this->modelTwo=new \app\admin\model\Actioncategory();
    }
    public function index(){
        $actionsData=$this->model->all()->toArray();
        $oldactionscategoryData=$this->modelTwo->all()->toArray();
        $actionscategoryData=[];
        foreach($oldactionscategoryData as $k=>$v){
            $actionscategoryData[$v['cid']]=$v['cname'];
        }
        $this->assign('actionscategoryData',$actionscategoryData);
        $this->assign('actionsData',$actionsData);
        return view();
    }
    public function addactions(Request $request){
        $actionscategoryData=$this->modelTwo->all();
        if($request->isPost()){
            $this->return_res($this->model->store($request->param()),$this->url);
        }
        $this->assign('actionscategoryData',$actionscategoryData);
        return view();
    }
    public function editactions(Request $request){
        $oldData=$this->model->get($request->param('nid'));
        $actionscategoryData=$this->modelTwo->all();
        if($request->isPost()){
            $this->return_res($this->model->store($request->param()),$this->url);
        }
        $this->assign('actionscategoryData',$actionscategoryData);
        $this->assign('oldData',$oldData);
        return view();
    }
    public function delactions(Request $request){
        if($request->isGet()){
            $id=$request->param('id');
            $num=$this->model->destroy($id);
            $this->return_del($num,$this->url);
        }
    }
}