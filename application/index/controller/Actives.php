<?php
/**
 * Created by PhpStorm.
 * User : Leopard
 * Date : 2018/3/22
 * Time : 15:44
 * Email: 417780879@qq.com
 */
namespace app\index\controller;
class Actives extends Base
{
    protected $model;
    public function _initialize()
    {
        parent ::_initialize();
        $this->active=2;
        $this->assign('ac',$this->active);
        $this->model=new \app\admin\model\News();
        $xinData=$this->model->where('cid',2|3)->field('nid,title')->limit(4)->select();
        $fangData=$this->model->where('cid',4)->field('nid,title')->limit(4)->select();
        $xingData=$this->model->where('cid',5)->field('nid,title')->limit(4)->select();

        $this->assign('xinData',$xinData);
        $this->assign('fangData',$fangData);
        $this->assign('xingData',$xingData);
    }

}