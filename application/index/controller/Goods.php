<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/6/7
 * Time: 11:54
 */

namespace app\index\controller;

class Goods extends  Base
{
    public function index($id)
    {
//        获取对应商品属性
        $goodsInfo = db('goods')->find($id);
//        商品主图信息数组
        $goodsThumbArr = array();
        if ($goodsInfo['og_thumb']) {
            $goodsThumbArr['sm_photo'] = $goodsInfo['sm_thumb'];
            $goodsThumbArr['mid_photo'] = $goodsInfo['mid_thumb'];
            $goodsThumbArr['big_photo'] = $goodsInfo['big_thumb'];
            $goodsThumbArr['og_photo'] = $goodsInfo['og_thumb'];
        }
//        获取当前商品相册信息
        $goodsPhotoRes = db('goods_photo')->field('sm_photo,mid_photo,big_photo,og_photo')->where(array('goods_id' => $id))->select();
//        将主图和商品相册图片存放在一个数组中
        array_unshift($goodsPhotoRes, $goodsThumbArr);

        $gaArr = db('goods_attr')->alias('ga')->field('ga.*,a.attr_name,a.attr_type')->join('attr a', 'ga.attr_id = a.id')->where(array('ga.goods_id'=>$id))->select();
        // 单选属性
        $radioArr = array();
        // 唯一属性
        $uniArr = array();
        foreach ($gaArr as $key => $val) {
            if ($val['attr_type'] == 1){
                $radioArr[$val['attr_id']][] = $val;
            }else{
                $uniArr[] = $val;
            }
        }
        $this->assign([
            'show_right' => 1,      //  文章列表和商品列表头部偏移判断
            'goodsInfo' => $goodsInfo,
            'goodsPhotoRes' => $goodsPhotoRes,
            'radioArr' => $radioArr,    // 单选属性
            'uniArr' => $uniArr,    // 唯一属性
        ]);
        return view('goods');
    }

//    ajax获取价格
    public function ajaxGetMemberPrice($goods_id)
    {
        $price = model('goods')->getMemberPrice($goods_id);
        return json($price);
    }
}