<?php
namespace app\admin\controller;

use catetree\Catetree;
use think\Controller;

class Cate extends Controller
{

//分类列表
    public function lst()
    {
        $cate = new Catetree();
        $cateObj = model('Cate');
        if (request()->isPost())
        {
            $data = input('post.');
            $cate->cateSort($data['sort'], $cateObj);
            $this->success('排序成功!', 'Cate/lst');
        }
        $cateRes = $cateObj->order('sort DESC')->select();
        $cateRes = $cate->cateTree($cateRes);
        $viewData = [
            'cateLst' => $cateRes
        ];
        $this->assign($viewData);
        return view();
    }

//分类添加
    public function add()
    {
        $cate = new Catetree();
        $cateObj = model('Cate');
        if (request()->isPost()) {
            $data = input('post.');
            //判断是否可以添加子栏目
            if (in_array($data['pid'], ['1', '3'])) {       /*  in_array检查数组中是否存在某个值  */
                $this->error("系统分类不能为顶级栏目!");
            }
//            设置栏目类型为3
            if ($data['pid'] == 2) {
                $data['cate_type'] = 3;
            }
            //判断分类不能作为上级栏目!
            $cateId = $cateObj->field('pid')->find($data['pid']);
            $cateId = $cateId['pid'];
            if ($cateId == 2) {
                $this->error("此分类不能作为上级栏目!");
            }
//            验证器
            $validate = validate('Cate');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = $cateObj->insert($data);
            if ($add) {
                $this->success('添加分类成功!', 'admin/Cate/lst');
            }else {
                $this->error("添加分类失败!");
            }
        }
        $cateRes = $cateObj->order('sort DESC')->select();
        $cateRes = $cate->cateTree($cateRes);
        $viewData = [
            'cate' => $cateRes,
        ];
        $this->assign($viewData);
        return view();
    }

//商品修改
    public function edit()
    {
        $cate = new Catetree();
        $cateObj = model('Cate');
        if (request()->isPost()) {

            $data = input('post.');
            //            验证器
            $validate = validate('Cate');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $save = $cateObj->update($data);
            if ($save !== false) {
                $this->success('修改分类成功!', 'admin/Cate/lst');
            }else {
                $this->error("修改品牌失败!");
            }
        }
        $cates = $cateObj->find(input('id'));
        $cateRes = $cateObj->order('sort DESC')->select();
        $cateRes = $cate->cateTree($cateRes);
        $viewData = [
            'cate' => $cateRes,
            'cates' => $cates,
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
        $cate = model('Cate')->find($data);
        $cateTree = new Catetree();
        $sonids = $cateTree->childrenids($id,$cate);
        $sonids[] = intval($id);
        $arrSys = [1,2,3];
        $arrRes = array_intersect($arrSys,$sonids);
        if ($arrRes) {
            $this->error('系统内置文章分类不允许删除!');
        }
        //删除分类前判断该分类下的文章和文章相关的缩略图
        $article = db('article');
        foreach($sonids as $k => $v) {
            $artRes = $article->field('id,thumb')->where(array('cate_id'=>$v))->select();
            foreach ($artRes as $k1 => $v1) {
                $thumbSrc = IMG_UPLOADS.$v1['thumb'];
                if (file_exists($thumbSrc)) {        /*file_exists检查文件或目录是否存在*/
                    @unlink($thumbSrc);                 /*  删除缩略图  */
                }
                $article->delete($v1['id']);
            }
        }
        $sonids=implode(',',$sonids);       /*   转换为字符串     */
        $result = $cate->where("id in ($sonids)")->delete();

        if ($result) {
            $this->success('删除分类成功!', 'admin/Cate/lst');
        }else {
            $this->error('删除分类失败!');
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
