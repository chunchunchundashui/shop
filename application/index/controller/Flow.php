<?php
namespace app\index\controller;

use catetree\Catetree;
use think\Cache;

class Flow extends Base
{
   public function addToCart()
   {
//       将添加到购物车的数据进行储存到cookie中
       $data = input('post.');
//       json_decode将数组转换为json
       $goodsObj = json_decode($data['goods']);
       $goodsId = $goodsObj->goods_id;      //string '40'
       $goodsAttr = $goodsObj->goods_attr;  //string '71,75'
       $goodsNum = $goodsObj->number;       //string '40'
       model('cart')->addToCart($goodsId, $goodsAttr,$goodsNum);
       $result = [
           'error' => 0,// error=0说明加入购物车成功,库存没问题,error=2说明库存不足,未加入购物车
           'one_step_buy' => 1,
       ];
       return json($result);
   }

//   加载购物车列表展示商品
    public function flow1()
    {
        $cartGoodsRes = model('Cart')->getGoodsListInCart();
        $this->assign([
            'cartGoodsRes' => $cartGoodsRes,
        ]);
        return view();
    }
    
//    进入购物车默认勾选所有商品计算价格,节省价格,总数
//      $recId为选中的商品的id字符串: 1,2,3
    public function ajaxCartGoodsAmount()
    {
        $recId = input('post.');
        $result = model('cart')->ajaxCartGoodsAmount($recId);
        return json($result);
    }

//    删除购物车中的商品
    public function dropGoods()
    {
        $idAttr = input('id_attr');
        model('cart')->delCart($idAttr);
        $this->redirect('index/Flow/flow1');
    }

//    批量删除购物车记录
    public function delCartGoods()
    {
        $cartValue = input('cart_value');   // 要批量删除的购物车记录   格式: 40-61,65@40-62,65@40-63,65@40-64,65
        model('cart')->delCartGoods($cartValue);
        return json(['status' => 1]); // 删除成功
    }

    // 修改购物车中的数量
    public function updateCart()
    {
      $idAttr = input('rec_id');
      $goodsNum = input('goods_number');
      return model('cart')->updateCart($idAttr, $goodsNum);
    }
}
