<?php
namespace app\index\controller;

use catetree\Catetree;
class Index extends Base
{
    public function index()
    {
//        热卖商品
//    	$hotGoodsRes = model('Goods')->getRecposGoods(2,1);
        $cateRes = model('Category')->getRecCategorys(4, 0);        // 首页推荐  推荐位的顶级分类
        foreach ($cateRes as $k => $v) {
//            获取顶级分类下被设为 首页推荐的二级分类
            $cateRes[$k]['children'] = model('Category')->getRecCategorys(4, $v['id']);
//            获取二级栏目及其子栏目下的精品推荐商品,用于首页显示
            foreach ($cateRes[$k]['children'] as $k1 => $v1) {
//            1.获取当前主分类下的所有子分类id
//                $catetree = new Catetree();
//                $sonIds = $catetree->childrenids($v1['id'],db('category'));
//                $sonIds[] = $v1['id'];
////            2.获取新品推荐位符合条件的商品信息
//                $_newRecposGoods = db('rec_item')->where(array('value_type'=>1, 'recpos_id' => 6))->select();
//                $newRecposGoods = array();
//                foreach ($_newRecposGoods as $k2 => $v2) {
//                    $newRecposGoods[] = $v2['value_id'];
//                }
//                $map['category_id'] = array('IN', $sonIds);
//                $map['id'] = array('IN', $newRecposGoods);
////            dump($map);
//                $cateRes[$k]['children'][$k1]['bestGoods'] = db('goods')->where($map)->limit(6)->order('id desc')->select();
//                使用调用方法节约资源,上面的是原来的代码
                $cateRes[$k]['children'][$k1]['bestGoods'] = model('goods')->getIndexRecposGoods($v1['id'],6);
            }
//            获取新品推荐
//            1.获取当前主分类下的所有子分类id
                $cateRes[$k]['newRecGoods'] = model('goods')->getIndexRecposGoods($v['id'],3);
//            $catetree = new Catetree();
//            $sonIds = $catetree->childrenids($v['id'],db('category'));
//            $sonIds[] = $v['id'];
////            2.获取新品推荐位符合条件的商品信息
//            $_newRecposGoods = db('rec_item')->where(array('value_type'=>1, 'recpos_id' => 3))->select();
//            $newRecposGoods = array();
//            foreach ($_newRecposGoods as $k1 => $v1) {
//                $newRecposGoods[] = $v1['value_id'];
//            }
//            $map['category_id'] = array('IN', $sonIds);
//            $map['id'] = array('IN', $newRecposGoods);
////            dump($map);
//            $cateRes[$k]['newRecGoods'] = db('goods')->where($map)->limit(6)->order('id desc')->select();
//            dump($newResGoods); echo '<br />-----------------'.$v['id'];
        }
//        print_r($cateRes);die;
        $this->assign([
            'show_right' => 1,      //  文章列表和商品列表头部偏移判断
            'show_nav' => 1,    // 首页导航默认打开,其他页面默认隐藏
            'cateRes' => $cateRes
        ]);
        return view();
    }
}
