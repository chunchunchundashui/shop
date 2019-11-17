<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;
use catetree\Catetree;
class Article extends Controller
{

//文章列表
    public function lst()
    {
//        alias 给本表取别名                  join是连接外表cate
        $articleLst = model('article')->field('a.*,c.cate_name')->alias('a')->join('cate c',"a.cate_id=c.id")->order('a.addtime desc')->paginate(10);
        $viewData = [
            'article' => $articleLst
        ];
        $this->assign($viewData);
        return view();
    }

//文章添加
    public function add()
    {
        $cate = new Catetree();
        if (request()->isPost()) {
            $data = input('post.');
            $data['addtime'] = time();
//            $data['link_url'];外链     http://
            if ($data['link_url'] && stripos($data['link_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/  
                $data['link_url'] = 'http://'. $data['link_url'];
            }
            //处理图片上传
            if ($_FILES['thumb']['tmp_name']) {
                $data['thumb'] = $this->upload();
            }
//            验证器
            $validate = validate('article');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = db('article')->insert($data);
            if ($add) {
                $this->success('文章添加成功!', 'admin/article/lst');
            }else {
                $this->error("文章添加失败!");
            }
        }
        $cateRes = model('cate')->order('sort DESC')->select();
        $cateRes = $cate->cateTree($cateRes);
        $viewData = [
            'cate' => $cateRes,
        ];
        $this->assign($viewData);
        return view();
    }

//文章修改
    public function edit()
    {
        if (request()->isPost()) {

            $data = input('post.');
//            $data['link_url'];     http://
            if ($data['link_url'] && stripos($data['link_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['link_url'] = 'http://'. $data['link_url'];
            }
            //处理图片上传
            if ($_FILES['thumb']['tmp_name']) {
                $oldarticle = model('article')->field('thumb')->find($data['id']);
                $oldarticleImg = IMG_UPLOADS.$oldarticle['thumb'];      /*IMG_UPLOADS这是在入口文件定义的一个路径*/
                if (file_exists($oldarticleImg)) {        /*file_exists检查文件或目录是否存在*/
                    @unlink($oldarticleImg);            /*  删除缩略图  */
                }
                $data['thumb'] = $this->upload();
            }
            //            验证器
            $validate = validate('article');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $save = model('article')->update($data);
            if ($save !== false) {
                $this->success('修改品牌成功!', 'admin/article/lst');
            }else {
                $this->error("修改品牌失败!");
            }
        }
        $id = input('id');
        $articleLst = model('article')->find($id);
        $cate = new Catetree();
        $cateRes = model('cate')->order('sort DESC')->select();
        $cateRes = $cate->cateTree($cateRes);
        $viewData = [
            'articleLst' => $articleLst,
            'cate' => $cateRes
        ];
        $this->assign($viewData);
        return view();

    }

//    文章删除
    public function del()
    {
        $article = db('article');
        $articleInfo = $article->field('thumb')->find(input('post.id'));
        $thumbSrc = IMG_UPLOADS.$articleInfo['thumb'];
        if (file_exists($thumbSrc)) {        /*file_exists检查文件或目录是否存在*/
            @unlink($thumbSrc);                 /*  删除缩略图  */
        }
        $result = $article->delete(input('post.id'));
        if ($result == 1 ) {
            $this->success('文章删除成功!', 'admin/article/lst');
        }else {
            $this->error('文章删除失败!');
        }
    }

    //上传图片
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('thumb');
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

    //图片管理
    public function imglist()
    {
        $_files = my_scandir();
        $files = array();
//        循坏取键值
        foreach ($_files as $k => $v) {
//            判断$v是否存在数组,含有数组继续向下取键
            if (is_array($v)) {
                foreach ($v as $k1 => $v1) {
                    $v1 =str_replace(UEDITOR, HTTP_UEDITOR, $v1);
                    $files[] = $v1;
                }
            }else {
                $v =str_replace(UEDITOR, HTTP_UEDITOR,$v);
                $files[] = $v;
            }
        }
        $dataView = [
            'imgRes' => $files,
        ];
        $this->assign($dataView);
        return view();
    }

//    图片管理的图片删除
    public function delimg()
    {
        $imgsrc = input('imgsrc');    /*  接受前台传过来的数据  */
        $imgsrc = DEL_UEDITOR.$imgsrc;      /* 获取图片的地址准备删除 */
        if (file_exists($imgsrc)) {        /*file_exists检查文件或目录是否存在*/
            if (@unlink($imgsrc)) {     /*  删除缩略图  */
                $this->success('图片删除成功!', 'article/imglist');
            }else {
                return 2;
            }
        }else {
            return 3;
        }
    }
}
