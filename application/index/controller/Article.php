<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/6/7
 * Time: 21:33
 */

namespace app\index\controller;


class Article extends Base
{
    public function index($id)
    {
//        根据id查找对应的内容
//        动态缓存
        $cacheName = $id.'_arts';
        if (cache($cacheName)) {
            $arts = cache($cacheName);
        }else {
            $arts = model('article')->find($id);
            if ($this->config['cache'] == '是') {
                cache($cacheName, $arts,$this->config['cache_time']);
            }
        }

        //        查找二级分类跟顶级分类
//        if (cache('helpCates')) {
//            $helpCates = cache('helpCates');
//        }else {
            $helpCates = model('cate')->shopHelpCates();
//            cache('helpCates', $helpCates, 3600);
//        }

        //        普通左侧栏目分类放入缓存
//        if (cache('comCates')) {
//            $comCates = cache('comCate');
//        }else {
            $comCates = model('cate')->getComCates();
//            cache('comCates', $comCates, 3600);
//        }
//        面包屑导航
        $cachePositon = $arts['cate_id'].'_position';
        if (cache($cachePositon)) {
            $position = cache($cachePositon);
        }else {
            $position = model('cate')->position($arts['cate_id']);
            if ($this->config['cache'] == '是') {
                cache($cachePositon, $position,$this->config['cache_time']);
            }
        }

//        这种放法再次查询比较浪费资源
//        $position[] = model('cate')->find($arts['cate_id']);
//        dump($position);die;
        $this->assign([
            'show_right' => 1,      //  文章列表和商品列表头部偏移判断
            'comCates' => $comCates,
            'helpCates' => $helpCates,
            'arts' => $arts,    //当前栏目及子栏目文章
            'position' => $position
        ]);
        return view('article');
    }
}