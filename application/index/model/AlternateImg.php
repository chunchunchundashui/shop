<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/6/7
 * Time: 13:12
 */
namespace app\index\model;

use think\Model;

class AlternateImg extends Model
{
//   获取所有的配置项
    public function getAlterImg()
    {
        $AlterImg = $this->where(array('status' => 1))->order('sort desc')->select();
        return $AlterImg;
    }
}