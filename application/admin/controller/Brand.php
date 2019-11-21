<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class Brand extends Controller
{

//商品列表
    public function lst()
    {
        $lst = model('brand')->order('id desc')->paginate(10);
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
//            $data['brand_url'];     http://
            if ($data['brand_url'] && stripos($data['brand_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['brand_url'] = 'http://'. $data['brand_url'];
            }
            //处理图片上传
            if ($_FILES['brand_img']['tmp_name']) {
                $data['brand_img'] = $this->upload();
            }
//            验证器
            $validate = validate('Brand');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = db('brand')->insert($data);
            if ($add) {
                $this->success('商品添加成功!', 'admin/Brand/lst');
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
//            $data['brand_url'];     http://
            if ($data['brand_url'] && stripos($data['brand_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['brand_url'] = 'http://'. $data['brand_url'];
            }
            //处理图片上传
            if ($_FILES['brand_img']['tmp_name']) {
                $oldBrand = model('brand')->field('brand_img')->find($data['id']);
                $oldBrandImg = IMG_UPLOADS.$oldBrand['brand_img'];      /*IMG_UPLOADS这是在入口文件定义的一个路径*/
                if (file_exists($oldBrandImg)) {        /*file_exists检查文件或目录是否存在*/
                    @unlink($oldBrandImg);
                }
                $data['brand_img'] = $this->upload();
            }
            //            验证器
            $validate = validate('Brand');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $save = db('brand')->update($data);
            if ($save !== false) {
                $this->success('修改品牌成功!', 'admin/Brand/lst');
            }else {
                $this->error("修改品牌失败!");
            }
        }
        $id = input('id');
        $brandInfo = model('Brand')->find($id);
        $viewData = [
            'brandInfo' => $brandInfo
        ];
        $this->assign($viewData);
        return view();

    }

//    商品删除
    public function del()
    {
        $brandInfo = model('Brand')->find(input('post.id'));
        $result = $brandInfo->delete();
        if ($result == 1 ) {
            $this->success('商品删除成功!', 'admin/brand/lst');
        }else {
            $this->error('商品删除失败!');
        }
    }

    //上传图片
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('brand_img');
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
