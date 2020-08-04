<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/6/7
 * Time: 13:12
 */
namespace app\index\model;

use think\Model;
use catetree\Catetree;
class Goods extends Model
{
//   获取指定推荐位的商品
    public function getRecposGoods($recposId,$limit='')
    {
        $_hotIds = db('rec_item')->where(array('value_type' => 1, 'recpos_id' => $recposId))->select();
        $hotIds = array();
        foreach ($_hotIds as $k => $v) {
        	$hotIds[] = $v['value_id'];
        }
        $map['id'] = array('IN', $hotIds); 
        $recRes = $this->field('id,mid_thumb,goods_name,shop_price,markte_price')->where($map)->limit($limit)->select();
        return $recRes;
    }

//    获取首页一,二级分类下的所有的推荐商品
    public function getIndexRecposGoods($cateId,$recposId)
    {
//            1.获取当前主分类下的所有子分类id
        $catetree = new Catetree();
        $sonIds = $catetree->childrenids($cateId,db('category'));
        $sonIds[] = $cateId;
//            2.获取新品推荐位符合条件的商品信息
        $_recGoods = db('rec_item')->where(array('value_type'=>1, 'recpos_id' => $recposId))->select();
        $recGoods = array();
        foreach ($_recGoods as $kk => $vv) {
            $recGoods[] = $vv['value_id'];
        }
        $map['category_id'] = array('IN', $sonIds);
        $map['id'] = array('IN', $recGoods);
//            dump($map);
        $goodsRes = db('goods')->where($map)->limit(6)->order('id desc')->select();
        return $goodsRes;
    }

//     计算会员价格
    public function getMemberPrice($goods_id)
    {
        $levelId = session('level_id');
        $levelRate = session('level_rate');
        $goodsInfo = $this->find($goods_id);
        if (session('level_id')) {
            $memberPrice = db('member_price')->where(array('mlevel_id'=>$levelId,'goods_id'=> $goodsInfo['id']))->find();
            if ($memberPrice){
                $price = $memberPrice['mprice'];
            }else{
                $levelRate = $levelRate/100;
                $price = $goodsInfo['shop_price']*$levelRate;
            }
        }else {
            $price = $goodsInfo['shop_price'];
        }
        return $price;
    }

//    获取商品会员价
    public function getShopPrice($goods_id)
    {
        $goodsInfo = $this->field('shop_price')->find($goods_id);
        return $goodsInfo['shop_price'];
    }
}