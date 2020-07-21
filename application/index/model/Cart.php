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
class Cart extends Model
{
//    加入购物车
//  $goodsId商品id
//  $goodsAttr单选属性默认为空
//  $goodsNum添加购物车是单个商品的数量为1
//加入购物车的逻辑如下:addToCart方法
    public function addToCart($goodsId, $goodsAttr = '', $goodsNum = 1)
    {
//        三元运算符先判断是否存在cookie值,如果有值我们就反序列化,:或者 如果没有值我们就加入一个新的数组
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
//        拼装键,因为cookie只能存入字符串
        $key = $goodsId.'-'.$goodsAttr;
//        如果有当前商品再点击添加就直接添加数量,如果不存在就是为0;
        $cart[$key] += $goodsNum;
//        两种写法
//        第一种
//        $cart['key'] += $goodsNum;
//        第二种
//        if ($cart['key']) {
//            $cart['key'] = $cart['key']+$goodsNum;
//        }else{
//            $cart['key'] = $goodsNum;
//        }
//        过期时间
        $aMonth = time()+30*24*3600;
//	setcookie使用的是原生存入cookie
//        序列化  serialize
//	'/'意思为:所有设置cookie的路径,不管在那个页面都能读取购物车中的信息.
        setcookie('cart',serialize($cart), $aMonth,'/');
    }

//    清空购物车
    public function clearCart()
    {
//        需要操作的cookie名称'cart', 把他的值设为空'',设置1位过期时间,time()时间戳是从1970年开始的所以都是大于1的所以他是过期时间,'/'路径为根路径那个页面都能读取购物车中的信息
        setcookie('cart','','1', '/');
    }

//    删除一条购物车的商品
    public function delCart($goodsId, $goodsAttr = '')
    {
//        三元运算符先判断是否存在cookie值,如果有值我们就反序列化,:或者 如果没有值我们就加入一个新的数组
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
//        拼装键,因为cookie只能存入字符串
        $key = $goodsId.'-'.$goodsAttr;
//        删除一个数组
        unset($cart[$key]);
//        过期时间
        $aMonth = time()+30*24*3600;
//	setcookie使用的是原生存入cookie
//        序列化  serialize
//	'/'意思为:所有设置cookie的路径,不管在那个页面都能读取购物车中的信息.
//        如果上面的删除还剩的有其它东西没被删除,我们将从新存入cookie当中
        setcookie('cart',serialize($cart), $aMonth,'/');
    }

//    修改购物车当中的数量
    public function updateCart($goodsId, $goodsAttr = '', $goodsNum)
    {
//        三元运算符先判断是否存在cookie值,如果有值我们就反序列化,:或者 如果没有值我们就加入一个新的数组
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
//        拼装键,因为cookie只能存入字符串
        $key = $goodsId.'-'.$goodsAttr;
//        如果有当前商品再点击添加就直接添加数量,如果不存在就是为0;
        $cart[$key] = $goodsNum;
//        两种写法
//        第一种
//        $cart['key'] += $goodsNum;
//        第二种
//        if ($cart['key']) {
//            $cart['key'] = $cart['key']+$goodsNum;
//        }else{
//            $cart['key'] = $goodsNum;
//        }
//        过期时间
        $aMonth = time()+30*24*3600;
//	setcookie使用的是原生存入cookie
//        序列化  serialize
//	'/'意思为:所有设置cookie的路径,不管在那个页面都能读取购物车中的信息.
        setcookie('cart',serialize($cart), $aMonth,'/');
    }

//读取cookie获取购物车商品
    public function getGoodsListInCart()
    {
        $goods = model('goods');
//        三元运算符进行判断
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
        $_cart = array();
        foreach($cart as $k => $v) {
            $arr = explode('-', $k);    // $arr[0]就是商品的id,如果存在第二个元素的话$arr[1]代表商品单选属性id字符串
            $goodsInfo = $goods->field('id,goods_name,sm_thumb')->find($arr[0]);
            // 获取折扣价格
            $memberPrice = $goods->getMemberPrice($arr[0]);
            $_cart[$k]['goods_name'] = $goodsInfo['goods_name'];
            $_cart[$k]['sm_thumb'] = $goodsInfo['sm_thumb'];
            $_cart[$k]['member_price'] = $memberPrice;
            $goodsAttrStr = array();    // 存放商品单选属性
            $goodsAttrPrice = 0;
            if ($arr[1]) {
                // 数据模拟
                // 属性名称    属性值     属性价格
                // 颜色        红色        0
                // 尺寸         XXL       100
               $goodsAttrRes = db('goods_attr')->alias('ga')->field('ga.*,a.attr_name')->join('attr a', "ga.attr_id = a.id")->where('id','in', $arr[1])->select();
               foreach ($goodsAttrRes as $k1 => $v1) {
                   $goodsAttrStr[] = $v1['attr_name']. ':'.$v1['attr_value'] .'(￥'.$v1['attr_price'].'元)';
                   $goodsAttrPrice+=$v1['attr_price'];
               }
               $goodsAttrStr = implode('<br />', $goodsAttrStr);
               $_cart[$k]['goodsAttrStr'] = $goodsAttrStr;
               $_cart[$k]['member_price'] += $goodsAttrPrice;
            }
        }
        return $_cart;
    }   
}