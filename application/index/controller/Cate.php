<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/6/7
 * Time: 11:40
 */

namespace app\index\controller;

use catetree\Catetree;

class Cate extends Base
{
    public function index($id)
    {
        $cate = db('cate');
//      获取当前栏目及子栏目id,返回数组
        $cateTree = new Catetree();
        $ids = $cateTree->childrenids($id, $cate);
        $ids[] = $id;
        $map['cate_id'] = array('IN', $ids);
        $artRes = db('article')->where($map)->select();
//        当前栏目基本信息
        $cates = $cate->find($id);
        //        查找二级分类跟顶级分类
        $helpCates = model('cate')->shopHelpCates();
        //        普通左侧栏目分类
        $comCates = model('cate')->getComCates();
        $this->assign([
            'show_right' => 1,      //  文章列表和商品列表头部偏移判断
            'comCates' => $comCates,
            'helpCates' => $helpCates,
            'artRes' => $artRes,    //当前栏目及子栏目文章
            'cates' => $cates,      //当前栏目的基本信息
        ]);
        return view('cate');
    }
}