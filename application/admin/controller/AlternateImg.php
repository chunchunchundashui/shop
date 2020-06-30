<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class AlternateImg extends Controller
{

//轮播图列表
    public function lst()
    {
        $alerDb = model('alternate_img');
        if (request()->isPost()) {
            $data = input('post.');
            foreach($data['sort'] as $k => $v) {
                $alerDb->where('id',$k)->update(['sort' => $v]);
            }
            $this->success('排序成功');
        }
        $lst = $alerDb->order('sort desc')->paginate(10);
        $viewData = [
            'lst' => $lst
        ];
        $this->assign($viewData);
        return view();
    }

//轮播图添加
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
//            $data['link_url'];     http://
            if ($data['link_url'] && stripos($data['link_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['link_url'] = 'http://'. $data['link_url'];
            }
            //处理图片上传
            if ($_FILES['img_src']['tmp_name']) {
                $data['img_src'] = $this->upload();
            }
//            验证器
            $validate = validate('alternate_img');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = db('alternate_img')->insert($data);
            if ($add) {
                $this->success('轮播图添加成功!', 'admin/alternate_img/lst');
            }else {
                $this->error("轮播图添加失败!");
            }
        }
        return view();
    }

//轮播图修改
    public function edit()
    {
        if (request()->isPost()) {

            $data = input('post.');
//            $data['link_url'];     http://
            if ($data['link_url'] && stripos($data['link_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['link_url'] = 'http://'. $data['link_url'];
            }
            //处理图片上传
            if ($_FILES['img_src']['tmp_name']) {
                $oldalternate_img = model('alternate_img')->field('img_src')->find($data['id']);
                $oldalternate_imgImg = IMG_UPLOADS.$oldalternate_img['img_src'];      /*IMG_UPLOADS这是在入口文件定义的一个路径*/
                if (file_exists($oldalternate_imgImg)) {        /*file_exists检查文件或目录是否存在*/
                    @unlink($oldalternate_imgImg);
                }
                $data['img_src'] = $this->upload();
            }
            //            验证器
//            $validate = validate('alternate_img');
//            if (!$validate->check($data)) {
//                $this->error($validate->getError());
//            }
            $save = db('alternate_img')->update($data);
            if ($save !== false) {
                $this->success('修改轮播图成功!', 'admin/alternate_img/lst');
            }else {
                $this->error("修改轮播图失败!");
            }
        }
        $id = input('id');
        $alternate_imgInfo = model('alternate_img')->find($id);
        $viewData = [
            'alternate_imgInfo' => $alternate_imgInfo
        ];
        $this->assign($viewData);
        return view();

    }

//    轮播图删除
    public function del()
    {
        $id = input('post.id');
        $alerImg = model('alternate_img');
        $alerImgs = $alerImg->field('img_src')->find($id);
        $imgSrc = IMG_UPLOADS.$alerImgs['img_src'];      /*IMG_UPLOADS这是在入口文件定义的一个路径*/
        if (file_exists($imgSrc)) {        /*file_exists检查文件或目录是否存在*/
            @unlink($imgSrc);
        }
        $alternate_imgInfo = $alerImg->find($id);
        $result = $alternate_imgInfo->delete();
        if ($result == 1 ) {
            $this->success('轮播图删除成功!', 'admin/alternate_img/lst');
        }else {
            $this->error('轮播图删除失败!');
        }
    }

    //上传图片
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('img_src');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS  . 'uploads');
            if($info){
                $_alterImg = $info->getSaveName();
                $alterImg = str_replace('\\','/',$_alterImg);
                return $alterImg;
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
                die;
            }
        }
    }
}
