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
//            处理文字数据
            foreach ($data as $k => $v) {
                if (is_array($v)) {
                    $value = implode(',', $v);
                    $conf->where(array('ename'=>$k))->update(['value'=>$value]);
                }else {
                    $conf->where(array('ename'=>$k))->update(['value'=>$v]);
                }
            }
//            dump($_FILES);
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
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('conf_img');
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
