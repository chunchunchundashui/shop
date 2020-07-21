<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/10/31
 * Time: 10:45
 */
namespace app\common\model;

use think\Model;

class Category extends Model
{
    protected $field = true;    //忽略goods表字段
    protected static function init()
    {
//        修改商品之前
        category::beforeUpdate(function ($category) {
            // 商品的id
            $categoryId = $category->id;
            //          新增商品属性
//            只添加新加的数据,跟前台js做上配合
            $categoryData = input('post.');
            db('rec_item')->where(array('value_type' => 2, 'value_id' => $categoryId))->delete();
//           处理商品推荐位
            if (isset($categoryData['recpos'])) {
                foreach ($categoryData['recpos'] as $k => $v) {
                    db('rec_item')->insert(['recpos_id' => $v, 'value_id' => $categoryId, 'value_type' => 2]);
                }
            }
        });

        //后置钩子
        category::afterInsert(function ($category) {
//            接受表单信息
            $categoryData = input('post.');
            $categoryId = $category->id;
            //           处理商品推荐位
            if (isset($categoryData['recpos'])) {
                foreach ($categoryData['recpos'] as $k => $v) {
                    db('rec_item')->insert(['recpos_id' => $v, 'value_id' => $categoryId, 'value_type' => 2]);
                }
            }
        });
    }

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