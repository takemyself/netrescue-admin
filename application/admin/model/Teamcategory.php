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

class Teamcategory extends Common
{
    protected $table='res_team_category';
    protected $pk='cid';
    protected $sort='sort';
}