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
        $arts = model('article')->find($id);
        //        查找二级分类跟顶级分类
        $helpCates = model('cate')->shopHelpCates();
        //        普通左侧栏目分类
        $comCates = model('cate')->getComCates();
//        面包屑导航
        $position = model('cate')->position($arts['cate_id']);
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