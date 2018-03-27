<?php
namespace app\index\controller;
use app\admin\model\Newscategory;
use think\Request;

class News extends Actives
{
    public function _initialize()
    {
        parent ::_initialize();
        $this->model=new \app\admin\model\News();
    }

    public function index(Request $request)
    {
        $list = $this->model->where('cid',2|3)->paginate(3);
        // 获取分页显示
        $page = $list->render();
        // 模板变量赋值
        $this->assign('list', $list);
        $this->assign('page', $page);
        return view();
    }
    public function fang(){
        $list = $this->model->where('cid',4)->paginate(3);
        $page = $list->render();
        // 模板变量赋值
        $this->assign('list', $list);
        $this->assign('page', $page);
        return view();
    }
    public function actions(){
        $list = $this->model->where('cid',5)->paginate(3);
        $page = $list->render();
        // 模板变量赋值
        $this->assign('list', $list);
        $this->assign('page', $page);
        return view();
    }
    public function newscontent(Request $request){
        $nid=$request->param('nid/d');
        $data=$this->model->get($nid);
        $category=Newscategory::all()->toArray();
        $up=$this->model->where('cid',$data['cid'])->where('nid','<',$nid)->order('nid desc')->limit(1)->select()->toArray();
        $down=$this->model->where('cid',$data['cid'])->where('nid','>',$nid)->order('nid')->limit(1)->select()->toArray();
        $up=$up?$up[0]['nid']:0;
        $down=$down?$down[0]['nid']:0;
        $this->assign('up',$up);
        $this->assign('down',$down);
        $this->assign('data',$data);
        $this->assign('category',$category);
        return view();
    }
}
