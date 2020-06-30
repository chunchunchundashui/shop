<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class CategoryAd extends Controller
{

//关联左图列表
    public function lst()
    {
        $caRes = model('CategoryAd')
            ->field('ca.*,c.cate_name')
            ->alias('ca')
            ->join('category c', 'ca.category_id = c.id')
            ->order('ca.id desc')->paginate(10);
        $viewData = [
            'caRes' => $caRes
        ];
        $this->assign($viewData);
        return view();
    }

//关联左图添加
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
//            判断只能上传一张B位和C位
            if ($data['position'] == 'B' || $data['position'] == 'C') {
                $ces = db('categoryAd')->where(array('position' => $data['position'], 'category_id' => $data['category_id']))->select();
                if ($ces) {
                    $this->error('只能添加一张图片');
                }
            }
//            $data['link_url'];     http://
            if ($data['link_url'] && stripos($data['link_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['link_url'] = 'http://'. $data['link_url'];
            }
            //处理左图上传
            if ($_FILES['img_src']['tmp_name']) {
                $data['img_src'] = $this->upload();
            }else {
                $this->error('请上传左图');
            }
//            验证器
            $validate = validate('CategoryAd');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = db('CategoryAd')->insert($data);
            if ($add) {
                $this->success('关联左图添加成功!', 'admin/CategoryAd/lst');
            }else {
                $this->error("关联左图添加失败!");
            }
        }
//        获取所有的顶级分类
        $cataRes = model('Category')->where(array('pid' => 0))->select();
        $this->assign([
            'cateRes' => $cataRes,
        ]);
        return view();
    }

//关联左图修改
    public function edit()
    {
//        当前栏目信息
        $CategoryAd = db('categoryAd')->find(input('id'));
        if (request()->isPost()) {
            $data = input('post.');
            //            判断只能上传一张B位和C位
            if ($data['position'] == 'B' || $data['position'] == 'C') {
                $ces = db('categoryAd')->where(array('position' => $data['position'], 'category_id' => $data['category_id']))->select();
                if ($ces) {
                    $this->error('只能添加一张图片');
                }
            }
//            $data['link_url'];     http://
            if ($data['link_url'] && stripos($data['link_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['link_url'] = 'http://'. $data['link_url'];
            }
            //处理左图上传
            if ($_FILES['img_src']['tmp_name']) {
//                如果有原图就删除
                if ($CategoryAd['img_src']) {
                    $linkImg = IMG_UPLOADS_PRO_IMG.$CategoryAd['img_src'];      /*IMG_UPLOADS_PRO_IMG这是在入口文件定义的一个路径*/
                    if (file_exists($linkImg)) {        /*file_exists检查文件或目录是否存在*/
                        @unlink($linkImg);
                    }
                }
                $data['img_src'] = $this->upload();
            }
//            验证器
//            $validate = validate('CategoryAd');
//            if (!$validate->check($data)) {
//                $this->error($validate->getError());
//            }
            $add = db('CategoryAd')->update($data);
            if ($add) {
                $this->success('关联左图修改成功!', 'admin/CategoryAd/lst');
            }else {
                $this->error("关联左图修改失败!");
            }
        }
//        获取所有的顶级分类
        $cataRes = model('Category')->where(array('pid' => 0))->select();
        $this->assign([
            'cateRes' => $cataRes,
            'CategoryAd' => $CategoryAd,
        ]);
        return view();
    }

//    关联左图删除
    public function del()
    {
        $linkObj = db('categoryAd');
        $links = $linkObj->field('img_src')->find(input('post.id'));
        if ($links['img_src']) {
            $linkImg = IMG_UPLOADS_PRO_IMG.$links['img_src'];      /*IMG_UPLOADS_PRO_IMG这是在入口文件定义的一个路径*/
            if (file_exists($linkImg)) {        /*file_exists检查文件或目录是否存在*/
                @unlink($linkImg);
            }
        }
        $result = $linkObj->delete(input('post.id'));
        if ($result == 1 ) {
            $this->success('关联左图删除成功!', 'admin/CategoryAd/lst');
        }else {
            $this->error('关联左图删除失败!');
        }
    }

    //上传左图
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('img_src');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS  . 'pro_img');
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
