<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return view();
    }

//    清空缓存
    public function clearCache()
    {
        if (cache(null)) {
            $this->success('缓存清楚成功');
        }else {
            $this->error('缓存清楚失败');
        }
    }
}
