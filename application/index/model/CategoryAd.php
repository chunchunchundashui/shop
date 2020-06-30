<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/6/7
 * Time: 13:12
 */
namespace app\index\model;

use think\Model;

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