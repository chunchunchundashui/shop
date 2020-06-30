<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/6/7
 * Time: 13:12
 */
namespace app\index\model;

use think\Model;

class Article extends Model
{
    public function getFooterArts()
    {
//        获取帮助分类
        $helpCateRes = model('cate')->where(array('cate_type' => 3))->order('id asc')->select();
        foreach ($helpCateRes as $k => $v) {
            $helpCateRes[$k]['arts'] = $this->where(array('cate_id'=>$v['id']))->select();
        }
        return $helpCateRes;
    }

//    网店信息
    public function getshopInfo()
    {
        $artArr = $this->where('cate_id',3)->field('id,title')->select();
        return $artArr;
    }

//    获取商品公告,和促销活动
    public function getArticle($id, $limitId)
    {
        $arts = $this->where(array('cate_id' => $id))->limit($limitId)->select();
        return $arts;
    }
}