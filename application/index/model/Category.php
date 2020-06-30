<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/6/7
 * Time: 13:12
 */
namespace app\index\model;

use think\Model;

class Category extends Model
{
//   顶级和二级分类获取
    public function getCates()
    {
        $cateRes = $this->where(array('pid' => 0))->select();
        foreach($cateRes as $k => $v) {
            $cateRes[$k]['children'] = $this->where(array('pid' => $v['id']))->select();
        }
        return $cateRes;
    }

//    通过顶级分类id获取二级和三级
    public function getSonCates($id)
    {
        $cateRes = $this->where(array('pid' => $id))->select();
        foreach ($cateRes as $k => $v) {
            $cateRes[$k]['children'] = $this->where(array('pid' => $v['id']))->select();
        }
        return $cateRes;
    }

//    通过顶级分类获取关联搜索词
    public function getCategoryWords($id)
    {
        $CategoryWords = db('categoryWords')->where(array('category_id' => $id))->select();
        return $CategoryWords;
    }

//   获取当前栏目关联品牌及推广信息
    public function getCategoryBrands($id)
    {
        $brands = db('brand');
        $data = array();
        $categoryBrands = db('categoryBrands')->where(array('category_id' => $id))->find();
        $brandsIdArr = explode(',', $categoryBrands['brands_id']);
        foreach ($brandsIdArr as $k => $v) {
            $data['brands'][] = $brands->find($v);
        }
//        推广信息
        $data['promotion']['pro_img'] = $categoryBrands['pro_img'];
        $data['promotion']['pro_url'] = $categoryBrands['pro_url'];
        return $data;
    }

//    首页推荐位获取
    public function getRecCategorys($recposId,$pid = 0)
    {
        $_cateRes = db('rec_item')->where(array('recpos_id' => $recposId, 'value_type' => 2))->select();
        $cateRes = array();
        foreach ($_cateRes as $k => $v) {
            $cateArr = db('category')->where(array('id' => $v['value_id'], 'pid' => $pid))->find();
            if (!empty($cateArr))
            $cateRes[] = $cateArr;
        }
        return $cateRes;
    }



}