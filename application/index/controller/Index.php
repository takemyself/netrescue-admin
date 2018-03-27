<?php
namespace app\index\controller;

use app\admin\model\Actions;
use app\admin\model\Advertising;
use app\admin\model\Banner;
use app\admin\model\News;
use app\admin\model\Newscategory;
use app\admin\model\Videos;

class Index extends Base
{
    public function _initialize()
    {
        parent ::_initialize();
        $this->assign('ac',$this->active);
    }

    public function index()
    {
        $tData=News::where('cid',1)->order('create_time desc')->limit(3)->select();
        $dData=News::where('cid',1)->order('create_time desc')->limit(3)->select();
        $videosData=Videos::order('create_time desc')->limit(5)->select();
        $actionsData=Actions::order('create_time desc')->limit(4)->select();
        $adData=Advertising::order('sort desc')->limit(4)->select();
        $this->assign('tData',$tData);
        $this->assign('dData',$dData);
        $this->assign('videosData',$videosData);
        $this->assign('actionsData',$actionsData);
        $this->assign('adData',$adData);
        return view();
    }
}
