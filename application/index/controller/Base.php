<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/6/7
 * Time: 13:10
 */

namespace app\index\controller;


use think\Controller;

class Base extends Controller
{
    //        定义一个成员变量每个控制器都能访问
    public $config;
    public function _initialize()
    {
        $this->_getFooterArts();    // 获取并分配底部帮助信息
        $this->_getNav();       //获取并分配导航
        $this->_getConfs();       //获取并分配配置项  为config赋值
        $this->_getCates();       //获取顶级栏目和二级栏目
    }


//    顶级栏目和二级栏目
    private function _getCates()
    {
        $cateRes = model('Category')->getCates();
        $this->assign([
            'cateRes' => $cateRes,
        ]);
    }

//    这个方法只供当前类使用
    private function _getFooterArts()
    {
        $mArticle = model('Article');
//        将底部帮助信息放到缓存中
        if (cache('helpCateRes')) {
            $helpCateRes = cache('helpCateRes');
        }else {
            $helpCateRes = $mArticle->getFooterArts();       // 底部帮助信息
            cache('helpCateRes', $helpCateRes, 3600);
        }
//        将底部网店信息放到缓存中
        if (cache('shopInfoRes')) {
            $shopInfoRes = cache('shopInfoRes');
        }else {
            $shopInfoRes = $mArticle->getshopInfo();     //底部网店信息
            cache('shopInfoRes', $shopInfoRes, 3600);
        }
        $this->assign([
            'helpCateRes' => $helpCateRes,
            'shopInfoRes' => $shopInfoRes,
        ]);
    }

//    导航标签
    private function _getNav()
    {
        if (cache('navRes')) {
            $navRes = cache('navRes');
        }else {
            $_nav = db('nav')->order('sort DESC')->select();
            foreach ($_nav as $k => $v) {
//            将mid作为键值好渲染一点
                $navRes[$v['pos']][] = $v;
            }
            cache('navRes', $navRes, 3600);
        }
        $this->assign([
            'navRes' => $navRes,
        ]);
    }

//    配置项信息
    private function _getConfs()
    {
        if (cache('confRes')) {
            $confRes = cache('confRes');
        }else {
            $confRes = model('Conf')->getConfs();
//        给成员变量赋值
            $this->config = $confRes;
            cache('confRes', $confRes, 3600);
        }
        $this->assign([
            'configs' => $confRes,
            ]);
    }

}