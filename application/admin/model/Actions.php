<?php
/**
 * Created by PhpStorm.
 * User : Leopard
 * Date : 2018/1/3
 * Time : 10:08
 * Email: 417780879@qq.com
 */
namespace app\admin\model;
use app\common\model\Common;

class Actions extends Common
{
    protected $table='res_actions';
    protected $pk='nid';
    protected $autoWriteTimestamp = true;
}