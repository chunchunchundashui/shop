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
//        动态缓存
        $cacheArtResName = $id.'_artRes';
        if(cache($cacheArtResName)) {
            $artRes = cache($cacheArtResName);
        }else {
            $artRes = db('article')->where($map)->select();
            if ($this->config['cache'] == '是') {
                cache($cacheArtResName,$artRes,$this->config['cache_time']);
            }
        }
//        当前栏目基本信息
        $cacheCateName = $id.'_cates';
        if(cache($cacheCateName)) {
            $cates = cache($cacheCateName);
        }else {
            $cates = $cate->find($id);
            if ($this->config['cache'] == '是') {
                cache($cacheCateName,$cates,$this->config['cache_time']);
            }
        }
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