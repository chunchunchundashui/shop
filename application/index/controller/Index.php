<?php
namespace app\index\controller;

use catetree\Catetree;
use think\Cache;

class Index extends Base
{
    public function index()
    {
//        调用首页的轮播图放入缓存中
        if (cache('alterImg')) {
            $alterImg = cache('alterImg');
        }else {
            $alterImg = model('AlternateImg')->getAlterImg();
            if ($this->config['cache'] == '是') {
                cache('alterImg',$alterImg,$this->config['cache_time']);
            }
        }
//        调用公告及促销信息
//        缓存公告信息
        if (cache('anment')) {
            $anment = cache('anment');
        }else {
            $anment = model('Article')->getArticle(66, 3);      //商品公告
            if ($this->config['cache'] == '是') {
                cache('anment',$anment,$this->config['cache_time']);
            }
        }

        //        缓存促销信息
        if (cache('salesRes')) {
            $salesRes = cache('salesRes');
        }else {
            $salesRes = model('Article')->getArticle(72, 3);        //商品促销
            if ($this->config['cache'] == '是') {
                cache('salesRes',$salesRes,$this->config['cache_time']);
            }
        }
//        清空缓存cache(null);

//        调用首页商品
        if (cache('indexGoodsRes')) {
            $indexGoodsRes = cache('indexGoodsRes');
        }else {
            $indexGoodsRes = model('Goods')->getRecposGoods(7,20);
            if ($this->config['cache'] == '是') {
                cache('indexGoodsRes',$indexGoodsRes,$this->config['cache_time']);
            }
        }

//        商品大模块的缓存
        if (cache('cateRes')) {
            $cateRes = cache('cateRes');
        }else {
//        获取首页大模块顶级分类数据开始
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
//            获取该顶级分类相关的品牌信息
                $cateRes[$k]['brands'] = model('Category')->getCategoryBrands($v['id']);

//                获取当前顶级栏目的左侧图片信息
                $cateRes[$k]['leftimgs'] = model('CategoryAd')->getCategoryAd($v['id']);


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
                if ($this->config['cache'] == '是') {
                    cache('cateRes', $cateRes,$this->config['cache_time']);
                }
            }
        }

//        获取大模块顶级分类数据结束
//        print_r($cateRes);die;
//        dump($alterImg);die;
        $this->assign([
            'show_right' => 1,      //  文章列表和商品列表头部偏移判断
            'show_nav' => 1,    // 首页导航默认打开,其他页面默认隐藏
            'cateRes' => $cateRes,       // 首页大模块分类数据
            'indexGoodsRes' => $indexGoodsRes,      //首页商品
            'anment' => $anment,            //商品公告
            'salesRes' => $salesRes,     //商品促销
            'alterImg' => $alterImg,       // 首页轮播图调用
        ]);
        return view();
    }
}
