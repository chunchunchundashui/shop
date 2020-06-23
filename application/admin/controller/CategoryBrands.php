<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class CategoryBrands extends Controller
{

//关联品牌列表
    public function lst()
    {
        $cbRes = model('CategoryBrands')
            ->field('cb.*,c.cate_name,GROUP_CONCAT(b.brand_name) brand_name')
            ->alias('cb')
            ->join('category c', 'cb.category_id = c.id')
            ->join('brand b', "find_in_set(b.id,cb.brands_id)", 'left')
            ->order('cb.id desc')->group('cb.id')->paginate(10);
        $viewData = [
            'cbRes' => $cbRes
        ];
        $this->assign($viewData);
        return view();
    }

//关联品牌添加
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
//            $data['link_url'];     http://
            if ($data['pro_url'] && stripos($data['pro_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['pro_url'] = 'http://'. $data['pro_url'];
            }
            //处理图片上传
            if ($_FILES['pro_img']['tmp_name']) {
                $data['pro_img'] = $this->upload();
            }
//            判断是否上传推广图
            if (isset($data['brands_id'])) {
                $data['brands_id'] = implode(',', $data['brands_id']);
            }
//            验证器
            $validate = validate('CategoryBrands');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = db('CategoryBrands')->insert($data);
            if ($add) {
                $this->success('关联品牌添加成功!', 'admin/CategoryBrands/lst');
            }else {
                $this->error("关联品牌添加失败!");
            }
        }
//        获取所有的品牌信息,要求品牌有logo
        $brands = db('brand')->where('brand_img', 'NEQ', '')->select();
//        获取所有的顶级分类
        $cataRes = model('Category')->where(array('pid' => 0))->select();
        $this->assign([
            'cateRes' => $cataRes,
            'brands' => $brands,
        ]);
        return view();
    }

//关联品牌修改
    public function edit()
    {
//        当前栏目信息
        $CategoryBrands = db('categoryBrands')->find(input('id'));
        if (request()->isPost()) {
            $data = input('post.');
//            $data['link_url'];     http://
            if ($data['pro_url'] && stripos($data['pro_url'], 'http://') === false) {         /*stripos() 查找字符串首次出现的位置（不区分大小写）*/
                $data['pro_url'] = 'http://'. $data['pro_url'];
            }
            //处理图片上传
            if ($_FILES['pro_img']['tmp_name']) {
//                如果有原图就删除
                if ($CategoryBrands['pro_img']) {
                    $linkImg = IMG_UPLOADS_PRO_IMG.$CategoryBrands['pro_img'];      /*IMG_UPLOADS_PRO_IMG这是在入口文件定义的一个路径*/
                    if (file_exists($linkImg)) {        /*file_exists检查文件或目录是否存在*/
                        @unlink($linkImg);
                    }
                }
                $data['pro_img'] = $this->upload();
            }
//            判断是否品牌id
            if (isset($data['brands_id'])) {
                $data['brands_id'] = implode(',', $data['brands_id']);
            }else {
                $data['brands_id'] = '';
            }
//            验证器
            $validate = validate('CategoryBrands');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = db('CategoryBrands')->update($data);
            if ($add) {
                $this->success('关联品牌修改成功!', 'admin/CategoryBrands/lst');
            }else {
                $this->error("关联品牌修改失败!");
            }
        }
//        获取所有的品牌信息,要求品牌有logo
        $brands = db('brand')->where('brand_img', 'NEQ', '')->select();
//        获取所有的顶级分类
        $cataRes = model('Category')->where(array('pid' => 0))->select();
        $this->assign([
            'cateRes' => $cataRes,
            'brands' => $brands,
            'CategoryBrands' => $CategoryBrands,
        ]);
        return view();
    }

//    关联品牌删除
    public function del()
    {
        $linkObj = db('categoryBrands');
        $links = $linkObj->field('pro_img')->find(input('post.id'));
        if ($links['pro_img']) {
            $linkImg = IMG_UPLOADS_PRO_IMG.$links['pro_img'];      /*IMG_UPLOADS_PRO_IMG这是在入口文件定义的一个路径*/
            if (file_exists($linkImg)) {        /*file_exists检查文件或目录是否存在*/
                @unlink($linkImg);
            }
        }
        $result = $linkObj->delete(input('post.id'));
        if ($result == 1 ) {
            $this->success('关联品牌删除成功!', 'admin/CategoryBrands/lst');
        }else {
            $this->error('关联品牌删除失败!');
        }
    }

    //上传图片
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('pro_img');
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
