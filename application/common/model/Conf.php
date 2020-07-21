<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/10/31
 * Time: 10:45
 */
namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class Conf extends Model
{
//   获取所有的配置项
    public function getConfs()
    {
        $_confRes = $this->field('ename,value')->select();
        $confRes = array();
        foreach ($_confRes as $k => $v) {
            $confRes[$v['ename']] = $v['value'];
        }
        return $confRes;
    }
}