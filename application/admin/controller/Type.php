<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class Type extends Controller
{

//商品类型列表
    public function lst()
    {
        $lst = model('Type')->order('id desc')->paginate(10);
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
            $data = [
                'type_name' => input('post.type_name'),
            ];
//            验证器
//            $validate = validate('Type');
//            if (!$validate->check($data)) {
//                $this->error($validate->getError());
//            }
            $add = db('Type')->insert($data);
            if ($add) {
                $this->success('商品类型添加成功!', 'admin/Type/lst');
            }else {
                $this->error("商品类型添加失败!");
            }
        }
        return view();
    }

//商品类型修改
    public function edit()
    {
        if (request()->isPost()) {

            $data = input('post.');
            //            验证器
//            $validate = validate('Type');
//            if (!$validate->check($data)) {
//                $this->error($validate->getError());
//            }
            $save = db('Type')->update($data);
            if ($save !== false) {
                $this->success('修改商品类型成功!', 'admin/Type/lst');
            }else {
                $this->error("修改商品类型失败!");
            }
        }
        $id = input('id');
        $TypeInfo = model('Type')->find($id);
        $viewData = [
            'TypeInfo' => $TypeInfo
        ];
        $this->assign($viewData);
        return view();

    }

//    商品类型删除
    public function del()
    {
        $TypeInfo = model('Type')->find(input('post.id'));
        $result = $TypeInfo->delete();
        //删除商品类型下面的商品属性
        db('attr')->where(array('type_id'=>input('post.id')))->delete();
        if ($result == 1 ) {
            $this->success('商品类型删除成功!', 'admin/Type/lst');
        }else {
            $this->error('商品类型删除失败!');
        }
    }

    //上传图片
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('Type_img');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS  . 'uploads');
            if($info){
                return $info->getSaveName();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
                die;
            }
        }
    }
}
