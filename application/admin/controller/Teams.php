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

class Teams extends Common
{
    public function _initialize()
    {
        parent ::_initialize();
        $this->model=new \app\admin\model\Teams();
        $this->url=url('admin/teams/index');
        $this->modelTwo=new \app\admin\model\Teamcategory();
    }
    public function index(){
        $teamsData=$this->model->all()->toArray();
        $oldteamscategoryData=$this->modelTwo->all()->toArray();
        $teamscategoryData=[];
        foreach($oldteamscategoryData as $k=>$v){
            $teamscategoryData[$v['cid']]=$v['cname'];
        }
        $this->assign('teamscategoryData',$teamscategoryData);
        $this->assign('teamsData',$teamsData);
        return view();
    }
    public function addteams(Request $request){
        $teamscategoryData=$this->modelTwo->all();
        if($request->isPost()){
            $this->return_res($this->model->store($request->param()),$this->url);
        }
        $this->assign('teamscategoryData',$teamscategoryData);
        return view();
    }
    public function editteams(Request $request){
        $oldData=$this->model->get($request->param('nid'))->toArray();
        $teamscategoryData=$this->modelTwo->all();
        if($request->isPost()){
            $this->return_res($this->model->store($request->param()),$this->url);
        }
        $this->assign('teamscategoryData',$teamscategoryData);
        $this->assign('oldData',$oldData);
        return view();
    }
    public function delteams(Request $request){
        if($request->isGet()){
            $id=$request->param('id');
            $num=$this->model->destroy($id);
            $this->return_del($num,$this->url);
        }
    }
}