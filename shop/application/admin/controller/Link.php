<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class Link extends Controller
{

//链接列表
    public function lst()
    {
        $lst = model('link')->order('id desc')->paginate(10);
        $viewData = [
            'lst' => $lst
        ];
        $this->assign($viewData);
        return view();
    }

//链接添加
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
//            $data['link_url'];     http://
            if ($data['link_url'] && stripos($data['link_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['link_url'] = 'http://'. $data['link_url'];
            }
            //处理图片上传
            if ($_FILES['logo']['tmp_name']) {
                $data['logo'] = $this->upload();
            }
//            验证器
            $validate = validate('link');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = db('link')->insert($data);
            if ($add) {
                $this->success('链接添加成功!', 'admin/link/lst');
            }else {
                $this->error("链接添加失败!");
            }
        }
        return view();
    }

//链接修改
    public function edit()
    {
        if (request()->isPost()) {

            $data = input('post.');
//            $data['link_url'];     http://
            if ($data['link_url'] && stripos($data['link_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['link_url'] = 'http://'. $data['link_url'];
            }
            //处理图片上传
            if ($_FILES['logo']['tmp_name']) {
                $oldlink = model('link')->field('logo')->find($data['id']);
                $oldlinkImg = IMG_UPLOADS.$oldlink['logo'];      /*IMG_UPLOADS这是在入口文件定义的一个路径*/
                if (file_exists($oldlinkImg)) {        /*file_exists检查文件或目录是否存在*/
                    @unlink($oldlinkImg);
                }
                $data['logo'] = $this->upload();
            }
            //            验证器
            $validate = validate('link');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $save = db('link')->update($data);
            if ($save !== false) {
                $this->success('修改链接成功!', 'admin/link/lst');
            }else {
                $this->error("修改链接失败!");
            }
        }
        $id = input('id');
        $linkInfo = model('link')->find($id);
        $viewData = [
            'linkInfo' => $linkInfo
        ];
        $this->assign($viewData);
        return view();

    }

//    链接删除
    public function del()
    {
        $linkObj = db('link');
        $links = $linkObj->field('logo')->find(input('post.id'));
        if ($links['logo']) {
            $linkImg = IMG_UPLOADS.$links['logo'];      /*IMG_UPLOADS这是在入口文件定义的一个路径*/
            if (file_exists($linkImg)) {        /*file_exists检查文件或目录是否存在*/
                @unlink($linkImg);
            }
        }
        $result = $linkObj->delete(input('post.id'));
        if ($result == 1 ) {
            $this->success('链接删除成功!', 'admin/link/lst');
        }else {
            $this->error('链接删除失败!');
        }
    }

    //上传图片
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('logo');
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
