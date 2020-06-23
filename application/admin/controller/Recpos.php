<?php
namespace app\admin\controller;

use Boris\DumpInspector;
use think\Controller;

class Recpos extends Controller
{

//推荐位列表
    public function lst()
    {
         $lst = model('recpos')->paginate(10);
        $viewData = [
            'lst' => $lst
        ];
        $this->assign($viewData);
        return view();
    }

//推荐位添加
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
//            验证器
            $validate = validate('recpos');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $add = db('recpos')->insert($data);
            if ($add) {
                $this->success('推荐位添加成功!', 'admin/recpos/lst');
            }else {
                $this->error("推荐位添加失败!");
            }
        }
        //获取所属类型的值
        $recpos = db('type')->select();
        $recposView = [
            'recpos' =>$recpos,
        ];
        $this->assign($recposView);
        return view();
    }

//推荐位修改
    public function edit()
    {
        if (request()->isPost()) {

            $data = input('post.');
            //            验证器
            $validate = validate('recpos');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $save = db('recpos')->update($data);
            if ($save !== false) {
                $this->success('修改推荐位成功!', 'admin/recpos/lst');
            }else {
                $this->error("修改推荐位失败!");
            }
        }
        $id = input('id');
        $recposInfo = model('recpos')->find($id);
        $viewData = [
            'recposInfo' => $recposInfo,
        ];
        $this->assign($viewData);
        return view();

    }
 
//    推荐位删除
    public function del()
    {
        $recposInfo = model('recpos')->find(input('post.id'));
        $result = $recposInfo->delete();
        if ($result == 1 ) {
            $this->success('推荐位删除成功!', 'admin/recpos/lst');
        }else {
            $this->error('推荐位删除失败!');
        }
    }
}
