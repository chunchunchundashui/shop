<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class Attr extends Controller
{

//商品类型列表
    public function lst()
    {
        $typeId = input('type_id');
        if ($typeId) {
            $map['type_id'] = ['=',$typeId];
        }else {
            $map = 1;
        }
        $lst = model('attr')->alias('a')->field('a.*,t.type_name')->join('type t',"a.type_id = t.id")->where($map)->order('a.id desc')->paginate(10);
        $viewData = [
            'lst' => $lst
        ];
        $this->assign($viewData);
        return view();
    }

//商品类型添加
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data['attr_values'] = str_replace('，',',',$data['attr_values']);
//            验证器
            $validate = validate('attr');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = db('attr')->insert($data);
            if ($add) {
                $this->success('商品类型添加成功!', 'admin/attr/lst');
            }else {
                $this->error("商品类型添加失败!");
            }
        }
        //获取所属类型的值
        $attr = db('type')->select();
        $attrView = [
            'attr' =>$attr,
        ];
        $this->assign($attrView);
        return view();
    }

//商品类型修改
    public function edit()
    {
        if (request()->isPost()) {

            $data = input('post.');
            $data['attr_values'] = str_replace('，',',',$data['attr_values']);
            //            验证器
            $validate = validate('attr');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $save = db('attr')->update($data);
            if ($save !== false) {
                $this->success('修改商品类型成功!', 'admin/attr/lst');
            }else {
                $this->error("修改商品类型失败!");
            }
        }
        $id = input('id');
        $attrInfo = model('attr')->find($id);
        //获取所属类型的值
        $attrType = db('type')->select();
        $viewData = [
            'attrInfo' => $attrInfo,
            'attrType' => $attrType
        ];
        $this->assign($viewData);
        return view();

    }
 
//    商品类型删除
    public function del()
    {
        $attrInfo = model('attr')->find(input('post.id'));
        $result = $attrInfo->delete();
        if ($result == 1 ) {
            $this->success('商品类型删除成功!', 'admin/attr/lst');
        }else {
            $this->error('商品类型删除失败!');
        }
    }

    //异步获取指定类型下的属性
    public function ajaxGetAttr()
    {
        $typeId = input('type_id');         /*  input('type_id')获取前台传输过来的值  */
        $attrRes = db('attr')->where(array("type_id"=>$typeId))->select();
        echo json_encode($attrRes);
    }
}
