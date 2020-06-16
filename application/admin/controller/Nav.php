<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class Nav extends Controller
{

//导航列表
    public function lst()
    {
        $nav = model('nav');
        if (request()->isPost()) {
            $data = input('post.');
            foreach($data['sort'] as $k => $v) {
                $nav->where('id',$k)->update(['sort' => $v]);
            }
             $this->success('排序成功');
        }
        $lst = $nav->order('sort desc')->paginate(10);
        $viewData = [
            'lst' => $lst
        ];
        $this->assign($viewData);
        return view();
    }

//导航添加
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
//            $data['nav_url'];     http://
            if ($data['nav_url'] && stripos($data['nav_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['nav_url'] = 'http://'. $data['nav_url'];
            }
//            验证器
            $validate = validate('nav');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = db('nav')->insert($data);
            if ($add) {
                $this->success('导航添加成功!', 'admin/nav/lst');
            }else {
                $this->error("导航添加失败!");
            }
        }
        return view();
    }

//导航修改
    public function edit()
    {
        if (request()->isPost()) {

            $data = input('post.');
//            $data['nav_url'];     http://
            if ($data['nav_url'] && stripos($data['nav_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['nav_url'] = 'http://'. $data['nav_url'];
            }
            //            验证器
            $validate = validate('nav');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $save = db('nav')->update($data);
            if ($save !== false) {
                $this->success('修改品牌成功!', 'admin/nav/lst');
            }else {
                $this->error("修改品牌失败!");
            }
        }
        $id = input('id');
        $navInfo = model('nav')->find($id);
        $viewData = [
            'navInfo' => $navInfo
        ];
        $this->assign($viewData);
        return view();

    }

//    导航删除
    public function del()
    {
        $navInfo = model('nav')->find(input('post.id'));
        $result = $navInfo->delete();
        if ($result == 1 ) {
            $this->success('导航删除成功!', 'admin/nav/lst');
        }else {
            $this->error('导航删除失败!');
        }
    }

    //上传图片
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('nav_img');
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
