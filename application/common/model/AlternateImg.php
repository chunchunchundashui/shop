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

class AlternateImg extends Model
{
//   获取所有的配置项
    public function getAlterImg()
    {
        $AlterImg = $this->where(array('status' => 1))->order('sort desc')->select();
        return $AlterImg;
    }
}