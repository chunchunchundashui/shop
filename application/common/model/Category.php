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
}