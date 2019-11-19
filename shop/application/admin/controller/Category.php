<?php
namespace app\admin\controller;

use Catetree\Catetree;
use think\Controller;

class Category extends Controller
{

//分类列表
    public function lst()
    {
        $Category = new Catetree();
        $CategoryObj = model('Category');
        if (request()->isPost())
        {
            $data = input('post.');
            $Category->CateSort($data['sort'], $CategoryObj);
            $this->success('排序成功!', 'Category/lst');
        }
        $CategoryRes = $CategoryObj->order('sort DESC')->select();
        $CategoryRes = $Category->Catetree($CategoryRes);
        $viewData = [
            'CategoryLst' => $CategoryRes
        ];
        $this->assign($viewData);
        return view();
    }

//分类添加
    public function add()
    {
        $Category = new Catetree();
        $CategoryObj = model('Category');
        if (request()->isPost()) {
            $data = input('post.');
            //处理图片上传
            if ($_FILES['cate_img']['tmp_name']) {
                $data['cate_img'] = $this->upload();
            }
//            验证器
            $validate = validate('Category');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = $CategoryObj->insert($data);
            if ($add) {
                $this->success('添加分类成功!', 'admin/Category/lst');
            }else {
                $this->error("添加分类失败!");
            }
        }
        $CategoryRes = $CategoryObj->order('sort DESC')->select();
        $CategoryRes = $Category->Catetree($CategoryRes);
        $viewData = [
            'Category' => $CategoryRes,
        ];
        $this->assign($viewData);
        return view();
    }

//商品修改
    public function edit()
    {
        $Category = new Catetree();
        $CategoryObj = model('Category');
        if (request()->isPost()) {
            $data = input('post.');
            //处理图片上传
            if ($_FILES['cate_img']['tmp_name']) {
                $data['cate_img'] = $this->upload();
                $category = $CategoryObj->field('cate_img')->find($data['id']);
                if ($category['cate_img']) {
                    $imgSrc = IMG_UPLOADS.$category['cate_img'];
                    if (file_exists($imgSrc)) {        /*file_exists检查文件或目录是否存在*/
                        @unlink($imgSrc);                 /*  删除缩略图  */
                    }
                }
            }
            //            验证器
            $validate = validate('Category');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $save = $CategoryObj->update($data);
            if ($save !== false) {
                $this->success('修改分类成功!', 'admin/Category/lst');
            }else {
                $this->error("修改品牌失败!");
            }
        }
        $Categorys = $CategoryObj->find(input('id'));
        $CategoryRes = $CategoryObj->order('sort DESC')->select();
        $CategoryRes = $Category->Catetree($CategoryRes);
        $viewData = [
            'Category' => $CategoryRes,
            'Categorys' => $Categorys,
        ];
        $this->assign($viewData);
        return view();

    }

//    分类删除
    public function del($id)
    {
        $data = [
            'id' => input('post.id')
        ];
        $Category = model('Category')->find($data);
        $Catetree = new Catetree();
        $sonids = $Catetree->childrenids($id,$Category);
        $sonids[] = intval($id);
        //删除分类前判断该分类下的文章和文章相关的缩略图
//        $article = db('article');
//        foreach($sonids as $k => $v) {
//            $artRes = $article->field('id,thumb')->where(array('Category_id'=>$v))->select();
//            foreach ($artRes as $k1 => $v1) {
//                $thumbSrc = IMG_UPLOADS.$v1['thumb'];
//                if (file_exists($thumbSrc)) {        /*file_exists检查文件或目录是否存在*/
//                    @unlink($thumbSrc);                 /*  删除缩略图  */
//                }
//                $article->delete($v1['id']);
//            }
//        }
        $sonids=implode(',',$sonids);       /*   转换为字符串     */
        $result = $Category->where("id in ($sonids)")->delete();

        if ($result) {
            $this->success('删除分类成功!', 'admin/Category/lst');
        }else {
            $this->error('删除分类失败!');
        }
    }

    //上传图片
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('cate_img');
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
