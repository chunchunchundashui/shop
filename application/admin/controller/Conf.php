<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class Conf extends Controller
{
    //配置项列表
    public function conflist()
    {
        $conf = db('conf');
        if (request()->isPost()){
            $data = input('post.');
            //复选框空选问题
            $checkFields2D = $conf->field('ename')->where(array('form_type'=>'checkbox'))->select();
            //改成一维数组
            $checkFields = array();
            if ($checkFields2D) {
                foreach ($checkFields2D as $k => $v) {
                    $checkFields[] = $v['ename'];
                }
            }
            // 所有发送的字段组成的数组
            $allFields = array();
//            处理文字数据
            foreach ($data as $k => $v) {
                $allFields[] = $k;
                if (is_array($v)) {
                    $value = implode(',', $v);
                    $conf->where(array('ename'=>$k))->update(['value'=>$value]);
                }else {
                    $conf->where(array('ename'=>$k))->update(['value'=>$v]);
                }
            }
            //如果复选框未选中任何一个选项,则设置空
            foreach ($checkFields as $k => $v) {
                if (!in_array($v, $allFields)) {
                    $conf->where(array('ename' => $v))->update(['value'=>'']);
                }
            }
//            处理图片数据
//            dump($_FILES);
            if ($_FILES) {
                foreach ($_FILES as $k => $v) {
                    if ($v['tmp_name']) {
                        $imgs = $conf->field('value')->where(array('ename' => $k))->find();
                        if ($imgs['value']) {
                            $oldImg = IMG_UPLOADS.$imgs['value'];
                            if (file_exists($oldImg)) {        /*file_exists检查文件或目录是否存在*/
                                @unlink($oldImg);                 /*  删除缩略图  */
                            }
                        }
                        $imgSrc = $this->upload($k);
                        $conf->where(array('ename' => $k))->update(['value' => $imgSrc]);
                    }
                }
            }
//            dump($data);die;
            $this->success('配置成功!');
        }
        $shopConfRes = $conf->where(array('conf_type'=>1))->order('sort desc')->select();
        $goodsConfRes = $conf->where(array('conf_type'=>2))->order('sort desc')->select();
        $viewData = [
            'shopConfRes' => $shopConfRes,
            'goodsConfRes' => $goodsConfRes,
        ];
        $this->assign($viewData);
        return view();
    }


//配置列表
    public function lst()
    {

        $conf = model('conf');
        if (request()->isPost()) {
            $data = input('post.');
            foreach ($data['sort'] as $k => $v) {
                $conf->where('id','=',$k)->update(['sort' => $v]);
            }
            $this->success('排序成功！');
        }
        $lst = $conf->order('sort desc')->paginate(10);
        $viewData = [
            'lst' => $lst
        ];
        $this->assign($viewData);
        return view();
    }

//配置添加
    public function add()
    {
        $conf = db('conf');
        if (request()->isPost()) {
            $data = input('post.');
            //如果是多选,替换中文符号","
            if ($data['form_type'] == 'radio' || $data['form_type'] == 'select' || $data['form_type'] == 'checkbox') {
                $data['values'] = str_replace('，', ',', $data['values']);
                $data['value'] = str_replace('，', ',', $data['value']);
            }
//            验证器
            $validate = validate('conf');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = $conf->insert($data);
            if ($add) {
                $this->success('配置添加成功!', 'admin/conf/lst');
            }else {
                $this->error("配置添加失败!");
            }
        }
//        $data['form_type'];
        return view();
    }

//配置修改
    public function edit()
    {
        if (request()->isPost()) {

            $data = input('post.');
            //如果是多选,替换中文符号","
            if ($data['form_type'] == 'radio' || $data['form_type'] == 'select' || $data['form_type'] == 'checkbox') {
                $data['values'] = str_replace('，', ',', $data['values']);
                $data['value'] = str_replace('，', ',', $data['value']);
            }
            //            验证器
            $validate = validate('conf');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $save = db('conf')->update($data);
            if ($save !== false) {
                $this->success('修改配置成功!', 'admin/conf/lst');
            }else {
                $this->error("修改配置失败!");
            }
        }
        $id = input('id');
        $confInfo = model('conf')->find($id);
        $viewData = [
            'confInfo' => $confInfo
        ];
        $this->assign($viewData);
        return view();

    }

//    配置删除
    public function del()
    {
        $confInfo = model('conf')->find(input('post.id'));
        $result = $confInfo->delete();
        if ($result == 1 ) {
            $this->success('配置删除成功!', 'admin/conf/lst');
        }else {
            $this->error('配置删除失败!');
        }
    }

    //上传图片
    public function upload($imgName){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file($imgName);
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
