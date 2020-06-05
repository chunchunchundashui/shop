<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class GoodsAttr extends Controller
{
    //异步获取指定类型下的属性
    public function ajaxdelga()
    {
        $typeId = input('id');         /*  input('id')获取前台传输过来的值  */
        $del = db('goodsAttr')->delete($typeId);
        if ($del == 1){
            $this->success('删除成功!');
        }else {
            $this->error('删除失败!');
        }
    }
}
