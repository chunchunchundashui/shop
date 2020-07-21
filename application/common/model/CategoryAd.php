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

class CategoryAd extends Model
{
//    获取首页顶级栏目左侧图片
    public function getCategoryAd($id)
    {
        $_data = db('CategoryAd')->where(array('category_id' => $id))->select();
        $data = array();
        foreach ($_data as $k => $v) {
            $data[$v['position']][] = $v;
        }
        return $data;
    }
}