<?php
namespace app\index\controller;

use think\Controller;

class Brand extends Controller
{
//获取商品ajax分配给前台品牌列表
    public function lst()
    {
        $data = array();
        $lst = db('brand')->order('id desc')->paginate(17);
        $data['totalPage'] = $lst->lastPage();
        $brands = $lst->items();
        $html = '';
        $html.='<div class="brand-list" id="recommend_brands"><ul>';
            foreach ($brands as $k => $v) {
                $html.='<li><div class="brand-img"><a href="'.$v['brand_url'].'" target="_blank"><img src="'.config('view_replace_str.__uploads__').'/'.$v['brand_img'].'"></a></div>
                      <!-- 让他跳转就把这个div给去掉 -->
                      <div class="brand-mash"><div class="coupon"></div></div></li>';
            }
        $html.='</ul><a href="javascript:void(0);" ectype="changeBrand" class="refresh-btn"><i
                  class="iconfont icon-rotate-alt"></i><span>换一批</span></a></div>';
         $data['brands'] = $html;
        return json($data);
    }
}
