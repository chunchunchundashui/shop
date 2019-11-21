<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class MemberLevel extends Controller
{

//会员级别列表
    public function lst()
    {
        $mlRes = model('MemberLevel')->order('id desc')->paginate(10);
        $viewData = [
            'mlRes' => $mlRes
        ];
        $this->assign($viewData);
        return view();
    }

//会员级别添加
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
//            验证器
//            $validate = validate('Type');
//            if (!$validate->check($data)) {
//                $this->error($validate->getError());
//            }
            $add = db('MemberLevel')->insert($data);
            if ($add) {
                $this->success('会员级别添加成功!', 'admin/MemberLevel/lst');
            }else {
                $this->error("会员级别添加失败!");
            }
        }
        return view();
    }

//会员级别修改
    public function edit()
    {
        if (request()->isPost()) {

            $data = input('post.');
            //            验证器
//            $validate = validate('Type');
//            if (!$validate->check($data)) {
//                $this->error($validate->getError());
//            }
            $save = db('MemberLevel')->update($data);
            if ($save !== false) {
                $this->success('修改会员级别成功!', 'admin/MemberLevel/lst');
            }else {
                $this->error("修改会员级别失败!");
            }
        }
        $id = input('id');
        $memberL = model('MemberLevel')->find($id);
        $viewData = [
            'memberL' => $memberL
        ];
        $this->assign($viewData);
        return view();

    }

//    会员级别删除
    public function del()
    {
        $TypeInfo = model('MemberLevel')->find(input('post.id'));
        $result = $TypeInfo->delete();
        if ($result == 1 ) {
            $this->success('会员级别删除成功!', 'admin/MemberLevel/lst');
        }else {
            $this->error('会员级别删除失败!');
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
