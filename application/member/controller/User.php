<?php


/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/6/7
 * Time: 21:33
 */

namespace app\member\controller;

use app\index\controller\Base;

class User extends Base
{
//
    public function index()
    {
    	$this->assign([
    		'show_right' => 1,      //  文章列表和商品列表头部偏移判断
    	]);
        return view();
    }
    
//    退出
    public function loginOut()
    {
        model('user')->loginOut();
        $this->success('退出成功', 'member/account/login');
}
}