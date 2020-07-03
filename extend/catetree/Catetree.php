<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace catetree;
use Monolog\Handler\IFTTTHandler;

class Catetree {

    public function cateTree($cateRes)
    {
        return $this->sort($cateRes);
    }
    // 递归对有的分类进行重新排序
    public function sort($cateRes, $pid=0, $level=0)      /*$level加的一个变量标记当前是几级*/
    {
        static $arr = array();
        foreach ($cateRes as $k => $v)
        {
            if($v['pid'] == $pid)
            {
                // 把level值放到这个分类里，这样就可以知道这个分类是第几级的
                $v['level'] = $level;
                $arr[] = $v;
                // 再找这个分类的子分类
                $this->sort($cateRes, $v['id'], $level+1);
            }
        }
        return $arr;
    }

    //获取子栏目id
    public function childrenids($cateid,$obj){
        $data = $obj->field('id,pid')->select();
        return $this->_childrenids($data,$cateid,TRUE);
    }

    private function _childrenids($data,$cateid,$clear = FALSE){
//        为ture清空动态数组,为false不清空今天数组
        static $arr = array();
        if ($clear) {
            $arr = array();
        }
        foreach ($data as $k => $v) {

            if($v['pid'] == $cateid){

                $arr[] = $v['id'];

                $this->_childrenids($data,$v['id']);

            }
        }
        return $arr;
    }

    //处理栏目排序
    public function cateSort($data,$obj)
    {
        foreach ($data as $k => $v) {
            $obj->update(['id'=>$k, 'sort'=>$v]);
        }
    }


//    处理批量删除

    public function pdel($cateids)
    {
        foreach ($cateids as $k => $v) {
            $childrenidsarr[] = $this->childrenids($v);
            $childrenidsarr[] = (int)$v;
        }
        $_childrenidsarr = array();
        foreach ($childrenidsarr as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k1 => $v1) {
                    $_childrenidsarr[] = $v1;
                }
            }else {
                $_childrenidsarr[] = $v;
            }
        }
        $_childrenidsarr = array_unique($_childrenidsarr);
        $this::destroy($_childrenidsarr);
    }
}

