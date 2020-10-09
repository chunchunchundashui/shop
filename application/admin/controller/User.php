<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class User extends Controller
{

//商品列表
    public function lst()
    {
        $lst = model('user')->alias('u')->join('member_level ml', "u.points >= ml.bom_point and ml.top_point >= u.points")->order('u.id desc')->paginate(10);
        $viewData = [
            'lst' => $lst
        ];
        $this->assign($viewData);
        return view();
    }

//商品添加
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
//            $data['user_url'];     http://
            if ($data['user_url'] && stripos($data['user_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['user_url'] = 'http://'. $data['user_url'];
            }
            //处理图片上传
            if ($_FILES['user_img']['tmp_name']) {
                $data['user_img'] = $this->upload();
            }
//            验证器
            $validate = validate('user');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = db('user')->insert($data);
            if ($add) {
                $this->success('商品添加成功!', 'admin/user/lst');
            }else {
                $this->error("商品添加失败!");
            }
        }
        return view();
    }

//商品修改
    public function edit()
    {
        if (request()->isPost()) {

            $data = input('post.');
//            $data['user_url'];     http://
            if ($data['user_url'] && stripos($data['user_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['user_url'] = 'http://'. $data['user_url'];
            }
            //处理图片上传
            if ($_FILES['user_img']['tmp_name']) {
                $olduser = model('user')->field('user_img')->find($data['id']);
                $olduserImg = IMG_UPLOADS.$olduser['user_img'];      /*IMG_UPLOADS这是在入口文件定义的一个路径*/
                if (file_exists($olduserImg)) {        /*file_exists检查文件或目录是否存在*/
                    @unlink($olduserImg);
                }
                $data['user_img'] = $this->upload();
            }
            //            验证器
            $validate = validate('user');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $save = db('user')->update($data);
            if ($save !== false) {
                $this->success('修改品牌成功!', 'admin/user/lst');
            }else {
                $this->error("修改品牌失败!");
            }
        }
        $id = input('id');
        $userInfo = model('user')->find($id);
        $viewData = [
            'userInfo' => $userInfo
        ];
        $this->assign($viewData);
        return view();

    }

//    商品删除
    public function del()
    {
        $id = input('post.id');
        $user = model('user')->field('user_img')->find($id);
        $userImg = IMG_UPLOADS.$user['user_img'];      /*IMG_UPLOADS这是在入口文件定义的一个路径*/
        if (file_exists($userImg)) {        /*file_exists检查文件或目录是否存在*/
            @unlink($userImg);
        }
        $userInfo = model('user')->find($id);
        $result = $userInfo->delete();
        if ($result == 1 ) {
            $this->success('商品删除成功!', 'admin/user/lst');
        }else {
            $this->error('商品删除失败!');
        }
    }
}
